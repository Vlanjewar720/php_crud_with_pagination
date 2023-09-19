<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-sql</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body align="center">

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #152C55 ;">
        <a class="navbar-brand" href="about.php">PHP-CRUD</a>
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
      <div class="container">
  <div class="row">
    <div class="col-sm border border-black p-3 shadow-3">
        <h1 class="text-center">REGISTER</h1>

      <form method="post" action="about.php" enctype="multipart/form-data" class="w-50 mx-auto">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name" required>
           
          </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="email" required>
          
          </div>
   
        <div class="form-group">
            <label class="" for="">Mobile</label>
            <input type="text" name="number" class="form-control" id="exampleCheck1" placeholder="number" required>
           
          </div>
        <div class="form-group">
            <label for="">Photo</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" value="Submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
  </div>
</div>

</body>
</html>