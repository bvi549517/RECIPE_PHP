<?php 
 require_once('db_connect.php');
 require_once('dateAgo.php');
?>

<!DOCTYPE html>
<html class="second">
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
				<h2>Browse</h2>
			</div>
			<div id="trending">
				<h2 >Trending</h2>
			</div>
			<div id="saved">
				<h2 >Saved</h2>
			</div>
			<div class="clear"></div>
		</div>
		<div id="menu-lines" class="container">
				<div class="bar1"></div>
				<div class="bar2"></div>
		</div>
	</div>
	<div class="maincontainer">
	<?php 
	db();
	global $link;
	$query = "SELECT id, recipeName, shortDescription, date, foodPic FROM uploadRecipe";
	$result = mysqli_query($link, $query);
	//check if there's any data inside the table
	if(mysqli_num_rows($result) >= 1){
		while($row = mysqli_fetch_array($result)){
			$id = $row['id'];
			$title = $row['recipeName'];
			$date = time_elapsed_string($row['date']);
			$detail = $row['shortDescription'];
			$imageURL = 'uploads/'.$row["foodPic"];
	?>
	
		<div class="containers">
			<div class="container-left">
				<a href="detail.php?id=<?php echo $id ?>"><img class="exImg" src="<?php echo $imageURL; ?>"></a>
			</div>
			<div class="container-right">
				<div class="name-size">
					<a id="food-link" href="detail.php?id=<?php echo $id ?>"><h3 class="food-name"><?php echo $title ?></h3></a>
				</div>
				<div class="description-width">
					<p class="description"><?php echo $detail ?></p>
				</div>
				<div class="minicontainer">
					<div class="updateDate">
						<p class="date"><?php echo $date ?></p>
					</div>
					<div class="fav">
						<img id="heart" src="images/heart.png">
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>

<?php 
}}
?>


		
	</div>
		<div id="footer">
			<div id="add">
				<a href="create.php"><img src="images/add.png"></a>
			</div>
		</div>
		
	
</body>
</html>