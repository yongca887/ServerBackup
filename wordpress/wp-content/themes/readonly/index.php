<?php get_header(); ?>
<!-- main container -->
<div class="container">
    <div class="article-list">
        <?php
            global $query_string;
            query_posts($query_string.'&orderby=id');
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                    include('article.php');
            ?>
            <?php endwhile; else: ?>
               <article class="article">
                    <h1>Sorry, 没有文章</h1>
                    <div class="aside">
                       没有文章
                    </div>
                </article>
        <?php
                    endif;
                    wp_reset_query();
        ?>
        </div>
        <?php get_footer(); ?>
</div>
