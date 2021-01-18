<?php
session_start();
header("Content-Type: text/html; charset=utf-8"); // Настройка кодировки
require "db.php";
if ($_SESSION['logged_user']['name'] == NULL){ // Проверка на то, залогинен ли пользователь
	header('Location: login.php'); // Переход на страницу авторизации
}
  

?>
<!DOCTYPE html>
<html lang="ru">

<head>
	
	<title>Документооборот</title>
  <style>
	<meta charset="UTF-8">

    <?php require "css/index.css";?>
   </style>
   <link rel="shortcut icon" href="images/log.ico" type="image/x-icon" />
</head>



<header>
	<?php require "header.php";?>
</header>


 


<body>
<div class="fon">
<center>
<?php
	if ($_SESSION['logged_user']['access'] == 0){
		$query = "SELECT COUNT(status) FROM `stud_sovet` WHERE `status` = '0'";
		$count = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
		$count = mysqli_fetch_row($count);
		echo "<a href='office.php'>Новые заявки";
		if ($count[0] != 0){
			echo "(". $count[0] .")";
		}
		$query = "SELECT COUNT(status) FROM `stud_sovet` WHERE `status` = '1'";
		$count = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
		$count = mysqli_fetch_row($count);
		echo "</a><br>";
		echo "<a href='sluzb_approve.php'>Одобренные заявки";
		if ($count[0] != 0){
			echo "(". $count[0] .")";
		}
		$query = "SELECT COUNT(status) FROM `stud_sovet` WHERE `status` = '3'";
		$count = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
		$count = mysqli_fetch_row($count);
		echo "</a><br>";
		echo "<a href='sluzb_reject.php'>Отклоненные заявки";
		if ($count[0] != 0){
			echo "(". $count[0] .")";
		}
		$query = "SELECT COUNT(status) FROM `stud_sovet` WHERE `status` = '2'";
		$count = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
		$count = mysqli_fetch_row($count);
		echo "</a><br>";
		echo "<a href='sluzb_edit.php'>Ожидает редактирования";
		if ($count[0] != 0){
			echo "(". $count[0] .")";
		}
		echo "</a><br><a href='sluzb_rectorat.php'>Отправить служебную записку</a><br>";
				
	}
	else{
		echo "
				<a href='sluzb.php'>Отправить служебную записку</a><br>
				<a href='sluzb_org.php'>Служебные записки моей организации</a><br>
				<a href='sluzb_org_ras.php'>На рассмотрении</a><br>
				<a href='sluzb_approve.php'>Одобренные</a><br>
				<a href='sluzb_reject.php'>Отказанные</a><br>";
		$query = "SELECT COUNT(status) FROM `stud_sovet` WHERE `status` = '2'";
		$count = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
		$count = mysqli_fetch_row($count);
		echo "</a>";
		echo "<a href='sluzb_edit_org.php'>Ожидает редактирования";
		if ($count[0] != 0){
			echo "(". $count[0] .")";
		}
		$query = "SELECT COUNT(status) FROM `stud_sovet` WHERE `status` = '5'";
		$count = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
		$count = mysqli_fetch_row($count);
		echo "</a><br>";	
		echo "<a href='sluzb_org_new.php'>Новые заявки";
		if ($count[0] != 0){
			echo "(". $count[0] .")";
		}
		echo "</a><br>";
	}
?>
</center>
</div>
</body>



</html>