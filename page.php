<?php get_header(); ?>

<?php if(have_posts()): ?>
<?php while(have_posts()): ?>

<section id="top" class="green page" >
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
	<div class="content" >       	
    	<?php the_post_thumbnail('photo_large_crop')	; ?>
		<?php the_post(); ?>
		<?php the_content(); ?>
	</div>				
</section>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>