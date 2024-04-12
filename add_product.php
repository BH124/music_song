
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="cssAddproduct.css">
</head>
<body>
	<form method="POST" enctype="multipart/form-data" >
		<div class="login-box">
		  <h2>Song</h2>
		  <form>
		    <div class="user-box">
		      <input type="text" name="song_id" required="">
		      <label>ID</label>
		    </div>
		    <div class="user-box">
		      <input type="text" name="song_name" required="">
		      <label>Name</label>
		    </div>
		    <div class="user-box">
		      <input type="text" name="song_Describe" required="">
		      <label>Describe</label>
		    </div>
		    <div class="user-box">
		      <input type="text" name="song_price" required="">
		      <label>Price</label>
		    </div>
		    <div class="user-box">
		      <input type="text" name="singer_name" required="">
		      <label>Singer Name</label>
		    </div>
		    <div class="user-box">
		      <input type="text" name="genre_name" required="">
		      <label>Genre Name</label>
		    </div>
		    <div class="user-box">
		      <input type="text" name="song_lyric" required="">
		      <label>lyric</label>
		    </div>
		    <div class="">
		      <input type="file" name="song_image" required="" style="color: white;">
		      <label style="color: white;">Image</label>
		    </div>
		    <br>
		    <div class="">
		      <input type="file" name="song_audio" required="" style="color: white;">
		      <label style="color: white;"> Audio </label>
		    </div>
		    <br>
		    <a href="#">
		      <span></span>
		      <span></span>
		      <span></span>
		      <span></span>
		      <input type="submit" name="add_product" value="Add">
		    </a>
		  </form>
		</div>
	</form>
</body>
</html>

<?php
			$connect = mysqli_connect('localhost','root','','website_music');
			if (isset($_POST['add_product'])) {
			$song_id =$_POST['song_id'];
			$song_name =$_POST['song_name'];
			$song_Describe =$_POST['song_Describe'];
			$song_price =$_POST['song_price'];
			$singer_name =$_POST['singer_name'];
			$genre_name =$_POST['genre_name'];
			$song_lyric =$_POST['song_lyric'];
			//lấy ảnh từ thư mục bất kỳ của máy tính
			$song_image =$_FILES['song_image']['name'];
			//di chuyển ảnh từ thư mục bất kỳ sang thư mục tmp_name của htdocs
			$song_image_tmp =$_FILES['song_image']['tmp_name'];
			//đưa ảnh từ thư mục tmp sang thư mục cần lưu
			move_uploaded_file($song_image_tmp, "image/$song_image");
			//lấy audio từ thư mục bất kỳ của máy tính
			$song_audio =$_FILES['song_audio']['name'];
			//di chuyển audio từ thư mục bất kỳ sang thư mục tmp_name của htdocs
			$song_audio_tmp =$_FILES['song_audio']['tmp_name'];
			//đưa audio từ thư mục tmp sang thư mục cần lưu
			move_uploaded_file($song_audio_tmp, "audio/$song_audio");
			//thêm sản phẩm vào cơ sở dữ liệu
			$sql = "INSERT INTO song VALUES('$song_id','$song_name','$song_Describe','$song_price','$singer_name','$genre_name','$song_lyric','$song_image','$song_audio')";
			$result = mysqli_query($connect, $sql);
			if($result){
				echo "<script>alert('Thêm bài hát thành công') </script>";
				echo "<script> window.location.href = 'index.php' </script>";
				}
			else{
				echo "<script>alert('Add new error') </script";
			}

			}
		?>	


