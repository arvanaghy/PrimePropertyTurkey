<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/include/head-load'); ?>

<title xmlns="http://www.w3.org/1999/html">Admin panel</title>
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
    .show_site_details{
        text-decoration: none !important;
        border: 1px solid blue;
        padding: 5px;
        text-align: center !important;
        margin: 0;
        border-radius: 5px;
        display: inline-block;
        align-content: center !important;
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
                            <span class="mx-2">
                                <a href="<?= base_url();?>Admin/Edit_Property/<?= ($results->Property_id)+1; ?>" class="show_site_details">
                                     <i class="fas fa-backward"></i>
                                </a>
                            </span>
                            <span class="mx-2">
                                <a href="<?= base_url();?>properties/<?= $results->url_slug; ?>" target="_blank" class="show_site_details">
                                      <i class="fas fa-eye"></i>
                                </a>
                            </span>
                            <b>
                                Edit Property
                            </b>
                            <span class="mx-2">
                                <a href="<?= base_url();?>Admin/Edit_Property/<?= ($results->Property_id)-1; ?>" class="show_site_details">
                                      <i class="fas fa-forward"></i>
                                </a>
                            </span>
                        </div>
                        <div class="page-title col-md-6 text-right">
                            <a href="<?= base_url(); ?>Admin/Manage_property" class="btn btn-lg btn-primary"><i class="far fa-building "></i> Manage Properties</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-2 pb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?php echo form_open_multipart(base_url().'Admin/Property_Content_Update_Submit');?>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Meta Title
                                        </strong>
                                    </small>
                                </label>
                                <textarea name="meta_title" placeholder="Meta Title" required class="form-control"><?= $results->Property_Meta_Title; ?></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Meta Keyword
                                        </strong>
                                    </small>
                                </label>
                                <textarea name="meta_keyword" placeholder="Meta Keyword" required class="form-control"><?= $results->Property_Meta_Keyword; ?></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Meta Description
                                        </strong>
                                    </small>
                                </label>
                                <textarea name="meta_description" placeholder="Meta Description" required class="form-control"><?= $results->Property_Meta_Description; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3" id="fs">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Price($ USD)
                                        </strong>
                                    </small>
                                </label>
                                <input type="number" name="USD" id="USD" placeholder="Price" required class="form-control" value="<?= $results->Property_price; ?>">
                                <input type="hidden" name="property_id"  required  value="<?= $results->Property_id; ?>">
                                <div class="mx-1 font-weight-bold" id="price_comma"></div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Reference Id
                                        </strong>
                                    </small>
                                </label>
                                <input type="text" name="reference_id" placeholder="Reference Id" required class="form-control" value="<?= $results->Property_referenceID; ?>">
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="hori-pass1" style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Property Type
                                        </strong>
                                    </small>
                                </label>
                                <select name="type" class="form-control" required>
                                    <option value="">Property Type</option>
                                    <option value="Apartment" <?php if($results->Property_type=="Apartment"){ echo"selected"; } ?>>Apartment</option>
                                    <option value="Bungalow" <?php if($results->Property_type=="Bungalow"){ echo"selected"; } ?>>Bungalow</option>
                                    <option value="Duplex" <?php if($results->Property_type=="Duplex"){ echo"selected"; } ?>>Duplex</option>
                                    <option value="Mansion" <?php if($results->Property_type=="Mansion"){ echo"selected"; } ?>>Mansion</option>
                                    <option value="Commercial" <?php if($results->Property_type=="Commercial"){ echo"selected"; } ?>>Commercial</option>
                                    <option value="Hotel for sale" <?php if($results->Property_type=="Hotel for sale"){ echo"selected"; } ?>>Hotel for sale</option>
                                    <option value="Land for sale" <?php if($results->Property_type=="Land for sale"){ echo"selected"; } ?>>Land for sale</option>
                                    <option value="Penthouse" <?php if($results->Property_type=="Penthouse"){ echo"selected"; } ?>>Penthouse</option>
                                    <option value="Villa" <?php if($results->Property_type=="Villa"){ echo"selected"; } ?>>Villa</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="hori-pass1" style="padding:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            City
                                        </strong>
                                    </small>
                                </label>
                                <select name="city" class="form-control" required>
                                    <option value="">Property City</option>
                                    <option value="Istanbul" <?php if($results->Property_location=="Istanbul"){ echo"selected"; } ?>> Istanbul</option>
                                    <option value="Cesme" <?php if($results->Property_location=="Cesme"){ echo"selected"; } ?>> Cesme</option>
                                    <option value="Antalya" <?php if($results->Property_location=="Antalya"){ echo"selected"; } ?>> Antalya</option>
                                    <option value="Dalaman" <?php if($results->Property_location=="Dalaman"){ echo"selected"; } ?>> Dalaman</option>
                                    <option value="Mersin" <?php if($results->Property_location=="Mersin"){ echo"selected"; } ?>> Mersin</option>
                                    <option value="Dalyan" <?php if($results->Property_location=="Dalyan"){ echo"selected"; } ?>> Dalyan</option>
                                    <option value="Datca" <?php if($results->Property_location=="Datca"){ echo"selected"; } ?>> Datca</option>
                                    <option value="Didim" <?php if($results->Property_location=="Didim"){ echo"selected"; } ?>> Didim</option>
                                    <option value="Fethiye" <?php if($results->Property_location=="Fethiye"){ echo"selected"; } ?>> Fethiye</option>
                                    <option value="Gocek" <?php if($results->Property_location=="Gocek"){ echo"selected"; } ?>> Gocek</option>
                                    <option value="Izmir" <?php if($results->Property_location=="Izmir"){ echo"selected"; } ?>> Izmir</option>
                                    <option value="Kalkan" <?php if($results->Property_location=="Kalkan"){ echo"selected"; } ?>> Kalkan</option>
                                    <option value="Kas" <?php if($results->Property_location=="Kas"){ echo"selected"; } ?>> Kas</option>
                                    <option value="Kemer" <?php if($results->Property_location=="Kemer"){ echo"selected"; } ?>> Kemer</option>
                                    <option value="Kirklareli" <?php if($results->Property_location=="Kirklareli"){ echo"selected"; } ?>> Kirklareli</option>
                                    <option value="Koycegiz" <?php if($results->Property_location=="Koycegiz"){ echo"selected"; } ?>> Koycegiz</option>
                                    <option value="Kusadasi" <?php if($results->Property_location=="Kusadasi"){ echo"selected"; } ?>> Kusadasi</option>
                                    <option value="Marmaris" <?php if($results->Property_location=="Marmaris"){ echo"selected"; } ?>> Marmaris</option>
                                    <option value="Ordu" <?php if($results->Property_location=="Ordu"){ echo"selected"; } ?>> Ordu</option>
                                    <option value="Sakarya" <?php if($results->Property_location=="Sakarya"){ echo"selected"; } ?>> Sakarya</option>
                                    <option value="Side" <?php if($results->Property_location=="Side"){ echo"selected"; } ?>> Side</option>
                                    <option value="Trabzon" <?php if($results->Property_location=="Trabzon"){ echo"selected"; } ?>> Trabzon</option>
                                    <option value="Yalova" <?php if($results->Property_location=="Yalova"){ echo"selected"; } ?>> Yalova</option>
                                    <option value="Bodrum" <?php if($results->Property_location=="Bodrum"){ echo"selected"; } ?>> Bodrum</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-3">
                                <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Location
                                        </strong>
                                    </small>
                                </label>
                                <input type="text" name="Property_location_city" placeholder="Location" class="form-control" required value="<?= $results->Property_location_city; ?>">
                            </div>
                            <div class="form-group col-sm-3">
                                <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Bedrooms
                                        </strong>
                                    </small>
                                </label>
                                <input type="number" name="bedrooms" placeholder="Bedrooms"  class="form-control" required value="<?= $results->Property_Bedrooms; ?>">
                            </div>
                            <div class="form-group col-sm-3">
                                <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Bathrooms
                                        </strong>
                                    </small>
                                </label>
                                <input type="number" name="bathrooms" placeholder="Bathrooms" class="form-control" required value="<?= $results->Property_Bathrooms; ?>">
                            </div>
                            <div class="form-group col-sm-3">
                                <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Space (sqm)
                                        </strong>
                                    </small>
                                </label>
                                <input type="text" name="living_space" placeholder="Living space sqm" class="form-control" value="<?= $results->Property_living_space; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Pool
                                        </strong>
                                    </small>
                                </label>
                                <input name="pool" type="text" placeholder="Pool" class="form-control" value="<?= $results->Property_pool; ?>">
                            </div>
                            <div class="form-group col-sm-8">
                                <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Title
                                        </strong>
                                    </small>
                                </label>
                                <input name="title" type="text" placeholder="Title" required class="form-control" value="<?= $results->Property_title; ?>">
                            </div>
                            <div class="form-group col-sm-1">
                                <label style="padding-top:20px;padding-bottom:5px;margin-left: -1.1rem" class="control-label">
                                    <small>
                                        <strong>
                                            Featured
                                        </strong>
                                    </small>
                                </label>
                                <br>
                                <input type="checkbox" name="status" value="3" class="form-check-input" style="width: 30px;height: 30px" <?php if($results->status=='3'){echo"checked";} ?>>
                            </div>
                            <div class="form-group col-sm-1">
                                <label style="padding-top:20px;padding-bottom:5px;margin-left: -1.1rem" class="control-label">
                                    <small>
                                        <strong>
                                            recommended
                                        </strong>
                                    </small>
                                </label>
                                <br>
                                <input type="checkbox" name="recommended" value="2" class="form-check-input" style="width: 30px;height: 30px" <?php if($results->recommended=='2'){echo"checked";} ?>>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="mapLocationURL">
                                        <small>
                                            <b>
                                                map location (url only please)
                                            </b>
                                        </small>
                                    </label>
                                    <input type="text" name="mapLocationURL" id="mapLocationURL" class="form-control" value="<?= $results->mapLocationURL; ?>">
                                </div>
                            </div>
                            <div class="form-group col-sm-1">
                                <label class="control-label">
                                    <small>
                                        <strong>
                                            SoldOut
                                        </strong>
                                    </small>
                                </label>
                                <br>
                                <input type="checkbox" name="SoldOut" value="1" class="form-check-input" style="width: 30px;height: 30px" <?php if($results->SoldOut=='1'){echo"checked";} ?>>
                            </div>
                            <div class="form-group col-sm-1">
                                <label class="control-label">
                                    <small>
                                        <strong>
                                            Commercial
                                        </strong>
                                    </small>
                                </label>
                                <br>
                                <input type="checkbox" name="Commercial" value="1" class="form-check-input" style="width: 30px;height: 30px" <?php if($results->is_commercial=='1'){echo"checked";} ?>>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label style="margin-top:10px;padding:5px;" class="control-label">
                                    Overview
                                    <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#OverviewModal" >
                                        <i class="fas fa-file-prescription "></i>
                                    </button>
                                </label>
                                <textarea type="text" name="overview" placeholder="Overview" required class="form-control summernote"><?= $results->Property_overview; ?></textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label style="margin-top:10px;padding:5px;" class="control-label">
                                    Why buy this Property
                                    <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#WhyModal" >
                                        <i class="fas fa-file-prescription "></i>
                                    </button>
                                </label>
                                <textarea type="text" name="why_this_property" placeholder="Why buy this Property" required class="form-control summernote"><?= $results->Property_why_buy_this_property; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label style="margin-top:10px;padding:5px;" class="control-label">
                                    Property Content
                                    <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#ContentModal" >
                                        <i class="fas fa-file-prescription "></i>
                                    </button>
                                </label>
                                <textarea name="description" type="text" placeholder="Property Description" required class="form-control summernote"><?= $results->Property_description; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 text-left">
                                <label class="mr-4">
                                    <small>
                                        <strong>
                                            FormattingDone<span class="text-danger">(PleaseDoNotTouch)</span>
                                        </strong>
                                    </small>
                                </label>
                                <input type="checkbox" name="formattingDone" value="1" class="form-check-input" <?php if($results->formattingDone=='1'){echo"checked";} ?>>
                            </div>
                            <div class="col-sm-7 text-right">
                                <button type="reset" name="submitBtn" class="btn btn-warning ">
                                    Reset Form
                                </button>
                                <button type="submit" name="submitBtn" class="btn btn-primary ">
                                    Update Property
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
                                    Update Thumbnail Image
                                </b>
                            </small>
                        </div>
                        <?php echo form_open_multipart(base_url().'Admin/Property_Thumbnail_Update_Submit');?>
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
                                    <input type="file" name="thumbnail_image" class="form-control" id="thumbnail_image" accept=".jpg" required>
                                    <input name="property_id" type="hidden" required value="<?= $results->Property_id; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" name="submitBtn" class="btn btn-primary ">
                                    Update Thumbnail Image
                                </button>
                            </div>
                        </div>
                        </form>
                        <hr width="75%">
                        <div class="card-text">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <? $image_name = str_replace('assets/thumbnail/', '', $results->Property_thumbnail);
                                    $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                                    if ($image_name_webp==''){
                                        $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                                    }
                                    if ($image_name_webp==''){
                                        $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                                    }
                                    ?>
                                    <img src="<?= base_url();?>assets/web-site/images/properties/P_Thumb/<?= $image_name_webp; ?>" class="img-fluid img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card py-3 my-3">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <small>
                                <b>
                                   Insert New Property Images
                                </b>
                            </small>
                            <?php echo form_open_multipart(base_url().'Admin/Property_Images_Update_Submit');?>
                                <div class="row">
                                    <div class="form-group col-sm-12 text-left">
                                        <label style="padding-top:20px;" class="control-label">
                                            <small>
                                                <b>
                                                    New Gallery Images
                                                </b>
                                            </small>
                                        </label>
                                        <input type="file" name="property_images[]" multiple="true" required accept=".jpg" class="form-control"/>
                                        <input type="hidden" name="property_id" value="<?php echo $results->Property_id; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" name="submitBtn" class="btn btn-primary ">
                                            Submit Images
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr width="75%">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Image</th>
                                                <th>Image Sequence</th>
                                                <th>Action</th>
                                            </tr>
                                            <?
                                            if ($gallery){
                                                $counter=1;
                                                foreach($gallery as $row){ ?>
                                                    <tr>
                                                        <form action="<?= base_url();?>Admin/ChangeGalleryOrder" method="post">
                                                            <td>
                                                                <?php echo $counter++; ?>
                                                            </td>
                                                            <td>
                                                                <? $image_name = str_replace('assets/uploads/', '', $row->gallery_image);
                                                                $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                                                                if ($image_name_webp==''){
                                                                    $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                                                                }
                                                                if ($image_name_webp==''){
                                                                    $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                                                                }
                                                                ?>
                                                                <a href="<?= base_url()."assets/web-site/images/properties/watermark/".$image_name_webp; ?>" target="_blank">

                                                                    <img src="<?= base_url()."assets/web-site/images/properties/whatsapp/".$image_name_webp; ?>" class="img-fluid">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="image_order" value="<?php echo $row->image_order; ?>" class="form-control">
                                                                <input type="hidden" name="image_id" value="<?php echo $row->gallery_id; ?>">
                                                            </td>
                                                            <td>
                                                                <button type="submit" class="btn btn-success">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <a href="<?php echo base_url("Admin/Delete_Property_Gallery/$row->gallery_id"); ?>" class="btn btn-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </form>
                                                    </tr>
                                            <? }
                                            } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="OverviewModal" tabindex="-1" aria-labelledby="OverviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Overview Tag Strip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea disabled class="form-control" rows="10"><p style="margin: 10px 0; font-family:'Arial'; font-size: 14px;text-align: justify"><?= strip_tags($results->Property_overview);?></p></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="WhyModal" tabindex="-1" aria-labelledby="WhyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Why buy Tag Strip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <? $why_array = explode('-',strip_tags($results->Property_why_buy_this_property)); ?>
                <textarea disabled class="form-control" rows="12"><p style="margin: 10px 0; font-family:'Arial'; font-size: 14px;text-align: justify"><? foreach ($why_array as $w_row){?><? if ($w_row!=""){ ?>- <?= $w_row;?><br><? } ?><?}?></p></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ContentModal" tabindex="-1" aria-labelledby="ContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">content Tag Strip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= strip_tags($results->Property_description);?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/include/footer'); ?>
<?php $this->load->view('admin/include/foot-load'); ?>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph','height','style']],
                ['insert', ['link', 'picture', 'video','table']],
                ['view', ['fullscreen', 'codeview', 'help','undo','redo']],
                        ],
            lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
    });
    var postForm = function() {
        var content = $('textarea[name="content"]').html($('.summernote').code());
    }
    $('#USD').keyup(function () {
        let x = $(this).val();
        $('#price_comma').text('$' + addCommas(x));
    });
    function addCommas(x) {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
</script>

</body>
</html>