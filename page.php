<?php get_header(); ?>

<?php if(have_posts()): ?>
<?php while(have_posts()): ?>

?php 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
if ($thumb) : 
	$url = $thumb['0']; 
	$width = $thumb['1']; 
	$height = $thumb['2']; 
	
?>
	<style>
    section#top {
    	background-image: url('<?php echo $url; ?>');
		height: <?php echo $height; ?>
    }
    </style>
<?php endif; ?>

<section id="top" class="green page" >
	<div class="gradient"></div>
	<div class="content">
       <h1><?php the_title(); ?></h1>
    </div>
  
</section>

<?php if ( is_active_sidebar( 'default_top_1' ) ) : ?>
<section id="top-sidebar" class="white widgetsarea" >
	<div class="content" >
	<?php dynamic_sidebar( 'default_top_1' ); ?>
	</div>
</section>
<?php endif; ?>

<section id="page" class="white" >
	<div class="content left" >       		
		<?php the_post(); ?>
		<?php the_content(); ?>
	</div>				
</section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>