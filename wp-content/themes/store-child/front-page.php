<?php
/*
 ** Template Name: Test
*/
get_header();
?>

<?php

$usering = get_field('slider_carousel');
?>

<div class="swiper hero-slider">
    <div class="swiper-wrapper">
        <?php
          $count = 0;
            for ($i=0;$i<count($usering);$i++) {
        ?>
    <div class="swiper-slide" <?php if ($count==0) {
        echo "active";  }?> >

     <div class="slide-content">
        <img src="<?php echo get_the_post_thumbnail_url($usering[$i]->ID);?>">
      </div>
    </div>

  <?php
    $count++;
}?>
   
    </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
   </div>


<!-- // Varun Code -->
<div class="custom-container">
  <?php

   
        $electrical_post_selector=get_field('electrical_post_selector');

carausalGenerator($electrical_post_selector, 'Electrical');

$garments_post_selector=get_field('garments_post_selector');

carausalGenerator($garments_post_selector, 'Garments');

$mobile_post_selector=get_field('mobile_post_selector');

carausalGenerator($mobile_post_selector, 'Mobiles');

function carausalGenerator($acf_field, $cat_name)
{?>


  <div class="swiper mySwiper">

  <a href="<?php echo $cat_id; ?>" class="btn btn-primary btn-lg active align-self-baseline" role="button" aria-pressed="true">View All</a>

  <h1><?php echo $cat_name.'Shop'?></h1>

  <div class="swiper-wrapper">

<?php if($acf_field):

    foreach($acf_field as $key => $product_post):?>

<div class="swiper-slide per-view">
    
      <a href="<?php the_permalink(); ?>" ><img src='<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($product_post->ID), 'custom-size')[0]?>'></a>

<!-- Jay Code -->

   
  





    <a href="<?php the_permalink(); ?>" ><h3><?php echo $product_post->post_title ?></h3></a>

 <?php
      $vendor_id = get_post_field('post_author');

      $vendor = get_userdata($vendor_id);
        echo $vendor->user_nicename;
    ?>



</div>

<?php endforeach; ?>

<?php endif; ?>

</div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
 </div>


 <?php

} ?>
</div>
<?php get_footer();
