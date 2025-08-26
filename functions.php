<?php
/**
 * Reelo Landing Page Recreation Theme Functions
 * 
 * @package Reelo_Recreation
 * @version 1.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function reelo_theme_setup() {
    // Add theme support for various features
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');
    
    // Add custom image sizes
    add_image_size('hero-image', 1920, 1080, true);
    add_image_size('feature-image', 600, 400, true);
    add_image_size('brand-logo', 200, 100, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'reelo'),
        'footer' => __('Footer Menu', 'reelo'),
        'mobile' => __('Mobile Menu', 'reelo')
    ));
}
add_action('after_setup_theme', 'reelo_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function reelo_enqueue_assets() {
    // Theme stylesheet
    wp_enqueue_style('reelo-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Google Fonts
    wp_enqueue_style('reelo-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap', array(), null);
    
    // Custom JavaScript
    wp_enqueue_script('reelo-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('reelo-main', 'reelo_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('reelo_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'reelo_enqueue_assets');

/**
 * Add Custom CSS Variables
 */
function reelo_custom_css_variables() {
    ?>
    <style>
        :root {
            --primary-teal: #1DB5A6;
            --secondary-yellow: #F4D03F;
            --accent-orange: #F39C12;
            --dark-navy: #2C3E50;
            --light-gray: #F8F9FA;
            --white: #FFFFFF;
            --text-dark: #333333;
            --text-light: #666666;
        }
    </style>
    <?php
}
add_action('wp_head', 'reelo_custom_css_variables');

/**
 * Custom Post Types
 */
function reelo_register_post_types() {
    // Testimonials
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new' => 'Add New Testimonial',
            'add_new_item' => 'Add New Testimonial',
            'edit_item' => 'Edit Testimonial',
            'new_item' => 'New Testimonial',
            'view_item' => 'View Testimonial',
            'search_items' => 'Search Testimonials',
            'not_found' => 'No testimonials found',
            'not_found_in_trash' => 'No testimonials found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-format-quote',
        'show_in_rest' => true
    ));
    
    // Features
    register_post_type('features', array(
        'labels' => array(
            'name' => 'Features',
            'singular_name' => 'Feature',
            'add_new' => 'Add New Feature',
            'add_new_item' => 'Add New Feature',
            'edit_item' => 'Edit Feature',
            'new_item' => 'New Feature',
            'view_item' => 'View Feature',
            'search_items' => 'Search Features',
            'not_found' => 'No features found',
            'not_found_in_trash' => 'No features found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-star-filled',
        'show_in_rest' => true
    ));
}
add_action('init', 'reelo_register_post_types');

/**
 * Custom Meta Boxes
 */
