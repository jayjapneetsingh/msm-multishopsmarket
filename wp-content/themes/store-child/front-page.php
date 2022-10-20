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
                <?php for($i=0;$i<3;$i++){?>
                <div class="carousel-item <?php echo $i == 0 ?'active':''?>
                 ">
                    <a href="#">
                        <div class="carousal-img">
                            <img src="/wp-content/themes/store-child/assets/img/hero-banner.png" class="d-block "
                                alt="hero-banner">
                        </div>
                        <div class="carousel-caption d-block custom-container w-100">
                            <h1> Multishops Market</h1>
                            <h2>Multiple shops at one place </h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut
                                labore et dolore magna aliqua. Amet justo donec enim diam vulputate. Rutrum quisque non
                                tellus orci ac auctor augue mauris. Nulla facilisi etiam dignissim diam quis enim
                                lobortis.
                                Laoreet non curabitur gravida arcu.</p>
                        </div>
                    </a>
                </div>
                <?php }?>
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

        <div class=" categories-container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h3>Mobile Shops</h3>
                <a href="#" class="common-btn btn-yellow btn-viewall">View all</a>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <a href="#">
                                <div class="card-img">
                                    <img src="/wp-content/themes/store-child/assets/img/card.png" alt="shop-profile">
                                </div>
                                <div class="card-body">
                                    <h4>Cell Phone Universe</h4>
                                    <p>Shivalik Nagar, R Cluster, Haridwar</p>
                                </div>
                        </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/card.png" class="card-img-top"
                                    alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/card.png" class="card-img-top"
                                    alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/card.png" class="card-img-top"
                                    alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/card.png" class="card-img-top"
                                    alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/card.png" class="card-img-top"
                                    alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/card.png" class="card-img-top"
                                    alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/card.png" class="card-img-top"
                                    alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/card.png" class="card-img-top"
                                    alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <!-- mobile-shops-slider-ends-here -->
        <div class=" categories-container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h3>Electronic Shops</h3>
                <a href="#" class="common-btn btn-yellow btn-viewall">View all</a>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </div>
        <div class=" categories-container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h3>garment Shops</h3>
                <a href="#" class="common-btn btn-yellow btn-viewall">View all</a>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img">
                                <img src="/wp-content/themes/store-child/assets/img/electronic-shops.png"
                                    class="card-img-top" alt="shop-profile">
                            </div>
                            <div class="card-body">
                                <h4>Cell Phone Universe</h4>
                                <p>Shivalik Nagar, R Cluster, Haridwar</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </div>
    </section>

</main>
<!-- main-ends here -->
<!-- footer-starts here -->
<?php
get_footer();