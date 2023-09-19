<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <title>get-data</title>
</head>
<body>
   <div>
      <?php 

      // include 'index.php';
      include 'dbconn.php';
 
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
        $name = $_POST["name"];
     
        $email = $_POST["email"];
    
        $number = $_POST["number"];
     
      	//image upload
	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "uploads/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

      $query = "INSERT INTO users (name, email, number, image) VALUES ('$name', '$email', '$number', '$image')";
      mysqli_query($conn, $query);
     }

     $limit = 3;
     if(isset($_GET['page'])){
        $page = $_GET['page'];

     }else{
      $page = 1;
     }
     $offset = ($page - 1) * $limit;

      $sql = "SELECT * FROM users LIMIT {$offset},{$limit}";
      $result = mysqli_query($conn, $sql);

      // mysqli_close($conn);
      ?>
         <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #152C55 ;">
        <a class="navbar-brand" href="#">PHP-CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="about.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Add</a>
            </li> 
          </ul>

          <form class="form-inline my-2 my-lg-0">
                       
           
            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-lock" ></i> Login</button>
          </form>
        </div>
      </nav>
      <br>
      <!-- hero section  -->

      <?php if(mysqli_num_rows($result) > 0){ ?>
         <table class="table">
            <thead class="thead-dark">
               <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Number</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php while($row = mysqli_fetch_assoc($result)){ 
                
                  ?>
                  <tr>
                     <td><?php echo $row['ID']; ?></td>
                     <td><img src="uploads/<?php echo $row['image']; ?>" alt="photo" width="90px" height="90px" style='border-radius: 5px'></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['email']; ?></td>
                     <td><?php echo $row['number']; ?></td>
                     <td>
					   	<a href="update.php?id=<?php echo $row['ID']; ?>" class="btn btn-success">Update</a>
						   <a href="delete.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a>
					    </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      <?php 
      } 
      
      $sql1 = "SELECT * FROM users";
      $result1 = mysqli_query($conn, $sql1);

      if(mysqli_num_rows($result1) > 0){

         $total_records = mysqli_num_rows($result1);
       
         $total_page = ceil($total_records / $limit);
         
         echo '<ul class="pagination justify-content-center pagination-lg hover">';
         if($page > 1){
            echo '<li class="page-item"><a class="page-link" href="about.php?page='.($page - 1).'">Prev</a></li>';

         }
         for($i = 1; $i <= $total_page; $i++){
            if($i == $page){
               $active = "active";
            }else{
               $active = "";

            }
            echo ' <li class="page-item '. $active.'"><a class="page-link" href="about.php?page='.$i.'">'.$i.'</a></li>';
         
         }
         if($total_page > $page){
         echo '<li class="page-item"><a class="page-link" href="about.php?page='.($page + 1).'">Next</a></li>';
         }
         echo '</ul>';
      }
      ?>
    
   </div>


</body>
</html>

