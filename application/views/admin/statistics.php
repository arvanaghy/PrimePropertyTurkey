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
                                Static Pages Statistics
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
                        <table id="datatable" class="table table-striped" >
                            <thead>
                            <tr>
                                <th>citizenship</th>
                                <th>afterSale</th>
                                <th>areaGuide</th>
                                <th>buyerGuide</th>
                                <th>buyingOnline</th>
                                <th>permit</th>
                                <th>extension</th>
                                <th>faq</th>
                                <th>privacy</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $results->citizenshipLikeCount; ?>-<?= $results->citizenshipLikeCount; ?></td>
                                    <td><?= $results->afterSaleLikeCount; ?>-<?= $results->afterSaleDislikeCount; ?></td>
                                    <td><?= $results->areaGuideLikeCount; ?>-<?= $results->areaGuideDislikeCount; ?></td>
                                    <td><?= $results->buyerGuideLikeCount; ?>-<?= $results->buyerGuideDislikeCount; ?></td>
                                    <td><?= $results->buyingOnlineLikeCount; ?>-<?= $results->buyingOnlineDislikeCount; ?></td>
                                    <td><?= $results->permitLikeCount; ?>-<?= $results->permitDislikeCount; ?></td>
                                    <td><?= $results->extensionLikeCount; ?>-<?= $results->extensionDislikeCount; ?></td>
                                    <td><?= $results->faqLikeCount; ?>-<?= $results->faqDislikeCount; ?></td>
                                    <td><?= $results->privacyLikeCount; ?>-<?= $results->privacyDislikeCount; ?></td>
                                </tr>
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