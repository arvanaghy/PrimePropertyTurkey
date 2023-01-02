<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/include/head-load'); ?>

<title>Admin panel</title>
<style>
    #main {
        background: #F5F5F5 !important;
    }

    .panel-heading {
        background-color: beige !important;
    }

    .note-icon-caret {
        display: none !important;
    }
</style>
</head>
<body>
<?php $this->load->view('admin/include/top-menu'); ?>
<section id="main">
    <div class="container pt-2">
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="page-title col-md-6">
                            <span class="mx-2">
                                    <a href="<?= base_url();?>prime-videos/<?= $results->url_slug; ?>" target="_blank" class="show_site_details" >
                                      <i class="fas fa-eye"></i>
                                     </a>
                             </span>
                            <b>
                                Edit Video
                            </b>
                        </div>
                        <div class="page-title col-md-6 text-right">
                            <a href="<?= base_url(); ?>Admin/Manage_Videos" class="btn btn-lg btn-primary">
                                <i class="fab fa-youtube"></i>
                                Manage Video
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2 pb-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <?php echo form_open_multipart(base_url() . 'Admin/Video_Content_Update_Submit'); ?>
                        <div class="row">
                            <div class="form-group col-sm-8">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Title
                                        </strong>
                                    </small>
                                </label>
                                <input name="title" type="text" class="form-control" required
                                       value="<?= $results->title; ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            URL
                                        </strong>
                                    </small>
                                </label>
                                <input name="url" class="form-control" required type="text"
                                       value="<?= $results->url; ?>">
                            </div>

                        </div>
                        <div class="row align-items-center">
                            <div class="form-group col-sm-5">
                                <label for="type">
                                    <small>
                                        <b>Type</b>
                                    </small>
                                </label>
                                <select name="type" id="type" class="form-control">
                                    <option value="1" <? if ($results->primeType == 1){ echo 'selected';} ?> >Prime Talks</option>
                                    <option value="2" <? if ($results->primeType == 2){ echo 'selected';} ?> >Prime Walks</option>
                                    <option value="3" <? if ($results->primeType == 3){ echo 'selected';} ?> >Weekly Report</option>
                                    <option value="4" <? if ($results->primeType == 4){ echo 'selected';} ?> >Prime Project</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label >
                                    <small>
                                        <strong>
                                            Sequence
                                        </strong>
                                    </small>
                                </label>
                                <input name="sequence" class="form-control" required type="number"
                                       value="<?= $results->sequence; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label style="margin-top:10px;padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Meta Description
                                        </strong>
                                    </small>
                                </label>
                                <textarea name="meta_description" placeholder="Meta Description" required class="form-control"><?= $results->meta_description; ?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label style="margin-top:10px;padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Video Description
                                        </strong>
                                    </small>
                                </label>
                                <textarea name="video_description" placeholder="video Description" required
                                          class="form-control summernote"><?= $results->description; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="reset" name="submitBtn" class="btn btn-warning ">
                                    Reset Form
                                </button>
                                <input type="hidden" name="id" value="<?= $results->id; ?>">
                                <button type="submit" name="submitBtn" class="btn btn-primary ">
                                    Update Video
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center font-weight-bold">
                            Video Preview
                        </div>
                        <iframe style="width: 100% !important;" src="https://www.youtube.com/embed/<?= $results->url; ?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <div class="card-title text-center font-weight-bold">
                            Cover Image Preview
                        </div>
                        <img src="<?= base_url();?>assets/web-site/images/youtube-cover/<?= $results->cover_image;?>" alt="" class="img-fluid">
                        <?php echo form_open_multipart(base_url() . 'Admin/Video_Cover_Update_Submit'); ?>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="Cover-image"></label>
                                    <input type="file" name="Cover-image" id="Cover-image" class="form-control">
                                    <input type="hidden" name="id" value="<?= $results->id; ?>">
                                </div>
                                <div class="form-group col-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update Cover Image">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('admin/include/footer'); ?>
<?php $this->load->view('admin/include/foot-load'); ?>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: false,
            fontNames: ['Open Sans'],
            fontNamesIgnoreCheck: ['Open Sans'],
            addDefaultFonts: false,
            followingToolbar: false,
            lang: 'en-US',
            fontSizes: ['10', '11', '12', '14', '15','16','17','18', '24', '36', '48'],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['fontsize', ['fontsize']],
                ['view', ['fullscreen', 'codeview']]
            ],
            styleTags: [
                'p',
                { title: 'ilyas', tag: 'ilyas', className: 'ilyas', value: 'font-size:120px' },
                'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
            ]
        });
    });
    var postForm = function () {
        var content = $('textarea[name="content"]').html($('.summernote').code());
    }
</script>
</body>
</html>


