<?php
include_once "./api/db.php";
if (!isset($_SESSION['admin'])) {
    to("./index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>卓越科技大學校園資訊系統 - 後台管理</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/js.js"></script>
    <style>
    body, html {
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

    .full-height-card {
        border-radius: 0;
        border: none;
        min-height: calc(100vh - 180px - 80px);
    }
    
    .sidebar-bg {
        background-color: #f8f9fa;
    }

    .admin-menu-item {
        transition: all 0.2s;
    }

    .admin-menu-item:hover {
        background-color: #e9ecef;
        padding-left: 1.5rem !important;
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

    <!-- Header Section -->
    <?php $title = $Title->find(['sh' => 1]); ?>
    <header class="container-fluid p-0">
        <a title="<?= $title['text'] ?>" href="index.php" class="text-decoration-none">
            <div class="header-img" style="background-image: url('upload/<?= $title['img'] ?>');">
            </div>
        </a>
    </header>

    <!-- Main Content Section -->
    <main class="container-fluid p-0">
        <div class="row g-0">
            <!-- Left Sidebar (25%) -->
            <div class="col-lg-3 sidebar-bg border-end">
                <div class="card full-height-card sidebar-bg">
                    <div class="card-header bg-dark text-white text-center fw-bold rounded-0 py-3">
                        後台管理選單
                    </div>
                    <div class="list-group list-group-flush">
                        <?php
                        $menus = [
                            'title' => '網站標題管理',
                            'ad' => '動態文字廣告管理',
                            'mvim' => '動畫圖片管理',
                            'image' => '校園映象資料管理',
                            'total' => '進站總人數管理',
                            'bottom' => '頁尾版權資料管理',
                            'news' => '最新消息資料管理',
                            'admin' => '管理者帳號管理',
                            'menu' => '選單管理',
                        ];
                        foreach ($menus as $do_key => $do_name) {
                            $active = (($_GET['do'] ?? 'title') == $do_key) ? 'active shadow-sm' : '';
                        ?>
                        <a href="?do=<?= $do_key ?>" 
                           class="list-group-item list-group-item-action admin-menu-item p-4 sidebar-bg border-bottom <?= $active ?>">
                            <span class="fs-5 fw-medium"><?= $do_name ?></span>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="mt-auto p-4 text-center border-top">
                        <span class="fw-bold fs-5 text-muted">進站總人數 :
                            <?php
                            $total = $Total->find(1);
                            echo $total['total'];
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Center Management Content (75%) -->
            <div class="col-lg-9">
                <div class="card full-height-card">
                    <div class="card-header bg-white border-bottom p-4">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 fw-bold text-primary">後台管理區</h2>
                            </div>
                            <div class="col-auto">
                                <button onclick="location.href='./api/logout.php'" class="btn btn-outline-danger px-4 py-2 fw-bold">
                                    管理登出
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <?php
                        $do = $_GET['do'] ?? 'title';
                        $do = basename($do);
                        $file = "./back/$do.php";
                        if (!file_exists($file)) {
                            $file = "./back/title.php";
                        }
                        include $file;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="bg-warning py-4 border-top">
        <div class="container-fluid text-center">
            <span class="fw-bold fs-5">
                <?php
                $bottom = $Bottom->find(1);
                echo $bottom['bottom'];
                ?>
            </span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
