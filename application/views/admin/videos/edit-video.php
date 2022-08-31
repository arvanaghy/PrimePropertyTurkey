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
                            <div class="form-group col-sm-4">
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
                            <div class="form-group col-sm-6">
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
                            <div class="form-group col-sm-2">
                                <label style="padding:5px;" class="control-label">
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
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
    });
    var postForm = function () {
        var content = $('textarea[name="content"]').html($('.summernote').code());
    }
</script>
</body>
</html>


