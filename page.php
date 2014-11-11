<?php get_header(); ?>


<?php /* SECTION LATEST NEWS */?>
<?php if(have_posts()): ?>
<?php while(have_posts()): ?>

<?php 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
$url = $thumb['0']; 
?>
<style>
section#top {
background-image: url('<?php echo $url; ?>');
background-repeat: no-repeat;
background-size: cover;
}
section#top.page { height:160px; } 
</style> 

<section id="top" class="green page" >
	<div class="content">
       <h1><?php the_title(); ?></h1>
    </div>
  
</section>

<section id="page" class="white" >
	<div class="content left" >       		
		<?php the_post(); ?>
		<?php the_content(); ?>
	</div>				
</section>
<?php endwhile; ?>
<?php endif; ?>



<section id="subscribe" class="white" >
	<div class="content" >
       <h1 style="font-size: 48px;margin: 0px;">Subscribe</h1>
       <p>Name</p>
       <input type="text" placeholder="Enter your name" />
       <p>E-mail</p>
       <input type="text" placeholder="Enter your e-mail" />
       <p>Interest</p>
       <input type="text" placeholder="What's your culinary interest" />
       
    </div>
</section>

<section id="social" class="white" >
	<div class="content" >
		<img src="http://www.iconsdb.com/icons/preview/black/instagram-xl.png">
		<img src="http://www.iconsdb.com/icons/preview/black/facebook-xl.png">
		<img src="http://www.iconsdb.com/icons/preview/black/twitter-xl.png">
		<img src="http://www.iconsdb.com/icons/preview/black/pinterest-xl.png">
    </div>
</section>
	
<?php get_footer(); ?>