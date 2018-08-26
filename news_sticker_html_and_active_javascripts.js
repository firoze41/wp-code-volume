//Copy this code in footer.php for active news stiker 
<!-- News Ticker Js file -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.ticker.js" type="text/javascript"></script>
<script type="text/javascript">
            jQuery.fn.live = jQuery.fn.on;
                jQuery(function () {
                    jQuery('#js-news').ticker();
            });
</script>

//Taking this code in your fixed position where want to show news stiker
<div class="all-post">
                <div class="news_tickr fix">
                    <ul id="js-news" class="js-hidden">
                        <?php if(have_posts()) : ?><?php while(have_posts())  : the_post(); ?>
                        <li class="news-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                        <?php else : ?>
                            <h3 class="error"><?php _e('404 Error: Not found'); ?></h3>
                        <?php endif; ?>
                </div>
            </div>