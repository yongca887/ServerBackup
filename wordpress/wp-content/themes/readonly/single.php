<?php get_header(); ?>
<div class="container">
	<!-- article -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	<div class="signle-article">
		<div class="article">
			<h1 class="title"><?php the_title(); ?></h1>
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
	<?php else : ?>
    	输出找不到文章提示
	<?php endif; ?>
	<!-- 评论 -->
	<section class="comments">
        <h1>评论</h1>
        <div class="content">
        <?php
        if ( comments_open() || '0' != get_comments_number() )
                comments_template();
        else
                echo "<p>评论关闭</p>";
        ?>
        </div>
	</section>

	<!-- footer -->
 	<?php get_footer(); ?>
</div>