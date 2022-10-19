<?php
/*
 ** Template Name: front page
*/
get_header();

$args = array(
    'post_type' => array('page'),
    'post_status' => array('publish'),
    'meta_query' => array(
        array(
            'key' => 'vendor-cat',
        ),
    ),
);

$query = new WP_Query($args);
$post_id = $query->post->ID;
$meta = get_post_meta($post_id, 'vendor-cat');
$meta_cat = $meta[0];
$meta_shops = get_post_meta($post_id, 'vendor-shop');
$shops = $meta_shops[0];
?>



<!-- main-starts here -->
<main>
    <!-- herobanner-section-starts here -->
    <section class="herobanner-section">
        <div id="herobanner-slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $i = 0;
                foreach ($shops as $shop_id) :
                    $shop =  wcfmmp_get_store((int)$shop_id);
                    $url =  $shop->get_shop_url();
                    $banner = $shop->get_banner();
                    $shop_name = $shop->get_shop_name();
                    $shop_discription = $shop->get_shop_description();
                ?>

                    <div class="carousel-item <?php echo $i == 0 ? 'active' : '' ?>">
                        <a href=" <?php echo $url; ?>">
                            <img src="<?php echo $banner; ?>" class="d-block " alt="hero-banner">
                        </a>
                        <h2><?php echo $shop_name; ?></h2>
                    </div>
                <?php $i++;
                endforeach ?>
                <div class="hero-content text-center <?php echo $i == 0 ? 'active' : '' ?>">
                    <h1> Multishops Market</h1>
                    <h2><?php echo $shop_name; ?></h2>
                    <p><?php echo $shop_discription; ?></p>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#herobanner-slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#herobanner-slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!-- herobanner-section-ends here -->

    <section class="categories-section custom-container">
        <h2>Shops for you</h2>

        <!-- Repeat Categories-container Div start -->
        <?php foreach ($meta_cat as $cat) : ?>

            <div class=" categories-container">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3><?php echo $cat ?></h3>
                    <a href="<?php echo '?vendor_category='.trim($cat).'&type=vendor'?>"class="common-btn btn-yellow btn-sm">View all</a>
                </div>

                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $users = get_users(array(
                            'meta_key' => 'store-category',
                            'meta_value' => $cat,
                        ));
                        foreach ($users as $user) :
                            $store_user = wcfmmp_get_store($user->ID);
                            $address = $store_user->get_address();
                            $street1 = $address['street_1'];
                            $street2 = $address['street_2'];
                            $city = $address['city'];
                            $banner_url = $store_user->get_list_banner();
                        ?>

                            <!-- Inner Repeat starts -->

                            <div class="swiper-slide">
                                <a class="text-decoration-none" href="<?php echo wcfmmp_get_store_url($user->ID) ?>">
                                    <div class="card">
                                        <img src="<?php echo $store_user->get_list_banner()  ?>" class="card-img-top" alt="shop-profile">
                                        <div class="card-body">
                                            <h4><?php echo     $store_user->get_shop_name() ?>
                                            </h4>
                                            <p><?php echo $street1 . ',' . $street2 . ',' . $city ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <!-- Repeate Ends -->


                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
            <!-- Repeat Categories-container Div ends-->
        <?php endforeach; ?>



    </section>

</main>
<!-- main-ends here -->
<!-- footer-starts here -->
<?php
get_footer();
