<div class="container py-3">
    <h3 class="text-center fw-bold mb-4">新增主選單</h3>
    <hr>

    <form action="../api/insert.php?table=<?= $_GET['table']; ?>" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="text" class="form-label fw-bold">主選單名稱</label>
            <input type="text" name="text" id="text" class="form-control" placeholder="請輸入主選單名稱">
        </div>

        <div class="mb-4">
            <label for="href" class="form-label fw-bold">選單連結網址</label>
            <input type="text" name="href" id="href" class="form-control" placeholder="請輸入連結網址">
        </div>

        <div class="d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">新增</button>
            <button type="reset" class="btn btn-outline-secondary px-4">重置</button>
        </div>
    </form>
</div>