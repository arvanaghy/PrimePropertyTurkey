<div class="card side latest-news my-2">
    <div class="card-title my-3 text-center font-weight-bold">
        Latest News
    </div>
    <div class="border"></div>
    <div class="card-body">
        <div class="row mx-1 mx-md-0">
            <? foreach ($news_side as $news) { ?>
                <? $image_name = str_replace('assets/news/', '', $news->News_Image);
                $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                if ($image_name_webp==''){
                    $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                }
                if ($image_name_webp==''){
                    $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                }
                ?>
                <div class="col-md-6 col-lg-12 px-2">
                    <a href="<?= base_url(); ?>news/<?= $news->url_slug; ?>" class="blog-item"
                       title="<?= $news->News_Title; ?>">
                        <img class="card-img-left"
                             src="<?= base_url(); ?><?= "assets/web-site/images/news/whatsapp/".$image_name_webp; ?>"
                             alt="<?= $news->News_Image_Alt; ?>"/>
                        <div class="card flex-row">
                            <div class="card-body" style="background-color: white !important;">
                                <div id="recent-blog-header">
                                    <?= $news->News_Title; ?>
                                </div>
                                <div id="recent-blog-time"><i class="fas fa-calendar-alt"></i>
                                    <? $unix_time = mysql_to_unix($news->News_Created_date);
                                    $date_string = '%d %M %Y';
                                    echo mdate($date_string, $unix_time);
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