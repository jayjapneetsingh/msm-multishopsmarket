<?php
/*
 *Template Name: front-page
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

?>

<div class="swiper firstSwiper h-50 " style='max-height: 400px'>
  <div class="swiper-wrapper">
    <?php
    $users = get_users(
      array('meta_key' => 'store_name')
    );
    foreach ($users as $user) :
      if ($user->caps['wcfm_vendor']) {
        $store_user = wcfmmp_get_store($user->ID);
        $address = $store_user->get_address();
        $street1 = $address['street_1'];
        $street2 = $address['street_2'];
        $city = $address['city'];
        $zip = $address['zip'];
        $country = $address['country'];
        $state = $address['state'];
        $banner_url = $store_user->get_list_banner();
    ?>
        <a class="text-decoration-none" href="<?php echo wcfmmp_get_store_url($user->ID) ?>">
          <div class="swiper-slide">
            <img style='height:400px' src="<?php echo $banner_url ?>">
        </a>
      <?php } ?>
      <div class="bg-warning">
        <h1 class="text-primary "><?php echo $store_user->get_shop_name() ?></h1>
        <h3><?php echo $street1 ?></h3>
        <h3><?php echo $street2 . ', ' . $city ?></h3>
        <h3><?php echo $state . ', ' . $country . ' - ' . $zip ?></h3>
      </div>
  </div>
<?php endforeach; ?>
</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>
<?php
foreach ($meta_cat as $cat) :
?>
  <div class="swiper mySwiper " style="margin-top:6rem">
    <h1 class="d-flex justify-content-between"><b><?php echo $cat ?></b><a href ="http://msm.test/wp-content/themes/store-child/hello.php" class='btn-primary text-decoration-none p-2 rounded-pill'>View All</a></h1>
    <div class="swiper-wrapper pt-4">
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
        $zip = $address['zip'];
        $country = $address['country'];
        $state = $address['state'];
        $banner_url = $store_user->get_list_banner();
      ?>
        <div class="swiper-slide ">
          <a class="text-decoration-none" href="<?php echo wcfmmp_get_store_url($user->ID) ?>">
            <img style='height:200px' src="<?php echo $banner_url ?>">
            <h1 class="text-primary "><?php echo $store_user->get_shop_name() ?></h1>
            <h3 class="bg-info text-white fs-2"><?php echo $street1 ?></h3>
            <h3 class="bg-secondary text-white fs-2"><?php echo $street2 . ', ' . $city ?></h3>
            <h3 class="bg-secondary text-white fs-2"><?php echo $state . ', ' . $country . ' - ' . $zip ?></h3>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

  </div>
<?php endforeach; ?>
<script>
  var swiper = new Swiper(".firstSwiper", {

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 30,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
<?php
get_footer();
?>