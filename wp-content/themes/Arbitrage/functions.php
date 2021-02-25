<?php

include("functions/config.php");         				   		   	   // Theme Configuration
include("functions/customize/customize.php");         				   // Theme Customizer
include("functions/infinitescroll/infinitescroll.php");         	   // Infinite Scroll
include("functions/subscribe/subscribe.php");         	   			   // MailChimp Subscribe Widget
include("functions/fonts/gfonts.php");         	   			 		   // Google Fonts
include("functions/randompostslink/randompostslink.php");              // Random Posts Link
include("functions/widgets/random-posts-widget-sidebar.php");          // Random Posts Widget Sidebar
include("functions/widgets/random-posts-widget-top.php");   		   // Random Posts Widget Top
include("functions/widgets/random-posts-widget-bottom.php");           // Random Posts Widget Bottom
include("functions/widgets/facebook-like-box-widget.php");             // Facebook Like Box Widget
include("functions/widgets/google-plus-badge-widget.php");		       // Google Plus Badge Widget
include("functions/widgets/social-icons-widget.php");                  // Social Icons Widget


// Post Pagination

function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

// Add Page Break to Editor

add_filter('mce_buttons','wysiwyg_editor');
function wysiwyg_editor($mce_buttons) {
$pos = array_search('wp_more',$mce_buttons,true);
if ($pos !== false) {
$tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
$tmp_buttons[] = 'wp_page';
$mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
}
return $mce_buttons;
}


?>