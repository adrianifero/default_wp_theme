<?php get_header(); ?>

<?php if(have_posts()): ?>
<?php while(have_posts()): ?>

<?php 
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

<section id="attachment" class="white" >
	<div class="content center" >       		
		<?php the_post(); ?>
		<?php the_content(); ?>
        <img src="<?php echo $url; ?>" />
	</div>				
</section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>