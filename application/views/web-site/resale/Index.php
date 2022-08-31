<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/find-property.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/cities-property.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">

<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<title>Turkish Properties Resale Advertises
    | Prime Property Turkey</title>
<link rel="canonical" href="<?= current_url(); ?>"/>
<meta name="description"
      content="Prime Property Turkey the best place to search for Turkish Properties, offers best deals for Istanbul real estate and some of the most attractive offers in Fethiye , Kalkan , Kas , Gocek">


<style type="text/css">
    .sold-out {
        position: absolute;
        top: 40px;
        left: 20px;
        background-color: red;
        padding: 3px;
        color: white;
        font-size: 0.8rem;
        font-weight: bold;
        border-radius: 5px;
        opacity: 0.85;
    }

    .sold-out-badge {
        position: absolute;
        top: 40px;
        left: 5px;
        font-size: 0.7rem;
        font-weight: bold;
        color: white;
        background-color: red;
        padding: 5px;
        border-radius: 5px;
        opacity: 0.85;
    }

    .is_commercial {
        position: absolute;
        left: 20px;
        top: 50px;
        background-color: #012169;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 0.7rem;
        font-weight: bold;
        color: white;
        opacity: 0.85;
    }

    .is_commercial-badge {
        background: #012169;
        color: white;

        border-radius: 10px;
        display: block;
        position: absolute;

        opacity: 0.95;
        font-weight: bold;
        font-size: 0.8rem;
        padding: 5px 10px;
        top: 8%;
        left: 3%;
    }
</style>
</head>
<? if (isset($page_id)) {
    $page_id = $page_id;
} else {
    $page_id = 0;
} ?>
<body>

