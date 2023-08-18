<?php
	require'config.php';
	
	$user = (isset($_SESSION['login']) ?($_SESSION['login']): []);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Page</title>
      <style>
		.content {
			text-align: center;
		}
		a {
			text-decoration: none;
		}
      </style>
</head>
<body>
	<div class = "content">
		<h1>Xin Chào!Người dùng</h1>
		
		<?php if(isset($user['name'])){?>
			<h1><?php echo $user['name']; ?></h1>
			<br/>
			<a href = "dangxuat.php">Đăng Xuất</a>
		<?php }else{ ?>
			<a href = "dangnhap.php">Đăng Nhập</a><span>|</span>
			<a href = "dangky.php">Đăng Ký</a>
		<?php } ?>
	</div>
</body>
</html>