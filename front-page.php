<?php get_header();?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section id="main-post">

                <?php

                    $args1= array(
                        'post_type' => 'episode',
                        'posts_per_page' => 1
                    );

                    $query1 = new WP_Query( $args1 );

                ?>

                <?php if( $query1->have_posts() ) : while( $query1->have_posts() ) : $query1->the_post(); ?>

                <a href="<?php the_permalink(); ?>" class="main-post-image"><?php the_post_thumbnail(); ?></a>

                <div class="yellow-bar">
                    <div class="number-title-container">
                        <h3 class="episode-number-heading"><?php the_field('episode_number') ?></h3>
                        <h1 class="episode-title-heading"><?php the_title(); ?></h1>
                    </div>
                    <p class="episode-description increased-line-height"><?php the_field('episode_description') ?></p>
                </div>

                <?php endwhile; endif; wp_reset_postdata(); ?>

            </section>

            <section id="news_beer_container">
                <div id="news_section" class="image-overlay">
                    <?php

                        $args2= array(
                            'post_type' => 'news_article',
                            'posts_per_page' => 1
                        );

                        $query2 = new WP_Query( $args2 );

                    ?>

                    <?php if( $query2->have_posts() ) : while( $query2->have_posts() ) : $query2->the_post(); ?>

                    <a href="<?php the_permalink(); ?>" class="post-image image-hover"><?php the_post_thumbnail(); ?></a>

                    <div class="over-image-text">
                        <h2>News</h2>
                        <p><?php the_field('article_description') ?></p>
                    </div>

                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>

                <div id="beer_section" class="image-overlay">
                    <?php

                        $args3= array(
                            'post_type' => 'beer',
                            'posts_per_page' => 1
                        );

                        $query3 = new WP_Query( $args3 );

                    ?>

                    <?php if( $query3->have_posts() ) : while( $query3->have_posts() ) : $query3->the_post(); ?>

                    <a href="<?php the_permalink(); ?>" class="post-image image-hover"><?php the_post_thumbnail(); ?></a>
                    <div class="over-image-text">
                        <h2>#beeroftheweek</h2>
                        <p><?php the_field('short_beer_description') ?></p>
                    </div>

                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </section>

        </main><!-- #main -->

            <section id="recent">

                <h2>Recent News</h2>

                <div class="recent-wrap">

                    <?php

                        $args4= array(
                            'post_type' => 'news_article',
                            'posts_per_page' => 4,
                            'offset' => 1
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
