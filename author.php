<?php get_header(); ?>

<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<section id="top" class="green page" >
	<div class="gradient"></div>
	<div class="content">
       <h1>Articles by <?php echo $curauth->display_name; ?></h1>
    </div>
  
</section>


<?php if(have_posts()): ?>
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