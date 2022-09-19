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
<section id="main" class="vh-100" >
    <div class="container pt-2">
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="page-title col-md-6">
                            <b>
                                Manage Resales
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? if ($results): ?>
        <div class="row pt-2 pb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-striped" >
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Action</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>City</th>
                                <th>Bedrooms</th>
                                <th>Bathrooms</th>
                                <th>Living space (sqm)</th>
                                <th>Pool</th>
                                <th>Date</th>
                                <th>status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?  $count=1;
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
                                                <? if ($row->status==3){ ?>
                                                <a href="<?= base_url("Resale/Preview/$row->referenceID"); ?>" class="dropdown-item" target="_blank">Show Property</a>
                                                <? }elseif ($row->status==5) { ?>
                                                    <a href="<?= base_url("Resale/PreviewPublishedResale/$row->referenceID"); ?>" class="dropdown-item" target="_blank">Show Property</a>
                                                <? } ?>
                                                <? if ($row->status==3){ ?>
                                                    <a href="<?= base_url("Admin/PublishResale/$row->referenceID"); ?>" class="dropdown-item">Publish</a>
                                                <? } ?>
                                                <? if ($row->status==3){ ?>
                                                    <a href="<?= base_url("Admin/Delete_Audition/$row->id"); ?>" class="dropdown-item">Delete ForEver</a>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $row->title; ?></td>
                                    <td>$<?= number_format($row->price); ?></td>
                                    <td><?= $row->kind; ?></td>
                                    <td><?= $row->location; ?></td>
                                    <td><?= $row->bedroom; ?></td>
                                    <td><?= $row->bathroom; ?></td>
                                    <td><?= $row->living_space; ?></td>
                                    <td>
                                        <? if ($row->pool==1): echo 'Yes'; else: echo 'No'; endif;?>
                                    <td>
                                        <? $unix_time= mysql_to_unix($row->created);
                                        $date_string = '%d %M %Y';
                                        echo mdate($date_string, $unix_time);
                                        ?></td>
                                    <td>
                                        <? if ($row->status==3){echo 'Pending';}elseif($row->status==5){echo 'Published';} ?>
                                    </td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <? else: ?>
        <div class="row pt-2 pb-5 ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>
                            There Is nothing To Show.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <? endif; ?>
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