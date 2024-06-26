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
</style>
</head>
<body>
<?php $this->load->view('admin/include/top-menu');?>
<section id="main" >
    <div class="container pt-2">
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="page-title col-md-6">
                            <b>
                                Edit News
                            </b>
                        </div>
                        <div class="page-title col-md-6 text-right">
                            <a href="<?= base_url(); ?>Admin/Manage_News" class="btn btn-lg btn-primary">
                                <i class="far fa-newspaper"></i>
                                Manage News
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
                        <?php echo form_open_multipart(base_url().'Admin/News_Content_Update_Submit');?>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Meta Title
                                        </strong>
                                    </small>
                                </label>
                                <textarea name="meta_title" class="form-control" required><?= $results->News_Meta_Title ; ?></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Meta Keyword
                                        </strong>
                                    </small>
                                </label>
                                <textarea name="meta_keyword" class="form-control" required><?= $results->News_Meta_Keyword ; ?></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Meta Description
                                        </strong>
                                    </small>
                                </label>
                                <textarea name="meta_description" class="form-control" required><?= $results->News_Meta_Description ; ?></textarea>
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
                                <input name="image_alt" type="text" placeholder="Image Alt" required class="form-control" value="<?= $results->News_Image_Alt ; ?>">
                            </div>
                            <div class="form-group col-sm-7">
                                <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Title
                                        </strong>
                                    </small>

                                </label>
                                <input name="news_title" type="text" placeholder="Title" required class="form-control" value="<?= $results->News_Title ; ?>">
                                <input name="news_id" type="hidden" required value="<?= $results->News_ID ; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label style="margin-top:10px;padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            News Content
                                        </strong>
                                    </small>
                                </label>
                                <textarea name="news_description" type="text" placeholder="Property Description" required class="form-control summernote"><?= $results->News_Content ; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="reset" name="submitBtn" class="btn btn-warning ">
                                    Reset Form
                                </button>
                                <button type="submit" name="submitBtn" class="btn btn-primary ">
                                    Update News
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <small>
                                <b>
                                    Update news Image
                                </b>
                            </small>
                        </div>
                            <?php echo form_open_multipart(base_url().'Admin/News_Image_Update_Submit');?>
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
                                            <input name="news_id" type="hidden" required value="<?= $results->News_ID ; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" name="submitBtn" class="btn btn-primary ">
                                            Update News Image
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <hr width="75%">
                        <div class="card-text">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <? $image_name = str_replace("assets/news/",'',$results->News_Image); ?>
                                    <? $image_name = str_replace(".jpg",'',$image_name); ?>
                                    <? $image_name = $image_name.".webp" ?>
                                    <img src="<?= base_url();?>assets/web-site/images/news/whatsapp/<?= $image_name; ?>" class="img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
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
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: false,
            fontNames: ['Open Sans'],
            fontNamesIgnoreCheck: ['Open Sans'],
            addDefaultFonts: false,
            fontSizes: ['10', '11', '12', '14', '15','16','17','18', '24', '36', '48'],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
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