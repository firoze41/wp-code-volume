//Show popular tag in wordpress, take this code in your theme functions.php
function wpb_tags() { 
$wpbtags =  get_tags();
foreach ($wpbtags as $tag) { 
$string .= '<span class="tagbox"><a class="taglink" href="'. get_tag_link($tag->term_id) .'">'. $tag->name . '</a><span class="tagcount">'. $tag->count .'</span></span>' . "\n"   ;
} 
return $string;
} 
add_shortcode('wptags' , 'wpb_tags' );
//Used [wptags] where want to show
//Taking this in your style.css
.tagbox { 
background-color:#eee;
border: 1px solid #ccc;
margin:0px 10px 10px 0px;
line-height: 200%;
padding:2px 0 2px 2px;

}
.taglink  { 
padding:2px;
}

.tagbox a, .tagbox a:visited, .tagbox a:active { 
text-decoration:none;
}

.tagcount { 
background-color:green;
color:white;
position: relative;
padding:2px;
}
//Another style taking only one style..
.terms a, .terms a:visited, .terms a:active { 
background:#eee;
border:1px solid #ccc;
border-radius:5px;
text-decoration:none;
padding:3px;
margin:3px;
text-transform:uppercase;
}

.terms a:hover { 
background:#a8281a;
color:#FFF;
}