<?php 
 require_once('db_connect.php');
 require_once('dateAgo.php');
?>

<!DOCTYPE html>
<html class="third">
<head>
	<title>Recipe App</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="reset.css">
</head>
<body>
	<div id="header">
		<div id="menu">
			<div id="browse">
				<h2 >Browse</h2>
			</div>
			<div id="trending">
				<h2 >Trending</h2>
			</div>
			<div id="saved">
				<h2 >Saved</h2>
			</div>
			<div class="clear"></div>
		</div>
		<div id="menu-lines" class="container" onclick="myfunction(this)">
				<div class="bar1"></div>
				<div class="bar2"></div>
		</div>
		
	</div>
	<div class="maincontainer02">

		<?php require_once("db_connect.php");
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			db();
			global $link;
			$query = "SELECT recipeName, foodPic, fullDescription, date FROM uploadRecipe WHERE id = '$id'";
			$result = mysqli_query($link, $query);
			if(mysqli_num_rows($result) ==1){
				$row = mysqli_fetch_array($result);
				if($row){
					$title = $row['recipeName'];
					$description = $row['fullDescription'];
					$date = time_elapsed_string($row['date']);
					$imageURL = 'uploads/'.$row["foodPic"];
				?>
			<div class="">
				<div class="">
					<h1 id="foods" class="food-name"><?php echo $title ?></h1>
					<h4 id="cooking-time"><?php echo "$date" ?> </h4>
				</div>
			</div>
	</div>
			<div class="">
				<img id="main-image" src="<?php echo $imageURL ?>">
			</div>
	<div class="maincontainer03">
			<div id="howTo">
				<p id="recipe">
				<?php echo $description ?>
				</p>
			</div>

			<?php
			}
			}
			else{
				echo 'no detail';
			}
		}
		 ?>
			<div id="center">
				<a href="index.php"><button id="button02" type="button">Go back</button></a>
			</div>
	</div>
		
	
</body>
</html>