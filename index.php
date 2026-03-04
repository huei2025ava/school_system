<?php
include_once "./api/db.php"
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>卓越科技大學校園資訊系統</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/js.js"></script>
    <style>
    body,
    html {
        overflow-x: hidden;
        margin: 0;
        padding: 0;
    }

    .header-img {
        height: 180px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
    }

    .list-group-item.mainmu {
        cursor: pointer;
        position: relative;
    }

    .mw {
        display: none;
        position: absolute;
        left: 100%;
        top: 0;
        z-index: 1000;
        min-width: 200px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .mainmu:hover .mw {
        display: block;
    }

    #cover {
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: 2000;
        background: rgba(0, 0, 0, 0.7);
        top: 0;
        left: 0;
        display: none;
    }

    #coverr {
        width: 80%;
        max-width: 1000px;
        height: 80%;
        position: absolute;
        background: #fff;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 0.5rem;
        padding: 2rem;
        overflow: auto;
    }

    .campus-img {
        width: 100%;
        height: auto;
        border: 4px solid orange;
        margin: 10px 0;
    }

    /* 移除卡片邊框讓銜接更緊密 */
    .full-height-card {
        border-radius: 0;
        border: none;
        min-height: calc(100vh - 180px - 80px);
        /* 減去 header 與 footer 高度 */
    }

    .sidebar-bg {
        background-color: #f8f9fa;
    }
    </style>
</head>

<body>
    <!-- Modal Cover -->
    <div id="cover">
        <div id="coverr">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" onclick="cl('#cover')"
                aria-label="Close"></button>
            <div id="cvr"></div>
        </div>
    </div>

    <!-- Header Section - Full Width -->
    <?php $title = $Title->find(['sh' => 1]); ?>
    <header class="container-fluid p-0">
        <a title="<?= $title['text'] ?>" href="index.php" class="text-decoration-none">
            <div class="header-img" style="background-image: url('upload/<?= $title['img'] ?>');">
            </div>
        </a>
    </header>

    <!-- Main Content Section - Full Width, No Gutters -->
    <main class="container-fluid p-0">
        <div class="row g-0">
            <!-- Left Sidebar (25%) -->
            <div class="col-lg-3 sidebar-bg border-end">
                <div class="card full-height-card sidebar-bg">
                    <div class="card-header bg-dark text-white text-center fw-bold rounded-0 py-3">
                        主選單區
                    </div>
                    <div class="list-group list-group-flush">
                        <?php
                        $mains = $Menu->all(['main_id' => 0, 'sh' => 1]);
                        foreach ($mains as $main) {
                        ?>
                        <div class="list-group-item mainmu p-0 sidebar-bg border-bottom">
                            <a href="<?= $main['href'] ?>"
                                class="d-block w-100 p-4 text-decoration-none text-dark fs-5 fw-medium">
                                <?= $main['text'] ?>
                            </a>
                            <?php if ($Menu->count(['main_id' => $main['id']]) > 0): ?>
                            <div class="mw list-group shadow rounded-0 border-0">
                                <?php
                                    $subs = $Menu->all(['main_id' => $main['id']]);
                                    foreach ($subs as $sub):
                                    ?>
                                <a href="<?= $sub['href'] ?>"
                                    class="list-group-item list-group-item-action bg-white py-3">
                                    <?= $sub['text'] ?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="mt-auto p-4 text-center border-top">
                        <span class="fw-bold fs-5">進站總人數 :
                            <?php
                            $total = $Total->find(1);
                            echo $total['total'];
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Center Content (50%) -->
            <div class="col-lg-6">
                <div class="card full-height-card">
                    <div class="card-body p-0">
                        <?php
                        $do = $_GET['do'] ?? "main";
                        $file = "./front/" . $do . ".php";
                        if (file_exists($file)) {
                            include $file;
                        } else {
                            include "./front/main.php";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar (25%) -->
            <div class="col-lg-3 sidebar-bg border-start">
                <div class="card full-height-card sidebar-bg">
                    <div class="p-4">
                        <div class="d-grid gap-2 mb-4">
                            <?php if (isset($_SESSION['admin'])): ?>
                            <button class="btn btn-outline-dark shadow-sm fw-bold py-3"
                                onclick="lo('back.php')">返回管理</button>
                            <?php else: ?>
                            <button class="btn btn-dark shadow-sm fw-bold py-3" onclick="lo('?do=login')">管理登入</button>
                            <?php endif; ?>
                        </div>

                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-success text-white text-center fw-bold py-3">
                                校園映象區
                            </div>
                            <div class="card-body text-center p-3">
                                <div class="mb-3" onclick="pp(1)" style="cursor:pointer">
                                    <img src="icon/up.jpg" alt="Up" class="opacity-75">
                                </div>

                                <div id="image-carousel">
                                    <?php
                                    $images = $Image->all(['sh' => 1]);
                                    foreach ($images as $key => $img) {
                                        echo "<div class='im' id='ssaa{$key}' style='display:none;'>";
                                        echo "<img src='upload/{$img['img']}' class='campus-img rounded shadow-sm'>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>

                                <div class="mt-3" onclick="pp(2)" style="cursor:pointer">
                                    <img src="icon/dn.jpg" alt="Down" class="opacity-75">
                                </div>

                                <script>
                                var nowpage = 0,
                                    num = <?= count($images) ?>;

                                function pp(x) {
                                    var s, t;
                                    if (x == 1 && nowpage - 1 >= 0) {
                                        nowpage--;
                                    }
                                    if (x == 2 && (nowpage + 1) <= num * 1 - 3) {
                                        nowpage++;
                                    }
                                    $(".im").hide()
                                    for (s = 0; s <= 2; s++) {
                                        t = s * 1 + nowpage * 1;
                                        $("#ssaa" + t).fadeIn();
                                    }
                                }
                                pp(1);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Section - Full Width -->
    <footer class="bg-success py-4 border-top">
        <div class="container-fluid text-center">
            <span class="fw-bold fs-5 text-light">
                <?php
                $bottom = $Bottom->find(1);
                echo $bottom['bottom'];
                ?>
            </span>
        </div>
    </footer>

    <!-- Tooltip Style Box -->
    <div id="alt"
        style="display:none; width:350px; min-height:100px; word-break:break-all; background:rgba(255,255,255,0.95); border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0,0,0,0.1); padding:15px; position:absolute; z-index:99999; border-radius:8px;">
    </div>

    <script>
    $(".sswww").hover(
        function() {
            $("#alt").html($(this).children(".all").html()).css({
                "top": $(this).offset().top - 50,
                "left": $(this).offset().left + 60
            }).fadeIn(200);
        },
        function() {
            $("#alt").hide();
        }
    );
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>