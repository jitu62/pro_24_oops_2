
<?php include_once('../includes/users.php'); ?>
<?php include_once('../includes/header.php'); ?>
<!-- wrap starts here -->
<div id="wrap">
	
	<div id="header">				
			
		<h1 id="logo">Sales<span class="green">Purcahse</span><span class="gray"></span></h1>	
		<h2 id="slogan">Put your company slogan here...</h2> 
		
	<?php include_once('../includes/search.php'); ?>
			
		<!-- Menu Tabs -->
		<?php include_once('../includes/menu.php'); ?>
													
	</div>	
				
	<!-- content-wrap starts here -->
	<div id="content-wrap">		
											
	<img src="../images/headerphoto.jpg" width="820" height="120" alt="headerphoto" class="no-border" />
		
		<div id="sidebar" >							
				
			<h1>Latest Items</h1>
			<ul class="sidemenu">
				<li><a href="index.html">Home</a></li>				
			</ul>		
				
			
							
		
		</div>
			
		<div id="main">	
			<h1>Registration Page</h1>
			<?php
			if(isset($_POST['submit'])){
			$data = array(
				'username'			=> $_POST['username'],
				'password'			=> md5($_POST['password']),
				'fname'				=> $_POST['fname'],
				'lname'				=> $_POST['lname'],	
				'demail'			=> $_POST['demail'],
				'dmobile'			=> $_POST['dmobile'],
				'shipaddress'		=> $_POST['shipaddress']
			);
			
			$reguser->user_insert($data,'users');
			//$reguser->user_update($data, 'users','id', 67);
			}
			// $reguser->user_registration($data);
			
			
			?>		
		
				<form action="registration.php" method="post"  >	<p>						
				<label>User Name</label>
				<input name="username" type="text" size="40" /><br><br>
				<label>Password</label>
				<input name="password" type="password" size="40" /><br><br>
				<label>First Name</label>
				<input name="fname" type="text" size="40" /><br><br>
				<label>Last Name</label>
				<input name="lname" type="text" size="40"  /><br><br>
				<label>Email Address</label>
				<input name="demail" type="text" size="40"  /><br><br>
				<label>Mobile No</label>
				<input name="dmobile" type="text" maxlength="10" size="20" />	<br>	<br>
				<label>Shipping Address</label>
				<textarea rows="8" cols="55" name="shipaddress"></textarea>	<br><br>
				<input  class="button" type="submit" name="submit" value="submit" />	
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