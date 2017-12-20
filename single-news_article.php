

<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section id="single-beer-container">

            <?php if (have_posts()): ?>

                <?php while ( have_posts() ) : the_post(); ?>

                <div class="single-beer-name">
                    <h1><?php the_title(); ?></h1>
                    <a href="http://www.beersgamesmovies.com/news/" class="readmore">View All News</a>
                </div>
                <?php the_date( '', '<p class="redBeerDetails datePublished"> Published ', '</p>', true ); ?>
                <div class="single-news-entry">
                    <?php the_post_thumbnail(); ?>
                    <?php the_field('article') ?>
                </div>
            <?php endwhile; endif; ?>

            </section>

        </main><!-- #main -->

        <section id="recent">

                <h2>Recent News</h2>

                <div class="recent-wrap">

                    <?php

                        $args4= array(
                            'post_type' => 'news_article',
                            'posts_per_page' => 4,
                        );

                        $query4 = new WP_Query( $args4 );

                    ?>

                    <?php if( $query4->have_posts() ) : while( $query4->have_posts() ) : $query4->the_post(); ?>

                    <div class="recent_news_article">
                        <div class="recent_news_image yellow-image-overlay">
                            <a href="<?php the_permalink(); ?>" class="image-hover"><?php the_post_thumbnail(); ?></a>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <p class="increased-line-height"><?php $summary = get_field('article');
                            echo substr($summary, 0, 100); ?>...
                            <span>
                                <a href="<?php the_permalink(); ?>" class="readmore">READ MORE</a>
                            </span>
                        </p>
                    </div>

                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </section>


    </div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
