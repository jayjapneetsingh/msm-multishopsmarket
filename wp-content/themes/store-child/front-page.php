<?php
/*
 ** Template Name: Test
*/
get_header();
?>

    <!-- main-starts here -->
    <main>
        <!-- herobanner-section-starts here -->
        <section class="herobanner-section">
            <div id="herobanner-slider" class="carousel slide" data-bs-ride="carousel">
            
                <div class="carousel-inner">
                <?php
$multi_select = get_field('hero_slider');

foreach ($multi_select as $vendor_name):
    $users = get_users(array(
        'meta_key' => 'store_name',
        'meta_value' => $vendor_name,
    ));
    foreach ($users as $use):
        $store_user = wcfmmp_get_store($use->ID);
        $user_capability = get_user_meta($use->ID, 'ms_capabilities');
        if (!$user_capability[0]['administrator']):
            $banner = $store_user->get_list_banner();

            ?>
                    <div class="carousel-item <?php echo $i==0?'active':'';?>">
                        <img src="<?php echo $banner ?>" class="d-block  img-fluid" alt="hero-banner">
                    </div>
                  <?php $i++;
                     endif;
                   endforeach; ?>
                <?php endforeach; ?>
                    <div class="hero-content text-center">
                        <h1> Multishops Market</h1>
                        <h2>Multiple shops at one place </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Amet justo donec enim diam vulputate. Rutrum quisque non
                            tellus orci ac auctor augue mauris. Nulla facilisi etiam dignissim diam quis enim lobortis.
                            Laoreet non curabitur gravida arcu.</p>
                    </div>
                </div>

            

                <button class="carousel-control-prev" type="button" data-bs-target="#herobanner-slider"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#herobanner-slider"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- herobanner-section-ends here -->

        <section class="categories-section custom-container">
        <h2>Shops for you</h2>
        <?php
if (have_rows('shop_repeater')):
    while (have_rows('shop_repeater')): the_row();
        $shop_category = get_sub_field('shop_category');
        $users = get_users(array(
            'meta_key' => 'store-category',
            'meta_value' => $shop_category,
        ));

        if ($users): ?>
            <div class=" categories-container">
    <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3><?php echo $shop_category . ' Shop' ?></h3>
                    <a href="#" class="common-btn btn-yellow btn-sm">View all</a>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

						    <?php foreach ($users as $user):
                            $user_id = $user->ID;
                            $store_user = wcfmmp_get_store($user->ID);
                            $banner = $store_user->get_list_banner();
                            ?>

                        <div class="swiper-slide">
                            <div class="card">
                                <img src="<?php echo $banner ?>" class="card-img-top" alt="shop-profile">
                                <div class="card-body">
                                   <?php foreach ($store_user as $user): ?>
                                    <h4><?php echo $user->store_name; ?></h4>
                                    <?php endforeach;?>
                                    <p>Shivalik Nagar, R Cluster, Haridwar</p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <?php endif;
endwhile;
endif;?>
            </section>

    </main>
    <!-- main-ends here -->
    <!-- footer-starts here -->
<?php
get_footer();?>
            