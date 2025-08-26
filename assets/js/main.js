/**
 * Reelo Landing Page Recreation - Main JavaScript
 * 
 * @package Reelo_Recreation
 * @version 1.0
 */

(function() {
    'use strict';
    
    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initializeTheme();
    });
    
    /**
     * Initialize Theme Functionality
     */
    function initializeTheme() {
        initMobileMenu();
        initSmoothScrolling();
        initScrollAnimations();
        initHeaderEffects();
        initBackToTop();
        initFormHandling();
        initLazyLoading();
        initPerformanceOptimizations();
    }
    
    /**
     * Mobile Menu Functionality
     */
    function initMobileMenu() {
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileNavOverlay = document.getElementById('mobile-nav-overlay');
        const mobileNavClose = document.getElementById('mobile-nav-close');
        const mobileNavLinks = document.querySelectorAll('.mobile-nav a');
        
        if (mobileMenuToggle && mobileNavOverlay) {
            mobileMenuToggle.addEventListener('click', function() {
                openMobileMenu();
            });
        }
        
        if (mobileNavClose && mobileNavOverlay) {
            mobileNavClose.addEventListener('click', function() {
                closeMobileMenu();
            });
        }
        
        // Close mobile menu when clicking outside
        if (mobileNavOverlay) {
            mobileNavOverlay.addEventListener('click', function(e) {
                if (e.target === mobileNavOverlay) {
                    closeMobileMenu();
                }
            });
        }
        
        // Close mobile menu when clicking on links
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', function() {
                closeMobileMenu();
            });
        });
        
        // Handle escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNavOverlay.style.display === 'flex') {
                closeMobileMenu();
            }
        });
        
        function openMobileMenu() {
            mobileNavOverlay.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            mobileNavOverlay.setAttribute('aria-hidden', 'false');
            mobileMenuToggle.setAttribute('aria-expanded', 'true');
        }
        
        function closeMobileMenu() {
            mobileNavOverlay.style.display = 'none';
            document.body.style.overflow = 'auto';
            mobileNavOverlay.setAttribute('aria-hidden', 'true');
            mobileMenuToggle.setAttribute('aria-expanded', 'false');
        }
    }
    
    /**
     * Smooth Scrolling for Anchor Links
     */
    function initSmoothScrolling() {
        document.querySelectorAll('a[href^=\"#\"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const headerHeight = document.querySelector('.site-header').offsetHeight;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
    
    /**
     * Scroll Animations
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // Add staggered animation for grid items
                    if (entry.target.classList.contains('features-grid')) {
                        const cards = entry.target.querySelectorAll('.feature-card');
                        cards.forEach((card, index) => {
                            setTimeout(() => {
                                card.classList.add('visible');
                            }, index * 200);
                        });
                    }
                }
            });
        }, observerOptions);
        
        // Observe all animation elements
        document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right, .features-grid').forEach(el => {
            observer.observe(el);
        });
    }
    
    /**
     * Header Effects
     */
    function initHeaderEffects() {
        const header = document.getElementById('site-header');
        let lastScrollTop = 0;
        let ticking = false;
        
        function updateHeader() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Add background blur effect when scrolling
            if (scrollTop > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
                header.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
            } else {
                header.style.background = 'var(--white)';
                header.style.backdropFilter = 'none';
                header.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
            }
            
            // Hide/show header on scroll (optional)
            if (Math.abs(lastScrollTop - scrollTop) <= 5) {
                return;
            }
            
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                // Scrolling down
                header.style.transform = 'translateY(-100%)';
            } else {
                // Scrolling up
                header.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop;
            ticking = false;
        }
        
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateHeader);
                ticking = true;
            }
        }
        
        window.addEventListener('scroll', requestTick);
    }
    
    /**
     * Back to Top Button
     */
    function initBackToTop() {
        const backToTopButton = document.getElementById('back-to-top');
        
        if (!backToTopButton) return;
        
        let ticking = false;
        
        function updateBackToTop() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 300) {
                backToTopButton.style.display = 'block';
                backToTopButton.style.opacity = '1';
            } else {
                backToTopButton.style.opacity = '0';
                setTimeout(() => {
                    if (backToTopButton.style.opacity === '0') {
                        backToTopButton.style.display = 'none';
                    }
                }, 300);
            }
            
            ticking = false;
        }
        
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateBackToTop);
                ticking = true;
            }
        }
        
        window.addEventListener('scroll', requestTick);
        
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    /**
     * Form Handling
     */
    function initFormHandling() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(form);
                const submitButton = form.querySelector('button[type=\"submit\"], input[type=\"submit\"]');
                const originalText = submitButton ? submitButton.textContent : '';
                
                // Show loading state
                if (submitButton) {
                    submitButton.textContent = 'Sending...';
                    submitButton.disabled = true;
                }
                
                // Simulate form submission (replace with actual AJAX call)
                setTimeout(() => {
                    showNotification('Thank you! Your message has been sent.', 'success');
                    form.reset();
                    
                    if (submitButton) {
                        submitButton.textContent = originalText;
                        submitButton.disabled = false;
                    }
                }, 2000);
            });
        });
    }
    
    /**
     * Lazy Loading for Images
     */
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            img.classList.add('loaded');
                        }
                        
                        if (img.dataset.srcset) {
                            img.srcset = img.dataset.srcset;
                        }
                        
                        imageObserver.unobserve(img);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        } else {
            // Fallback for browsers without IntersectionObserver
            document.querySelectorAll('img[data-src]').forEach(img => {
                img.src = img.dataset.src;
                if (img.dataset.srcset) {
                    img.srcset = img.dataset.srcset;
                }
            });
        }
    }
    
    /**
     * Performance Optimizations
     */
    function initPerformanceOptimizations() {
        // Preload critical resources
        preloadCriticalResources();
        
        // Optimize scroll performance
        optimizeScrollPerformance();
        
        // Debounce resize events
        debounceResize();
    }
    
    function preloadCriticalResources() {
        const criticalImages = [
            // Add paths to critical images here
        ];
        
        criticalImages.forEach(src => {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'image';
            link.href = src;
            document.head.appendChild(link);
        });
    }
    
    function optimizeScrollPerformance() {
        let ticking = false;
        
        function updateOnScroll() {
            // Batch DOM reads and writes
            const scrollTop = window.pageYOffset;
            
            // Update scroll-dependent elements here
            
            ticking = false;
        }
        
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateOnScroll);
                ticking = true;
            }
        }
        
        window.addEventListener('scroll', requestTick, { passive: true });
    }
    
    function debounceResize() {
        let resizeTimer;
        
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Handle resize events here
                handleResize();
            }, 250);
        });
    }
    
    function handleResize() {
        // Recalculate layouts if needed
        const isMobile = window.innerWidth <= 768;
        document.body.classList.toggle('mobile-view', isMobile);
    }
    
    /**
     * Utility Functions
     */
    
    // Show notification
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        
        // Style the notification
        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '15px 20px',
            borderRadius: '8px',
            color: 'white',
            fontWeight: '500',
            zIndex: '10000',
            transform: 'translateX(100%)',
            transition: 'transform 0.3s ease',
            maxWidth: '300px',
            wordWrap: 'break-word'
        });
        
        // Set background color based on type
        const colors = {
            success: '#1DB5A6',
            error: '#e74c3c',
            warning: '#f39c12',
            info: '#3498db'
        };
        
        notification.style.backgroundColor = colors[type] || colors.info;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 5000);
        
        // Allow manual close
        notification.addEventListener('click', function() {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        });
    }
    
    // Throttle function
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }
    
    // Debounce function
    function debounce(func, wait, immediate) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }
    
    // Check if element is in viewport
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
    
    // Get scroll position
    function getScrollPosition() {
        return {
            x: window.pageXOffset || document.documentElement.scrollLeft,
            y: window.pageYOffset || document.documentElement.scrollTop
        };
    }
    
    // Smooth scroll to element
    function scrollToElement(element, offset = 0) {
        const elementPosition = element.offsetTop;
        const offsetPosition = elementPosition - offset;
        
        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }
    
    // Export utility functions to global scope if needed
    window.ReeloTheme = {
        showNotification,
        throttle,
        debounce,
        isInViewport,
        getScrollPosition,
        scrollToElement
    };
    
})();