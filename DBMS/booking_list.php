<?php
   ob_start();
   session_start();
   if(!isset($_SESSION['SHOWROWS'])) {
	$_SESSION["SHOWROWS"] = "";
   }
   if(!isset($_SESSION['TOTAL'])) {
	$_SESSION["TOTAL"] = 0;
   }


?>

<!DOCTYPE html>
<html>
<head>
	<title>購物車內頁</title>
</head>
<body>

	<div id="cart_top" class="cart">
		
		<a href="homepage.php"><img src="https://lh3.googleusercontent.com/proxy/5uXnTAVoSCE-CDf-xc1Xq2HERk1uWqoVmtcwvSTJHPBSOm8I8fRa3MHaiOo5ZR3ZjhrasI3bWREshTNGplTEY3KPLW8KgQuLOBriOWRY7FyMgqDlSGv3QaBKTmjoLAs92ymRnx9xEB9I" height = 350px; width = 350px;></a>

    <a href="?clear_cart">Clear Shoppint Cart</a>
	<?php 
	echo("<button onclick=\"
				location.href='moviesearch.php'\"
				>Back to movie list</button>");
	?>
    <?php
		if(isset($_GET['clear_cart'])) {
			session_unset();
		}
    ?>
	</div>

	<div id="cart_table" class="cart">
		<table border="1" width="1000px" >
			<?php
				if(isset($_GET["movie_id"])) {
					require_once("mymovie_open.inc");
					//$conn = readDb();
					$sql = "SELECT * FROM movie where movie_id ='".$_GET["movie_id"]."'";
					$sql_name = "SELECT m_name_ch FROM movie where movie_id ='".$_GET["movie_id"]."'";
					$result = mysqli_query($link, $sql);
					$total_fields=mysqli_num_fields($result);
					$total_records=mysqli_num_rows($result);
					$showrows = $_SESSION["SHOWROWS"];
					$total = $_SESSION["TOTAL"];

					while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
						$showrows = $showrows."<tr>";
												
						for ($i = 0;$i<= $total_fields - 1; $i++ ) {
							if($i == 4){
								$rows[$i] = 1;
							}
							
							$showrows = $showrows."<td>".$rows[$i]."</td>";
							if($i == ($total_fields - 3)) {
								@$total = $total + $rows[$i]*$rows[$i-1];
							}
						}
						$showrows = $showrows."</tr>";
					}
					$_SESSION["SHOWROWS"] = $showrows;
					$_SESSION["TOTAL"] = $total;
					require_once("mymovie_close.inc");
				}			
			?>
			<tr>
				<td width="100px"><div id="cart_table_title" >購物車明細</div></td>
			</tr>
			<tr bgcolor="#ffe8e8">
				<th>電影ID</th>
				<th width="400px">電影中文名稱</th>
				<th>電影英文名稱</th>
				<th>種類</th>
				<th width="50px">訂購張數</th>
				<th width="50px">價錢</th>
				<th>上映時間</th>
				<th>下檔時間</th>
			</tr>
			<?php
				if(isset($_GET["movie_id"])){
					echo $showrows;
					echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td>Total</td><td>".$total."</td></tr>";
				}
				else{
				@	$showrows = $_SESSION["SHOWROWS"];
				@	$total = $_SESSION["TOTAL"];
					echo $showrows;
					echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td>Total</td><td>".$total."</td></tr>";
				}
			?>
	</div>

			<a href="test_session.php">Check Out</a>


	<style type="text/css">

	#cart_table_title{
		background: red;
		color: white;

	}

	.cart{
		width:1000px;
		/*div置中*/
		margin: 0 auto;
		/*背景顏色*/
		background-color: white;
	}

	#cart_table{
		margin-top: 30px
	}



	</style>

</body>
</html>