function reelo_add_meta_boxes() {
    add_meta_box(
        'testimonial_details',
        'Testimonial Details',
        'reelo_testimonial_meta_box_callback',
        'testimonials',
        'normal',
        'high'
    );
    
    add_meta_box(
        'feature_details',
        'Feature Details',
        'reelo_feature_meta_box_callback',
        'features',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'reelo_add_meta_boxes');

/**
 * Testimonial Meta Box Callback
 */
function reelo_testimonial_meta_box_callback($post) {
    wp_nonce_field('reelo_testimonial_nonce', 'testimonial_nonce');
    
    $customer_name = get_post_meta($post->ID, '_customer_name', true);
    $customer_title = get_post_meta($post->ID, '_customer_title', true);
    $company_name = get_post_meta($post->ID, '_company_name', true);
    $rating = get_post_meta($post->ID, '_rating', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="customer_name">Customer Name</label></th>
            <td><input type="text" id="customer_name" name="customer_name" value="<?php echo esc_attr($customer_name); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="customer_title">Customer Title</label></th>
            <td><input type="text" id="customer_title" name="customer_title" value="<?php echo esc_attr($customer_title); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="company_name">Company Name</label></th>
            <td><input type="text" id="company_name" name="company_name" value="<?php echo esc_attr($company_name); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="rating">Rating (1-5)</label></th>
            <td><input type="number" id="rating" name="rating" value="<?php echo esc_attr($rating); ?>" min="1" max="5" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Feature Meta Box Callback
 */
function reelo_feature_meta_box_callback($post) {
    wp_nonce_field('reelo_feature_nonce', 'feature_nonce');
    
    $icon = get_post_meta($post->ID, '_feature_icon', true);
    $color_scheme = get_post_meta($post->ID, '_color_scheme', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="feature_icon">Feature Icon (Emoji or HTML)</label></th>
            <td><input type="text" id="feature_icon" name="feature_icon" value="<?php echo esc_attr($icon); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="color_scheme">Color Scheme</label></th>
            <td>
                <select id="color_scheme" name="color_scheme">
                    <option value="yellow" <?php selected($color_scheme, 'yellow'); ?>>Yellow</option>
                    <option value="orange" <?php selected($color_scheme, 'orange'); ?>>Orange</option>
                    <option value="teal" <?php selected($color_scheme, 'teal'); ?>>Teal</option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function reelo_save_meta_boxes($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['testimonial_nonce']) && !isset($_POST['feature_nonce'])) {
        return;
    }
    
    // Verify nonce
    if (isset($_POST['testimonial_nonce']) && !wp_verify_nonce($_POST['testimonial_nonce'], 'reelo_testimonial_nonce')) {
        return;
    }
    
    if (isset($_POST['feature_nonce']) && !wp_verify_nonce($_POST['feature_nonce'], 'reelo_feature_nonce')) {
        return;
    }
    
    // Check if user has permission to edit
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save testimonial data
    if (isset($_POST['customer_name'])) {
        update_post_meta($post_id, '_customer_name', sanitize_text_field($_POST['customer_name']));
    }
    
    if (isset($_POST['customer_title'])) {
        update_post_meta($post_id, '_customer_title', sanitize_text_field($_POST['customer_title']));
    }
    
    if (isset($_POST['company_name'])) {
        update_post_meta($post_id, '_company_name', sanitize_text_field($_POST['company_name']));
    }
    
    if (isset($_POST['rating'])) {
        update_post_meta($post_id, '_rating', intval($_POST['rating']));
    }
    
    // Save feature data
    if (isset($_POST['feature_icon'])) {
        update_post_meta($post_id, '_feature_icon', sanitize_text_field($_POST['feature_icon']));
    }
    
    if (isset($_POST['color_scheme'])) {
        update_post_meta($post_id, '_color_scheme', sanitize_text_field($_POST['color_scheme']));
    }
}
add_action('save_post', 'reelo_save_meta_boxes');

/**
 * Customizer Settings
 */
function reelo_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('reelo_hero', array(
        'title' => 'Hero Section',
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Grow Your Restaurant\'s Revenue Without Discounting!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => 'Hero Title',
        'section' => 'reelo_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Transform first-time diners into loyal regulars with personalized marketing, loyalty programs, and data-driven insights.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => 'Hero Subtitle',
        'section' => 'reelo_hero',
        'type' => 'textarea',
    ));
    
    // Contact Information
    $wp_customize->add_section('reelo_contact', array(
        'title' => 'Contact Information',
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'hello@reelo.io',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => 'Contact Email',
        'section' => 'reelo_contact',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+91 12345 67890',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => 'Contact Phone',
        'section' => 'reelo_contact',
        'type' => 'text',
    ));
}
add_action('customize_register', 'reelo_customize_register');

/**
 * AJAX Handler for Demo Request
 */
function reelo_handle_demo_request() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'reelo_nonce')) {
        wp_die('Security check failed');
    }
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $company = sanitize_text_field($_POST['company']);
    $phone = sanitize_text_field($_POST['phone']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Send email notification
    $to = get_option('admin_email');
    $subject = 'New Demo Request from ' . $name;
    $body = "Name: $name\nEmail: $email\nCompany: $company\nPhone: $phone\nMessage: $message";
    
    wp_mail($to, $subject, $body);
    
    wp_send_json_success('Demo request submitted successfully!');
}
add_action('wp_ajax_demo_request', 'reelo_handle_demo_request');
add_action('wp_ajax_nopriv_demo_request', 'reelo_handle_demo_request');

/**
 * Widget Areas
 */
function reelo_widgets_init() {
    register_sidebar(array(
        'name' => 'Footer Widget Area',
        'id' => 'footer-widgets',
        'description' => 'Widgets in this area will be shown in the footer.',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'reelo_widgets_init');

/**
 * Custom Excerpt Length
 */
function reelo_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'reelo_excerpt_length');

/**
 * Custom Excerpt More
 */
function reelo_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'reelo_excerpt_more');

/**
 * Add Custom Body Classes
 */
function reelo_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    
    if (wp_is_mobile()) {
        $classes[] = 'mobile-device';
    }
    
    return $classes;
}
add_filter('body_class', 'reelo_body_classes');

/**
 * Optimize Performance
 */
function reelo_optimize_performance() {
    // Remove unnecessary WordPress features
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Disable emojis
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'reelo_optimize_performance');

/**
 * Security Enhancements
 */
function reelo_security_enhancements() {
    // Hide WordPress version
    remove_action('wp_head', 'wp_generator');
    
    // Remove version from scripts and styles
    function remove_version_scripts_styles($src) {
        if (strpos($src, 'ver=')) {
            $src = remove_query_arg('ver', $src);
        }
        return $src;
    }
    add_filter('style_loader_src', 'remove_version_scripts_styles', 9999);
    add_filter('script_loader_src', 'remove_version_scripts_styles', 9999);
}
add_action('init', 'reelo_security_enhancements');

/**
 * Helper Functions
 */

// Get customizer option
function reelo_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}

// Display star rating
function reelo_display_rating($rating) {
    $output = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $output .= '<span class="star filled">★</span>';
        } else {
            $output .= '<span class="star">☆</span>';
        }
    }
    return $output;
}

// Format phone number
function reelo_format_phone($phone) {
    return preg_replace('/[^0-9+]/', '', $phone);
}

// Truncate text
function reelo_truncate_text($text, $length = 100) {
    if (strlen($text) > $length) {
        return substr($text, 0, $length) . '...';
    }
    return $text;
}

?>