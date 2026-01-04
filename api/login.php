<?php
include_once "db.php";

$chk = $Admin->count($_POST);

// $user = $Admin->find($_POST);
if ($chk) {
  $_SESSION['admin']=$_POST['acc'];
  // $_SESSION['admin_id']=$user['id'];
  // echo "<script>alert('歡迎回來，管理員 id：{$_SESSION['admin_id']}');
  // location.href = '../back.php';
  // </script>
  // ";
  to("../back.php");
}
?>
<script>
alert('帳號或密碼錯誤');
location.href = '../login.php';
</script>