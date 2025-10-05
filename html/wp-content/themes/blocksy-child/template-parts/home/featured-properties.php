<?php
$args = [
    'post_type'      => 'blc-product-review',
    'posts_per_page' => 6,
];

$featured_query = new WP_Query($args);

if ($featured_query->have_posts()) : ?>
<section class="featured-properties">
    <div class="ct-container">
        <div class="section-header">
            <div>
                <h2 class="section-title">Featured Properties</h2>
                <p class="section-subtitle">
                    Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein. Click "View Details" for more information.
                </p>
            </div>
            <a href="<?php echo esc_url(get_post_type_archive_link('blc-product-review')); ?>" class="view-all-btn">View All Properties</a>
        </div>

        <div class="swiper featured-swiper">
            <div class="swiper-wrapper">
                <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                    <div class="swiper-slide">
                        <div class="property-card">
                            <div class="property-image">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium_large');
                                } ?>
                            </div>
                            <div class="property-content">
                                <h3 class="property-title"><?php the_title(); ?></h3>
                                <p class="property-desc">
                                    <?php echo wp_trim_words(get_the_excerpt(), 18, '... <a href="' . get_permalink() . '">Read More</a>'); ?>
                                </p>
                                <div class="property-meta">
                                    <span>
                                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/icon-bedroom.png'); ?>" alt="Bedrooms">
                                        <?php echo esc_html(get_post_meta(get_the_ID(), 'bedrooms', true)); ?> 2-Bedrooms
                                    </span>
                                    <span>
                                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/icon-bathroom.png'); ?>" alt="Bathrooms">
                                        <?php echo esc_html(get_post_meta(get_the_ID(), 'bathrooms', true)); ?> 3-Bathrooms
                                    </span>
                                    <span>
                                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/icon-property-type.png'); ?>" alt="Property Type">
                                        <?php
                                            $categories = get_the_terms(get_the_ID(), 'blc-product-review-categories');
                                            if ($categories && !is_wp_error($categories)) {
                                                echo esc_html($categories[0]->name);
                                            } else {
                                                echo 'Uncategorized';
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="property-info">
                                    <div class="property-price">
                                        <p>Price</p>
                                        <strong>$<?php echo esc_html(get_post_meta(get_the_ID(), 'price', true)); ?></strong>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn-details">View Property Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <hr class="featured-divider">

            <div class="swiper-controls">
                <div class="pagination-status">
                    <span class="current-slide">01</span> of <span class="total-slides">00</span> pages
                </div>
                <div class="swiper-nav">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php endif;
wp_reset_postdata();
?>
