<?php
session_start();
header("Content-Type: text/html; charset=utf-8"); // Настройка кодировки
require "db.php";
if ($_SESSION['logged_user']['access'] != 0){ // Проверка на то, залогинен ли пользователь
	header('Location: login.php'); // Переход на страницу авторизации
}

  $data = $_POST;
	 if( isset($data['approve']) )
	 {
		$query = "UPDATE `stud_sovet` SET `status` = '1' WHERE `id` = '{$data['approve']}'";
		$user = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
		$date = date("Y-m-d H:i:s");
		$query = "UPDATE `stud_sovet` SET `date_con` = '{$date}' WHERE `id` = '{$data['approve']}'";
		$user = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
	 }
	  if( isset($data['reject']) )
	 {
		$query = "UPDATE `stud_sovet` SET `status` = '3' WHERE `id` = '{$data['reject']}'";
		$user = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error()); 
		$date = date("Y-m-d H:i:s");
		$query = "UPDATE `stud_sovet` SET `date_con` = '{$date}' WHERE `id` = '{$data['reject']}'";
		$user = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
	 }
	if( isset($data['edit']) )
	 {
		$query = "UPDATE `stud_sovet` SET `status` = '2' WHERE `id` = '{$data['edit']}'";
		$user = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
		$date = date("Y-m-d H:i:s");
		$query = "UPDATE `stud_sovet` SET `date_con` = '{$date}' WHERE `id` = '{$data['edit']}'";
		$user = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
		$query = "UPDATE `stud_sovet` SET `comment` = '{$data['comment']}' WHERE `id` = '{$data['edit']}'";
		$user = mysqli_query($linki, $query) or die('Запрос не удался: ' . mysql_error());
	 }	

			$query = "SELECT * FROM `accounts` WHERE `id` ='{$statistics['id_account']}'";
			$account = mysqli_query($linki, $query) or die('2Запрос не удался: ' . mysql_error());
			$account = mysqli_fetch_array($account);

?>




<!DOCTYPE html>
<html lang="ru">

<head>
	
	<title>Рассмотрение заявок</title>
  <style>
    <?php require "css/index.css";?>

   </style>
   
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>



<header>
	<?php require "header.php";?>
</header>


 


<body>

 <div class="fon">
			
						
						<?PHP
						    $query = "SELECT * FROM `stud_sovet` WHERE `status` ='0'";
							$statistics = mysqli_query($linki, $query) or die('1Запрос не удался: ' . mysql_error());
							while ($row = mysqli_fetch_array($statistics)){
								
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
						 <td>Дата:</td><td><?PHP echo $row['date'];?></td>
					     </tr>
						 <tr>
						 <td>
						 </table>
						 <form method="POST" action="upload/download.php">
						 <button type="submit" class="button" name="download" value="<?PHP echo $row['om'] . ".docx" ?>"><i class="fa fa-download"></i>
							Скачать файл
						</button></form>
						   <table cellspacing="0">
						  <tr>
						<td><form method="POST" action="office.php"><p>Комментарий:</p>
						<textarea name="comment"></textarea>
						</td>
						<td>
						 <button type="submit" class="button" name="edit" value="<?PHP echo $row['id'] ?>"><i class="fa fa-edit"></i>
							Редактироваие
						</button></td>
						</form>
					     </tr><tr>
						 <td><form method="POST" action="office.php">
						 <button type="submit" class="approve" name="approve" value="<?PHP echo $row['id'] ?>"><i class="fa fa-check"></i>
							Одобрить
						</button></td>
						<td><button type="submit" class="reject" name="reject" value="<?PHP echo $row['id'] ?>"><i class="fa fa-close"></i>
							Отклонить
						</button></td></form>
					     </tr>
						</table><br><br>
						<?PHP
						}
						?>
						

						 
</div>

</body>



</html>