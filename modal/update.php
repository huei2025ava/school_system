<?php
switch ($_GET['table']) {
  case 'title':
    $header = "更新標題區圖片";
    $title = "標題區圖片";
    break;
  case 'mvim':
    $header = "更換動畫圖片";
    $title = "動畫圖片";
    break;
  case 'image':
    $header = "更換校園映像圖片";
    $title = "校園映像圖片";
    break;
}
?>
<div class="container py-3">
  <h3 class="text-center fw-bold mb-4"><?= $header ?></h3>
  <hr>
  <form action="../api/update.php?table=<?= $_GET['table']; ?>" method="post" enctype="multipart/form-data">
    <div class="mb-4">
      <label for="img" class="form-label fw-bold"><?= $title ?></label>
      <input type="file" name="img" id="img" class="form-control" required>
    </div>
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <div class="d-flex justify-content-center gap-3">
      <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">更新</button>
      <button type="reset" class="btn btn-outline-secondary px-4">重置</button>
    </div>
  </form>
</div>