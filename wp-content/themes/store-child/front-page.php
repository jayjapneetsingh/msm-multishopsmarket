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
                    $shop =  wcfmmp_get_store($shop_id);
                    $url =  $shop->get_shop_url();
                    $banner = $shop->get_banner();
                    $shop_name = $shop->get_shop_name();
                    $shop_description = $shop->get_shop_description();
                   
                ?>
                    <div class="carousel-item <?php echo $i == 0 ? 'active' : '' ?>
                 ">
                        <a href="<?php echo $url; ?>">
                            <div class="carousal-img">
                                <?php if (empty($banner)) { ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dummy.jpeg; ?>" class="d-block w-100" alt="hero-banner">
                                <?php } ?>
                                <img src="<?php echo $banner; ?>" class="d-block w-100" alt="hero-banner">
                            </div>
                            <div class="carousel-caption d-block custom-container w-100">
                                <h1> Multishops Market</h1>
                                <h2><?php echo $shop_name; ?></h2>
                                <?php 
                                if(empty($shop_description)){
                                     echo '<p>Multiple Shops at one place<p>';
                                }
                                ?>
                                 <?php echo $shop_description;
                               ?>
                            </div>
                        </a>
                    </div>
                <?php $i++;
                endforeach ?>
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

        <!-- R -->
        <?php foreach ($meta_cat as $cat) : ?>
            <div class=" categories-container">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h3><?php echo $cat; ?></h3>
                    <a href="#" class="common-btn btn-yellow btn-viewall">View all</a>
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
                            $url = $store_user->get_shop_url();
                            if (empty($address)) {
                                $street1 = 'Haridwar';
                                $street2 = 'Haridwar';
                                $city = 'Haridwar';
                            }

                        ?>

                            <!-- IRE -->
                            <div class="swiper-slide">
                                <div class="card">
                                    <a href="<?php echo $url; ?>">
                                        <div class="card-img">
                                            <?php if (empty($banner_url)) { ?>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dummy.jpeg; ?>" class="d-block w-100" alt="hero-banner">
                                            <?php } ?>
                                            <img src="<?php echo $banner_url; ?>" alt="shop-profile">
                                        </div>
                                        <div class="card-body">
                                            <h4><?php echo     $store_user->get_shop_name() ?></h4>
                                            <p><?php echo $street1 . ',' . $street2 . ',' . $city ?></p>
                                        </div>
                                </div>
                                </a>
                            </div>
                        <?php endforeach; ?>

                        <!-- IRE -->
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <!-- RE -->
        <?php endforeach; ?>
    </section>

</main>
<!-- main-ends here -->
<!-- footer-starts here -->
<?php
get_footer();
