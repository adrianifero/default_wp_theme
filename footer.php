<?php if ( is_active_sidebar( 'default_bottom_1' ) ) : ?>
<section id="bottom-sidebar" class="white widgetsarea" >
    <div class="content" >
    <?php dynamic_sidebar( 'default_bottom_1' ); ?>
    </div>
</section>
<?php endif; ?>

<section id="social" class="white" >	
	<div class="content" >
		<img src="http://www.iconsdb.com/icons/preview/black/instagram-xl.png">
		<img src="http://www.iconsdb.com/icons/preview/black/facebook-xl.png">
		<img src="http://www.iconsdb.com/icons/preview/black/twitter-xl.png">
		<img src="http://www.iconsdb.com/icons/preview/black/pinterest-xl.png">
    </div>
</section>

<?php wp_footer(); ?>

</body>
</html>