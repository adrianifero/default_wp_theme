<?php get_header(); ?>

<section id="top" class="center green" >
	<div class="content">
       <h1 style="font-size: 48px;margin: 0px;">Not Found</h1>
       <h2 style="font-size: 14px;">404 error</h2>
    </div>
  
</section>

<section id="services" class="white" >
	<div class="content" >
       <h2 style="font-size: 48px;margin: 0px;">We couldn't find the page you're looking for</h2>
       <div class="box">
			<h2>Did you input the correct URL?</h2>
			<p>We couldn't find the page you're looking for.  It is may be because the URL is incorrect or because this page doesn't exist anymore.</p>	
			<?php if (file_exists( STYLESHEETPATH.'/img/product.png' )): ?>
				<img alt="" class="" src="<?php echo get_stylesheet_directory_uri();?>/img/product.png">
          	<?php elseif (file_exists( TEMPLATEPATH.'/img/product.png' )): ?>
				<img alt="" class="" src="<?php echo get_template_directory_uri();?>/img/product.png">
            <?php else: ?>
            	<img src="http://placehold.it/400x400" />            
			<?php endif; ?>
		</div>
    </div>
</section>

<?php get_footer(); ?>