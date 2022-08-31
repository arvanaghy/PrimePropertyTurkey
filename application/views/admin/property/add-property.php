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
                                Add Property
                            </b>
                        </div>
                        <div class="page-title col-md-6 text-right">
                            <a href="<?= base_url(); ?>Admin/Manage_property" class="btn btn-lg btn-primary"><i class="far fa-building "></i> Manage Properties</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row pt-2 pb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php echo form_open_multipart(base_url().'Admin/Add_Property_Submit');?>
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
                                    <textarea name="meta_description" placeholder="Meta Description" required class="form-control"></textarea>
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
                                    <input type="text" name="USD" id="USD" placeholder="Price" required class="form-control">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label style="padding:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Reference Id
                                            </strong>
                                        </small>
                                    </label>
                                    <input type="text" name="reference_id" id="reference" placeholder="Reference Id" required class="form-control">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="hori-pass1" style="padding:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Property Type
                                            </strong>
                                        </small>
                                    </label>
                                    <select name="type" id="type"  class="form-control" required>
                                        <option value="">Property Type</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Duplex">Duplex</option>
                                        <option value="Bungalow">Bungalow</option>
                                        <option value="Bungalow">Mansion</option>
                                        <option value="Commercial">Commercial</option>
                                        <option value="Hotel for sale">Hotel for sale</option>
                                        <option value="Land for sale">Land for sale</option>
                                        <option value="Penthouse">Penthouse</option>
                                        <option value="Villa">Villa</option>
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
                                    <select name="city" id="city" class="form-control" required>
                                        <option value="">Property City</option>
                                        <option value="Istanbul">Istanbul</option>
                                        <option value="Fethiye">Fethiye</option>
                                        <option value="Kalkan">Kalkan</option>
                                        <option value="Kas">Kas</option>
                                        <option value="Gocek">Gocek</option>
                                        <option value="Izmir">Izmir</option>
                                        <option value="Antalya">Antalya</option>
                                        <option value="Antalya">Mersin</option>
                                        <option value="Cesme">Cesme</option>
                                        <option value="Dalaman">Dalaman</option>
                                        <option value="Dalyan"> Dalyan</option>
                                        <option value="Datca"> Datca</option>
                                        <option value="Didim"> Didim</option>
                                        <option value="Kemer"> Kemer</option>
                                        <option value="Kirklareli"> Kirklareli</option>
                                        <option value="Koycegiz"> Koycegiz</option>
                                        <option value="Kusadasi"> Kusadasi</option>
                                        <option value="Marmaris"> Marmaris</option>
                                        <option value="Ordu"> Ordu</option>
                                        <option value="Sakarya"> Sakarya</option>
                                        <option value="Side"> Side</option>
                                        <option value="Trabzon"> Trabzon</option>
                                        <option value="Yalova"> Yalova</option>
                                        <option value="Bodrum"> Bodrum</option>
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
                                    <input type="text" name="Property_location_city" placeholder="Location" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Bedrooms
                                            </strong>
                                        </small>
                                    </label>
                                    <input type="number" name="bedrooms" placeholder="Bedrooms"  class="form-control" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Bathrooms
                                            </strong>
                                        </small>
                                    </label>
                                    <input type="number" name="bathrooms" placeholder="Bathrooms" class="form-control" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Space (sqm)
                                            </strong>
                                        </small>
                                    </label>
                                    <input type="text" name="living_space" placeholder="Living space sqm" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Title
                                            </strong>
                                        </small>
                                    </label>
                                    <input name="title" type="text" id="title" placeholder="Title" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                URL
                                            </strong>
                                            ( Only words NO dashes NO under lines, Thnx Mercy &#128516; )
                                        </small>
                                    </label>
                                    <input name="URL_SLUG" id="URL_SLUG" type="text" placeholder="Url" class="form-control">
                                    <span id="url_error" style="color: red;"></span>
                                    <span id="url_suggest_info" style="color: blue;display: none;font-size: 0.8rem">Mercy I have some Suggestion For you, if its suitable you can copy it in the box</span>
                                    <span id="url_suggest" style="color: black;"></span>
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
                                <input name="pool" type="text" placeholder="Pool" class="form-control">
                            </div>
                            <div class="form-group col-sm-3">
                                <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Images
                                        </strong>
                                    </small>
                                </label>
                                <input type="file" name="property_images[]" multiple="true" accept=".jpg" class="form-control"/>
                            </div>
                            <div class="form-group col-sm-3">
                                <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                    <small>
                                        <strong>
                                            Thumbnail
                                        </strong>
                                    </small>
                                </label>
                                <input type="file" name="thumbnail_image" required accept=".jpg" class="form-control"/>
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
                                <input type="checkbox" name="status" value="3" class="form-check-input" style="width: 30px;height: 30px">
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
                                <input type="checkbox" name="recommended" value="2" class="form-check-input" style="width: 30px;height: 30px">
                            </div>
                            <div class="form-group col-sm-1">
                                <label  style="padding-top:20px;padding-bottom:5px;margin-left: -1.1rem" class="control-label">
                                    <small>
                                        <strong>
                                            Commercial
                                        </strong>
                                    </small>
                                </label>
                                <br>
                                <input type="checkbox" name="Commercial" value="1" class="form-check-input" style="width: 30px;height: 30px">
                            </div>

                        </div>
                            <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mapLocationURL">
                                        <small>
                                            <b>
                                                map location (url only please)
                                            </b>
                                        </small>
                                    </label>
                                    <input type="text" name="mapLocationURL" id="mapLocationURL" class="form-control">
                                </div>
                            </div>
                           </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label style="margin-top:10px;padding:5px;" class="control-label">Overview</label>
                                    <textarea type="text" name="overview" placeholder="Overview" required="" class="form-control summernote"></textarea>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label style="margin-top:10px;padding:5px;" class="control-label">Why buy this Property</label>
                                    <textarea type="text" name="why_this_property" placeholder="Why buy this Property" required="" class="form-control summernote"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label style="margin-top:10px;padding:5px;" class="control-label">Property Content
                                    </label>
                                    <textarea name="description" type="text" placeholder="Property Description" required="required" class="form-control summernote" id="description"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="reset" name="submitBtn" class="btn btn-warning ">
                                        Reset Form
                                    </button>
                                    <button type="submit" id="submitBtn" name="submitBtn" class="btn btn-primary ">
                                        Add Property
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css" integrity="sha512-m52YCZLrqQpQ+k+84rmWjrrkXAUrpl3HK0IO4/naRwp58pyr7rf5PO1DbI2/aFYwyeIH/8teS9HbLxVyGqDv/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: false
        });
    });
    var postForm = function() {
        var content = $('textarea[name="content"]').html($('.summernote').code());
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#URL_SLUG').change(function(){
            $("#submitBtn").prop("disabled",false);
            let valued_data = $(this).val();
            $('#url_error').text('');
            $.ajax({
                url:'<?= base_url(); ?>Admin/propertyTitleCheck',
                method: 'POST',
                data: {value_data_posted: valued_data},
                dataType: 'json',
                success: function(response){
                    $.each(response, function (i, item) {
                        $('#url_error').html('this title is used , please choose another one <br>');
                        $("#submitBtn").prop("disabled",true);
                    });
                }
            });
        });
        $('#URL_SLUG').click(function () {
            let type = $('#type').val().toLowerCase();
            let city = $('#city').val().toLowerCase();
            let reference = $('#reference').val().toLowerCase();
            let title = $('#title').val().toLowerCase();
            let sq1 = 'for sale in';
            let sq2 = 'for sale';
            let sq3 = 'sale';
            let manipulate = '';
            if (title.includes(type) > 0){
                  manipulate = title.replace(type,'');
            }else{
                  manipulate = title;
            }
            title = manipulate;
            if(title.includes(city)){
                 manipulate =  title.replace(city,'');
            }else{
                manipulate = title;
            }
            title = manipulate;

            if(title.includes(reference)){
                manipulate =  title.replace(reference,'');
            }else{
                manipulate = title;
            }
            title = manipulate;

            if(title.includes(sq1)){
                manipulate =  title.replace(sq1,'');
            }else{
                manipulate = title;
            }
            title = manipulate;

            if(title.includes(sq2)){
                manipulate =  title.replace(sq2,'');
            }else{
                manipulate = title;
            }
            title = manipulate;

            if(title.includes(sq3)){
                manipulate =  title.replace(sq3,'');
            }else{
                manipulate = title;
            }
            title = manipulate;

            let showed_text = title + ' '+type+' for sale '+city+' '+reference;
            $('#url_suggest_info').css('display','inline-block');
            $('#url_suggest').html("<br>"+showed_text);

        })
    });
</script>
</body>
</html>