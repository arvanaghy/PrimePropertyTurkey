<style type="text/css">
    .side .card-img-left{
        width: 120px;
        position: absolute;
        z-index: 888;
        border-radius: 10px;
        top: -3%;
        left: -2%;
    }
    .side #recent-blog-header{
        margin-left: 40%;
        min-height: 70px;
    }
    .side #recent-blog-time{
        margin-left: 40%;
    }
    .side-recommended-owl .item .card{
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff !important;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: 0.25rem;
        border-radius: 20px !important;
        box-shadow:unset !important;

    }
    .side-recommended-owl .item .card a {
        border-radius: 30px;
    }
    .side-recommended-owl .item .card .card-favorite {
        padding: 5px;
        border-radius: 50%;
        text-align: center;
        justify-content: center;
        align-items: center;
        line-height: 17px;
        top: 2%;
        right: 4%;
        font-size:1.2rem !important;
    }
    .side-recommended-owl .item .card #item-card-title {
        text-align: left;
        padding: 0 10px !important;
        font-size: 1rem;
        padding-top: 10px !important;
    }
    .side-recommended-owl .item .card .card-type-badge {
        top: 2%;
        left: 4%;
        padding-right: 10px;
        padding-left: 10px;
    }
    .side-recommended-owl .item .card #card-speciality div {
        background-color: #d3d3d3;
        border-radius: 20px;
        padding: 2px 6px;
        font-size: .7rem;
    }
    .side-recommended-owl .item .card #card-speciality img {
        width: 15px;
    }
    .side-recommended-owl .item .card .item-card-description {
        max-height: 80px!important;
        height: 80px!important;
        min-height: 80px!important;
        overflow: hidden!important;
        font-size: .85rem;
        padding: 0 25px;
        text-align: left!important;
    }
    .Popular-Recommended{
        background-image: url(https://www.primepropertyturkey.com/assets/web-site/images/TurkeyFlag.webp);
        background-size: cover;
        background-position: center;
    }
    .Popular-Recommended .card-title{
        color: white !important;
    }
    .Popular-Recommended .border{
        border: 0 ;
        background-color: white;
    }
    .Popular-Recommended .card-favorite{
        background-color: black;
    }
    .side-recommended-owl .item .card .card-body{
        padding: 0.2rem 0.1rem !important;
    }


</style>
<div class="card side Popular-Recommended">
    <div class="card-title my-3 text-center font-weight-bold">
        <? if (isset($type) and $type=='permit'): ?>
            Купить подходящую недвижимость для краткосрочного проживания в Турции
        <? else: ?>
            Купить подходящую недвижимость для получения гражданства за инвестиции в Турции
        <? endif; ?>
    </div>
    <div class="border"></div>
    <div class="card-body" style="padding:1rem 0.2rem !important;">
        <div class="row mx-1 mx-md-0">
            <div class="col-12">
                <div class="side-recommended-owl owl-carousel owl-theme">
                    <? foreach ($recommended_properties_all as $recommended_property){ ?>
                        <? $image_name = str_replace('assets/thumbnail/', '', $recommended_property->Property_thumbnail);
                        $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                        if ($image_name_webp == '') {
                            $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                        }
                        if ($image_name_webp == '') {
                            $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                        }
                        ?>
                        <div class="item">
                            <div class="card">
                                <a href="<?= base_url(); ?>properties/<?= $recommended_property->url_slug; ?>" title="<?= $recommended_property->Property_Bedrooms.' Bedroom '.$recommended_property->Property_type.' For Sale In '.$recommended_property->Property_location; ?>">

                                    <img class="card-img-top img-fluid"

                                         src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/" . $image_name_webp; ?>"
                                         alt="<?= $recommended_property->Property_title; ?>">
                                </a>
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $recommended_property->Property_type; ?>
                                            </span>
                                            <span class="card-favorite">
                                                <? if (is_favored($recommended_property->Property_id)) { ?>
                                                    <button onclick="delete_favorite('<?= $recommended_property->Property_id; ?>');" style="background-color: transparent !important;padding: 0"
                                                            class="red-text" >
                                                        <i class="fas fa-heart red-text"></i>
                                                    </button>
                                                <? } else { ?>
                                                    <button onclick="set_favorite('<?= $recommended_property->Property_id; ?>');" style="background-color: transparent !important;padding: 0"
                                                            class="text-reset">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                <? } ?>
                                           </span>
                                            <div id="item-card-title">
                                                <a href="<?= base_url(); ?>properties/<?= $recommended_property->url_slug; ?>"
                                                   class="text-reset font-weight-bold blue-text"
                                                >
                                                    <?= $recommended_property->Property_title; ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row my-2 justify-content-around align-items-center"
                                             id="card-speciality">
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                     alt="Property_location"
                                                     class="img-fluid">
                                                <span class="mx-1"><?= $recommended_property->Property_location; ?></span>
                                            </div>
                                            <div class="d-flex align-items-center ">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                     alt="Property_Bedrooms"
                                                     class="img-fluid">
                                                <span class="mx-1"><?= $recommended_property->Property_Bedrooms; ?></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                     alt="Property_Bathrooms"
                                                     class="img-fluid">
                                                <span class="mx-1"><?= $recommended_property->Property_Bathrooms; ?></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                     alt="Property_living_space" class="img-fluid"
                                                >
                                                <span class="mx-1"><?= $recommended_property->Property_living_space; ?></span>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <p class="text-justify item-card-description">
                                                <?= substr(strip_tags($recommended_property->Property_overview), 0, 100) . "...."; ?>
                                            </p>
                                        </div>
                                        <div class="row justify-content-around align-items-center mx-1 mb-2"
                                             style="font-size: 1.2rem">
                                             <span class="red-text font-weight-bold">
                                               <? if (!$recommended_property->SoldOut and $recommended_property->Property_price != 0) { ?>
                                                   <? if ($this->session->has_userdata('currency')) {
                                                       switch ($this->session->userdata('currency')) {
                                                           case 'USD': ?>
                                                               <i class="fas fa-dollar-sign"></i>
                                                               <?= number_format($recommended_property->Property_price); ?>
                                                               <?
                                                               break;
                                                           case 'TRY': ?>
                                                               <i class="fas fa-lira-sign"></i>
                                                               <?= number_format($recommended_property->Property_price * $currency_exchange_data->try); ?>

                                                               <?
                                                               break;
                                                           case 'EUR': ?>
                                                               <i class="fas fa-euro-sign"></i>
                                                               <?= number_format($recommended_property->Property_price * $currency_exchange_data->euro); ?>
                                                               <?
                                                               break;
                                                           case 'GBP': ?>
                                                               <i class="fas fa-pound-sign"></i>
                                                               <?= number_format($recommended_property->Property_price * $currency_exchange_data->gpt); ?>
                                                               <?
                                                               break;
                                                       }
                                                   } else { ?>
                                                       <i class="fas fa-dollar-sign"></i>
                                                       <?= number_format($recommended_property->Property_price); ?>
                                                   <? }
                                               } else { ?>
                                                   Contact US
                                               <? } ?>
                                            </span>
                                            <button class="btn btn-danger btn-sm d-flex font-weight-bold"
                                               data-toggle="modal" data-target="#quickEnquireModal"
                                               data-whatever="<?= $recommended_property->Property_referenceID; ?>"
                                               >
                                                Quick Enquiry
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function set_favorite(value){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if (this.responseText){
                location.reload();
            }
        }
        xhttp.open("POST", "<?= base_url();?>Favorite/set_favorite");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("send_value="+value);
    }
    function delete_favorite(value){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if (this.responseText){
                location.reload();
            }
        }
        xhttp.open("POST", "<?= base_url();?>Favorite/del_favorite");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("send_value="+value);
    }
</script>
