 <!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_url"); ?>/style.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_url"); ?>/css/font-awesome.min.css" />

<!-- Scripts -->
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>

<section id="header">
	<header>
		<span class="image avatar"><img src="<?php bloginfo("template_url"); ?>/images/avatar.png" alt="" /></span>
		<h1 id="logo"><a  href = "/wordpress/"><?php bloginfo('name');?></a></h1>
		<p><?php bloginfo('description');?></p>
	</header>

	<?php  $is_home = (is_home() ||  is_front_page()); ?>
	<script src="<?php bloginfo("template_url"); ?>/js/main.js"></script>
	<input type="hidden" name="is_home" id="is_home" value="<?php echo $is_home; ?>">

	<?php 
		$args = array(
			"container" => "nav",
			"container_id" => "nav");
		wp_nav_menu($args);
	?>
	<footer>
		<ul class="icons">
            <li><a href="http://weibo.xtcel.com/" class="icon fa-weibo" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><span class="label">weibo</span></a></li>
            <li><a href="http://www.github.com/yongca887/" class="icon fa-github" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><span class="label">Github</span></a>
            </li>
            <li><a href="#" class="icon fa-envelope" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><span class="label">Email</span></a></li>
            <li><a href="#" class="icon fa-rss-square" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><span class="label">rss</span></a></li>
        </ul>
	</footer>
</section>
