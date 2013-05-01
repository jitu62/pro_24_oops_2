<?php include_once('../includes/content.php'); ?>
<?php include_once('../includes/header.php'); ?>
<?php
//if(!isset($_SESSION['username'])){
//header("location: login.php");
//}else{
//if($_SESSION['username'] != "admin"){
//header("location: login.php"); 
//}
//}

?>
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
			<h1>New Product</h1>
			<?php 
			
			if(isset($_POST['submit'])){
			include_once('../includes/upload.php');			
			$data = array(			
			'title'			=> "{$_POST["dtitle"]}",
			'postedby'		=> 'Admin',
			'batchno'		=> $_POST["dbatch"],
			'tencode'		=> $_POST["dcode"],	
			'description'	=> "{$_POST["ddescription"]}",	
			'category'		=> $_POST["category"],
			'costrs'		=> $_POST["costrs"],
			'dateof_manu'	=> "{$_POST['dmanufacturer']}", 
			'dateof_expire'	=> "{$_POST['dexpire']}",
			'image_health'	=> $imagename		
			);
			$content->content_insert($data,'content');
			}
			
			
			
			
			
			?>
				<form action="entry.php" method="post" enctype="multipart/form-data"  >		
<p>				
				<label>Title Name:</label>
				<input name="dtitle" type="text" size="40" /><br><br>
				<label>Batch No:</label>
				<input name="dbatch" type="text" size="40" /><br><br>
				<label>Cost:</label>
				<input id="numbers" name="costrs"  type="text" size="10" /> RS<br><br>
				<label>5 Digit Code No:</label>
				<input name="dcode"  type="text" size="40" maxlength="5" /><br><br>
				<label>Date Of Manufacturer</label>
				<input name="dmanufacturer" type="text" size="20" /> DD-MM-YYYY<br><br>
				<label>Date Of Expire</label>
				<input name="dexpire" type="text" size="20" /> DD-MM-YYYY<br><br>
				<label>Choose Category</label>
				<select name="category">
				<option value="1">Food Products</option>
				<option value="2">Cosmetic Products</option>
				<option value="3">Medicine Products</option>
				<option value="4">Herbal Products</option>
				<option value="5">Hair Products</option>	
				<option value="6">General Products</option>					
				</select>
				<br><br>
				<label for="file">Upload Image</label>
				<input type="file" name="file" id="file" /> <br><br>
				
				<label>Description of the Product:</label>
				<textarea rows="8" cols="55" name="ddescription"></textarea><br><br>				
				
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
<?php $content->close_connection(); ?>
