<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/blog.css">
<title><?= $result->Blog_Meta_Title; ?></title>
<? $image_name = str_replace('assets/blog/', '', $result->Blog_Image);
$image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
if ($image_name_webp == '') {
    $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
}
if ($image_name_webp == '') {
    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
}
?>
<meta name="keywords" content="<?= $result->Blog_Meta_Keyword; ?>">
<meta name="description" content="<?= $result->Blog_Meta_Description; ?>">

<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url(); ?>">
<meta property="og:title" content="<?= $result->Blog_Meta_Title; ?>">
<meta property="og:description" content="<?= $result->Blog_Meta_Description; ?>">
<meta property="og:image"
      content="<?= base_url(); ?><?= "assets/web-site/images/blog/whatsapp/" . $image_name_webp; ?>">
<meta property="og:image:width" content="300"/>
<meta property="og:image:height" content="300"/>

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= curr