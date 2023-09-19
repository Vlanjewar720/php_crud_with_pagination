<?php
    include 'dbconn.php';
            // Check if the 'id' parameter is provided in the URL
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
       
        $delete = "DELETE FROM users WHERE id = $id";
        $deletequery = mysqli_query($conn, $delete);
 
        if($deletequery) {
          echo ' deleted';
            header("Location: about.php");
           // exit(); 
        } else {
            echo 'Not deleted';
        }
    } else {
        echo 'ID parameter not provided';
    }
      mysqli_close($conn);
?>


