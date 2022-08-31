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
                                Add Blog
                            </b>
                        </div>
                        <div class="page-title col-md-6 text-right">
                            <a href="<?= base_url(); ?>Admin/Manage_Blog" class="btn btn-lg btn-primary">
                                <i class="fas fa-blog"></i>
                                Manage Blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2 pb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php echo form_open_multipart(base_url().'Admin/Add_Blog_Submit');?>
                         <div class="row">
                                <div class="form-group col-sm-4">
                                    <label style="padding:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Meta Title
                                            </strong>
                                        </small>
                                    </label>
                                    <textarea name="meta_title" placeholder="Meta Title" required class="form-control"></textarea>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label style="padding:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Meta Keyword
                                            </strong>
                                        </small>
                                    </label>
                                    <textarea name="meta_keyword" placeholder="Meta Keyword" required class="form-control"></textarea>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label style="padding:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Meta Description
                                            </strong>
                                        </small>
                                    </label>
                                    <textarea name="meta_description" placeholder="Meta Description"  required class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">Image</label>
                                    <input type="file" name="user_file" accept=".jpg" required class="form-control"/>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">Image Alt</label>
                                    <input name="image_alt" type="text" placeholder="Image Alt" required class="form-control">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">Title</label>
                                    <input name="blog_title" type="text" placeholder="Title" required  class="form-control">
                                </div>
                             </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label style="margin-top:10px;padding:5px;" class="control-label">Blog Description</label>
                                    <textarea name="blog_description" type="text" placeholder="Property Description" required class="form-control summernote"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="reset" name="submitBtn" class="btn btn-warning ">
                                        Reset Form
                                    </button>
                                    <button type="submit" name="submitBtn" class="btn btn-primary ">
                                        Add Blog
                                    </button>
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
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: false,
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