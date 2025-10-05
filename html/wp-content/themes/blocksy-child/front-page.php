<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

// Custom Hero Banner Section
get_template_part( 'template-parts/home/hero-banner' );
// Custom Feature Cards Section
get_template_part( 'template-parts/home/feature-cards' );
// Custom Featured Properties Section
get_template_part('template-parts/home/featured-properties');

// Main Content (Elementor page content)
while ( have_posts() ) :
    the_post();
    the_content();
endwhile;

get_footer();
