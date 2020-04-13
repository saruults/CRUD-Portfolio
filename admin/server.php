<?php require_once('../config.php') ?>
<?php 
	global $db;
	$title = "";
	$slug = "";
	$tags = "";
	$id = 0;
	$update = false;
	if (isset($_POST['save'])) {
		$title = $_POST['title'];
		$slug = $_POST['slug'];
		$tags = $_POST['tags'];
		$image = $_FILES['image']['name'];
		// image file directory
		$target = "../images/".basename($image);
		mysqli_query($db, "INSERT INTO projects (title, slug, tags, img) VALUES ('$title','$slug', '$tags', '$image')"); 
		$_SESSION['message'] = "Project saved"; 
		header('location: index.php');
		//img
  
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
		
	}
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$slug = $_POST['slug'];
		$tags = $_POST['tags'];
		$image = $_FILES['image']['name'];
		mysqli_query($db, "UPDATE projects SET title='$title',slug='$slug',tags='$tags',img='$image' WHERE id=$id");
		$_SESSION['message'] = "Project updated!"; 
		header('location: index.php');
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
	}
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM projects WHERE id=$id");
		$_SESSION['message'] = "Project deleted!"; 
		header('location: index.php');
	}
	if (isset($_POST['upload'])) {
		// // Get image name
		// $image = $_FILES['image']['name'];
		// // image file directory
		// $target = "../images/".basename($image);
  
		// $sql = "INSERT INTO projects (img) VALUES ('$image')";
		// // execute query
		// mysqli_query($db, $sql);
  
		// if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		// 	$msg = "Image uploaded successfully";
		// }else{
		// 	$msg = "Failed to upload image";
		// }
	}
	$result = mysqli_query($db, "SELECT * FROM images");
	?>