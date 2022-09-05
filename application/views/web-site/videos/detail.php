<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/blog.css">
<title><?= $result->title; ?></title>

<meta name="keywords" content="<?= $result->title; ?>">
<meta name="description" content="
  <? if ($this->uri->segment(2) == "Turkish-Citizenship-by-Real-Estate-Investment-Prime-Talks-Ep4"): ?>
    The Turkish government has recently made changes to the Turkish Citizenship by Investment Program, by changing the minimum amount of investment from $250,000 USD to $400,000 USD in Turkish Real Estate.
  <? else:
    echo strip_tags($result->description);
  endif; ?>
">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url(); ?>">
<meta property="og:title" content="<?= $result->title; ?>">
<meta property="og:description" content="<?= strip_tags($result->description); ?>">
<meta property="og:image" content="<?= base_url(); ?>assets/web-site/images/youtube-cover/<?= $result->cover_image; ?>">
<meta property="og:image:width" content="300"/>
<meta property="og:image:height" content="300"/>

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= current_url(); ?>">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="<?= $result->title; ?>">
<meta name="twitter:title" content="<?= $result->title; ?>">
<meta name="twitter:description" content="<?= strip_tags($result->description); ?>">
<meta name="twitter:image"
      content="<?= base_url(); ?><?= "assets/web-site/images/youtube-cover/" . $result->cover_image; ?> ">
<link rel="canonical" href="<?= base_url(); ?>prime-videos/<?= $result->url_slug; ?>"/>

