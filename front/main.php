<div class="w-100">
    <!-- 跑馬燈廣告區 -->
    <div class="bg-light border-bottom" style="height: 40px; overflow: hidden;">
        <marquee scrolldelay="120" direction="left" class="h-100 d-flex align-items-center">
            <?php
            $ads = $Ad->all(['sh' => 1]);
            foreach ($ads as $ad) {
                echo "<span class='mx-3 fs-5'>" . $ad['text'] . "</span>";
            }
            ?>
        </marquee>
    </div>

    <!-- 正中央輪播圖 (Mvim) -->
    <div style="width:100%; height:450px; background-color: #000;">
        <div id="mwww" loop="true" style="width:100%; height:100%; display: flex; justify-content: center; align-items: center;">
        </div>
    </div>

    <script>
    var lin = new Array();

    <?php
    $mvims = $Mvim->all(['sh' => 1]);
    foreach ($mvims as $mv) {
        echo "lin.push('upload/{$mv['img']}');\n";
    }
    ?>

    var now = 0;
    if (lin.length > 0) {
        ww(); 
        if (lin.length > 1) {
            setInterval("ww()", 3000);
        }
    }

    function ww() {
        // 使用 100% 寬高填滿容器，移除 99% 的限制
        $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:100%; height:100%; object-fit: cover;'></embed>")
        now++;
        if (now >= lin.length)
            now = 0;
    }
    </script>

    <!-- 最新消息區 -->
    <div class="p-4">
        <div class="card border-success shadow-sm">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <span class="fw-bold fs-5">最新消息區</span>
                <?php
                if ($News->count(['sh' => 1]) > 5) {
                    echo "<a href='?do=news' class='btn btn-sm btn-outline-light'>More...</a>";
                }
                ?>
            </div>
            <div class="card-body">
                <?php
                $news = $News->all(['sh' => 1], " limit 5")
                ?>
                <ul class="list-group list-group-flush ssaa">
                    <?php
                    foreach ($news as $n) {
                        echo "<li class='list-group-item list-group-item-action' style='cursor: pointer;'>";
                        echo mb_substr($n['text'], 0, 40) . "...";
                        echo "<div class='all' style='display:none;'>";
                        echo $n['text'];
                        echo "</div>";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="altt"
    style="position: absolute; width: 400px; min-height: 100px; background-color: rgba(255, 255, 204, 0.95); z-index: 999; display: none; padding: 15px; border: 1px solid #ffc107; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
</div>

<script>
$(".ssaa li").hover(
    function() {
        $("#altt").html("<div style='white-space: pre-wrap;'>" + $(this).children(".all").html() + "</div>")
        var pos = $(this).offset();
        $("#altt").css({
            top: pos.top - 100,
            left: pos.left + 100
        }).fadeIn(200);
    },
    function() {
        $("#altt").hide();
    }
)
</script>
