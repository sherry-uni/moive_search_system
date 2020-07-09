<?php
   ob_start();
   session_start();
   if(!isset($_SESSION['COLLECTION'])) {
	$_SESSION["COLLECTION"] = "";
   }
   if(!isset($_SESSION["NAME"])){
    $_SESSION["NAME"]="";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>收藏內頁</title>
</head>
<body>

	<div id="collection_top" class="collection">
		
		<a href="homepage.php"><img src="home-icon.png"></a>

    <a href="?clear_cart">Clear</a>
	<?php 
	echo("<button onclick=\"
				location.href='moviesearch.php'\"
				>Back to Movie List</button>");
	?>
    <?php
		if(isset($_GET['clear_cart'])) {
			session_unset();
		}
    ?>
	</div>

	<div id="collection_table" class="collection">
		<table border="1" width="1000px" >
			<?php
				if(isset($_GET["movie_id"])) {
					require_once("mymovie_open.inc");
                    $sql = "SELECT * FROM movie where movie_id ='".$_GET["movie_id"]."'";
                    $sql_name = "SELECT m_name_ch FROM movie where movie_id ='".$_GET["movie_id"]."'";
                    $result = mysqli_query($link, $sql);
                    $name_result = mysqli_query($link,$sql_name);
					$total_fields=mysqli_num_fields($result);
					$total_records=mysqli_num_rows($result);
                    $showrows = $_SESSION["COLLECTION"];
                    //name for recommendation
                    $showname = $_SESSION["NAME"];
                    $name = mysqli_fetch_array($name_result, MYSQLI_NUM);                    
                    $showname = $name[0];
                    echo $showname;
                    $_SESSION["NAME"] = $showname;
					while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
						$showrows = $showrows."<tr>";
						for ($i = 0;$i<= $total_fields - 1; $i++ ) {
                            $showrows = $showrows."<td>".$rows[$i]."</td>";
						}
						$showrows = $showrows."</tr>";
					}
					$_SESSION["COLLECTION"] = $showrows;
                    require_once("mymovie_close.inc");
				}
				
			?>
			<tr>
				<td width="70px"><div id="collection_table_title">收藏清單</div></td>
			</tr>
			<tr bgcolor="#ffe8e8">
				<th>電影ID</th>
				<th width="400px">電影中文名稱</th>
				<th>電影英文名稱</th>
				<th>種類</th>
				<th>時間</th>
				<th width="50px">價錢</th>
			</tr>
			<?php
				if(isset($_GET["movie_id"])){
					echo $showrows;
				}
			?>
    </div>
    
			<a href="test_session.php">Check Out</a>


	<style type="text/css">

	#collection_table_title{
		background: red;
		color: white;

	}

	.collection{
		width:1000px;
		/*div置中*/
		margin: 0 auto;
		/*背景顏色*/
		background-color: white;
	}

	#collection_table{
		margin-top: 30px
	}



	</style>

</body>
</html>

