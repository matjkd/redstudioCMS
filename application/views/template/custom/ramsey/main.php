<!doctype html>  

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
 
<?=$this->load->view('template/custom/ramsey/header')?>

</head>

<body>



<div class="container_24" id="container">
	
<div class="header">
	
<div id="logo"></div>
</div>
	
<div class="clear"></div>	

<div class="container_24 grid_24">	
	<div class="slide">
		<div id="menutop">
			<div id="menutop_text">
			<div id="top_menu">
			<?=$this->load->view('global/menu')?>
			</div>
			</div>
		</div>
		<img width="950px" height="210px" src="<?=base_url()?>images/template/custom/ramsey/slides/slide1.jpg"/>	
	</div>
</div>

	
<div class="maincontent">
	
	<div class="container_24 grid_16">
		<div class="main_body">
		<?=$this->load->view('global/alert')?>
		<?=$this->load->view($main_content)?>
		</div>
	</div>	 
	
	
	<div class="container_24 grid_8">
	<div class="main_body">
		<?=$this->load->view('template/custom/ramsey/google_feed')?>
	</div>
	</div>
		
	
</div>

<div class="clear"></div>	
<div class="footer">
	<?=$this->load->view('template/custom/ramsey/sitefooter')?>
</div>
</div>


 

<!--! end of #container -->
<?=$this->load->view('template/custom/ramsey/footer')?>
  
</body>
</html>