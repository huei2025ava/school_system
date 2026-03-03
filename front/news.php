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

    <!-- 主要內容區 -->
    <div class="p-4">
        <div class="card border-primary shadow-sm">
            <div class="card-header bg-primary text-white text-center py-3">
                <h3 class="mb-0 fw-bold">最新消息顯示區</h3>
            </div>
            <div class="card-body p-0">
                <?php 
                    $total=$News->count(['sh'=>1]);
                    $div=5;
                    $pages=ceil($total/$div);
                    $now=$_GET['p']??1;
                    $start=($now-1)*$div;
                    $news=$News->all(['sh'=>1]," limit $start,$div");	
                ?>
                <ul class="list-group list-group-flush">
                    <?php 
                        foreach($news as $idx => $n){
                            $num = $start + $idx + 1;
                            echo "<li class='list-group-item list-group-item-action p-4 sswww' style='cursor: pointer;'>";
                            echo "<span class='badge bg-info text-dark me-3 fs-6'>{$num}</span>";
                            echo "<span class='fs-5'>" . mb_substr($n['text'], 0, 50) . "...</span>";
                            echo "<div class='all' style='display:none;'>";
                            echo nl2br($n['text']);
                            echo "</div>";
                            echo "</li>";
                        }
                    ?>
                </ul>
            </div>
            
            <!-- 分頁按鈕 -->
            <div class="card-footer bg-white py-4">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mb-0">
                        <?php 
                            if($now > 1){
                                $prev = $now - 1;
                                echo "<li class='page-item'><a class='page-link fw-bold px-3' href='?do=$do&p=$prev'>&laquo;</a></li>";
                            }
                        
                            for($i=1; $i<=$pages; $i++){
                                $active = ($i == $now) ? "active shadow-sm" : "";
                                echo "<li class='page-item $active'><a class='page-link fw-bold px-3' href='?do=$do&p=$i'> $i </a></li>";
                            }

                            if($now < $pages){
                                $next = $now + 1;
                                echo "<li class='page-item'><a class='page-link fw-bold px-3' href='?do=$do&p=$next'>&raquo;</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- 懸浮提示框 -->
<div id="alt"
    style="position: absolute; width: 450px; min-height: 120px; word-break:break-all; background-color: rgba(255, 255, 204, 0.98); z-index: 1000; display: none; padding: 20px; border: 1px solid #ffc107; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
</div>

<script>
$(".sswww").hover(
    function() {
        $("#alt").html("<div style='font-size:1.1rem; line-height:1.6;'>" + $(this).children(".all").html() + "</div>")
        var pos = $(this).offset();
        $("#alt").css({
            "top": pos.top - 100,
            "left": pos.left + 150
        }).fadeIn(200);
    },
    function() {
        $("#alt").hide();
    }
)
</script>
