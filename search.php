<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <?php 
        $connect = mysqli_connect('localhost','root','','website_music');
        if(!$connect)
        {
          echo "Kết nối thất bại";
        }
        $sql="SELECT * FROM song"; 
    ?>
<!-- menu -->
<nav class="navbar navbar-expand-lg" style="background-color: skyblue;">
  <div class="container">
  	<a class="navbar-brand" href="index.php">
	      <img src="https://cdn-icons-png.flaticon.com/128/1384/1384070.png" style="width:50px;" class="rounded-pill"> 
	   </a>
	  <a class="navbar-brand" href="index.php">HOAITHUBEAT</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php"> Home <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="add_product.php"> <span class="glyphicon glyphicon-user"></span>Add</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Manager
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="product-admin-master/products1.php">Manager</a>
                      <!-- <a class="dropdown-item" href="#">Delete</a>
                      <a class="dropdown-item" href="#">Something else here</a> -->
                  </div>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">            
                <input class="form-control mr-sm-2" type="search" placeholder="Search for song" aria-label="Search" name="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
          </form>
          <div class="login_and_register" style="padding-left: 100px;">
            <?php
          if (!isset($_SESSION['username'])) {
            echo "<div><a href='login/colorlib-regform-7/login.php' class='btn btn-primary'>Đăng Nhập</a>
                <a href='login/colorlib-regform-7/signup.php' class='btn btn-primary' style='padding-left: 15px'>Đăng Kí</a></div>";
          } else {
            $username = $_SESSION['username'];
            $result = mysqli_fetch_array(mysqli_query($connect, $sql));
            echo "<div class='dropdown show'>
            <a class='btn btn-outline-dark dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              <span class=user-name>" . $_SESSION['username'] . "</span>
            </a>

            <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
              <a class='dropdown-item' href='user.php'>Account</a>
              <a class='dropdown-item' href='cart.php'>Cart</a>";
            // how do I make this more secure??? it is pretty shit I rely entirely on session for the authentication
            echo "<div class='dropdown-divider'></div>
              <a class='dropdown-item' href='login/colorlib-regform-7/logout.php'>Logout</a>
            </div>
          </div>";
          }
          ?>
          </div>	
      </div>
  </div>
</nav>
<br>
<br>
<br>
<!-- list product -->
    <?php
  $conn = mysqli_connect('localhost','root','','website_music');
    if(!$conn)
    {
      echo "Kết nối thất bại";
    }
  
  $search = "";
  
    $search = $_GET['Search'];
  
  ?>
  <h3 class="title" style="margin-left: 150px">Search Results for: <?= $search ?></h3>
  <div class="container" style="margin-top: 20px">
    <div class="row">
      <?php
      if( !empty($search))
      {
        $rs = mysqli_query($conn, "SELECT * FROM song WHERE song.song_name LIke '%{$search}%' ");
        while($row = mysqli_fetch_assoc($rs)) {
          ?>
          <div class="card" style="background-color: white;margin-top: 20px; margin-left: 35px;overflow: auto; width: 270px; border: 2px solid skyblue;border-radius: 1px; border-bottom: 6px solid #FCA5A5; float: left;">
            <a href="detail.php?id=<?php echo $row['song_id']?>" style=" text-decoration: none; text-align: center;"> 
              <div style="height:80px">
                <h2><?php echo $row['song_name'] ?></h2>
              </div>
              <div><img src="image/<?php echo $row['song_image']?>" style="width: 247px;height: 200px;padding: 7px"></div>
              <p style="color: red"><?php echo $row['song_describe']." "; ?></p>
              <h4 style="color: #3BA33D"><?php echo $row['singer_name'] ?></h4> 
              <h5>Genre: <?php echo $row['genre_name'] ?></h5>
              <h7>Price: <?php echo $row['song_price'] ?></h7> 
              </a>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
<!-- end list product -->
  <br>
  <br>
<!-- Load jquery trước khi load bootstrap js -->
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>