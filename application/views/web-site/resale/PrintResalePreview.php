<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/web-site/css/PrintPreview.css" rel="stylesheet">
<?php foreach ($property_result as $property_detail){ ?>
<article class="print-view">
    <title><?php echo $property_detail->title; ?></title>
    <header>
        <h2 class="text-center" style="background-color: darkblue;
    display: flex;
    justify-content: center;"><img src="<?php echo base_url("assets/web-site/images/logo-new kopya.png"); ?>" alt=""></h2>
        <h1 class="title">
            <div class="fl-dis-right fl-tab-right fl-mob-nofloat">
                <span class="ref">Ref: <?php echo $property_detail->referenceID; ?></span>
            </div>
            <span><?php echo $property_detail->title; ?></span>
        </h1>
    </header>
    <hr>
    <div class="thumbnails">
        <?php
        foreach($property_image_gallery as $gallery){ ?>
            <? $image_name = $gallery->image;
            $image_name_webp = str_replace('.jpg','.webp',$image_name);
            ?>
             <img class="thumbnail" width="50%" src="<?= base_url(); ?><?= "assets/web-site/images/resales/webps/".$image_name_webp; ?>"/>
        <?php } ?>
    </div>
    <div class="features">
        <div class="price">
            <span>$<?php echo @number_format($property_detail->price); ?></span>
        </div>
        <div class="bedrooms">
            <img src="<?php echo base_url("assets/web-site/images/base/audition-svg/ico4.webp");?>" class="icon">
            <span class="quantity"><?php echo $property_detail->bedroom; ?></span>
        </div>
        <div class="bathrooms">
            <img src="<?php echo base_url("assets/web-site/images/base/audition-svg/ico3.webp");?>" class="icon">
            <span class="quantity"><?php echo $property_detail->bathroom; ?></span>
        </div>
        <div class="location">
            <img src="<?php echo base_url("assets/web-site/images/base/audition-svg/ico2.webp");?>" class="icon">
            <span class="quantity"> <?php echo $property_detail->location; ?></span>
        </div>
    </div>
    </a>
    </div>
    <hr>
    <div class="content">
        <div class="body">
            <?php echo $property_detail->description; ?>
        </div>
        <footer>
            <div class="footer_inner_container wrap">
                <div class="office">
                    <h2>Email</h2>
                    <h3>info@primepropertyturkey.com</h3>
                </div>

                <div class="office office_border">
                    <h2>Phone </h2>
                    <h3>(+90) 552 754 44 93</h3>
                </div>
            </div>
        </footer>
    </div>
    <div class="print_btn">
        <a onclick="window.print();" class="btn grey print" rel="nofollow"><i class="fa fa-print"></i> Print This Page</a>
    </div>
</article>
<?php } ?>
