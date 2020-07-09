<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>電影查詢.php</title>
</head>
<body text="black">
<center>

<form action="moviesearch.php" method="post">
<table border="1">
<tr><td>搜尋電影: </td>
  <td><input type="text" name="movie" 
             size="10" maxlength="20"/></td></tr>
<tr><td colspan="2" align="center">
  <input type="submit" name="search" value="搜尋"/></td>
</tr>
</form>

<?php

session_start();  
$m_name_ch = "";
if (isset($_POST["search"])) {
   $m_name_ch=$_POST["movie"];
}

require_once("mymovie_open.inc");

if ($m_name_ch!=""){
   $sql = "SELECT * FROM movie WHERE m_name_ch LIKE'%$m_name_ch%'";
   $_SESSION["movie_search"] = $sql;
   header("Location: movieresult.php");
}


$sql = "SELECT * FROM movie";
$result = mysqli_query($link, $sql);

echo "<table border=1>";

echo "<b>
         <tr>
            <td>電影中文名稱</td>
            <td>電影英文名稱</td>
         </tr>
      </b>";

while ($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
   
   echo "<tr><td>".$rows["m_name_ch"]."</td>";
   echo "<td>".$rows["m_name_en"]."</td>";
}

mysqli_free_result($result); 
require_once("mymovie_close.inc");
?>

<hr/><a href="homepage.php">首頁</a></center>




</body>
</html>