<?php get_header(); ?>


<?php /* SECTION ARCHIVE */?>
<?php if(have_posts()): ?>

<section id="top" class="green" >
	<div class="content">
		<h1><?php post_type_archive_title(); ?></h1>
	</div>
</section>

<section id="archive" class="white" >
<div class="content">

<?php while(have_posts()): ?>
<?php the_post(); ?>

<?php 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
$url = $thumb['0']; 
?>

	<div class="box">
		<a href="<?php the_permalink();?>">
		<div class="background"><?php the_post_thumbnail('full'); ?></div>
		<h3><?php the_title(); ?></h3>
		<div class="content"><?php the_excerpt(); ?></div>
		</a>
	</div>				

<?php endwhile; ?>

</div>
</section>
<?php endif; ?>


	
<?php get_footer(); ?>