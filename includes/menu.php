<ul>
			<li id="current"><a href="index.php"><span>Home</span></a></li>
			
			<?php
			if(isset($_SESSION['username'])){
			if($_SESSION['username'] =="admin"){
			?>
			
			<li id="current"><a href="edit_page.php"><span>Edit Page</span></a></li>
			<li id="current"><a href="entry.php"><span>New Product </span></a></li>
			<?php } ?>
			<li id="current"><a href="logout.php"><span>Logout</span></a></li>
			<?php
			}else{
			?>
			
			
			<li id="current"><a href="login.php"><span>Login</span></a></li>
			<li id="current"><a href="registration.php"><span>Registration</span></a></li>
			
			<?php } ?>
			
			
			
			<li id="current"><a href="search.php"><span>Search</span></a></li>						
		</ul>	
		
		
	