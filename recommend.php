<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>recommend.php</title>
</head>
<body>
<?php
session_start();  // 啟用交談期
if ( isset($_SESSION["NAME"])){
$moive_name = $_SESSION["NAME"];
echo $moive_name;
echo "<table border=1><tr><td>";
       if($moive_name!=NULL){
           //echo "have name".$moive_name;
        
            if ($moive_name=="數碼寶貝") {
               echo"we recommend you to watch 1/2的魔法";
            }
            if ($moive_name=="1/2的魔法") {
            echo "we recommend you to watch 數碼寶貝";
            }
            if ($moive_name=="黑暗騎士：黎明昇起") {
                echo "we recommend you to watch 蝙蝠俠：開戰時刻";
            }
            if ($moive_name=="蝙蝠俠：開戰時刻") {
                echo "we recommend you to watch 黑暗騎士：黎明昇起";
            }
            if ($moive_name=="現在，很想見你") {
                echo "we recommend you to watch 謝謝你愛過我";
            }
            if($moive_name=="謝謝你愛過我") {
                echo "we recommend you to watch 現在，很想見你";
            }
       }
}else echo "wrong";
echo "</td></tr></table>";

?>
<!-- <form action="login.php" method="post">
<table align="center" bgcolor="#FFCC99">
 <tr><td><font size="2">使用者名稱:</font></td>
   <td><input type="text" name="Username" 
             size="15" maxlength="10"/>
   </td></tr>
 <tr><td><font size="2">使用者密碼:</font></td>
   <td><input type="password" name="Password"
              size="15" maxlength="10"/>
   </td></tr>
 <tr><td colspan="2" align="center">
   <input type="submit" value="登入網站"/>
   </td></tr> 
</table>
</form> -->
</body>
</html>