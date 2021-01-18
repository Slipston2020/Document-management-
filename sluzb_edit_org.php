<?php
session_start();
header("Content-Type: text/html; charset=utf-8"); // Настройка кодировки
require "db.php";
if ($_SESSION['logged_user']['name'] == NULL){ // Проверка на то, залогинен ли пользователь
	header('Location: login.php'); // Переход на страницу авторизации
}


			$query = "SELECT * FROM `accounts` WHERE `id` ='{$statistics['id_account']}'";
			$account = mysqli_query($linki, $query) or die('2Запрос не удался: ' . mysql_error());
			$account = mysqli_fetch_array($account);

?>




<!DOCTYPE html>
<html lang="ru">

<head>
	
	<title>Ожидают редактирования</title>
  <style>
	<meta charset="UTF-8">
    <?php require "css/index.css";?>
   </style>
   <link rel="shortcut icon" href="images/log.ico" type="image/x-icon" />
   <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>



<header>
	<?php require "header.php";?>
</header>


 


<body>
<div class="fon">
			
						
						<?PHP
						    $query = "SELECT * FROM `stud_sovet` WHERE `status` ='2'";
							$statistics = mysqli_query($linki, $query) or die('1Запрос не удался: ' . mysql_error());
							while ($row = mysqli_fetch_array($statistics)){
								$_SESSION['logged_user']['id'] = $row['id'];
							?>
						<center>
						<h3><b>Заявка <?PHP echo $row['id'];?></b></h3>				
					
						 <table cellspacing="0">
					     <tr>
						 <td>Составлена:</td><td><?PHP echo $account['name'];?></td>
					     </tr>
						
						 <tr>
						 <td>Организация:</td><td><?PHP 
						    $query = "SELECT * FROM `org` WHERE `id` ='{$row['id_org']}'";
							$org = mysqli_query($linki, $query) or die('2Запрос не удался: ' . mysql_error());
							$org = mysqli_fetch_array($org);
						    echo $org['name'];?></td>
					     </tr>
						 <tr>
						 <td>Дата составления:</td><td><?PHP echo $row['date'];?></td>
					     </tr>
						 <tr>
						 <td>Дата рассмотрения:</td><td><?PHP echo $row['date_con'];?></td>
					     </tr>
						 <tr>
						 <td>Комментарий:</td><td><?PHP echo $row['comment'];?></td>
					     </tr>
						 <tr>
						 <td><form method="POST" action="upload/download.php"></table>
						 <button type="submit" class="button" name="download" value="<?PHP echo $row['om'] . ".docx" ?>"><i class="fa fa-download"></i>
							Скачать файл
						</button></form></td><td><table cellspacing="0">
						<form method="post" action="upload/load_edit.php" enctype="multipart/form-data">
<div class="example-1">
  <div class="form-group">
    <label class="label">
      <i class="material-icons">attach_file</i>
      <span class="title">Добавить файл</span>
      <input type="file" id="inputfile" name="inputfile">
    </label>
  </div>
</div><br>
<input type="submit" class="button" value="Отправить записку на пересмотрение"></form>
					     </tr>
						</table><br><br>
						<?PHP
						}
						
						?>
						
						
						 <br>
						 
</div>
</body>



</html>