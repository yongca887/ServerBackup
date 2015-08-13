<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache" />
<title><?php bloginfo('name'); if (is_home()) {echo " | "; bloginfo('description');} wp_title( '|', true, 'left' ); ?></title>
<meta name="format-detection" content="telephone=no"/>
<meta name="apple-mobile-app-status-bar-style" content="black" />
<meta name="apple-touch-fullscreen" content="YES" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,  minimum-scale=1.0, maximum-scale=1.0" />
<?php if(is_home()){
$keywords = get_option('mytheme_keywords');
$description = get_option('mytheme_description');
}elseif(is_single() || is_page()){
$keywords = tagtext();
$description = get_the_title();
}elseif(is_category()){
$description = category_description();
if (!empty($description) && get_query_var('paged')) {
    $description .= '(第'.get_query_var('paged').'页)';
    }
$keywords = single_cat_title('', false);
}elseif (is_tag())
{
$description = tag_description();
if (!empty($description) && get_query_var('paged')) {
$description .= '(第'.get_query_var('paged').'页)';
}
$keywords = single_tag_title('', false);
}
?>
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="description" content="<?php echo $description; ?>">
<!--[if lte IE 8]>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/html5.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/css3-mediaqueries.js"></script>
<![endif]-->
<link href="<?php bloginfo('template_url'); ?>/css/tip-twitter/tip-twitter.css?ver=1.2" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css?ver=4.1.0" rel="stylesheet">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/tomorrow.css">
<script src="<?php bloginfo('template_url'); ?>/scripts/highlight.pack.js"></script>
<?php wp_head(); ?>

</head>

<body>
    <!--loading-->
    <div class="loading"></div>
    <div class="circle-loading"></div>
	<!-- float category -->
    <!-- wider-switch -->
    <div class="wider-switch"><i class="fa fa-expand"></i></div>
    <header class="left">
    	<div id="categories"><i class="fa fa-bars"></i>
        <select >
        	<option value="<?=(bloginfo('home_url'))?>">请选择</option>
        	<?php
			$args = array(
				'hide_empty'=>false
			);
			$header_categories = get_categories($args);
			foreach($header_categories as $category) {
			?>
            <option value="<?=(get_category_link( $category->term_id ))?>"><?=($category->name)?></option>
            <?php
			}
			?>
        </select>
        </div>
    	<div class="face-area">
        	<div class="face-img">
            <a href="<?php echo home_url();?>" alt="回到首页" title="回到首页">
            <img src="<?php bloginfo('template_url'); ?>/images/face.png" />
            </a>
            </div>
            <div class="face-name"><?=(get_option('mytheme_owner')!='' ? get_option('mytheme_owner') : 'Memory')?></div>
        </div>
    	<div class="search">
        	<?php
				get_search_form();
			?>
        </div>
        <div class="nav">
        	<ul>
            	<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false', 'items_wrap' => '%3$s'));?>
            	<li id="nav-current" class="nav-current"></li>
            </ul>
            
        </div>
    </header>
