<div class="container py-3">
    <h3 class="text-center fw-bold mb-4">新增最新消息</h3>
    <hr>
    <form action="../api/insert.php?table=<?= $_GET['table']; ?>" method="post">
        <div class="mb-4">
            <label for="text" class="form-label fw-bold">最新消息內容</label>
            <textarea name="text" id="text" class="form-control" rows="5" placeholder="請輸入消息內容" required></textarea>
        </div>
        <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">新增</button>
            <button type="reset" class="btn btn-outline-secondary px-4">重置</button>
        </div>
    </form>
</div>