<style type="text/css">
    #bottom-video-card{
        margin-top: -5px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<div class="card side latest-news my-2">
    <div class="card-title my-3 text-center font-weight-bold">
        Prime Videos
    </div>
    <div class="border"></div>
    <div class="card-body">
        <div class="row mx-1 mx-md-0">
            <? foreach ($talks as $data) { ?>
                <div class="col-md-12 px-2">
                    <a href="<?= base_url(); ?>ru/prime-videos/<?= $data->url_slug; ?>" class="blog-item"
                       title="<?= $data->title; ?>">
                        <img class="img-fluid"
                             src="<?= base_url();?>assets/web-site/images/youtube-cover/<?= $data->cover_image;?>"
                             alt="<?= $data->title; ?>"/>
                        <div class="card flex-row" id="bottom-video-card">
                            <div class="card-body" style="background-color: white !important;">
                                <div id="recent-blog-header">
                                    <?= $data->title; ?>
                                </div>
                                <div id="recent-blog-time"><i class="fas fa-calendar-alt"></i>
                                    <? $unix_time = mysql_to_unix($data->insertDate);
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