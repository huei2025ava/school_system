<div class="container py-3">
  <h3 class="text-center fw-bold mb-4">新增標題區圖片</h3>
  <hr>
  <form action="../api/insert.php?table=<?= $_GET['table']; ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="img" class="form-label fw-bold">標題區圖片</label>
      <input type="file" name="img" id="img" class="form-control" required>
    </div>
    <div class="mb-4">
      <label for="text" class="form-label fw-bold">標題區替代文字</label>
      <input type="text" name="text" id="text" class="form-control" placeholder="請輸入替代文字">
    </div>
    <div class="d-flex justify-content-center gap-3">
      <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">新增</button>
      <button type="reset" class="btn btn-outline-secondary px-4">重置</button>
    </div>
  </form>
</div>