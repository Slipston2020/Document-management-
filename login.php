<?php
session_start();
header("Content-Type: text/html; charset=utf-8"); // Настройка кодировки
require "db.php";
error_reporting(0);
	
	
	 $data = $_POST;
	 if( isset($data['do_login']) )
	 {
	
	
			$query = "SELECT * FROM `accounts` WHERE `login` ='{$data['login']}'";

			$user = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
			$user = mysqli_fetch_array($user);
			
			
			 
		 if ( $user )
		 {
			
			 
			 
			 if ($data['password'] == $user['password'] )
				
			 {
				 
				 $_SESSION['logged_user'] = $user;
				
	
				header('Location: index.php');
				exit();
			 } else 
				 {
				 $errors[] = 'Неверный логин или пароль';
				}
		 } 
		 
	  if( ! empty($errors))
		  {
			 echo '<div styles="color: red;">'.array_shift($errors).'</div>';
		 }
	 }
	


?>
<html lang="en">
<head>
	<title>Авторизация</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/log.ico" type="image/x-icon" />
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="login.php" method="POST">
					<span class="login100-form-logo">
						<p><img src="images/log.png"></p>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Авторизация
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="login" placeholder="Логин">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password"  placeholder="Пароль">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					

					
				

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit" name="do_login">
							Войти
						</button>
					</div>

				
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>