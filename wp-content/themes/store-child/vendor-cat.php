<?php

global $wpdb;

$vendor_cat = trim($_GET['vendor_category']);

$users = get_users(array(
    'meta_key' => 'store-category',
    'meta_value' => $vendor_cat,
));
echo '<div style = " display: flex;
flex-wrap: wrap;">';
foreach ($users as $user) {
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
    <div style="flex: 1 0 21%;  margin: 10px; height: 300px;">
        <a class="text-decoration-none" href="<?php echo wcfmmp_get_store_url($user->ID) ?>">
            <img style='height:200px; width:200px' src="<?php echo $banner_url ?>">
            <h1 class="text-primary "><?php echo $store_user->get_shop_name() ?></h1>
            <h3 class="bg-info text-white fs-2"><?php echo $street1 ?></h3>
            <h3 class="bg-secondary text-white fs-2"><?php echo $street2 . ', ' . $city ?></h3>
            <h3 class="bg-secondary text-white fs-2"><?php echo $state . ', ' . $country . ' - ' . $zip ?></h3>
        </a>
    </div>

<?php
}
echo '</div>';
?>