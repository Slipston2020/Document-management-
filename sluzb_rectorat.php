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
	
	<title>Оформление служебной записки</title>
  <style>
	<meta charset="UTF-8">
    <?php require "css/index.css";?>
   </style>
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="shortcut icon" href="images/log.ico" type="image/x-icon" />
</head>



<header>
	<?php require "header.php";?>
</header>


 
</div>

<body>
<center>
<div class="fon">

<form method="post" action="upload/load.php" enctype="multipart/form-data">
<select id="org">
<option value="StudSovet">СтудСовет</option>
<option value="RSM">РСМ</option>
<option value="Rectorat">Ректорат</option>
<option value="StudClub">СтудКлуб</option>
</select>


<div class="example-1">
  <div class="form-group">
    <label class="label">
      <i class="material-icons">attach_file</i>
      <span class="title">Добавить файл</span>
      <input type="file" id="inputfile" name="inputfile">
    </label>
  </div>
</div>
<input type="submit" class="button" value="Отправить записку организации">

 

</form>
</div>

</center>
<script></script>
</body>



</html>

