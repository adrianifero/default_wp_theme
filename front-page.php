<?php get_header(); ?>

<section id="top" class="green" >
	<div class="content">
       <h1 style="font-size: 48px;margin: 0px;">Default Title</h1>
       <h2 style="font-size: 14px;">Default Tagline</h2>
    </div>
  
</section>

<?php if ( is_active_sidebar( 'default_top_1' ) ) : ?>
<section id="top-sidebar" class="white widgetsarea" >
	<div class="content" >
	<?php dynamic_sidebar( 'default_top_1' ); ?>
	</div>
</section>
<?php endif; ?>

<section id="quote" class="white" style=" max-height: 1000px;overflow: hidden;position:relative;">
	<div class="content" >
       <h2 style="font-size: 48px;margin: 0px;">"Default Quote"</h2>
       <h5 style="font-size: 14px;"> - Author </h5>
    </div>    
</section>

<section id="services" class="white" >
	<div class="content" >
       <h2 style="font-size: 48px;margin: 0px;">Services</h2>
       <div class="box">
			<h2>Currently, the best solution available on the market.</h2>
			<p>Morbi urna ante, consequat at porta ac, fermentum et tellus. Ut nisi massa, lacinia eleifend augue eu, fringilla euismod ligula. Proin quis iaculis tortor. Morbi fringilla sapien nec magna sodales malesuada. Donec dui lectus, tempor vel diam ut, dictum porta libero. Donec nec elementum mi, non euismod tortor. Morbi elementum, dui vel commodo elementum, purus massa tincidunt augue, ac feugiat leo dolor et nunc.</p>			
		</div>
		<div class="box">
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

<section id="general" class="white" >
	<div class="content" >
       	<h2 style="font-size: 48px;margin: 0px;">General Products</h2>
       	
       	<div class="box">
        	<?php if (file_exists( STYLESHEETPATH.'/img/product.png' )): ?>
				<img alt="" class="" src="<?php echo get_stylesheet_directory_uri();?>/img/product.png">
          	<?php elseif (file_exists( TEMPLATEPATH.'/img/product.png' )): ?>
				<img alt="" class="" src="<?php echo get_template_directory_uri();?>/img/product.png">
            <?php else: ?>
            	<img src="http://placehold.it/400x400" />            
			<?php endif; ?>
            
			
        </div>
       	<div class="box">
			<h2>Currently, the best solution available on the market.</h2>
			<p>Morbi urna ante, consequat at porta ac, fermentum et tellus. Ut nisi massa, lacinia eleifend augue eu, fringilla euismod ligula. Proin quis iaculis tortor. Morbi fringilla sapien nec magna sodales malesuada. Donec dui lectus, tempor vel diam ut, dictum porta libero. Donec nec elementum mi, non euismod tortor. Morbi elementum, dui vel commodo elementum, purus massa tincidunt augue, ac feugiat leo dolor et nunc.</p>			
		</div>
		
    </div>
</section>

<section id="training" class="white" >
	<div class="content" >
       <h2 style="font-size: 48px;margin: 0px;">Training</h2>
    
		<div class="box">
			<h2>Currently, the best solution available on the market.</h2>
			<p>Morbi urna ante, consequat at porta ac, fermentum et tellus. Ut nisi massa, lacinia eleifend augue eu, fringilla euismod ligula. Proin quis iaculis tortor. Morbi fringilla sapien nec magna sodales malesuada. Donec dui lectus, tempor vel diam ut, dictum porta libero. Donec nec elementum mi, non euismod tortor. Morbi elementum, dui vel commodo elementum, purus massa tincidunt augue, ac feugiat leo dolor et nunc.</p>			
		</div>
		<div class="box">
			<?php if (file_exists( STYLESHEETPATH.'/img/product.png' )): ?>
				<img alt="" class="" src="<?php echo get_stylesheet_directory_uri();?>/img/product.png">
          	<?php elseif (file_exists( TEMPLATEPATH.'/img/product.png' )): ?>
				<img alt="" class="" src="<?php echo get_template_directory_uri();?>/img/product.png">
            <?php else: ?>
            	<img src="http://placehold.it/400x400" />            
			<?php endif; ?>
		</div>
		<div class="box">
			<h2>Currently, the best solution available on the market.</h2>
			<p>Morbi urna ante, consequat at porta ac, fermentum et tellus. Ut nisi massa, lacinia eleifend augue eu, fringilla euismod ligula. Proin quis iaculis tortor. Morbi fringilla sapien nec magna sodales malesuada. Donec dui lectus, tempor vel diam ut, dictum porta libero. Donec nec elementum mi, non euismod tortor. Morbi elementum, dui vel commodo elementum, purus massa tincidunt augue, ac feugiat leo dolor et nunc.</p>			
		</div>
	
	</div>
</section>

<?php /* SECTION LATEST NEWS */?>
<?php if(have_posts()): ?>
<section id="news" class="white" >
	<div class="content" >
       	<h2 style="font-size: 48px;margin: 0px;">Latest News</h2>
       		
		<?php while(have_posts()): ?>
		<?php the_post(); ?>
       		<div class="box">
       			<a href="<?php the_permalink();?>">
	       		<div class="background"><?php the_post_thumbnail('medium'); ?></div>
				<h3><?php the_title(); ?></h3>
				<div class="content"><?php the_excerpt(); ?></div>
				</a>
			</div>
		<?php endwhile; ?>
		
	</div>				
</section>
	
<?php endif; ?>



<section id="subscribe" class="white" >
	<div class="content" >
       <h2 style="font-size: 48px;margin: 0px;">Subscribe</h2>
       <p>Name</p>
       <input type="text" placeholder="Enter your name" />
       <p>E-mail</p>
       <input type="text" placeholder="Enter your e-mail" />
       <p>Interest</p>
       <textarea placeholder="Let us know your interests and questions"></textarea>
       
    </div>
</section>
	
<?php get_footer(); ?>