<style type="text/css">
    .social-share ul li {
        border: none;
        padding: 2%;
    }

    #blog_detail_content img {
        width: 100% !important;
    }

    #blog_detail_content p span {
        font-family: 'Open Sans' !important;
    }

    #blog_detail_content p {
        font-family: 'Open Sans' !important;
    }

    #blog_detail_content iframe {
        width: 100% !important;
        height: 380px !important;
    }

    #blog_detail_content h2 {
        font-size: 16px !important;
        font-weight: bold !important;
    }

    #blog_detail_content h3 {
        font-size: 14px !important;
        font-weight: bold !important;
    }

    @media screen and (max-width: 430px) {

        #blog_detail_content iframe {
            height: 210px !important;
        }
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="bread-crumbs">
        <div class="container">
            <div class="row">
                <div class="col red-text py-3 text-center text-md-left">
                    <span class="mx-2">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="mx-2">
                        <a href="<?= base_url(); ?>blog" class="red-text" rel="nofollow">
                           Videos
                        </a>
                    </span>
                    <span class="mx-2">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="mx-2">
                        <a class="red-text" rel="nofollow">
                          <?= $result->title; ?>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <section id="room-brief">
        <div class="container">
            <div class="row">
                <div class="col-md-9 text-center text-md-left py-2">
                    <div class="head text-center text-md-left py-2">
                        <h1 style="font-size: 1.6rem;font-weight: bold"><?= $result->title; ?></h1>
                    </div>
                    <div class="sub-head text-center text-md-left">
                        <span class="red-text">
                            <i class="far fa-clock"></i>
                        </span>
                        <span class="red-text font-weight-bold"> Created :  </span>
                        <span class="font-weight-bold">
                           <? $unix_time = mysql_to_unix($result->insertDate);
                           $date_string = '%d %M %Y';
                           echo mdate($date_string, $unix_time);
                           ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-3 buttons py-2">
                    <div class="row justify-content-center justify-content-md-end">
                        <div class="col-4" style="cursor: pointer">
                            <a data-toggle="modal" data-target="#ShareModal" class="text-center" rel="nofollow">
                                <span class="ico d-block">
                                    <i class="fas fa-share-alt fa-2x"></i>
                                </span>
                                <span class="text d-block">
                                    Share
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-lg-8 details">
                    <div class="card my-2">
                        <div class="card-body">

                            <iframe style="width: 100% !important;" height="450" loading="lazy"
                                    src="https://www.youtube.com/embed/<?= $result->url; ?>"
                                    title="<?= $result->title; ?>" frameborder="0" allowfullscreen></iframe>

                            <div class="px-4 py-2" id="blog_detail_content">
                                <p class="m-3 px-3 content text-justify" style="line-height: 1.7rem">
                                    <? if ($this->uri->segment(2) == "Turkish-Citizenship-by-Real-Estate-Investment-Prime-Talks-Ep4"): ?>
                                        The Turkish government has recently made changes to the Turkish Citizenship by Investment Program, by changing the minimum amount of investment from $250,000 USD to $400,000 USD in Turkish Real Estate.
                                        <br>
                                        The changes have been implemented as continued growth and interest in buying property in Turkey has doubled over the past few years.
                                        <br>
                                        Buyers from countries such as US, Canada, UK, UAE, Israel, India, Pakistan, China, and Russia have continued to favor the Turkish Citizenship program over other investment opportunities due to its affordability and ease of doing business.
                                        <br>
                                        Additionally, the past year has seen Turkish properties bring growth returns in some cases up to 400%.
                                        <br>
                                        While we know the Turkish Real Estate market has been growing alongside the North American and European markets over the past 12 months, Turkey has continually seen surging ROI (Return on Investment) and interest.
                                        <br>
                                        Lastly, due to the housing demand and lack of available rental units, clients have experienced higher than average rental returns exceeding upwards of 8% per-annum in many cases.
                                        <br><br>
                                        <a href="https://www.primepropertyturkey.com/Citizenship-by-investment-in-turkey"
                                           target="_blank" class="font-weight-bold">Please have a look at our
                                            Citizenship by Investment page for more program specifics and details here:
                                            Citizenship By Investment In Turkey</a>
                                        <br>
                                        <br>
                                        This episode was filmed in <strong>Prime Property Turkey’s Istanbul
                                            office</strong> and is presented by <strong> Justin
                                            Mays </strong>, Co-founder of Prime Property Turkey.
                                        <br>
                                        Justin gives you the basic tips for a safe and secure purchase, as well as including Rules, Regulations, Eligibility Criteria, Required Documentation and some of the pitfalls when buying a property with Turkish Citizenship as the main priority.
                                    <? else : ?>
                                        <?= $result->description; ?>
                                    <? endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php $this->load->view('web-site/includes/side-prime-talk'); ?>
                    <?php $this->load->view('web-site/includes/side-prime-walks'); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="modal fade" id="ShareModal" tabindex="-1" aria-labelledby="share-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="share-modal-label">Share Property In Social Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body social-share">
                <ul class="list-group list-group-horizontal-sm justify-content-center align-items-center">
                    <li class="list-group-item">
                        <a rel="nofollow"
                           href="https://www.facebook.com/sharer.php?u=<?= current_url(); ?>&t=<?= $result->title; ?>&p=<?= base_url(); ?>assets/web-site/images/youtube-cover/<?= $result->cover_image; ?>"
                           target="_blank" class="btn btn-primary btn-block">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow"
                           href="https://twitter.com/intent/tweet?text=<?= current_url(); ?><?= substr(strip_tags($result->description), 0, 200); ?>"
                           target="_blank" class="btn btn-info btn-block">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow"
                           href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= current_url(); ?>&amp;title=<?= $result->title; ?>&amp;ro=false&amp;summary=<?= strip_tags($result->description); ?>&amp;source="
                           target="_blank" class="btn btn-primary btn-block">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow"
                           href="https://pinterest.com/pin/create/button/?url=<?= current_url(); ?>&amp;description=<?= strip_tags($result->description); ?>"
                           target="_blank" class="btn btn-danger btn-block">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow" href="https://www.instagram.com/primepropertyturkey/" target="_blank"
                           class="btn btn-danger btn-block">
                            <i class="fab fa-instagram"></i>
                        </a></li>
                    <li class="list-group-item">
                        <a rel="nofollow" href="https://api.whatsapp.com/send?text=<?= current_url(); ?>"
                           target="_blank" class="btn btn-success btn-block">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
</body>
</html>