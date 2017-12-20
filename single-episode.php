

<?php get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section>

            <?php if (have_posts()): ?>

                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="single-episode-page">
                        <div class="number-title-container">
                            <h3 class="episode-number-heading"><?php the_field('episode_number') ?></h3>
                            <h1 class="episode-title-heading"><?php the_title(); ?></h1>
                        </div>
                        <p class="episode-description increased-line-height"><?php the_field('episode_description') ?></p>
                    </div>
                    <div class="video-container">
                        <?php the_field('episode_video') ?>
                    </div>

            <?php endwhile; endif; ?>

            </section>
            <section id="episodes-recent-news-container">
                <div id="more-episodes">
                   <div class="viewAll">
                        <h2>More Episodes</h2>
                        <a href="http://www.beersgamesmovies.com/episodes/">View All Episodes</a>
                   </div>
                   <?php
                        $args= array(
                            'post_type' => 'episode',
                            'posts_per_page' => 4
                        );

                        $query = new WP_Query( $args );
                    ?>

                    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="single-entry">
                            <section class="yellow-image-overlay">
                            <a href="<?php the_permalink(); ?>" class="image-hover"><?php the_post_thumbnail('medium'); ?></a>
                            </section>
                            <div>
                                <p class="bold-title"><?php the_field('episode_number'); ?> - <?php the_title(); ?></p>
                                <p class="more-episodes-description increased-line-height"><?php the_field('episode_description') ?></p>
                            </div>
                        </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>

                <div id="recent-sidebar">
                    <h2>Recent</h2>
                        <?php

                            $args4= array(
                                'post_type' => 'news_article',
                                'posts_per_page' => 4
                            );

                            $query4 = new WP_Query( $args4 );

                        ?>

                        <?php if( $query4->have_posts() ) : while( $query4->have_posts() ) : $query4->the_post(); ?>

                        <div class="recent-sidebar-entry">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small'); ?></a>
                            <div>
                                <p class="bold-title"><?php the_title(); ?></p>
                                <p class="increased-line-height"><?php $summary = get_field('article');
                                    echo substr($summary, 0, 100); ?>...
                                    <span>
                                        <a href="<?php the_permalink(); ?>" class="readmore">READ MORE</a>
                                    </span>
                                </p>
                            </div>
                        </div>

                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
