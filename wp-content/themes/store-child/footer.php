<footer>
    <div class="row footer-container custom-container">
        <div class="col-lg-5  text-center text-lg-start mb-2 mb-lg-5 mb-lg-0">
            <div class="brand-footer mx-auto mx-lg-0">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-1')): ?>
                <?php endif;?>
            </div>
        </div>
        <div class="col-md-4 text-center text-lg-start col-lg-2 footer-item">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-2')): ?>
            <?php endif;?>
        </div>
        <div class="col-md-4 text-center text-lg-start col-lg-2 footer-item">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-3')): ?>
            <?php endif;?>
        </div>
        <div class="col-md-4 text-center text-lg-start col-lg-3 footer-item">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-4')): ?>
            <?php endif;?>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="col-12 text-center">
            <p> &#169; 2022 MSM Shop. All rights reserved</p>
        </div>
    </div>
    </div>
</footer>
<?php wp_footer();?>
</body>
</html>