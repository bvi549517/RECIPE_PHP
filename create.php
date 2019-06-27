<?php 
 require_once('db_connect.php');
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
		<div id="menu-lines" class="container">
				<div class="bar1"></div>
				<div class="bar2"></div>
		</div>
		
	</div>
	<div class="maincontainer02">
		<!-- Create New Recipe -->
		<form id="form-items" method="post" action="create.php" enctype="multipart/form-data">
			<br>
			<h1 class="item">Food Name</h1>
			<input type="text" name="recipeName">
			<p class="item">Food Image</p>
			<input type="file" name="foodPic"><br>
			<p class="item">Introduction</p>
			<textarea name="shortDescription"></textarea>
			<p class="item">How to cook</p>
			<textarea name="fullDescription"></textarea>
			<br>
			<div id="upload">
				<input id="button02" type="submit" name="submit" value="Upload">
			</div>



		<?php 
		$statusMsg = '';
		// File upload path
		$targetDir = "uploads/";
		//var_dump($_FILES["file"]);
		if(isset($_POST['submit']) && !empty($_FILES["foodPic"]["name"] )){
		$fileName = basename($_FILES["foodPic"]["name"]);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			$allowTypes = array('jpg','png','jpeg', 'gif','pdf');
			$title = $_POST['recipeName'];
			// $getImage = $_POST['foodPic'];
			$introduction = $_POST['shortDescription'];
			$procedure = $_POST['fullDescription'];
			db();
			global $link;
			if(in_array($fileType, $allowTypes)){
		// Upload file to server
		if(move_uploaded_file($_FILES["foodPic"]["tmp_name"], $targetFilePath)){
			$query = "INSERT INTO uploadRecipe(recipeName, foodPic, shortDescription, fullDescription, date ) VALUES ('$title', '".$fileName."', '$introduction', '$procedure', now() )";
			$insertRecipe = mysqli_query($link, $query);
			if($insertRecipe){
				echo '<br><h1 id="success">Successfully</h1>';
			} }else{
				echo mysqli_error($link);
			}
			mysqli_close($link);
		}}
		?>
			<div id="center">
				<a href="index.php"><button id="button03" type="button">Go back</button></a>
			</div>
			<br>
		</form>

	

	</div>
		
	
</body>
</html>