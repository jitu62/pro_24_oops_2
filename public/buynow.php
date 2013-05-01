<?php
session_start();
if(!isset($_SESSION['username'])){
header("location: login.php");
}
<?php include_once('../includes/content.php'); ?>
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
			<h1>Item Purchased</h1>
				<?php
			$id = $_GET['id'];
$query = mysql_query("select * from content where id=$id", $connection);	
while($row = mysql_fetch_assoc($query)){
echo "<b>Item Name : </b> {$row['title']} <br />"; 
echo "<b>Item Price : </b> {$row['costrs']}/- Rs <br />"; 
echo "<b>Buyers Name : </b> {$_SESSION['fullname']} <br />"; 
echo "<b>Buyers Email : </b> {$_SESSION['email']} <br />"; 
echo "<b>Buyers Mobile : </b> {$_SESSION['mobile']} <br />"; 
echo "<b>Buyers Address : </b> {$_SESSION['address']} <br />"; 
								
				?>
				<form name="_xclick" action="https://www.paypal.com/in/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="me@mybusiness.com">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="item_name" value="<?php echo $row['title']; ?>">
<input type="hidden" name="amount" value="<?php echo $row['costrs']; ?>">
<input type="image" src="http://www.paypal.com/en_GB/i/btn/x-click-but01.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
<?php
}
?>
				<br /><br /><br /><br /><br />
		</div>	
			
		<div id="rightbar">
			
			<h1>Support Styleshout</h1>
			
			
		</div>			
			
	<!-- content-wrap ends here -->		
	</div>

<!-- footer starts here -->	
<?php include_once('../includes/footer.php'); ?>
<?php $content->close_connection(); ?>
