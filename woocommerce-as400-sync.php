<?php
/**
 * Plugin Name: WooCommerce AS400 Sync
 * Plugin URI: https://github.com/Marcocerweb01/woocommerce-as400-sync
 * Description: Sincronizzazione automatica prodotti WooCommerce da gestionale AS400
 * Version: 1.0.0
 * Author: Marco
 * Text Domain: wc-as400-sync
 * Requires at least: 5.0
 * Requires PHP: 7.4
 * WC requires at least: 4.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('WC_AS400_SYNC_VERSION', '1.0.0');
define('WC_AS400_SYNC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WC_AS400_SYNC_PLUGIN_URL', plugin_dir_url(__FILE__));

// Check if WooCommerce is active
if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    add_action('admin_notices', 'wc_as400_sync_woocommerce_missing_notice');
    return;
}

function wc_as400_sync_woocommerce_missing_notice() {
    echo '<div class="error"><p>WooCommerce AS400 Sync richiede WooCommerce per funzionare.</p></div>';
}

require_once WC_AS400_SYNC_PLUGIN_DIR . 'includes/class-wc-as400-sync.php';
require_once WC_AS400_SYNC_PLUGIN_DIR . 'includes/class-wc-as400-ftp-reader.php';
require_once WC_AS400_SYNC_PLUGIN_DIR . 'includes/class-wc-as400-product-sync.php';
require_once WC_AS400_SYNC_PLUGIN_DIR . 'includes/class-wc-as400-logger.php';

function wc_as400_sync_init() {
    $GLOBALS['wc_as400_sync'] = WC_AS400_Sync::instance();
}
add_action('plugins_loaded', 'wc_as400_sync_init');

register_activation_hook(__FILE__, 'wc_as400_sync_activate');
function wc_as400_sync_activate() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'wc_as400_sync_logs';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        sync_date datetime DEFAULT CURRENT_TIMESTAMP,
        sync_type varchar(50) NOT NULL,
        products_added int(11) DEFAULT 0,
        products_updated int(11) DEFAULT 0,
        products_deleted int(11) DEFAULT 0,
        errors text,
        status varchar(20) DEFAULT 'success',
        execution_time float DEFAULT 0,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    if (!wp_next_scheduled('wc_as400_sync_cron')) {
        wp_schedule_event(time(), 'twicedaily', 'wc_as400_sync_cron');
    }
}