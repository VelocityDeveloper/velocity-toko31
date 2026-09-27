<?php
/**
 * Override tipis template tracking VD Store: bila form tracking ([store_tracking]) dipasang di halaman selain
 * halaman Tracking (mis. Konfirmasi Pembayaran), pencarian nomor pesanan & unggah bukti transfer tetap di halaman
 * itu, tidak pindah ke /tracking-order/. Isi template tetap milik VD Store.
 */
defined('ABSPATH') || exit;

$velocity_toko31_halaman = is_page() ? (int) get_queried_object_id() : 0;
$velocity_toko31_lacak = absint(((array) get_option('wp_store_settings', []))['page_tracking'] ?? 0);
$velocity_toko31_tautan = null;
if ($velocity_toko31_halaman && $velocity_toko31_lacak && $velocity_toko31_halaman !== $velocity_toko31_lacak) {
    $velocity_toko31_tautan = function ($link, $id) use ($velocity_toko31_lacak, $velocity_toko31_halaman) {
        return (int) $id === $velocity_toko31_lacak ? get_permalink($velocity_toko31_halaman) : $link;
    };
    add_filter('page_link', $velocity_toko31_tautan, 10, 2);
}

require WP_STORE_PATH . 'templates/frontend/pages/tracking.php';

if ($velocity_toko31_tautan) {
    remove_filter('page_link', $velocity_toko31_tautan, 10);
}
