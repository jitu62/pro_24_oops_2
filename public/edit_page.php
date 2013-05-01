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
			$content->content_read('content','edit_page.php');
			
			?>				
			</ul>		
				
			
							
		
		</div>
			
		<div id="main">	
			<h1>Edit Products</h1>
			<?php 
			if(isset($_GET['msg'])){
			echo "<span id=\"error\">{$_GET['msg']}</span>";
			}
			?>
			<?php
		if(isset($_GET['id'])){
		$q=$content->content_read_by_id('content','id');
		$content->show_update($q);
		}
		if(isset($_POST['update'])){
		$update=array(
	'title'      => "{$_POST['dtitle']}",
	'batchno'    =>"{$_POST['dbatch']}",
	'tencode'   =>"{$_POST['dcode']}",
	'description'=>"{$_POST['ddescription']}",
	'category'   =>"{$_POST['category']}",
	'costrs'     =>"{$_POST['costrs']}"
	);
		
    $content->content_update($update,'content','id');
		
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
