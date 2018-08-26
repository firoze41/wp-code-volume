header.php
==================================

<?php bloginfo('name'); ?> = ব্লগের নাম আনার জন্য
<?php echo get_template_directory_uri(); ?> = ডাইনামিক থিম ডাইরেক্টরী

<?php bloginfo('stylesheet_url'); ?> = ডাইনামিক স্টাইল শীট

<?php wp_head(); ?> = হেডারের স্ক্রীপ্ট পাওয়ার জন্য



index.php
==================================

<?php get_header(); ?> = header.php ফাইল কল করার জন্য

<?php get_footer(); ?> = footer.php ফাইল কল করার জন্য

<?php get_sidebar(); ?> = sidebar.php ফাইল কল করার জন্য

<?php get_template_part( 'ফাইলের নাম' ); ?> = যে কোন ফাইল কল করার জন্য