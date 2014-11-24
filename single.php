<?php get_header(); ?>

<?php if(have_posts()): ?>
<?php while(have_posts()): ?>

<?php 
$featured_video = get_post_meta( $post->ID, '_featured_video', true );
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );

if ($thumb) : 
	$url = $thumb['0']; 
	$width = $thumb['1']; 
	$height = $thumb['2'];
	
?>
	<style>
    section#top {
    	background-image: url('<?php echo $url; ?>');
		height: <?php if ( empty($featured_video)) { echo $height; } ?>px;
    }
    </style>
<?php endif; ?>


<section id="top" class="green" >
	<div class="content">
    	<div class="info <?php echo !empty($featured_video) ? 'column' :''; ?>">
	       	<h1><?php the_title(); ?></h1>
           	<?php $excerpt = get_the_excerpt(); if (!empty($excerpt)): ?>
		   		<p><?php the_excerpt();?></p>
			<?php endif; ?>
    	</div>
        
        <?php if ( !empty($featured_video) ): ?>
        	<div class="video column">
        		<?php echo embedfyYouTubeURLs($featured_video); ?>
        	</div>
        <?php endif; ?>
    </div>
  
</section>

<section id="single" class="white" >
	<div class="content left" >       		
		<?php the_post(); ?>
		<?php the_content(); ?>
	</div>
    
    <?php if ( is_active_sidebar( 'default_right_1' ) ) : ?>
    <div class="sidebar right">
    	<div class="content" >
			<?php dynamic_sidebar( 'default_right_1' ); ?>
		</div>
    </div>	
	<?php endif; ?>
			
</section>
<?php endwhile; ?>
<?php endif; ?>

	
<?php get_footer(); ?>