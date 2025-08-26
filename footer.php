</main>

<!-- Footer -->
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-logo">
                <a href="<?php echo home_url(); ?>" class="logo" style="color: var(--white); font-size: 1.5rem;">
                    <svg width="80" height="32" viewBox="0 0 80 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 4C8 1.79086 9.79086 0 12 0H20C22.2091 0 24 1.79086 24 4V12C24 14.2091 22.2091 16 20 16H12C9.79086 16 8 14.2091 8 12V4Z" fill="#FFFFFF"/>
                        <path d="M0 20C0 17.7909 1.79086 16 4 16H12C14.2091 16 16 17.7909 16 20V28C16 30.2091 14.2091 32 12 32H4C1.79086 32 0 30.2091 0 28V20Z" fill="#FFFFFF"/>
                        <text x="28" y="20" font-family="Inter, sans-serif" font-size="18" font-weight="700" fill="#FFFFFF">reelo</text>
                    </svg>
                </a>
                <p style="margin-top: var(--spacing-sm); opacity: 0.8; max-width: 400px;">
                    Transform first-time diners into loyal regulars with personalized marketing, loyalty programs, and data-driven insights.
                </p>
            </div>
            
            <div class="footer-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: var(--spacing-xl); margin: var(--spacing-xl) 0;">
                <div class="footer-column">
                    <h4 style="margin-bottom: var(--spacing-sm); color: var(--white);">Product</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#features" style="color: rgba(255,255,255,0.8); text-decoration: none;">Features</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#integrations" style="color: rgba(255,255,255,0.8); text-decoration: none;">Integrations</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#pricing" style="color: rgba(255,255,255,0.8); text-decoration: none;">Pricing</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#demo" style="color: rgba(255,255,255,0.8); text-decoration: none;">Request Demo</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4 style="margin-bottom: var(--spacing-sm); color: var(--white);">Resources</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#blog" style="color: rgba(255,255,255,0.8); text-decoration: none;">Blog</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#case-studies" style="color: rgba(255,255,255,0.8); text-decoration: none;">Case Studies</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#help-center" style="color: rgba(255,255,255,0.8); text-decoration: none;">Help Center</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#api-docs" style="color: rgba(255,255,255,0.8); text-decoration: none;">API Documentation</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4 style="margin-bottom: var(--spacing-sm); color: var(--white);">Company</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#about" style="color: rgba(255,255,255,0.8); text-decoration: none;">About Us</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#careers" style="color: rgba(255,255,255,0.8); text-decoration: none;">Careers</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#contact" style="color: rgba(255,255,255,0.8); text-decoration: none;">Contact</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#press" style="color: rgba(255,255,255,0.8); text-decoration: none;">Press</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4 style="margin-bottom: var(--spacing-sm); color: var(--white);">Connect</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#linkedin" style="color: rgba(255,255,255,0.8); text-decoration: none;">LinkedIn</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#twitter" style="color: rgba(255,255,255,0.8); text-decoration: none;">Twitter</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#facebook" style="color: rgba(255,255,255,0.8); text-decoration: none;">Facebook</a></li>
                        <li style="margin-bottom: var(--spacing-xs);"><a href="#instagram" style="color: rgba(255,255,255,0.8); text-decoration: none;">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: var(--spacing-sm);">
                <p style="margin: 0;">&copy; <?php echo date('Y'); ?> Reelo Technologies Private Limited. All rights reserved.</p>
                <div class="footer-legal">
                    <a href="#privacy" style="color: rgba(255,255,255,0.6); text-decoration: none; margin-right: var(--spacing-md);">Privacy Policy</a>
                    <a href="#terms" style="color: rgba(255,255,255,0.6); text-decoration: none; margin-right: var(--spacing-md);">Terms of Service</a>
                    <a href="#cookies" style="color: rgba(255,255,255,0.6); text-decoration: none;">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="back-to-top" class="back-to-top" style="display: none; position: fixed; bottom: 2rem; right: 2rem; background: var(--primary-teal); color: white; border: none; border-radius: 50%; width: 50px; height: 50px; cursor: pointer; box-shadow: var(--shadow-lg); z-index: 1000; transition: all 0.3s ease;">
    ↑
</button>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileNavOverlay = document.getElementById('mobile-nav-overlay');
    const mobileNavClose = document.getElementById('mobile-nav-close');
    
    if (mobileMenuToggle && mobileNavOverlay) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileNavOverlay.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
    }
    
    if (mobileNavClose && mobileNavOverlay) {
        mobileNavClose.addEventListener('click', function() {
            mobileNavOverlay.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
    }
    
    // Close mobile menu when clicking outside
    if (mobileNavOverlay) {
        mobileNavOverlay.addEventListener('click', function(e) {
            if (e.target === mobileNavOverlay) {
                mobileNavOverlay.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    
    // Observe all animation elements
    document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right').forEach(el => {
        observer.observe(el);
    });
    
    // Header scroll effect
    const header = document.getElementById('site-header');
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 100) {
            header.style.background = 'rgba(255, 255, 255, 0.95)';
            header.style.backdropFilter = 'blur(10px)';
        } else {
            header.style.background = 'var(--white)';
            header.style.backdropFilter = 'none';
        }
        
        lastScrollTop = scrollTop;
    });
    
    // Back to top button
    const backToTopButton = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });
    
    backToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Form handling (if forms are added)
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            // Add form submission logic here
            console.log('Form submitted');
        });
    });
    
    // Lazy loading for images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});
</script>

<!-- Mobile Navigation Styles -->
<style>
.mobile-nav-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 9999;
    align-items: center;
    justify-content: center;
}

.mobile-nav-content {
    background: var(--white);
    border-radius: var(--border-radius-lg);
    padding: var(--spacing-xl);
    max-width: 90%;
    width: 400px;
    position: relative;
}

.mobile-nav-close {
    position: absolute;
    top: var(--spacing-sm);
    right: var(--spacing-sm);
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
    color: var(--text-dark);
}

.mobile-nav ul {
    list-style: none;
    padding: 0;
}

.mobile-nav li {
    margin-bottom: var(--spacing-md);
    text-align: center;
}

.mobile-nav a {
    text-decoration: none;
    color: var(--text-dark);
    font-weight: var(--font-weight-medium);
    font-size: 1.125rem;
}

.mobile-nav .btn {
    display: inline-block;
    margin-top: var(--spacing-sm);
}

@media (min-width: 769px) {
    .mobile-nav-overlay {
        display: none !important;
    }
}
</style>

<?php wp_footer(); ?>
</body>
</html>