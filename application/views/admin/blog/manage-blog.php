<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/include/head-load'); ?>

<title>Admin panel</title>
<style>
    #main{
        background: #F5F5F5 !important;
    }
    #datatable{
        font-size: 0.8rem;
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
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
                                Manage Blog
                            </b>
                        </div>
                        <div class="page-title col-md-6 text-right">
                            <a href="<?= base_url(); ?>Admin/Add_Blog" class="btn btn-lg btn-primary"><i class="far fa-plus-square px-2"></i> Add Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2 pb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-responsive" >
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Public Date</th>
                                <th>like</th>
                                <th>dislike</th>
                                <th>Most Voted</th>
                                <th>Percentage</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                            foreach ($results as $row){ ?>
                                <tr>
                                    <td class="td-actions">
                                        <div class="dropdown">
                                            <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                                                Action
                                                <span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="<?= base_url("Admin/Edit_Blog/$row->Blog_ID"); ?>" class="dropdown-item">Edit</a>
                                                <a href="<?= base_url("Admin/Delete_Blog/$row->Blog_ID"); ?>" class="dropdown-item">Delete</a>
                                                <a href="<?= base_url("Admin/Show_Blog_Comments/$row->Blog_ID"); ?>" class="dropdown-item">Show Comments</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <? $image_name = str_replace('assets/blog/', '', $row->Blog_Image);
                                        $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                                        if ($image_name_webp==''){
                                            $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                                        }
                                        if ($image_name_webp==''){
                                            $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                                        }
                                        ?>
                                        <img src="<?= base_url();?>assets/web-site/images/blog/whatsapp/<?= $image_name_webp; ?>" class="img-fluid">
                                    </td>
                                    <td>
                                        <?= $row->Blog_Title; ?>
                                        <? if ($this->Admin_model->countAllComments($row->Blog_ID,'blog') > 0): ?>
                                            <span class="badge badge-pill badge-primary"><?= $this->Admin_model->countAllComments($row->Blog_ID,'blog'); ?></span>
                                        <? endif; ?>
                                        <? if ($this->Admin_model->countNewComments($row->Blog_ID,'blog') > 0): ?>
                                           <span class="badge badge-pill badge-danger"><?= $this->Admin_model->countNewComments($row->Blog_ID,'blog'); ?></span>
                                        <? endif; ?>

                                    </td>
                                    <td><?= substr(strip_tags($row->Blog_Content),0,200); ?></td>
                                    <td><?= $row->Blog_Created_date; ?></td>
                                    <td><?= $row->likeCount; ?></td>
                                    <td><?= $row->dislikeCount; ?></td>
                                    <td><?= $row->dislikeCount + $row->likeCount; ?></td>
                                    <td><?
                                        $total = $row->likeCount+$row->dislikeCount;
                                        if ($total!=0){
                                            echo round(($row->likeCount * 100) / $total) ."%";
                                        }else {
                                            echo 0;
                                        }
                                        ?></td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('admin/include/footer'); ?>
<?php $this->load->view('admin/include/foot-load'); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>
</body>
</html>