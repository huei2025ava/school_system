<?php 
include_once "db.php";

$table=$_GET['table'];
$db=${ucfirst($table)};

$rows = $db->find(1);
// 因為total和bottom資料表的欄位名稱是total和bottom，所以可以直接帶$table變數
$rows[$table] = $_POST[$table];
$db->save($rows);
to("../back.php?do=$table");
?>