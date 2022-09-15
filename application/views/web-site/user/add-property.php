<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/about-us.css">
<title>User dashboard | Add property</title>
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
    .menu_activated{
        background-color: #eaeaea !important;
    }

</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
      integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
      crossorigin=""/>
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
            <div class="col-md-8 text-center my-2">
                <div class="card">
                    <div class="card-body">
                        <div class="user-section-title">
                            Add Property
                        </div>
                        <div class="user-section-description">
                            You can add your Property for sale with submit this form
                        </div>
                        <hr width="75%">
                        <? if ($userLevel == 9){ ?>
                        <?php echo form_open_multipart(base_url() . 'User/Add_Property_Submit',array('onsubmit' => 'return AddProperty();')); ?>
                            <div class="row">
                                <div class="col-md-6 form-group text-left">
                                    <label for="kind">
                                        <small>
                                            <strong>
                                                Property Type
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>

                                    </label>
                                    <select name="kind" id="kind" class="form-control" required>
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
                                <div class="form-group col-md-6 text-left">
                                    <label for="location">
                                        <small>
                                            <strong>
                                                City
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <select name="location" id="location"  class="form-control" required >
                                        <option value="0">Property City</option>
                                        <option value="Istanbul">Istanbul</option>
                                        <option value="Ankara">Ankara</option>
                                        <option value="İzmir">İzmir</option>
                                        <option value="Mugla">Muğla</option>
                                        <option value="Adana">Adana</option>
                                        <option value="Adiyaman">Adıyaman</option>
                                        <option value="Afyonkarahisar">Afyonkarahisar</option>
                                        <option value="Agiri">Ağrı</option>
                                        <option value="Amasya">Amasya</option>
                                        <option value="Antalya">Antalya</option>
                                        <option value="Artvin">Artvin</option>
                                        <option value="Aydin">Aydın</option>
                                        <option value="Balikesir">Balıkesir</option>
                                        <option value="Bilecik">Bilecik</option>
                                        <option value="Bingol">Bingöl</option>
                                        <option value="Bitlis">Bitlis</option>
                                        <option value="Bolu">Bolu</option>
                                        <option value="Burdur">Burdur</option>
                                        <option value="Bursa">Bursa</option>
                                        <option value="Canakkale">Çanakkale</option>
                                        <option value="Cankiri">Çankırı</option>
                                        <option value="Corum">Çorum</option>
                                        <option value="Denizli">Denizli</option>
                                        <option value="Diyarbakir">Diyarbakır</option>
                                        <option value="Edirne">Edirne</option>
                                        <option value="Elazig">Elâzığ</option>
                                        <option value="Erzincan">Erzincan</option>
                                        <option value="Erzurum">Erzurum</option>
                                        <option value="Eskisehir">Eskişehir</option>
                                        <option value="Gaziantep">Gaziantep</option>
                                        <option value="Giresun">Giresun</option>
                                        <option value="Gumushane">Gümüşhane</option>
                                        <option value="Hakkari">Hakkâri</option>
                                        <option value="Hatay">Hatay</option>
                                        <option value="Isparta">Isparta</option>
                                        <option value="Mersin">Mersin</option>
                                        <option value="Kars">Kars</option>
                                        <option value="Kastamonu">Kastamonu</option>
                                        <option value="Kayseri">Kayseri</option>
                                        <option value="Kirklareli">Kırklareli</option>
                                        <option value="Kirsehir">Kırşehir</option>
                                        <option value="Kocaeli">Kocaeli</option>
                                        <option value="Konya">Konya</option>
                                        <option value="Kutahya">Kütahya</option>
                                        <option value="Malatya">Malatya</option>
                                        <option value="Manisa">Manisa</option>
                                        <option value="Kahramanmaraş">Kahramanmaraş</option>
                                        <option value="Mardin">Mardin</option>
                                        <option value="Mus">Muş</option>
                                        <option value="Nevsehir">Nevşehir</option>
                                        <option value="Nigde">Niğde</option>
                                        <option value="Ordu">Ordu</option>
                                        <option value="Rize">Rize</option>
                                        <option value="Sakarya">Sakarya</option>
                                        <option value="Samsun">Samsun</option>
                                        <option value="Siirt">Siirt</option>
                                        <option value="Sinop">Sinop</option>
                                        <option value="Sivas">Sivas</option>
                                        <option value="Tekirdag">Tekirdağ</option>
                                        <option value="Tokat">Tokat</option>
                                        <option value="Trabzon">Trabzon</option>
                                        <option value="Tunceli">Tunceli</option>
                                        <option value="Sanliurfa">Şanlıurfa</option>
                                        <option value="Usak">Uşak</option>
                                        <option value="Van">Van</option>
                                        <option value="Yozgat">Yozgat</option>
                                        <option value="Zonguldak">Zonguldak</option>
                                        <option value="Aksaray">Aksaray</option>
                                        <option value="Bayburt">Bayburt</option>
                                        <option value="Karaman">Karaman</option>
                                        <option value="Kirikkale">Kırıkkale</option>
                                        <option value="Batman">Batman</option>
                                        <option value="Sirnak">Şırnak</option>
                                        <option value="Bartın">Bartın</option>
                                        <option value="Ardahan">Ardahan</option>
                                        <option value="Igdir">Iğdır</option>
                                        <option value="Yalova">Yalova</option>
                                        <option value="Karabuk">Karabük</option>
                                        <option value="Kilis">Kilis</option>
                                        <option value="Osmaniye">Osmaniye</option>
                                        <option value="Duzce">Düzce</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 text-left">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Bedrooms
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <input type="number" name="bedroom" placeholder="Bedrooms" class="form-control"
                                           required>
                                </div>
                                <div class="form-group col-md-4 text-left">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Bathrooms
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>

                                    </label>
                                    <input type="number" name="bathroom" placeholder="Bathrooms" class="form-control"
                                           required>
                                </div>
                                <div class="form-group col-md-4 text-left">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Space (sqm)
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>

                                    </label>
                                    <input type="number" name="living_space" placeholder="Living space sqm"
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8 text-left">
                                    <label for="title" style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Title
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>

                                    </label>
                                    <input type="text" class="form-control" name="title" id="title" required>
                                    <div id="title_error" class="text-danger"></div>
                                </div>
                                <div class="form-group col-md-4 text-left">
                                    <label for="price" style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Price (In US Dollar)
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" name="price" id="price" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-9 text-left">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Images
                                            </strong>
                                            <span>
                                                (max 15 image in jpg format,max dimensions 1200*700 pixel and 2Mb)
                                            </span>
                                        </small>
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <input type="file" name="property_images[]" id="property_images" multiple="true" accept=".jpg"
                                           class="form-control" required/>
                                    <div id="property_images_error" class="text-danger text-left font-weight-bold my-3"></div>
                                </div>
                                <div class="form-group col-md-3 text-left mt-md-5 pt-md-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="pool" name="pool" style="width: 30px;height: 30px">
                                        <label class="form-check-label ml-md-4 mt-md-2  ml-3 mt-2 " for="pool">
                                            <strong>
                                                POOL
                                            </strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="latit" id="latit">
                            <input type="hidden" name="longit" id="longit">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div id="my_map"></div>
                                    <div id="my_map_error" class="text-danger text-left my-3 font-weight-bold"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-left">
                                    <div class="form-group">
                                        <label for="description">
                                            <small>
                                                <strong>
                                                    Additional Description
                                                </strong>
                                            </small>
                                        </label>
                                        <textarea name="description" id="description" class="form-control" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-block btn-primary" value="Submit Property" id="submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <? }else{ ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Sorry, This section is unavailable for your account</strong>
                                <br>
                                Your email is not activated.
                                <br>
                                Please go to your email and click on verification link
                            </div>
                         <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
<script type="text/javascript">
    var map = L.map('my_map').setView([38.9637, 35.2433], 5.5);

    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    var marker;
    map.on('click', function (e) {
        if (marker)
            map.removeLayer(marker);
        document.getElementById('latit').value = e.latlng.lat;
        document.getElementById('longit').value = e.latlng.lng;
        marker = L.marker(e.latlng).addTo(map);
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#title').change(function(){
            $("#submit").prop("disabled",false);
            let value_data = $(this).val();
            $('#title_error').text('');
            $.ajax({
                url:'<?= base_url(); ?>User/propertyTitleCheck',
                method: 'POST',
                data: {value_data: value_data},
                dataType: 'json',
                success: function(response){
                    $.each(response, function (i, item) {
                        $('#title_error').text('this title is used , please choose another one');
                        $("#submit").prop("disabled",true);

                    });
                }
            });
        });
    });