<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="theme-background">
        <div class="header-image-wrapper">
            <div class="bg" id="search-property-BG"></div>
            <div class="mask"></div>
            <div class="header-image-content offset-bottom">
                <h1 class="title text-center px-1 font-weight-bold">Turkish Properties Resale Advertises</h1>
            </div>
        </div>
    </section>
    <section id="Find-Your-Property" class="Find-Your-Property m-3">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center my-2 py-3">
                <div class="find-title">
                    <small>
                        <span class="pre">
                          Find
                        </span>
                        <span class="pro red-text">
                            Resale
                        </span>
                        <span class="pre">
                          properties
                        </span>
                    </small>
                </div>
                <div class="find-form">
                    <form action="<?= base_url(); ?>Find" method="post"
                          class="justify-content-around text-right">
                        <div class="row my-2 justify-content-around text-right">
                            <div class="col-lg-2 my-1" id="City">
                                <select name="City" id="city_value" class="form-control">
                                    <option value="All" selected>City</option>
                                    <option value="All">All</option>
                                    <? foreach ($cityNames as $value) { ?>
                                        <option value="<?= $value; ?>"><?= $value; ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-lg-1 my-1" id="Type">
                                <select name="Type" id="property_type" class="form-control ">
                                    <option value="All" selected>Type</option>
                                    <option value="All">All</option>
                                    <? foreach ($ProType as $value) { ?>
                                        <option value="<?= $value; ?>"><?= $value; ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-lg-2 my-1" id="min_price">
                                <select name="min_price" class="form-control ">
                                    <option value="min" selected>Min Price</option>
                                    <option value="min">0</option>
                                    <option value="100000">&#36; 100.000</option>
                                    <option value="150000">&#36; 150.000</option>
                                    <option value="200000">&#36; 200.000</option>
                                    <option value="250000">&#36; 250.000</option>
                                    <option value="300000">&#36; 300.000</option>
                                    <option value="500000">&#36; 500.000</option>
                                    <option value="1000000">&#36; 1 M</option>
                                </select>
                            </div>
                            <div class="col-lg-2 my-1" id="max_price">
                                <select class="form-control" name="max_price">
                                    <option value="5000000" selected>Max Price</option>
                                    <option value="100000">&#36; 100.000</option>
                                    <option value="150000">&#36; 150.000</option>
                                    <option value="200000">&#36; 200.000</option>
                                    <option value="250000">&#36; 250.000</option>
                                    <option value="300000">&#36; 300.000</option>
                                    <option value="500000">&#36; 500.000</option>
                                    <option value="1000000">&#36; 1 M</option>
                                    <option value="5000000">&#36; 1 M+</option>
                                </select>
                            </div>
                            <div class="col-lg-2 my-1" id="bedroom">
                                <select class="form-control" name="bedroom" id="property_bed">
                                    <option value="All" selected>Bedrooms</option>
                                    <? foreach ($proBed as $value) { ?>
                                        <option value="<?= $value; ?>"><?= $value; ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-lg-2 my-1">
                                <input type="text" placeholder="Reference id" class="form-control" name="referenceID">
                            </div>
                            <div class="col-lg-1 justify-content-center my-1">
                                <input type="submit" class="btn red-button btn-block" value="SEARCH">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="about-city">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="card py-3 city-card">
                        <div class="car-body py-2 px-1">
                            <h1 class="text-center py-3 px-2">
                                Properties For ReSale In Turkey
                            </h1>
                            <div class="border"></div>
                            <p class="px-3 pt-2 text-justify">
                                Prime Property Turkey is here to give you an opportunity to advertise and sell your
                                property. We are an acclaimed property consultancy that has sold hundreds of new and
                                resale properties around Turkey. Upload your apartments, duplexes, villas, mansions, and
                                various other property types you want to sell on our user-friendly portal. All you have
                                to do is insert the location of your property, its price, discount details, facilities,
                                quality pictures, and all property specifications. Make use of our platform to sell your
                                property and let our sales agents help you sell at a price that will make both the
                                seller and buyer happy.

                            </p>
                            <div id="collapse">
                                <p class="px-3 text-justify">
                                    As users, you have the availability to add your property and after it is validated
                                    by Prime Property Turkey agents, it will be posted on your website for free. This
                                    platform will give you the ability to add your property, edit, sell and delete your
                                    advertisement whenever you want. Get in touch with us for more information.
                                </p>
                            </div>

                                <button class="py-1 px-3 pb-3" id="read-more">
                                    Read More
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="content" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <? foreach ($property_result as $value) { ?>
                        <?
                        $this->load->model('Resale_Model');
                        $property_image_gallery = $this->Resale_Model->get_resale_gallery($value->id);
                        $IIG = array();
                        foreach ($property_image_gallery as $imageValue) {
                            $image_name = $imageValue;
                            break;
                        }
                        $image_name = str_replace('.jpg', '.webp', $image_name->image); ?>
                        <div class="item mt-2 mb-4">
                            <div class="card d-md-none feature-sm-back">
                                <a href="<?= base_url(); ?>Resale/<?= $value->url_slug; ?>">

                                    <img class="card-img-top img-fluid"
                                         src="<?= base_url(); ?><?= "assets/web-site/images/resales/webps/" . $image_name; ?>"
                                         alt="<?= $value->title; ?>"
                                    >
                                </a>
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $value->kind; ?>
                                            </span>
                                            <? if ($value->SoldOut) { ?>
                                                <span class="sold-out-badge">
                                                      Sold Out
                                                    </span>
                                            <? } ?>
                                            <a href="<?= base_url(); ?>Resale/<?= $value->url_slug; ?>"
                                               class="text-reset text-left property-title font-weight-bold px-2 py-2 d-block blue-text">
                                                <h3 style="font-size: 1.1rem;line-height: 1.8rem">
                                                    <?= $value->title; ?>
                                                </h3>
                                            </a>
                                        </div>
                                        <div class="row justify-content-around align-items-center card-speciality mx-1">
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                     alt=""
                                                     class="img-fluid">
                                                <span class="mx-1"> <?= $value->location; ?></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                     alt=""
                                                     class="img-fluid">
                                                <span class="mx-1"><?= $value->bedroom; ?></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                     alt=""
                                                     class="img-fluid">
                                                <span class="mx-1"><?= $value->bathroom; ?></span>
                                            </div>
                                            <div class="align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                     alt="" class="img-fluid"
                                                >
                                                <span><?= $value->living_space; ?></span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center my-2" style="font-size: 1.2rem">
                                            <span class="red-text font-weight-bold">
                                          <? if (!$value->SoldOut and $value->price != 0) { ?>
                                              <? if ($this->session->has_userdata('currency')) {
                                                  switch ($this->session->userdata('currency')) {
                                                      case 'USD': ?>
                                                          <i class="fas fa-dollar-sign"></i>
                                                          <?= number_format($value->price); ?>
                                                          <?
                                                          break;
                                                      case 'TRY': ?>
                                                          <i class="fas fa-lira-sign"></i>
                                                          <?= number_format($value->price * $currency_exchange_data->try); ?>

                                                          <?
                                                          break;
                                                      case 'EUR': ?>
                                                          <i class="fas fa-euro-sign"></i>
                                                          <?= number_format($value->price * $currency_exchange_data->euro); ?>
                                                          <?
                                                          break;
                                                      case 'GBP': ?>
                                                          <i class="fas fa-pound-sign"></i>
                                                          <?= number_format($value->price * $currency_exchange_data->gpt); ?>
                                                          <?
                                                          break;
                                                  }
                                              } else { ?>
                                                  <i class="fas fa-dollar-sign"></i>
                                                  <?= number_format($value->price); ?>
                                              <? }
                                          } else {
                                              echo "Contact Us";
                                          }
                                          ?>
                                            </span>
                                        </div>
                                        <div class="row my-2">
                                            <p class="text-left px-4">
                                                <?= substr(strip_tags($value->description), 0, 200) . "...."; ?>
                                            </p>
                                        </div>
                                        <div class="row justify-content-around align-items-center py-2">
                                            <a href="<?= base_url(); ?>Resale/<?= $value->url_slug; ?>"
                                               class="btn btn-outline-danger btn-sm  d-flex my-1">
                                                View Details
                                            </a>
                                            <a class="btn btn-danger btn-sm d-flex font-weight-bold my-1"
                                               data-toggle="modal"
                                               data-whatever="<?= $value->referenceID; ?>"
                                               data-target="#quickEnquireModal" rel="nofollow">
                                                Quick Enquiry
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card d-none d-md-block">
                                <div class="card-body">
                                    <div class="row justify-content-around">
                                        <div class="col-5 d-flex">
                                            <a href="<?= base_url(); ?>Resale/<?= $value->url_slug; ?>">

                                                <img
                                                        src="<?= base_url(); ?><?= "assets/web-site/images/resales/webps/" . $image_name; ?>"
                                                        alt="<?= $value->title; ?>"
                                                        class="img-fluid"
                                                >
                                            </a>
                                            <div class="type">
                                                <?= $value->kind; ?>
                                            </div>
                                            <? if ($value->SoldOut) { ?>
                                                <div class="sold-out">
                                                    Sold Out
                                                </div>
                                            <? } ?>
                                        </div>
                                        <div class="col-7">
                                            <div class="row my-3 justify-content-center px-4 text-center property-title ">
                                                <a href="<?= base_url(); ?>Resale/<?= $value->url_slug; ?>"
                                                   class="text-reset font-weight-bold text-left blue-text ">
                                                    <h3 style="font-size: 1.1rem;line-height: 1.8rem">
                                                        <?= $value->title; ?>
                                                    </h3>
                                                </a>
                                            </div>
                                            <div class="row my-2 justify-content-center align-items-center card-speciality">
                                                <div class="d-flex align-items-center mx-2">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                         alt=""
                                                         class="img-fluid">
                                                    <span class="mx-1">
                                                        <?= $value->location; ?>
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center mx-2">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                         alt=""
                                                         class="img-fluid">
                                                    <span class="mx-1"><?= $value->bedroom; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center mx-2">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                         alt=""
                                                         class="img-fluid">
                                                    <span class="mx-1"><?= $value->bathroom; ?></span>
                                                </div>
                                                <div class="align-items-center mx-2">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                         alt="" class="img-fluid">
                                                    <span class="mx-1"><?= $value->living_space; ?></span>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center my-3" style="font-size: 1.2rem">
                                            <span class="red-text font-weight-bold">
                                              <? if (!$value->SoldOut and $value->price != 0) { ?>
                                                  <? if ($this->session->has_userdata('currency')) {
                                                      switch ($this->session->userdata('currency')) {
                                                          case 'USD': ?>
                                                              <i class="fas fa-dollar-sign"></i>
                                                              <?= number_format($value->price); ?>
                                                              <?
                                                              break;
                                                          case 'TRY': ?>
                                                              <i class="fas fa-lira-sign"></i>
                                                              <?= number_format($value->price * $currency_exchange_data->try); ?>

                                                              <?
                                                              break;
                                                          case 'EUR': ?>
                                                              <i class="fas fa-euro-sign"></i>
                                                              <?= number_format($value->price * $currency_exchange_data->euro); ?>
                                                              <?
                                                              break;
                                                          case 'GBP': ?>
                                                              <i class="fas fa-pound-sign"></i>
                                                              <?= number_format($value->price * $currency_exchange_data->gpt); ?>
                                                              <?
                                                              break;
                                                      }
                                                  } else { ?>
                                                      <i class="fas fa-dollar-sign"></i>
                                                      <?= number_format($value->price); ?>
                                                  <? }
                                              } else {
                                                  echo "Contact Us";
                                              }
                                              ?>
                                            </span>
                                            </div>
                                            <div class="row my-2 px-2">
                                                <p class="text-justify-all mx-3 px-1">
                                                    <?= substr(strip_tags($value->description), 0, 200) . "...."; ?>
                                                </p>
                                            </div>
                                            <div class="row justify-content-end align-items-center my-2 buttons">
                                                <a href="<?= base_url(); ?>Resale/<?= $value->url_slug; ?>"
                                                   class="btn btn-outline-danger d-flex my-1 mx-1">
                                                    View Details
                                                </a>
                                                <a class="btn btn-danger font-weight-bold d-flex my-1 mx-3"
                                                   data-toggle="modal"
                                                   data-whatever="<?= $value->referenceID; ?>"
                                                   data-target="#quickEnquireModal" rel="nofollow">
                                                    Quick Enquiry
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                    <? if ($pages > 0) { ?>
                        <div class="row py-3 px-1 text-center justify-content-center">
                            <div class="col">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" rel="nofollow" href="<?= base_url(); ?>Resale"
                                               tabindex="-1" title="FIRST"> <i
                                                        class="fas fa-angle-double-left"></i> </a>
                                        </li>
                                        <? if ($page_id < 2) { ?>
                                            <? for ($i = 0; $i <= $page_id + 3; $i++) { ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                         rel="nofollow"
                                                                                         href="<?= base_url(); ?>Resale/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link" rel="nofollow"
                                                                             href="<?= base_url(); ?>Resale/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } elseif ($page_id > $pages - 2) { ?>
                                            <? for ($i = (int)$page_id - 2; $i <= $pages; $i++) { ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                         rel="nofollow"
                                                                                         href="<?= base_url(); ?>Resale/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link" rel="nofollow"
                                                                             href="<?= base_url(); ?>Resale/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } else { ?>
                                            <? for ($i = (int)$page_id - 2; $i <= $page_id + 2; $i++) { ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                         href="<?= base_url(); ?>Resale/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link" rel="nofollow"
                                                                             href="<?= base_url(); ?>Resale/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } ?>
                                        <li class="page-item">
                                            <a class="page-link" rel="nofollow"
                                               href="<?= base_url(); ?>Resale/<?= $pages; ?>" title="LAST"> <i
                                                        class="fas fa-angle-double-right"></i> </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <? } ?>
                </div>
                <div class="col-lg-4">
                    <div class="card side contact my-2" id="side-contact-us">
                        <?php $this->load->view('web-site/includes/side-contact-us'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal -->
<div class="modal fade" id="quickEnquireModal" tabindex="-1" aria-labelledby="quickEnquireModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="quickEnquireModalLabel">PROPERTY ENQUIRY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url(); ?>Post/enquire" id="enquiry"
                      onsubmit="return checkPhone();">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name:" required form="enquiry"
                                       name="info">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="modal_phone" class="form-control" placeholder="Phone"
                                       name="phone" form="enquiry" required>
                                <span id="modal_phone_error" style="display: none;color: white;font-size: 0.7rem;"
                                      class="text-center">
                                            Please fill country code with + at beginning
                                    </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email:" name="email"
                                       form="enquiry" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control"
                                          placeholder="Note" form="enquiry"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="reference_id" id="modal_reference_id" form="enquiry">
                <input type="submit" class="btn red-button btn-block" form="enquiry">
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript">
    $('#quickEnquireModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
        var modal = $(this);
        modal.find('#modal_reference_id').val(recipient)
    });

    function checkPhone() {
        let phone_number = document.getElementById('modal_phone').value;
        if (phone_number.charAt(0) != '+') {
            document.getElementById('modal_phone').focus();
            document.getElementById('modal_phone_error').style.display = 'block';
            return false;
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#city_value').change(function () {
            let City = $(this).val();
            if (City != 'All') {
                $.ajax({
                    url: '<?=base_url()?>AjaxRequest/propertyType',
                    method: 'post',
                    data: {City: City},
                    dataType: 'json',
                    success: function (response) {
                        $('#property_type').text('');
                        $('#property_type').append($('<option>', {
                            value: 'All',
                            text: 'Type'
                        }));
                        $('#property_type').append($('<option>', {
                            value: 'All',
                            text: 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_type').append($('<option>', {
                                value: item.Property_type,
                                text: item.Property_type
                            }));
                        });
                    }
                });
                $.ajax({
                    url: '<?=base_url()?>AjaxRequest/propertyBed',
                    method: 'post',
                    data: {City: City},
                    dataType: 'json',
                    success: function (response) {
                        $('#property_bed').text('');
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text: 'Bedrooms'
                        }));
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text: 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_bed').append($('<option>', {
                                value: item.Property_Bedrooms,
                                text: item.Property_Bedrooms
                            }));
                        });
                    }
                });
            } else {
                $('#property_type').text('');
                $('#property_type').append($('<option>', {
                    value: 'All',
                    text: 'Type'
                }));
                $('#property_type').append($('<option>', {
                    value: 'All',
                    text: 'All'
                }));
                <? foreach ($ProType as $value){ ?>
                $('#property_type').append($('<option>', {
                    value: '<?= $value; ?>',
                    text: '<?= $value; ?>'
                }));
                <? } ?>
                $('#property_bed').text('');
                $('#property_bed').append($('<option>', {
                    value: 'All',
                    text: 'Bedrooms'
                }));
                $('#property_bed').append($('<option>', {
                    value: 'All',
                    text: 'All'
                }));
                <? foreach ($proBed as $value){ ?>
                $('#property_bed').append($('<option>', {
                    value: '<?= $value; ?>',
                    text: '<?= $value; ?>'
                }));
                <? } ?>
            }
        });
        $('#property_type').change(function () {
            let pro_type = $(this).val();
            let City = $('#city_value').val();
            if (pro_type != 'All') {
                $.ajax({
                    url: '<?=base_url()?>AjaxRequest/propertyTypeBedroom',
                    method: 'post',
                    data: {City: City, pro_type: pro_type},
                    dataType: 'json',
                    success: function (response) {
                        $('#property_bed').text('');
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text: 'Bedrooms'
                        }));
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text: 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_bed').append($('<option>', {
                                value: item.Property_Bedrooms,
                                text: item.Property_Bedrooms
                            }));
                        });
                    }
                });
            } else {
                if (City != 'All') {
                    $.ajax({
                        url: '<?=base_url()?>AjaxRequest/propertyBed',
                        method: 'post',
                        data: {City: City},
                        dataType: 'json',
                        success: function (response) {
                            $('#property_bed').text('');
                            $('#property_bed').append($('<option>', {
                                value: 'All',
                                text: 'Bedrooms'
                            }));
                            $('#property_bed').append($('<option>', {
                                value: 'All',
                                text: 'All'
                            }));
                            $.each(response, function (i, item) {
                                $('#property_bed').append($('<option>', {
                                    value: item.Property_Bedrooms,
                                    text: item.Property_Bedrooms
                                }));
                            });
                        }
                    });
                } else {
                    $('#property_bed').text('');
                    $('#property_bed').append($('<option>', {
                        value: 'All',
                        text: 'Bedrooms'
                    }));
                    $('#property_bed').append($('<option>', {
                        value: 'All',
                        text: 'All'
                    }));
                    <? foreach ($proBed as $value){ ?>
                    $('#property_bed').append($('<option>', {
                        value: '<?= $value; ?>',
                        text: '<?= $value; ?>'
                    }));
                    <? } ?>
                }
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#read-more").click(function () {
            $("#collapse").toggle(1000, function () {
                if (document.getElementById('collapse').style.display == 'none') {
                    document.getElementById('read-more').innerHTML = ' Read More ';
                } else {
                    document.getElementById('read-more').innerHTML = ' Read Less ';
                }
            });
        });
    });
</script>

</body>
</html>