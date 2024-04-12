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
<!-- menu -->
<nav class="navbar navbar-expand-lg" style="background-color: skyblue;">
  <div class="container">
  	<a class="navbar-brand" href="#">
	      <img src="https://cdn-icons-png.flaticon.com/128/1384/1384070.png" style="width:50px;" class="rounded-pill"> 
	   </a>
	  <a class="navbar-brand" href="#">Ryn</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#"> Home <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#"> <span class="glyphicon glyphicon-user"></span>Add</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Dropdown
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                  </div>
              </li>
          </ul>
          
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <div class="login_and_register" style="padding-left: 100px;">
            <a href="login/colorlib-regform-7/login.php" class="btn btn-primary">Đăng Nhập</a>
            <a href="login/colorlib-regform-7/signup.php" class="btn btn-primary" style="padding-left: 15px">Đăng Kí</a> 
          </div>	
      </div>
  </div>
</nav>
<!-- end menu -->
<!-- slide -->
<div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="5.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="4.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- end slide -->
<!-- list product -->
<div class="container">
	<div class="row mt-5">
		<h2 class="list-product-title">New product</h2>
		<div class="list-product-subtitle">
			<p>List product description</p>
		</div>
		<div class="product-group">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-12">
					<div class="card card-product mb-3">
					  <img class="card-img-top" src="https://allvpop.com/wp-content/uploads/2019/12/22.3_300x300.jpg" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title">Có Chàng Trai Viết Lên Cây</h5>
					    <p class="card-text">Nhạc.</p>

					    <audio controls controlsList="nodownload" style="width: 220px;" ontimeupdate="m(this)">
              	<source src="1.mp3" type="audio/mpeg">
              </audio>          
             	 <script type="text/javascript">
                                function m(event){
                                    if(event.currentTime>10){
                                        event.currentTime=0;
                                        event.pause();
                                        alert("Bạn phải trả phí để nghe cả bài")
                                    }
                                }
                            </script>
					    <a href="https://zingmp3.vn/tim-kiem/tat-ca?q=c%C3%B3%20ch%C3%A0ng%20trai%20vi%E1%BA%BFt%20l%C3%AAn%20c%C3%A2y" class="btn btn-primary">Nghe Pro</a>
					  </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-12">
					<div class="card card-product mb-3">
					  <img class="card-img-top" src="https://i.scdn.co/image/ab67616d0000b273933609272f65ab9d7b8024ee" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title">Sao Cha Không</h5>
					    <p class="card-text">Nhạc.</p>
					    <audio controls controlsList="nodownload" style="width: 220px;" ontimeupdate="m(this)">
              	<source src="2.mp3" type="audio/mpeg">
              </audio>          
             	<script type="text/javascript">
						     	function m(event)
                  {
                    if(event.currentTime>5)
                    {
                        event.currentTime=0;
                        event.pause();
                        alert("Bạn phải trả phí để nghe cả bài")
                    }
                  }
              </script>
					    <a href="#" class="btn btn-primary">Nghe Pro</a>
					  </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-12">
					<div class="card card-product mb-3">
					  <img class="card-img-top" src="https://photo-resize-zmp3.zmdcdn.me/w240_r1x1_jpeg/covers/9/2/9232c4c99c30f665e9326c8bbbcebc0e_1472690435.jpg" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title">Hãy Ra Khỏi Người Đó Đi</h5>
					    <p class="card-text">Nhạc.</p>
					    <audio controls controlsList="nodownload" style="width: 220px;" ontimeupdate="myAudio(this)">
              	<source src="Audio/lactroi.mp3" type="audio/mpeg">
              </audio>          
             	<script type="text/javascript">
						     	function myAudio(event)
                  {
                    if(event.currentTime>50)
                    {
                        event.currentTime=0;
                        event.pause();
                        alert("Bạn phải trả phí để nghe cả bài")
                    }
                  }
              </script>
					    <a href="#" class="btn btn-primary">Nghe Pro</a>
					  </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-12">
					<div class="card card-product mb-3">
					  <img class="card-img-top" src="https://avatar-ex-swe.nixcdn.com/song/2018/03/11/6/7/d/9/1520771354788_640.jpg" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title">Vợ Người Ta</h5>
					    <p class="card-text">Nhạc.</p>
					    <audio controls controlsList="nodownload" style="width: 220px;" ontimeupdate="myAudio(this)">
              	<source src="Audio/lactroi.mp3" type="audio/mpeg">
              </audio>          
             	<script type="text/javascript">
						     	function myAudio(event)
                  {
                    if(event.currentTime>50)
                    {
                        event.currentTime=0;
                        event.pause();
                        alert("Bạn phải trả phí để nghe cả bài")
                    }
                  }
              </script>
					    <a href="#" class="btn btn-primary">Nghe Pro</a>
					  </div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
<!-- end list product -->

<!-- Load jquery trước khi load bootstrap js -->
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>