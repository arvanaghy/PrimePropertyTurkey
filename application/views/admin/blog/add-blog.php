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
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

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
                                    <textarea name="meta_title" placeholder="Meta Title" required class="form-control" ></textarea>
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
                                <div class="form-group col-sm-5">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Title
                                            </strong>
                                        </small>
                                    </label>
                                    <input name="blog_title" type="text" placeholder="Title" required  class="form-control">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Image Alt
                                            </strong>
                                        </small>
                                    </label>
                                    <input name="image_alt" type="text" placeholder="Image Alt" required class="form-control">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Image
                                            </strong>
                                        </small>
                                    </label>
                                    <input type="file" name="user_file" accept=".jpg" required class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    <label for="URL">
                                        <small>
                                            <strong>
                                                URL
                                            </strong>
                                        </small>
                                    </label>
                                    <input type="text" name="URL" id="URL" class="form-control" required>
                                    <div id="URL_Duplicate_Error" class="text-danger"></div>
                                    <div id="url_length_error" class="text-danger"></div>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="datepicker">
                                        <small>
                                            <strong>
                                                Publish Date
                                            </strong>
                                        </small>
                                    </label>
                                    <input type="text" name="publish_date" id="datepicker" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label style="margin-top:10px;padding:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Blog Description
                                            </strong>
                                        </small>
                                    </label>
                                    <textarea name="blog_description" type="text" placeholder="Property Description" required class="form-control summernote"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="reset" name="resetBtn" class="btn btn-warning ">
                                        Reset Form
                                    </button>
                                    <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary ">
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
<script src="<?= base_url();?>assets/summernote-image-attributes.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">
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
                    ['custom', ['imageTitle']],
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
                ['view', ['fullscreen', 'codeview', 'help']],
                ['fontsize', ['fontsize']],
            ]
        });
        $('#URL').change(function(){
            $("#submitBtn").prop("disabled",false);
            let valued_data = $(this).val();
            $('#URL_Duplicate_Error').text('');
            $('#url_length_error').text('');
            $.ajax({
                url:'<?= base_url(); ?>Admin/blogUrlCheck',
                method: 'POST',
                data: {value_data_posted: valued_data},
                dataType: 'json',
                success: function(response){
                    $.each(response, function (i, item) {
                        $('#URL_Duplicate_Error').text('this url is used , please choose another one');
                        $("#submitBtn").prop("disabled",true);
                    });
                }
            });
            if (valued_data.length > 50) {
                $('#url_length_error').html('<br /> this url is too long');
                $("#submitBtn").prop("disabled", true);
            }
        });
        $( function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );
    });
    var postForm = function() {
        var content = $('textarea[name="content"]').html($('.summernote').code());
    }
</script>
</body>
</html>