<?php get_header(); ?>


<?php /* SECTION ARCHIVE */?>
<?php if(have_posts()): ?>

<section id="header" class="white" >
	<h1><?php post_type_archive_title(); ?></h1>
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
	
<?php get_footer(); ?>