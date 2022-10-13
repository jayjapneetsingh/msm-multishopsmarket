<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <title>multishop market</title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid custom-container">
                <a class="brand-logo" href="#"><img src="wp-content/themes/store-child/img/Group 3983.svg"
                        alt="brand-logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">about us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">store list</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">contact us</a>
                        </li>

                    </ul>
                    <form class="d-flex me-auto">
                        <input class="form-control me-2" type="search" placeholder="Search products and shops"
                            aria-label="Search">
                        <a href="#"><img src="wp-content/themes/store-child/img/Icon-search.svg" alt=search-logo"></a>
                    </form>

                    <div class="btn-group">
                        <a href="#" class="common-btn btn-red"> Login</a>
                        <a href="#" class="common-btn btn-yellow "> Become a seller</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div id="herobanner-slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="wp-content/themes/store-child/img/hero-banner.png" class="d-block " alt="hero-banner">
                </div>
                <div class="carousel-item">
                    <img src="wp-content/themes/store-child/img/hero-banner.png" class="d-block " alt="hero-banner">
                </div>
                <div class="carousel-item">
                    <img src="wp-content/themes/store-child/img/hero-banner.png" class="d-block " alt="hero-banner">
                </div>

                <div class="hero-content">
                    <h1> </h1>
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
    </main>
</body>

</html>