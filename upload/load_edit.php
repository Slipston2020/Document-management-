<?php
session_start();
header("Content-Type: text/html; charset=utf-8"); // Настройка кодировки
require "../db.php";
if ($_SESSION['logged_user']['name'] == NULL){ // Проверка на то, залогинен ли пользователь
	header('Location: login.php'); // Переход на страницу авторизации
}

$name = hash('ripemd160', $_FILES['inputfile']['name']);
if(isset($_FILES) && $_FILES['inputfile']['error'] == 0){ // Проверяем, загрузил ли пользователь файл
$destiation_dir = dirname(__FILE__) .'/'.$name.".doc"; // Директория для размещения файла
move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation_dir ); // Перемещаем файл в желаемую директорию
$query = "UPDATE `stud_sovet` SET `status` = '0' WHERE `id` = '{$_SESSION['logged_user']['id']}'";
$user = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error()); 
header('Location: ../index.php'); 
}

?>

