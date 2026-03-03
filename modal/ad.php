<div class="container py-3">
    <h3 class="text-center fw-bold mb-4">新增動態文字廣告</h3>
    <hr>
    <form action="./api/insert.php?table=<?= $_GET['table']; ?>" method="post">
        <div class="mb-4">
            <label for="text" class="form-label fw-bold">動態文字廣告內容</label>
            <input type="text" name="text" id="text" class="form-control" placeholder="請輸入廣告內容">
        </div>
        <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">新增</button>
            <button type="reset" class="btn btn-outline-secondary px-4">重置</button>
        </div>
    </form>
</div>