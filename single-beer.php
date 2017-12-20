

<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section id="single-beer-container">

            <?php if (have_posts()): ?>

                <?php while ( have_posts() ) : the_post(); ?>

                <div class="single-beer-name">
                    <h1><?php the_field('beer_name') ?></h1>
                    <a href="http://www.beersgamesmovies.com/beers/" class="readmore">View All Beer</a>
                </div>
                <div class="single-beer-entry">
                    <div>
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                    <div class="single-beer-details">
                        <p class="increased-line-height">Brewed by: <span class="redBeerDetails"><?php the_field('brewery') ?></span></span></p>
                        <p class="increased-line-height">Style: <span class="redBeerDetails"><?php the_field('beer_style') ?></span></p>
                        <p class="increased-line-height">ABV: <span class="redBeerDetails"><?php the_field('abv') ?>%</span></p>
                        <p class="increased-line-height"><?php the_field('beer_description') ?></p>
                    </div>
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
