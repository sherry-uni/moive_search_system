<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>login.php</title>
   <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
<?php
session_start();  // 啟用交談期
$account = "";  $password = "";
// 取得表單欄位值
if ( isset($_POST["account"]) )
   $account = $_POST["account"];
if ( isset($_POST["Password"]) )
   $password = $_POST["Password"];
// 檢查是否輸入使用者名稱和密碼
if ($account != "" && $password != "") {
   // 建立MySQL的資料庫連接 
   $link = mysqli_connect("localhost","root",
                          "milanchuang1109","Member")
        or die("無法開啟MySQL資料庫連接!<br/>");
   //送出UTF8編碼的MySQL指令
   mysqli_query($link, 'SET NAMES utf8'); 
   // 建立SQL指令字串
   $sql = "SELECT * FROM Member WHERE password='";
   $sql.= $password."' AND account='".$account."'";
   // 執行SQL查詢
   $result = mysqli_query($link, $sql);
   $total_records = mysqli_num_rows($result);
   // 是否有查詢到使用者記錄
   if ( $total_records > 0 ) {
      // 成功登入, 指定Session變數
      $_SESSION["login_session"] = true;
      header("Location: index.php");
   } else {  // 登入失敗
      echo "<center><font color='red'>";
      echo "使用者名稱或密碼錯誤!<br/>";
      echo "</font>";
      $_SESSION["login_session"] = false;
   }
   mysqli_close($link);  // 關閉資料庫連接  
}
?>
<div class="loginbox">
<img src="avatar.png" class="avatar">
<h1>登入</h1>
   <form action="login.php" method="post">
      <table align="center" bgcolor=black>
         <p>使用者名稱:</p>
         <input type="text" name="account" size="10" maxlength="10" placeholder="輸入使用者名稱"/>
         <p>使用者密碼:</p>
         <input type="password" name="Password" size="10" maxlength="10" placeholder="輸入密碼"/>
         <input type="submit" value="登入網站"/>    
   </table>
   </form>
</div>
</body>
</html>