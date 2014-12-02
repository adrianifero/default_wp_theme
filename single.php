<?php get_header(); ?>

<?php if(have_posts()): ?>
<?php while(have_posts()): ?>

<section id="top" class="green" >
	<div class="content dark">
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
    
    <?php if ( is_active_sidebar( 'default_right_1' ) ) : ?>
    <div class="sidebar right">
    	<div class="content" >
			<?php dynamic_sidebar( 'default_right_1' ); ?>
		</div>
    </div>	
	<?php endif; ?>
    
    <?php if ( is_active_sidebar( 'default_mobile_top' ) ) : ?>
    <div class="sidebar mobile top">
    	<div class="content" >
			<?php dynamic_sidebar( 'default_mobile_top' ); ?>
		</div>
    </div>	
	<?php endif; ?>
    
	<div class="content left" >  
    	<?php the_post_thumbnail('photo_large_crop')	; ?>     		
		<?php the_post(); ?>
		<?php the_content(); ?>
	</div>
    
    <?php if ( is_active_sidebar( 'default_mobile_bottom' ) ) : ?>
    <div class="sidebar mobile bottom">
    	<div class="content" >
			<?php dynamic_sidebar( 'default_mobile_bottom' ); ?>
		</div>
    </div>	
	<?php endif; ?>
			
</section>
<?php endwhile; ?>
<?php endif; ?>

	
<?php get_footer(); ?>