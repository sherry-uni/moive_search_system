<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>movie.php</title>
</head>
<body text="black">
<center>

<?php
session_start();  
require_once("mymovie_open.inc");


if (isset($_SESSION["movie_search"]))
   $sql = $_SESSION["movie_search"];
$result=mysqli_query($link,$sql);


echo "<table border=1><b><tr>
<td>電影中文名稱</td>
<td>電影英文名稱</td>
<td>種類</td>
<td>價錢</td>
<td>收藏</td>
<td>預訂</td></tr></b>";

if(!$result){
   echo ("Error: ".mysqli_error($link));
   exit();
}
else{
while ($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
   
   echo "<tr><td>".$rows["m_name_ch"]."</td>";
   echo "<td>".$rows["m_name_en"]."</td>";
   echo "<td>".$rows["type"]."</td>";
   echo "<td>".$rows["price"]."</td>";
   echo "<td><button onclick=\"location.href='booking_list.php?movie_id={$rows["movie_id"]}'\">Book</button></td>";
   echo "<td><button onclick=\"location.href='collection.php?movie_id={$rows["movie_id"]}'\">Collect</button></td>";
}
}
$total_fields=mysqli_num_fields($result);
$total_records=mysqli_num_rows($result);
echo "結果總數: $total_records 筆<br/>";

require_once("mymovie_close.inc");
?>


<hr/><a href="homepage.php">首頁</a></center>
</body>
</html>