<!doctype html>  

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
 
<?=$this->load->view('global/header')?>

</head>

<body onload="initialize()" onunload="GUnload()">





  <div id="container">
  	
    <header>
    	<div class="container_24">
    	
    	<!-- Logo here --> 
    	<div id="logo">
    		<img width="346px" height="75px" src="<?=base_url()?>images/template/logo.png" alt="Gamasco Logo" />
    	</div>
    	
    	<?=$this->load->view('global/menu')?>
		
		<div id="slide_area">
			<?=$this->load->view('slideshow/slideshow')?>
		</div>
		
		</div>
    </header>
    
    
    
    <div class="container_24" id="main">
    <?php if(isset($sidebox)) { ?>	
		<div class="container_24 grid_11">
			<?=$this->load->view('global/alert')?>
	
			<div class="maincontent">
			<?=$this->load->view($main_content)?>
			</div>
		</div>
		
	
		<div id="side_box">
			<?=$this->load->view($sidebox)?>
		</div>
	<?php } else {?>
	
	<div class="container_24 grid_24">
			<?=$this->load->view('global/alert')?>
	
			<div class="maincontent">
			<?=$this->load->view($main_content)?>
			</div>
		</div>
	
	<?php } ?>
    </div>
    <div class="clear"></div>
 
 
 <?php if(isset($section2)) { ?>
 <div id="section2">   
     <div class="container_24" >

		<?=$this->load->view($section2)?>

    </div>
 </div>
 <?php } ?>


<?=$this->load->view('template/section3')?>
    
    
    <footer>
<?=$this->load->view('template/footer')?>
    </footer>
  </div> 

<!--! end of #container -->
<?=$this->load->view('global/footer')?>
  
</body>
</html>