</script>
<script type="text/javascript">
    function AddProperty(){
        document.getElementById('my_map_error').innerText='';
        document.getElementById('property_images_error').innerText='';
        let correctFlag = true;
        let lat = document.getElementById("latit");
        let long = document.getElementById("longit");
        if (!lat.value && !long.value ){
            correctFlag = false;
            document.getElementById('my_map_error').innerText='Please select your property location on the map';
            document.getElementById('my_map').focus();
        }
        let fileUpload = document.getElementById("property_images");
        let images_cont = fileUpload.files.length;
        for (let i = 0; i < images_cont; i++) {
            if ((fileUpload.files[i].size/1024).toFixed(0)>2048){
                document.getElementById('property_images_error').innerText='image size is more than 2 MB, please reduce your image size';
                document.getElementById('property_images').focus();
                correctFlag = false;
            }
            let reader = new FileReader();
            reader.readAsDataURL(fileUpload.files[i]);
            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                    if (this.width > 4800 || this.height > 2880){
                        document.getElementById('property_images_error').innerText='image dimensions are bigger than 4800 * 2880  pixel';
                        document.getElementById('property_images').focus();
                        correctFlag = false;
                    }
                };
                delete image;
            }
            delete reader;
        }
        return correctFlag;
    }
</script>
</body>
</html>
