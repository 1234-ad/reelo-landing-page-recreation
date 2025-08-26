<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Grow your restaurant's revenue without discounting. Transform first-time diners into loyal regulars with Reelo's personalized marketing and loyalty programs.">
    <meta name="keywords" content="restaurant marketing, customer loyalty, restaurant CRM, customer retention, restaurant technology">
    <meta name="author" content="Reelo Technologies">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Reelo - Grow Your Restaurant's Revenue Without Discounting">
    <meta property="og:description" content="Transform first-time diners into loyal regulars with personalized marketing, loyalty programs, and data-driven insights.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo home_url(); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og-image.jpg">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Reelo - Grow Your Restaurant's Revenue Without Discounting">
    <meta name="twitter:description" content="Transform first-time diners into loyal regulars with personalized marketing, loyalty programs, and data-driven insights.">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-card.jpg">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Header -->
<header class="site-header" id="site-header">
    <div class="header-container">
        <!-- Logo -->
        <a href="<?php echo home_url(); ?>" class="logo">
            <svg width="80" height="32" viewBox="0 0 80 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 4C8 1.79086 9.79086 0 12 0H20C22.2091 0 24 1.79086 24 4V12C24 14.2091 22.2091 16 20 16H12C9.79086 16 8 14.2091 8 12V4Z" fill="#1DB5A6"/>
                <path d="M0 20C0 17.7909 1.79086 16 4 16H12C14.2091 16 16 17.7909 16 20V28C16 30.2091 14.2091 32 12 32H4C1.79086 32 0 30.2091 0 28V20Z" fill="#1DB5A6"/>
                <text x="28" y="20" font-family="Inter, sans-serif" font-size="18" font-weight="700" fill="#1DB5A6">reelo</text>
            </svg>
        </a>
        
        <!-- Navigation -->
        <nav class="main-nav">
            <ul>
                <li><a href="#product">Product</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#resources">Resources</a></li>
                <li><a href="#success-stories">Success Stories</a></li>
            </ul>
        </nav>
        
        <!-- Header CTA -->
        <div class="header-cta">
            <a href="#login" class="btn btn-secondary">Login</a>
            <a href="#trial" class="btn btn-primary">Try for free</a>
        </div>
        
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle mobile menu">
            <span>☰</span>
        </button>
    </div>
</header>

<!-- Mobile Navigation Overlay -->
<div class="mobile-nav-overlay" id="mobile-nav-overlay">
    <div class="mobile-nav-content">
        <button class="mobile-nav-close" id="mobile-nav-close" aria-label="Close mobile menu">
            <span>✕</span>
        </button>
        <nav class="mobile-nav">
            <ul>
                <li><a href="#product">Product</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#resources">Resources</a></li>
                <li><a href="#success-stories">Success Stories</a></li>
                <li><a href="#login" class="btn btn-secondary">Login</a></li>
                <li><a href="#trial" class="btn btn-primary">Try for free</a></li>
            </ul>
        </nav>
    </div>
</div>

<main id="main-content">