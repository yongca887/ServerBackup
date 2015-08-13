
<article class="article">
	<?php 
		if (has_post_thumbnail ()) {
        $domsxe = simplexml_load_string ( get_the_post_thumbnail () );
		$thumbnailsrc = $domsxe->attributes()->src;
		} else {
		$blogURL = get_bloginfo("template_url");
		$thumbnailsrc = $blogURL."/images/thumbnail.jpg";
		} ?>
		<!-- <?php echo $thumbnailsrc; ?> -->
	<a class="pic" data-fit-mobile="true" href="<?php the_permalink(); ?>" 
	style="background-image: url(<?php echo $thumbnailsrc; ?>);"></a>
	<div class="desc">
		<h1><a class="title" href="<?php the_permalink(); ?>" title="<?php the_title();?>" alt="<?php the_title();?>">
			<?php the_title() ?>
		</a></h1>
		<div class="brief">
			<?php the_excerpt();?>
		</div>
		<div class="article-info">
            <li><?php the_time("Y-m-d");?> &nbsp;</li>
        </div>        
	</div>
</article>
