<?php
session_start();
header("Content-Type: text/html; charset=utf-8"); // Настройка кодировки
require "db.php";


			$query = "SELECT * FROM `accounts` WHERE `id` ='{$statistics['id_account']}'";
			$account = mysqli_query($linki, $query) or die('2Запрос не удался: ' . mysql_error());
			$account = mysqli_fetch_array($account);

?>




<!DOCTYPE html>
<html lang="ru">

<head>
	
	<title>Одобренные заявки</title>
  <style>
	<meta charset="UTF-8">
    <?php require "css/index.css";?>
   </style>
   
   <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>



<header>
	<?php require "header.php";?>
</header>


 


<body>
	
<div class="fon">						
						<h4>Одобренные заявки</h4><br><br>
						<?PHP
						    $query = "SELECT * FROM `stud_sovet` WHERE `status` ='1'";
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
						 <td>Дата составления:</td><td><?PHP echo $row['date'];?></td>
					     </tr>
						 <tr>
						 <td>Дата рассмотрения:</td><td><?PHP echo $row['date_con'];?></td>
					     </tr> </tr>
						</table><form method="POST" action="upload/download.php">
						 <button type="submit" name="download" class="button" value="<?PHP echo $row['om'] . ".docx" ?>"><i class="fa fa-download"></i>
							Скачать файл
						</button></form>
					    
						<br><br>
						<?PHP
						}
						?>
						
						
</div>


</body>



</html>