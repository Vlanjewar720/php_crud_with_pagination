<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>update-php</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	
	color: rgb(156,131,33);
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
   
}
	
</style>

</head>
<body>
<?php
include 'dbconn.php';
$id = $_GET['id'];
//Fetching privious image to update
if(isset($_GET['id'])){
    $id = $_GET['id'];

$update = "SELECT * FROM users WHERE id = $id";
$updatequery = mysqli_query($conn, $update);
// $result = mysqli_fetch_assoc($updatequery);

if(mysqli_num_rows($updatequery) > 0){
        
	$result = mysqli_fetch_array($updatequery);
	$e_image = $result['image'];
}
else{
	// header('location: index.php');
	echo "Error not find Image";
  }
}
else{
    // header("location: index.php");
    echo "Error undefined Id";
}

if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['number']);
    // $image = mysqli_real_escape_string($conn, $_POST['image']);
	//image upload
	$msg = "";
	$image = $_FILES['image']['name'];
	if(empty($image)){
	    $image = $e_image;
	}
	$target = "uploads/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

      $insertquery =  "UPDATE users SET name ='$name', email ='$email',number='$phone', image='$image' WHERE id = $id";
        $mysqliquery = mysqli_query($conn, $insertquery);
    if($insertquery){
		header("Location: about.php");
        ?>

<?php 

    }else{
        echo 'Not Updated';
    }

}

?>

			<form method="POST" action="" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title text-center">UPDATE-USER </h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="<?php echo $result['name']; ?>" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $result['email']; ?>" required>
					</div>
					
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="number" class="form-control" value="<?php echo $result['number']; ?>" required>
					</div>	
					<div class="form-group">
						<label>Photo</label>
						
						<input type="file" name="image" class="form-control" required>
						<img src="uploads/<?php echo $result['image']; ?>" alt="photo" width="50px" height="50px" style='border-radius: 5px'>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" href="about.php" value="Cancel">
					<input type="submit" name="submit" class="btn btn-info" value="Save">
				</div>
			</form>
	


</body>
</html>