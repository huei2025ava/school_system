<?php
switch ($_GET['do']) {
  case 'title':
//     echo '
//     <form action="" method="post">
//      <table>
//        <tr>
//          <td>標題區圖片</td>
//          <td><input type="file" name="title_img"    id=""></td>
//        </tr>
//        <tr>
//          <td>標題區替代文字</td>
//          <td><input type="text"></td>
//        </tr>
//      </table>
//     </form>';
//     break;

//   default:
//     break;
// }
?>
<form action="" method="post">
  <table>
    <tr>
      <td>標題區圖片</td>
      <td><input type="file" name="title_img" id=""></td>
    </tr>
    <tr>
      <td>標題區替代文字</td>
      <td><input type="text"></td>
    </tr>
  </table>
</form>
<?php 
break;
case 'ad';
?>
<form action="" method="post">
  <table>
    <tr>
      <td>動態文字廣告</td>
      <td><input type="file" name="title_img" id=""></td>
    </tr>
  </table>
</form>
<?php 
}
?>