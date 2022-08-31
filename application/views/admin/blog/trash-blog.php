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
                        <div class="page-title col-md-12">
                            <b>
                                Manage Trash Blog
                            </b>
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
                                <th>S.No.</th>
                                <th>Action</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Public Date</th>
                                <th>Meta Title</th>
                                <th>Meta keyword</th>
                                <th>Meta Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?  $count=1;
                            if ($results){
                            foreach ($results as $row){ ?>
                                <tr>
                                    <td class="sorting_1">
                                        <?= $count ; $count++; ?>
                                    </td>
                                    <td class="td-actions">
                                        <div class="dropdown">
                                            <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                                                Action
                                                <span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="<?= base_url("Admin/Publish_Blog/$row->Blog_ID"); ?>" class="dropdown-item">Publish</a>
                                                <a href="<?= base_url("Admin/DeleteForEver_Blog/$row->Blog_ID"); ?>" class="dropdown-item">Delete Forever</a>
                                            </div>
                                        </div>
                                    </td>
                                    <? $image_name = str_replace('assets/blog/', '', $row->Blog_Image);
                                    $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                                    if ($image_name_webp==''){
                                        $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                                    }
                                    if ($image_name_webp==''){
                                        $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                                    }
                                    ?>

                                    <td> <img src="<?= base_url();?>assets/web-site/images/blog/whatsapp/<?= $image_name_webp; ?>" class="img-fluid"></td>
                                    <td><?= $row->Blog_Title; ?></td>
                                    <td><?= substr(strip_tags($row->Blog_Content),0,200); ?></td>
                                    <td><?= $row->Blog_Created_date; ?></td>
                                    <td><?= $row->Blog_Meta_Title; ?></td>
                                    <td><?= $row->Blog_Meta_Keyword; ?></td>
                                    <td><?= $row->Blog_Meta_Description; ?></td>
                                </tr>
                            <?}
                            }?>
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