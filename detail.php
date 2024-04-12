<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'website_music');
if (!$connect) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Kiểm tra nếu tồn tại biến POST buy
if(isset($_POST['buy'])) {
    // Lấy giá trị của song_id từ form
    $song_id = $_POST['song_id'];

    // Lấy user_id từ session
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Kiểm tra nếu user_id không tồn tại trong session
    if (!$user_id) {
        echo "Vui lòng đăng nhập trước khi mua hàng!";
        exit; // Kết thúc script nếu không có user_id
    }

    // Thực hiện truy vấn để thêm dữ liệu vào bảng Cart
    $sql_insert = "INSERT INTO Cart (user_id, song_id, dateAdded) VALUES ('$user_id', '$song_id', NOW())";
    $result_insert = mysqli_query($connect, $sql_insert);

    // Kiểm tra và hiển thị thông báo sau khi thêm dữ liệu
    if ($result_insert) {
        echo "Thêm vào giỏ hàng thành công!";
    } else {
        echo "Thêm vào giỏ hàng thất bại: " . mysqli_error($connect);
    }
}

// Truy vấn dữ liệu từ cơ sở dữ liệu nếu tồn tại biến GET id
if(isset($_GET['id'])) {
    $id = $_GET['id'];
  
    // Truy vấn dữ liệu từ cơ sở dữ liệu
    $sql = "SELECT * FROM song WHERE song_id = $id";
    $result = mysqli_query($connect, $sql);

    // Kiểm tra xem truy vấn có thành công không
    if(!$result) {
        echo "Lỗi truy vấn: " . mysqli_error($connect);
        exit; // Kết thúc script nếu có lỗi truy vấn
    }

    // Kiểm tra xem có bản ghi trả về không
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Không tìm thấy sản phẩm!";
        exit; // Kết thúc script nếu không tìm thấy sản phẩm
    }
} else {
    echo "Không tìm thấy sản phẩm!";
    exit; // Kết thúc script nếu không tồn tại biến GET id
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add to Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style type="text/css">
        .images-detail img {
            margin-top: 5%;
            width: 100%;
            align-items: center;
            border-radius: 100%;
            margin-bottom: 30px;
            animation: app-logo-spin infinite 20s linear;
        }
        @keyframes app-logo-spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
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
                <ul class="navbar-nav my-lg-0">
                    <!-- ============================================================== -->
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <?php if(isset($_SESSION["username"])): ?>
                        <h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
                        <a href="login/colorlib-regform-7/logout.php">Logout</a>
                    <?php else: ?>
                        <li class="nav-item dropdown u-pro">
                            <!-- <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/users/1.jpg" alt="user" class="" /> 
                                <span class="hidden-md-down">Batct &nbsp;</span>
                            </a> -->
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
</nav>
<br>
<br>
<br>
<br>
<!-- list product -->
<div class="container">
    <div class="row">
        <div class="col-md-6" style="text-align: left;">
            <?php if (isset($row) && mysqli_num_rows($result) > 0): ?>
                <h2> Name of Music: <?php echo $row['song_name'];?> </h2>
                <p>Price: <?php echo $row['song_price'];?> </p>
                <audio controls controlsList="nodownload" ontimeupdate="MyAudio(this)" style="width: 250px;">
                    <source src="audio/<?php echo $row['song_audio'];?>" type="audio/mpeg">
                </audio>
                <script type="text/javascript">
                    function MyAudio(event){
                        if(event.currentTime > 30){
                            event.currentTime = 0;
                            event.pause();
                            alert("Bạn phải trả phí để nghe cả bài")
                        }
                    }
                </script>
                <h5> Singer:<?php echo $row["singer_name"] ;?></h5>
                <h4> Genre:<?php echo $row["genre_name"]; ?></h4>
                <textarea cols="40" rows="10" disabled><?php echo $row["song_lyric"];?></textarea>
                <br>
                <form method="post" action="addtocart.php">
                    <input type="hidden" name="song_id" value="<?php echo $id ;?>">
                    <button type="submit" name="buy" class='btn btn-primary'><i class="fas fa-cart-plus"></i> Add to cart</button>
                </form>
                
                <a href="index.php"><button type="submit" name="back" class='btn btn-primary'><i class="fas fa-cart-plus"></i> Back </button></a>        
            <?php else: ?>
                <p>Không tìm thấy sản phẩm!</p>
            <?php endif; ?>
        </div>  
        <!-- Ảnh sản phẩm -->
        <div class="images-detail">
            <div class="col-md-6">
                <img src="image/<?php echo $row['song_image'] ?>" style="width: 500px; height: 500px;">
            </div>
        </div>
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
