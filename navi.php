<?php

/*For page navi where need to show page navi that paste this code */
		<div class="fix universal_page_nav">
			<?php if(function_exists('wp_pagenavi')):?>
		<div class="fix page_navi_plugin btn btn-primary"><?php wp_pagenavi();?></div>
		<?php else:?>
		<div class="fix stracture serial_quote width100">
		<div class="fix serial">
			<ul>
			<li class="floatleft">
			<?php next_posts_link( __( '<span class="alignleft">&larr; Next</span>', 'mostra' ) ); ?>
			</li>
			<li class="floatright">
			<?php previous_posts_link( __( '<span class="alignright">Previous &rarr;</span>', 'mostra' ) ); ?>
			</li>
			</ul>
		</div>
	</div>
	<?php endif;?>
		</div>



// css for wp page navi
/*
.page_navi_plugin{}
.page_navi_plugin .wp-pagenavi{border:0;background:#DEEDF6;padding:10px;}
.page_navi_plugin .wp-pagenavi span{padding:9px;border:1px solid #69C238}
.page_navi_plugin .wp-pagenavi span.pages{border:0;color:#000;}
.page_navi_plugin .wp-pagenavi span.current{color:#fff;padding-left:15px;padding-right:15px;background:#195C86;}
.page_navi_plugin .wp-pagenavi a{border:0;padding:10px;}
.page_navi_plugin .wp-pagenavi a.page{}
.page_navi_plugin .wp-pagenavi a.page:hover{color:red}
.page_navi_plugin .wp-pagenavi a.larger{}
.page_navi_plugin .wp-pagenavi a.previouspostslink:hover{color:red}
.page_navi_plugin .wp-pagenavi a.nextpostslink:hover{color:red}
.page_navi_plugin .wp-pagenavi a.nextpostslink{}

/************************/
.btn {
  -moz-user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px 4px 4px 4px;
  cursor: pointer;
  display: inline-block;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857;
  margin-bottom: 0;
  padding: 6px 12px;
  text-align: center;
  vertical-align: middle;
  white-space: nowrap;
}
.btn-primary {
  background-color: #428BCA;
  border-color: #357EBD;
  color: #FFFFFF;
}
.floatleft{float:left}
.floatright{float:right}

.fix{overflow:hidden}
.width100{width:100%}
*/
.serial_quote_area{display:none;}
.serial_quote{}
.serial{background:#DEEDF6}
.serial ul li{list-style:none;font-size:14px;}
.serial ul li a{list-style:none;font-size:14px;padding:10px;display:block;color:red}


?>