<div class="cent">編輯次選單</div>
<hr>
<form action="../api/submenu.php?main_id=<?= $_GET['id']; ?>" method="post" enctype="multipart/form-data">
  <table style="width:70%;margin:auto" id="subList">
    <tr>
      <td>次選單名稱</td>
      <td>次選單連結網址</td>
      <td>刪除</td>
    </tr>
    <tr>
      <td><input type=" text" name="text[]" id="">
      </td>
      <td><input type="text" name="href[]"></td>
      <td><input type="checkbox" name="del[]"></td>
    </tr>
  </table>
  <div class="cent">
    <input type="submit" value="修改確定">
    <input type="reset" value="重製">
    <input type="button" value="更多次選單" onclick="more()">
  </div>
</form>
<script>
function more() {
  let row = `
     <tr>
      <td><input type=" text" name="new_text[]" id="">
      </td>
      <td><input type="text" name="new_href[]"></td>
      <td><input type="checkbox" name="del[]"></td>
    </tr>
  `
  $("#subList").append(row);
}
</script>