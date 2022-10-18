<?php get_header();?>

<div class="swiper firstSwiper">
      <div class="swiper-wrapper">
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
					  <div class="swiper-slide">
						  <img src="<?php echo $banner ?>">
					    <?php foreach ($store_user as $user): ?>
						    <h4><?php echo $user->store_name; ?></h4>
						 <?php endforeach;?>
				 </div>
				<?php endif;?>
		  <?php endforeach;?>
           <?php endforeach;?>

      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
</div>
<?php
if (have_rows('shop_repeater')):
    while (have_rows('shop_repeater')): the_row();
        $shop_category = get_sub_field('shop_category');
        $users = get_users(array(
            'meta_key' => 'store-category',
            'meta_value' => $shop_category,
        ));

        if ($users): ?>
						  <div class="swiper mySwiper ">
						  <h1><?php echo $shop_category . ' Shop' ?></h1>
						  <div class="swiper-wrapper">

						    <?php foreach ($users as $user):

            $user_id = $user->ID;
            $store_user = wcfmmp_get_store($user->ID);
            $banner = $store_user->get_list_banner();
            ?>
									 <div class="swiper-slide ">
									  <img src="<?php echo $banner ?>">
									  <?php foreach ($store_user as $user): ?>
									    <h4><?php echo $user->store_name; ?></h4>
									    <?php endforeach;?>

						  </div>
						  <?php endforeach;?>
			      </div>
			  <div class="swiper-button-next"></div>
			      <div class="swiper-button-prev"></div>
			</div>
			<?php endif;
endwhile;
endif;
get_footer();