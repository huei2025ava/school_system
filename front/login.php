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
    <div class="p-5 d-flex justify-content-center align-items-center" style="min-height: calc(100% - 40px);">
        <div class="card border-dark shadow-sm" style="width: 100%; max-width: 500px;">
            <div class="card-header bg-dark text-white text-center py-3">
                <h3 class="mb-0 fw-bold">管理員登入區</h3>
            </div>
            <div class="card-body p-4">
                <form method="post" action="./api/login.php">
                    <div class="mb-4">
                        <label for="acc" class="form-label fs-5 fw-medium">帳號 ：</label>
                        <input name="acc" id="acc" autofocus="" type="text" class="form-control form-control-lg border-secondary">
                    </div>
                    <div class="mb-4">
                        <label for="pw" class="form-label fs-5 fw-medium">密碼 ：</label>
                        <input name="pw" id="pw" type="password" class="form-control form-control-lg border-secondary">
                    </div>
                    <div class="d-grid gap-3 pt-2">
                        <button class="btn btn-primary btn-lg shadow-sm fw-bold" type="submit">登入</button>
                        <button class="btn btn-outline-secondary btn-lg shadow-sm" type="reset">清除</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
