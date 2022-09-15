<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/about-us.css">
<title>User dashboard</title>
<style type="text/css">
    #my_map {
        height: 300px;
    }

    body {
        background: #FAFAFA;
    }

    .side-bar .card {
        box-shadow: 0px 2px 1px -1px rgb(0 0 0 / 20%), 0px 1px 1px 0px rgb(0 0 0 / 14%), 0px 1px 3px 0px rgb(0 0 0 / 12%);
    }

    #menu_section ul {
        list-style: none;
        text-align: left;
        margin-left: 0;
        padding-left: 1%;
    }

    #menu_section ul li {
        cursor: pointer;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 5px;
    }

    #menu_section ul li:hover {
        background: #eaeaea;
        transition: 0.8s;
    }

    #menu_section ul li:last-child:hover {
        background: unset;
        transition: unset;
    }

    #menu_section ul li a {
        text-decoration: none;
        color: #012169;
    }

    #menu_section ul li a i {
        padding-right: 15px;
        padding-left: 15px;
        color: #466ad8;

    }

    #menu_section ul li:last-child a i {
        padding-right: 15px;
        padding-left: 0;
    }

    .user-section-title {
        font-size: 2rem;
        font-weight: 500;
        margin: 2%;
    }
    #datatable{
         font-size: 0.8rem;
    }
    #datatable_wrapper .dataTables_length {
        text-align: left !important;
    }
    .menu_activated{
        background-color: #eaeaea !important;
    }

    @media screen and (max-width: 425px) {
        #datatable_wrapper .dataTables_length {
            text-align: center !important;
        }
    }

</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <? if ($userLevel <9){ ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $this->session->userdata('user_info');  ?></strong> Your email is not activated.
                        <br>
                        please go to your email and click on verification link
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <? } ?>
            </div>
            <?php $this->load->view('web-site/user/user-menu'); ?>
            <div class="col-md-8 text-center">
                <div class="card">
                    <div class="card-body">
                        <div class="user-section-title">
                            Properties In Progress
                        </div>
                        <div class="user-section-description">
                            your Property for sale is waiting to validate with our support team
                        </div>
                        <div class="user-section-description font-weight-bold">
                            You can <span class="text-danger">Edit</span> or <span class="text-danger">Delete</span> your Properties Audition from list
                        </div>
                        <hr width="75%">
                        <? if ($results){ ?>
                        <table id="datatable" class="table table-striped table-responsive" >
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
                                                <? if ($type=='Pending'){ ?>
                                                    <a href="<?= base_url("Resale/Preview/$row->referenceID"); ?>" class="dropdown-item" target="_blank">Show</a>
                                                <? }else{ ?>
                                                    <a href="<?= base_url("Resale/PreviewPublishedResale/$row->referenceID"); ?>" class="dropdown-item" target="_blank">Show Property</a>
                                                <? } ?>
                                                <? if ($type=='Pending'){ ?>
                                                    <a href="<?= base_url("User/Edit_Property/$row->id"); ?>" class="dropdown-item">Edit</a>
                                                <? } ?>
                                                <? if ($type=='Pending'){ ?>
                                                    <a href="<?= base_url("User/Delete_Property/$row->id"); ?>" class="dropdown-item">Delete</a>
                                                <? }else{ ?>
                                                    <a href="<?= base_url("User/Delete_Published_Property/$row->id"); ?>" class="dropdown-item">Delete</a>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $row->title; ?></td>
                                    <td><?= $row->price; ?></td>
                                    <td><?= $row->kind; ?></td>
                                    <td><?= $row->location; ?></td>
                                    <td><?= $row->bedroom; ?></td>
                                    <td><?= $row->bathroom; ?></td>
                                    <td><?= $row->living_space; ?></td>
                                    <td>
                                        <? if ($row->pool==1){ echo 'Yes';}else{echo 'No';}?>
                                    </td>
                                    <td>
                                        <? $unix_time= mysql_to_unix($row->created);
                                        $date_string = '%d %M %Y';
                                        echo mdate($date_string, $unix_time);
                                        ?>
                                    </td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
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
