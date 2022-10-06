<?php
/* Template Name: Vendor Garments */
global $wpdb;
$vendors_id = $wpdb->get_results("SELECT user_id FROM `wp_usermeta` WHERE meta_value = 'Garments'");
$i = 0;
foreach ($vendors_id as $vendor) {
    $v = $wpdb->get_results("SELECT user_nicename FROM `wp_users` WHERE ID = '$vendor->user_id'");
    $stores_name[$i] = $v[0]->user_nicename;
    $i++;
}
echo '<ul>';
foreach ($stores_name as $store) {
    ?>
    <li>
     <a href="<?php site_url()?>/store/<?php echo $store ?> "><?php echo $store ?></a>
    </li>
     <?php
}
echo '<ul>';
?>
