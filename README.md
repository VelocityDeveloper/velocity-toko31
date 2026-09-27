Velocity Child Theme Paket Toko Online Toko 31
=================
[toko31.velocitydeveloper.com](https://toko31.velocitydeveloper.com/)

Child Theme for the Velocity System WordPress theme.

### Required
Theme Velocity versi 2.7.0 keatas, [Download](https://github.com/VelocityDeveloper/velocity/releases)

### Required Plugins
**VD Store**, [Download](https://github.com/Velocity-Developer/vd-store/releases) — produk `store_product`,
kategori `store_product_cat`, merek `brand`. Sejak 1.1.0 tema tidak lagi memakai plugin Velocity Toko
maupun Kirki.

Integrasi VD Store ada di `inc/vd-store.php`, `css/vd-store.css`, dan template override di folder
`vd-store/` (arsip, kategori, merek, detail produk). Pencarian situs diarahkan ke arsip produk.

| Velocity Toko (≤1.0.x) | VD Store (1.1.0) |
|---|---|
| `[harga]` | `[wp_store_price]` |
| `[beli]` | `[wp_store_add_to_cart]` |
| `[cart]` | `[wp_store_cart]` |
| `[profile]` | ikon ke halaman Profil Saya VD Store (`velocity_toko31_profil()`) |
| `[kontak]` | kontak dari pengaturan VD Store (`velocity_toko31_kontak()`) |
| `[thumbnail]` | `[wp_store_thumbnail]` (label & diskon dari VD Store) |
| `[slider-produk]` | `[wp_store_gallery]` |
| `[detail-produk]` | `[wp_store_product_info]` |
| `[love]` | `[wp_store_add_to_wishlist]` |
| `[beli-lain]` | `velocity_toko31_beli_lain()` |
| `[share]` | `[velocity-sharepost]` (Velocity Addons) |
| filter kategori | `[wp_store_filters]` |

### Beranda
Template **Home Template** (`page-home.php`): header gradien logo + Hotline + ikon keranjang/profil, menu oranye,
sidebar di KIRI, slider di kolom konten, judul "nama situs-tagline", 6 produk 3 kolom (gambar berbingkai warna tema,
harga di atas judul, tombol Detail + keranjang) berpaginasi, lalu 3 artikel gaya baris. Arsip kategori/merek: filter VD Store di kiri.

### Widget
Shortcode untuk widget Teks (susunan demo, dibaca installer lewat `velocity_tema_widget_sidebar()` / `velocity_tema_widget_footer()`):

- Sidebar (kiri): `[toko31_kategori]`, `[toko31_banner]` (tanpa judul), `[toko31_best_seller jumlah="5"]`, `[toko31_bank]`,
  `[toko31_sosmed facebook="…" twitter="…" instagram="…" youtube="…"]`
- Footer (4 kolom): `[toko31_kontak]`, `[toko31_testimoni]`, `[toko31_info_terbaru]`, `[toko31_ekspedisi]`
- Lainnya: `[toko31_cari_produk]`, `[toko31_produk_terbaru jumlah="5"]`, `[toko31_kalender]`, `[toko31_facebook url="…"]`

### Halaman
Halaman **Konfirmasi Pembayaran** = `[store_tracking]` (input nomor pesanan VD Store: tagihan, rekening, unggah bukti
transfer). Override tipis `vd-store/pages/tracking.php` membuat pencarian tetap di halaman tempat form dipasang.

### Customizer
Appearance > Customize > **Velocity Toko 31**: Warna (utama & sekunder; bawaan #f17012/#000000), Font (judul bawaan Oswald,
teks Poppins — Google Fonts), Slider Home (5 slot gambar), Velocity Hotline (kosong = nomor WhatsApp Pengaturan VD Store),
Banner Sidebar (gambar + tautan untuk widget `[toko31_banner]`; kosong = widget disembunyikan), Velocity Home News
(judul & kategori artikel beranda). Latar website: pengaturan Background tema induk. Logo: Site Identity.
Halaman Katalog & Profil Saya VD Store selalu tanpa sidebar.

### Usage
Simply download the zip and upload the zip (velocity-toko31.zip) under your WordPress dashboard at Appearance > Themes. Or extract and upload via FTP at wp-content/themes/.
