<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>電影排行榜查詢</title>
</head>
<body>
<center>
<?php
   $sql = "SELECT * FROM movie GROUP BY m_name_ch ORDER BY order_time DESC LIMIT 3";

   require_once("mymovie_open.inc");
   $result = @mysqli_query($link, $sql); 
   if ( mysqli_errno($link) != 0 ) {
      echo "錯誤代碼: ".mysqli_errno($link)."<br/>";
      echo "錯誤訊息: ".mysqli_error($link)."<br/>";      
   } 
   else { 
      echo "<table border=1>";
      echo "<tr>";
      while ( $meta = mysqli_fetch_field($result) )
         echo "<td><small>".$meta->name."</small></td>";
      echo "</tr>";
      // 取得欄位數
      $total_fields = mysqli_num_fields($result);
      while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
         echo "<tr>";
         for ( $i = 0; $i < $total_fields; $i++ )
            echo "<td><small>".$rows[$i]."</small></td>";
         echo "</tr>";
      }
      echo "</table>";
      // 取得記錄數
      $total_records = mysqli_num_rows($result);
      //secho "記錄總數: $total_records 筆<br/></small>";
      mysqli_free_result($result);
   }
   require_once("mymovie_close.inc");

 
?>

<hr/><a href="homepage.php">首頁</a></center>
</body>
</html>