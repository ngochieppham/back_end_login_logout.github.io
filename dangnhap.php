<?php
	require'config.php';
?>

<?php
$err = [];
	if(isset($_POST['email'])){
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		$sql = "SELECT * FROM login WHERE email = '$email'" ;
		$qr = mysqli_query($connect, $sql);
		
		$data = mysqli_fetch_assoc($qr);
		$checkEmail = mysqli_num_rows($qr);
		if ($checkEmail == 1){
			
			$checkPass = password_verify($password, $data['password']);
			
			if ($checkPass){
				$_SESSION['login'] = $data;
				header('location: page_user.php');
			}else {
				$err['password'] = "mật khẩu không chính xác";
			}
		}else{
			$err['email'] = "email không chính xác";;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng Nhập</title>
      <style>
          form {
			  height: 350px;
			  width: 400px;
              color: white; 
			  background-color: black;
			  position: fixed;
			  top: 200px;
			  left: 500px;
			  border-radius: 5%;
          }
		  label {
			  margin: 20px;
			  bordor: 20px;
		  }
		  input {
			  width: 300px;
			  margin: 5px 0 5px 40px;
			  height: 30px;
			  font-size: 15px;
		  }
		  button {
			  margin: 10px 10px 10px 150px;
			  cursor:  pointer; 
		  }
		  p {
			  text-align: center;
		  }
		  a {
			  color: red;
			  text-decoration: none;
		  }
		  .err {
			  text-align: center;
			  color: red;
		  }
      </style>
</head>
<body>
<form action = "" method = "POST">
<p>Trang đăng nhập</p>
	<label>Email</label>
	</br>
	<input type = "text" name = "email" >
	<div class = "err">
		<span><?php echo (isset($err['email']) ? $err['email']:''); ?></span>
	</div>
	</br>
	<label>Mật khẩu</label>
	</br>
	<input type = "password" name = "password" >
	<div class = "err">
		<span><?php echo (isset($err['password']) ? $err['password']:''); ?></span>
	</div>
	</br>
	
	<button type = "submit">Đăng Nhập</button>
<p>Nếu bạn chưa có tài khoản?<a href = "dangky.php">Đăng Ký Tài Khoản</a><p>
</form>
</body>
</html>