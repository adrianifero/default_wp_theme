<?php if ( is_active_sidebar( 'default_bottom_1' ) ) : ?>
<section id="bottom-sidebar" class="black widgetsarea" >
    <div class="content" >
    <?php dynamic_sidebar( 'default_bottom_1' ); ?>
    </div>
</section>
<?php endif; ?>

<section id="social" class="white" >	
	<div class="content" >
    	<?php $instagram_url = get_option("default_theme_instagram_url"); ?>
        <?php if (!empty($instagram_url)): ?>
		<a href="<?php echo $instagram_url; ?>" target="_BLANK"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram-xl.png"></a>
        <?php endif;?>
        
    	<?php $acebook_url = get_option("default_theme_facebook_url"); ?>
        <?php if (!empty($acebook_url)): ?>
		<a href="<?php echo get_option("default_theme_facebook_url"); ?>" target="_BLANK"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook-xl.png"></a>
        <?php endif;?>
        
    	<?php $twitter_url = get_option("default_theme_twitter_url"); ?>
        <?php if (!empty($twitter_url)): ?>
		<a href="<?php echo get_option("default_theme_twitter_url"); ?>" target="_BLANK"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter-xl.png"></a>
        <?php endif;?>
        
    	<?php $pinterest_url = get_option("default_theme_pinterest_url"); ?>
        <?php if (!empty($pinterest_url)): ?>
		<a href="<?php echo get_option("default_theme_pinterest_url"); ?>" target="_BLANK"><img src="<?php echo get_template_directory_uri(); ?>/img/pinterest-xl.png"></a>
        <?php endif;?>
        
    </div>
</section>

<?php wp_footer(); ?>

</body>
</html>