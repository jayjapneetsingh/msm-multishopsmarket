
<footer style = "min-height:300px" class = " bg-dark text-white ">
        <div class = "container d-flex justify-content-between w-100">
                <div id="footer-widget-column-1">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-1')): ?>
                    <?php endif;?>
                </div>
                <div id="footer-widget-column-2">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-2')): ?>
                    <?php endif;?>
                </div>
                <div id="footer-widget-column-3">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-3')): ?>
                    <?php endif;?>
                </div>
                <div id="footer-widget-column-4">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-column-4')): ?>
                    <?php endif;?>
                </div>
        </div>
</footer>
<?php wp_footer();?>
</body>
</html>