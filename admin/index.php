<?php require_once('../config.php') ?>
<?php include('server.php'); 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM projects WHERE id=$id");
		if (count(array($record)) == 1) {
			$n = mysqli_fetch_array($record);
			$title = $n['title'];
			$slug = $n['slug'];
			$tags = $n['tags'];
			$image = $n['img'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css?ver=<?php echo rand(111,999)?>">

</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM projects"); ?>
<div class="container">
<form method="post" action="server.php" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="title" value="<?php echo $title; ?>">
		</div>
		<div class="input-group">
			<label>Slug</label>
			<input type="text" name="slug" value="<?php echo $slug; ?>">
		</div>
		<div class="input-group">
			<label>Tags</label>
			<input type="text" name="tags" value="<?php echo $tags; ?>">
		</div>
		<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image" >
  	</div>
  	<div>
  	</div>
		<div class="input-group">
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
	</form>
<table>
	<thead>
		<tr>
			<th>Title</th>
			<th>Slug</th>
			<th>Tags</th>
			<th>Image</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['slug']; ?></td>
			<td><?php echo $row['tags']; ?></td>
			<td><?php echo $row['img']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
</div >
</body>
</html>