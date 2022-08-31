<div class="card side latest-news my-2">
    <div class="card-title my-3 text-center font-weight-bold">
        Prime Walks
    </div>
    <div class="border"></div>
    <div class="card-body">
        <div class="row mx-1 mx-md-0">
            <? foreach ($walks as $data) { ?>
                <div class="col-md-12 px-2">
                    <a href="<?= base_url(); ?>prime-videos/<?= $data->url_slug; ?>" class="blog-item"
                       title="<?= $data->title; ?>">
                        <img class="card-img-left"
                             src="<?= base_url();?>assets/web-site/images/youtube-cover/<?= $data->cover_image;?>"
                             alt="<?= $data->title; ?>"/>
                        <div class="card flex-row">
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