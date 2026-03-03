<?php include_once "../api/db.php"; ?>
<div class="container py-3">
  <h3 class="text-center fw-bold mb-4">編輯次選單</h3>
  <hr>
  <form action="../api/submenu.php?main_id=<?= $_GET['id']; ?>" method="post">
    <table class="table table-borderless align-middle" id="subList">
      <thead class="table-light">
        <tr class="text-center">
          <th style="width: 40%">次選單名稱</th>
          <th style="width: 40%">連結網址</th>
          <th style="width: 20%">刪除</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $subs = $Menu->all(['main_id' => $_GET['id']]);
        foreach ($subs as $sub):
        ?>
        <tr>
          <td><input type="text" name="text[<?= $sub['id'] ?>]" value="<?= $sub['text'] ?>"
              class="form-control form-control-sm"></td>
          <td><input type="text" name="href[<?= $sub['id'] ?>]" value="<?= $sub['href'] ?>"
              class="form-control form-control-sm"></td>
          <td class="text-center"><input type="checkbox" name="del[]" value="<?= $sub['id'] ?>"
              class="form-check-input"></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="d-flex justify-content-center gap-3 mt-4">
      <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">修改確定</button>
      <button type="reset" class="btn btn-outline-secondary px-4">重置</button>
      <button type="button" class="btn btn-warning px-4 fw-bold" onclick="more()">更多次選單</button>
    </div>
  </form>
</div>

<script>
function more() {
  let row = `
    <tr>
      <td><input type="text" name="new_text[]" class="form-control form-control-sm"></td>
      <td><input type="text" name="new_href[]" class="form-control form-control-sm"></td>
      <td class="text-center"><input type="checkbox" name="del[]" class="form-check-input" disabled></td>
    </tr>`;
  $("#subList tbody").append(row);
}
</script>