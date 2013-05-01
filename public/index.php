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
			<?php
			
           $content->content_read('content','index.php');
		    ?>				
			</ul>		
				
			
							
		
		</div>
			
		<div id="main">	
		<?php
		if(isset($_GET['id'])){
		$q=$content->content_read_by_id('content','id');
		$content->show($q);
		}
			?>
				
		</div>	
			
		<div id="rightbar">
			
			<h1>Support Styleshout</h1>
			
			
		</div>			
			
	<!-- content-wrap ends here -->		
	</div>

<!-- footer starts here -->	
<?php include_once('../includes/footer.php'); ?>
<?php $content->close_connection(); ?>
