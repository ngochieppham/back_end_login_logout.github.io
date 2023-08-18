<?php
	require'config.php';
?>

<?php
	$err=[];
	if(isset($_POST['add'])){
		$name = $_POST["name"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$rPassword = $_POST["rPassword"];
		
		if(empty($name)){
			$err['name'] = "chưa nhập tên";
		}
		if(empty(trim($email))){
			$err['email'] = "chưa nhập email";
		}else{
			if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
				$err['email'] = "email chưa hợp lệ";
			}
		}
		if(empty($password)){
			$err['password'] = "chưa nhập password";
		}
		if($password != $rPassword){
			$err['rPassword'] = "mật khẩu không đúng";
		}
		
		if (empty($err)){
			$pass = password_hash($password, PASSWORD_DEFAULT);
			$qr = "INSERT INTO login(id, name, email, password)
			VALUES (null,'$name','$email','$pass')";
			$login = mysqli_query($connect,$qr);
			if ($login){
				header("location: dangnhap.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng Ký</title>
      <style>
          form {
			  height: 550px;
			  width: 400px;
              color: white; 
			  background-color: black;
			  position: fixed;
			  top: 100px;
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
		  select {
			  margin: 10px 10px 10px 130px;
			  height: 30px;
			  width: 100px;
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
		  .error {
			  text-align: center;
			  color: red;
		  }
      </style>
</head>
<body>
<form action = "" method = "POST">
<p>Trang đăng ký</p>
	<label>Tên tài khoản</label>
	</br>
	<input type = "text" name = "name" >
	<div class  = "error">
		<span><?php echo (isset($err['name']))?$err['name']:''?></span>
	</div>
	</br>
	<label>Email</label>
	</br>
	<input type = "text" name = "email" >
	<div class  = "error">
		<span><?php echo (isset($err['email']))?$err['email']:''?></span>
	</div>
	</br>
	<label>Mật khẩu</label>
	</br>
	<input type = "password" name = "password" >
	</br>
	<div class  = "error">
		<span><?php echo (isset($err['password']))?$err['password']:''?></span>
	</div>
	<label>Nhập Lại Mật khẩu</label>
	</br>
	<input type = "password" name = "rPassword" >
	<div class  = "error">
		<span><?php echo (isset($err['rPassword']))?$err['rPassword']:''?></span>
	</div>
	</br>
	
	<button type = "submit" name = "add">Đăng Ký</button>
	<p>Quay lại trang đăng nhập!<a href = "dangnhap.php">Đăng Nhập</a><p>
</form>
</body>
</html>