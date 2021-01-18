
  <a href="index.php" class="name"><img src="images/log.png" width="100" 
   height="100" alt="logo"></a>
   <a href="index.php" class="logo">
   <?php 
	if ($_SESSION['logged_user']['access'] == 1){ echo "Студсовет"; } 
	else { echo "Ректорат"; } 
				echo " | ";
				echo $_SESSION['logged_user']['name']; ?></a>
  	
   
    <nav>
   <a href='logout.php' class='glo'>Выход</a>	
  </nav>
