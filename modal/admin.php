<div class="container py-3">
    <h3 class="text-center fw-bold mb-4">新增管理者帳號</h3>
    <hr>
    <form action="./api/insert.php?table=<?= $_GET['table']; ?>" method="post">
        <div class="mb-3">
            <label for="acc" class="form-label fw-bold">帳號</label>
            <input type="text" name="acc" id="acc" class="form-control" placeholder="請輸入管理者帳號" required>
        </div>
        <div class="mb-3">
            <label for="pw" class="form-label fw-bold">密碼</label>
            <input type="password" name="pw" id="pw" class="form-control" placeholder="請輸入密碼" required>
        </div>
        <div class="mb-4">
            <label for="pw2" class="form-label fw-bold">確認密碼</label>
            <input type="password" name="pw2" id="pw2" class="form-control" placeholder="請再次輸入密碼" required>
        </div>
        <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">新增</button>
            <button type="reset" class="btn btn-outline-secondary px-4">重置</button>
        </div>
    </form>
</div>