<?php
session_start();

// Establish database connection
$connect = mysqli_connect('localhost', 'root', '', 'website_music');
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve cart items
$sql_cart_items = "SELECT * FROM cart";
$result_cart_items = mysqli_query($connect, $sql_cart_items);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
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
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="product-admin-master/products.php">Manager</a>
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
            <ul class="navbar-nav my-lg-0">
                <?php if(isset($_SESSION["username"])): ?>
                    <!-- Hiển thị chào mừng và liên kết logout nếu người dùng đã đăng nhập -->
                    <h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
                    <a href="login/colorlib-regform-7/logout.php">Logout</a>
                <?php else: ?>
                    <!-- Hiển thị liên kết đăng nhập và đăng ký nếu người dùng chưa đăng nhập -->
                    <li class="nav-item dropdown u-pro">
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="signin_page.php">Sign In</a></li>
                            <li><a class="dropdown-item" href="signup_page.php#">Sign Up</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

          </div>	
      </div>
  </div>
</nav>
<div class="container">
    <h2>Your Cart</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Song Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Singer</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are cart items
            if ($result_cart_items && mysqli_num_rows($result_cart_items) > 0) {
                // Loop through cart items and display song details
                while ($row = mysqli_fetch_assoc($result_cart_items)) {
                    // Retrieve song details using song_id from cart
                    $song_id = $row['song_id'];
                    $sql_song_details = "SELECT * FROM Song WHERE song_id = '$song_id'";
                    $result_song_details = mysqli_query($connect, $sql_song_details);

                    if ($result_song_details && mysqli_num_rows($result_song_details) > 0) {
                        $song = mysqli_fetch_assoc($result_song_details);
                        // Display song details
                        echo "<tr>";
                        echo "<td>{$song['song_name']}</td>";
                        echo "<td>{$song['song_describe']}</td>";
                        echo "<td>{$song['song_price']}</td>";
                        echo "<td>{$song['singer_name']}</td>";
                        echo "<td>{$song['genre_name']}</td>";
                        echo "<td><a href='#'>Remove</a></td>"; // Add link to remove item from cart
                        echo "</tr>";
                    } else {
                        echo "<tr><td colspan='6'>Error: Song not found</td></tr>"; // Handle case where song is not found
                    }
                }
            } else {
                echo "<tr><td colspan='6'>Your cart is empty</td></tr>"; // Display message when cart is empty
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php mysqli_close($connect); ?>
