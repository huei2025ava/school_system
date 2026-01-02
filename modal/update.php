<?php
switch ($_GET['table']) {
  case 'title':
    $header = "更新圖片";
    $title = "標題區圖片";
    break;
  case 'mvim':
    $header = "更換動畫";
    $title = "動畫圖片";
    break;
  case 'image':
    $header = "更換圖片";
    $title = "校園映像圖片";
    break;
}
?>

<div class="cent"><?= $header ?></div>
<hr>
<form action="../api/update.php?table=<?= $_GET['table']; ?>" method="post" enctype="multipart/form-data">
  <table style="width:70%;margin:auto">
    <tr>
      <td><?= $title ?></td>
      <td><input type="file" name="img" id=""></td>
    </tr>
    <tr>
      <td>
        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <input type="submit" value="更新">
        <input type="reset" value="重製">
      </td>
      <td></td>
    </tr>
  </table>
</form>