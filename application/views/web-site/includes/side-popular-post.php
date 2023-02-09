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
</style>
<div class="card side Popular-Posts my-2">
    <div class="card-title my-3 text-center font-weight-bold">
        Popular Posts
    </div>
    <div class="border"></div>
    <div class="card-body">
        <div class="row mx-1 mx-md-0">
            <? foreach ($blog_side as $blog) { ?>
                <div class="col-md-6 col-lg-12 px-2" >
                    <a href="<?= base_url(); ?>blog/<?= $blog->url_slug; ?>" class="blog-item"
                       title="<?= $blog->Blog_Title; ?>" >
                        <? $image_name = str_replace('assets/blog/', '', $blog->Blog_Image);
                        $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                        if ($image_name_webp==''){
                            $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                        }
                        if ($image_name_webp==''){
                            $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                        }
                        ?>

                        <img class="card-img-left"
                             src="<?= base_url(); ?><?= "assets/web-site/images/blog/whatsapp/".$image_name_webp; ?>"
                             alt="<?= $blog->Blog_Image_Alt; ?>"/>
                        <div class="card flex-row">
                            <div class="card-body " style="background-color: white !important;">
                                <div id="recent-blog-header">
                                    <?= $blog->Blog_Title; ?>
                                </div>
                                <div id="recent-blog-time"><i class="fas fa-calendar-alt"></i>
                                    <? if ($blog->publish_date and $blog->publish_date!='0000-00-00') {
                                        $date_string = '%d %M %Y';
                                        echo mdate($date_string, strtotime($blog->publish_date));
                                    }elseif($blog->status ==0){
                                        $unix_time = mysql_to_unix($blog->Blog_Created_date);
                                        $date_string = '%d %M %Y';
                                        echo mdate($date_string, $unix_time);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <? } ?>
        </div>
    </div>
</div>