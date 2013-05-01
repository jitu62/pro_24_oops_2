<?php include_once('../includes/users.php'); ?>
<?php include_once('../includes/header.php'); ?>
<body>
<!-- wrap starts here -->
<div id="wrap">
	
	<div id="header">				
			
		<h1 id="logo">Sales<span class="green">and</span><span class="gray">Purchase</span></h1>	
		<h2 id="slogan">Put your company slogan here...</h2> 
		
		<?php include_once('../includes/search.php'); ?>
			
		<!-- Menu Tabs -->
		<?php include_once('../includes/menu.php'); ?>
													
	</div>	
				
	<!-- content-wrap starts here -->
	<div id="content-wrap">		
											
	<img src="../images/headerphoto.jpg" width="820" height="120" alt="headerphoto" class="no-border" />
		
		<div id="sidebar" >							
				
			<h1>Sidebar Menu</h1>
			<ul class="sidemenu">
				<li><a href="index.html">Home</a></li>
								
			</ul>		
				
							
		
		</div>
			
		<div id="main">	
		<?php
		if(isset($_POST['submit'])){
		if(isset($_POST['username']))
		{
			$username = $_POST['username'];
			$pwd = md5($_POST['password']);
		$q=$reguser->user_login('users', 'username','password', $username,$pwd);
	
		while($row = mysql_fetch_array($q)){
		$_SESSION['username'] = $row['username'];
		$_SESSION['fullname'] = $row['fname'] ." ".$row['lname'];
		$_SESSION['email'] = $row['emailaddress'];
		$_SESSION['mobile'] = $row['mobileno'];
		$_SESSION['address'] = $row['shipaddress'];		
		if(isset($_SESSION['username'])){
			if($_SESSION['username'] =="admin")
			{
			header('location: entry.php');
			}else{
			header('location: index.php');
			}}
		else{
		echo "Username/Password Wrong";
		}
		}
		}
		
	}
		
		
					
		
		
			?>
			
			
			
			<h1>Login Page</h1>
			
				<form action="login.php" method="post">
				<p>
				<label>Username</label>
				<input type="text" name="username" value="" />
				<br />
				<label>Password</label>
				<input type="password" name="password" value="" />
				<br />
				<input type="submit" name="submit" value="login" />
				</p>
				</form>
							
		</div>	
			
		<div id="rightbar">
			
			<h1>Support Styleshout</h1>
			
			
			
		</div>			
			
	<!-- content-wrap ends here -->		
	</div>

<!-- footer starts here -->	
<?php include_once('../includes/footer.php'); ?>
<?php $reguser->close_connection(); ?>
<!-- wrap ends here -->
</div>

</body>
</html>
