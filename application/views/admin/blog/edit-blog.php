<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/include/head-load'); ?>

<title>Admin panel</title>
<style>
    #main{
        background: #F5F5F5 !important;
    }
    .panel-heading {
        background-color: beige !important;
    }
    .note-icon-caret{
        display: none !important;
    }
    .show_site_details{
        text-decoration: none !important;
        border: 1px solid blue;
        padding: 5px;
        text-align: center !important;
        margin: 0;
        border-radius: 5px;
        display: inline-block;
        align-content: center !important;
    }
</style>
</head>
<body>
<?php $this->load->view('admin/include/top-menu');?>
<? if ($results): ?>
<section id="main" >
    <div class="container pt-2">
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="page-title col-md-6">
                             <span class="mx-2">
                                 <? if ($results->language == 'ru'): ?>
                                     <a href="<?= base_url();?>ru/blog/<?= $results->url_slug; ?>" target="_blank" class="show_site_details" >
                                      <i class="fas fa-eye"></i>
                                     </a>
                                 <? elseif ($results->language == 'en'): ?>
                                     <a href="<?= base_url();?>blog/<?= $results->url_slug; ?>" target="_blank" class="show_site_details" >
                                              <i class="fas fa-eye"></i>
                                     </a>
                                 <? endif; ?>

                            </span>
                            <b>
                                Edit Blog
                            </b>
                        </div>
                        <div class="page-title col-md-6 text-right">
                            <a href="<?= base_url(); ?>Admin/Manage_Blog" class="btn btn-lg btn-primary">
                                <i class="fas fa-blog "></i>
                                Manage Blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2 pb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-eng-tab" data-toggle="tab" data-target="#nav-eng" type="button" role="tab" aria-controls="nav-eng" aria-selected="true">Eng</button>
                                <button class="nav-link" id="nav-rus-tab" data-toggle="tab" data-target="#nav-rus" type="button" role="tab" aria-controls="nav-rus" aria-selected="false">Rus</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-eng" role="tabpanel" aria-labelledby="nav-eng-tab">
                                <?php echo form_open_multipart(base_url().'Admin/Blog_Content_Update_Submit');?>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label style="padding:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Meta Title
                                                </strong>
                                            </small>
                                        </label>
                                        <textarea name="meta_title" class="form-control" required><?= $results->Blog_Meta_Title ; ?></textarea>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label style="padding:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Meta Keyword
                                                </strong>
                                            </small>
                                        </label>
                                        <textarea name="meta_keyword" class="form-control" required><?= $results->Blog_Meta_Keyword ; ?></textarea>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label style="padding:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Meta Description
                                                </strong>
                                            </small>
                                        </label>
                                        <textarea name="meta_description" class="form-control" required ><?= $results->Blog_Meta_Description; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-5">
                                        <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Image Alt
                                                </strong>
                                            </small>
                                        </label>
                                        <input name="image_alt" type="text" placeholder="Image Alt" required class="form-control" value="<?= $results->Blog_Image_Alt ; ?>">
                                    </div>
                                    <div class="form-group col-sm-7">
                                        <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Title
                                                </strong>
                                            </small>

                                        </label>
                                        <input name="blog_title" type="text" placeholder="Title" required class="form-control" value="<?= $results->Blog_Title ; ?>">
                                        <input name="blog_id" type="hidden" required value="<?= $results->Blog_ID ; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label style="margin-top:10px;padding:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Blog Content
                                                </strong>
                                            </small>
                                        </label>
                                        <textarea name="blog_description" type="text" required class="form-control summernote"><?= $results->Blog_Content ; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="reset" name="submitBtn" class="btn btn-warning ">
                                            Reset Form
                                        </button>
                                        <button type="submit" name="submitBtn" class="btn btn-primary ">
                                            Update Blog
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-rus" role="tabpanel" aria-labelledby="nav-rus-tab">
                                <?php echo form_open_multipart(base_url().'Admin/Blog_Content_Update_Submit_ru');?>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label style="padding:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Meta Title
                                                </strong>
                                            </small>
                                        </label>
                                        <textarea name="meta_title_ru" class="form-control" required><?= $results->ru_meta_title ; ?></textarea>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label style="padding:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Meta Keyword
                                                </strong>
                                            </small>
                                        </label>
                                        <textarea name="meta_keyword_ru" class="form-control" required><?= $results->ru_meta_keyword ; ?></textarea>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label style="padding:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Meta Description
                                                </strong>
                                            </small>
                                        </label>
                                        <textarea name="meta_description_ru" class="form-control" required ><?= $results->ru_meta_description; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-5">
                                        <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Image Alt
                                                </strong>
                                            </small>
                                        </label>
                                        <input name="image_alt_ru" type="text" placeholder="Image Alt" required class="form-control" value="<?= $results->ru_image_alt ; ?>">
                                    </div>
                                    <div class="form-group col-sm-7">
                                        <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Title
                                                </strong>
                                            </small>

                                        </label>
                                        <input name="blog_title_ru" type="text" placeholder="Title" required class="form-control" value="<?= $results->ru_title ; ?>">
                                        <input name="blog_id_ru" type="hidden" required value="<?= $results->Blog_ID ; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label style="margin-top:10px;padding:5px;" class="control-label">
                                            <small>
                                                <strong>
                                                    Blog Content
                                                </strong>
                                            </small>
                                        </label>
                                        <textarea name="blog_description_ru" type="text" required class="form-control summernote"><?= $results->ru_content ; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="reset" name="submitBtn_ru" class="btn btn-warning ">
                                            Reset Form
                                        </button>
                                        <button type="submit" name="submitBtn_ru" class="btn btn-primary ">
                                            Update Blog
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <small>
                                <b>
                                    Update Blog Image
                                </b>
                            </small>
                        </div>
                        <?php echo form_open_multipart(base_url().'Admin/Blog_Image_Update_Submit');?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="user_file">
                                        <small>
                                            <b>
                                                New Image
                                            </b>
                                        </small>
                                    </label>
                                    <input type="file" name="user_file" class="form-control" id="user_file" required accept=".jpg">
                                    <input name="blog_id" type="hidden" required value="<?= $results->Blog_ID ; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" name="submitBtn" class="btn btn-primary ">
                                    Update Blog Image
                                </button>
                            </div>
                        </div>
                        </form>
                        <hr width="75%">
                        <div class="card-text">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <? $image_name = str_replace("assets/blog/",'',$results->Blog_Image); ?>
                                    <? $image_name = str_replace(".jpg",'',$image_name); ?>
                                    <? $image_name = $image_name.".webp" ?>
                                    <img src="<?= base_url();?>assets/web-site/images/blog/thumb/<?= $image_name; ?>" class="img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<? endif; ?>
<?php $this->load->view('admin/include/footer'); ?>
<?php $this->load->view('admin/include/foot-load'); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="<?= base_url();?>assets/summernote-image-attributes.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            imageTitle: {
                specificAltField: true,
            },
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: false,
            fontSizes: ['10', '11', '12', '14', '15','16','17','18', '24', '36', '48'],
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']],
                    ['custom', ['imageTitle']]
                ],
            },
            lang: 'en-US',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['fontsize', ['fontsize']],
            ]
        });
    });
    var postForm = function() {
        var content = $('textarea[name="content"]').html($('.summernote').code());
    }
</script>
</body>
</html>