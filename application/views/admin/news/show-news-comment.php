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
                        <div class="page-title col-md-8">
                            <b>
                                Show Comments <span class="text-danger"><?= $news->News_Title; ?></span>
                            </b>
                        </div>
                        <div class="page-title col-md-4 text-right">
                            <a href="<?= base_url(); ?>Admin/Manage_News" class="btn btn-lg btn-primary"><i class="far fa-newspaper"></i> Back To Manage News</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2 pb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-striped" >
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>Content</th>
                                <th>Submit Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? if($results){
                                foreach ($results as $row){ ?>
                                    <tr>
                                        <td class="td-actions">
                                            <div class="dropdown">
                                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                                                    Action
                                                    <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="<?= base_url("Admin/Publish_News_Comment/$news->News_ID"); ?>" class="dropdown-item">Publish</a>
                                                    <a href="<?= base_url("Admin/Delete_News_Comment/$news->News_ID"); ?>" class="dropdown-item">Delete Forever</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $row->content; ?></td>
                                        <td><?= $row->submitDate; ?></td>
                                        <td><?= $row->status; ?></td>
                                    </tr>
                                <?}
                            } ?>
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