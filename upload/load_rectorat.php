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
$id = rand(0, 100000);
$date = date("Y-m-d H:i:s");
$query = "INSERT INTO `stud_sovet` (`id`, `om`, `id_account`, `id_org`, `status`, `date`) VALUES ('{$id}', '{$name}', '{$_SESSION['logged_user']['id']}', '0', '5','{$date}')";
$user = mysqli_query($linki, $query) or die('1Запрос не удался: ' . mysql_error()); // Добавлени записи в таблицу 

header('Location: ../index.php'); 
}

?>

