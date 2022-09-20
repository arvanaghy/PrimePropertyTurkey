<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/about-us.css">
<title>User dashboard | Edit property</title>
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
            <?php
            $Passed_data['images']= $images;
            $this->load->view('web-site/user/user-menu',$Passed_data); ?>
            <div class="col-md-8 text-center my-2">
                <div class="card">
                    <div class="card-body">
                        <div class="user-section-title">
                            Edit <span class="red-text font-weight-bold"><?= $results->title ?></span> Property
                        </div>
                        <div class="user-section-description">
                            You Can Edit Your Property For Sale With This Form
                        </div>
                        <hr width="75%">
                        <form action="<?= base_url();?>User/Edit_Resale_Submit" method="post" onsubmit="return AddProperty();">
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
                                        <option value="Apartment" <? if ($results->kind=="Apartment"){ echo "selected";} ?> >Apartment</option>
                                        <option value="Duplex" <? if ($results->kind=="Duplex"){ echo "selected";} ?> >Duplex</option>
                                        <option value="Bungalow" <? if ($results->kind=="Bungalow"){ echo "selected";} ?> >Bungalow</option>
                                        <option value="Mansion" <? if ($results->kind=="Mansion"){ echo "selected";} ?> >Mansion</option>
                                        <option value="Commercial" <? if ($results->kind=="Commercial"){ echo "selected";} ?> >Commercial</option>
                                        <option value="Hotel for sale" <? if ($results->kind=="Hotel for sale"){ echo "selected";} ?> >Hotel for sale</option>
                                        <option value="Land for sale" <? if ($results->kind=="Land for sale"){ echo "selected";} ?> >Land for sale</option>
                                        <option value="Penthouse" <? if ($results->kind=="Penthouse"){ echo "selected";} ?> >Penthouse</option>
                                        <option value="Villa" <? if ($results->kind=="Villa"){ echo "selected";} ?> >Villa</option>
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
                                        <option value="Istanbul" <? if ($results->location=="Istanbul"){ echo "selected";} ?> >Istanbul</option>
                                        <option value="Ankara" <? if ($results->location=="Ankara"){ echo "selected";} ?> >Ankara</option>
                                        <option value="İzmir" <? if ($results->location=="İzmir"){ echo "selected";} ?> >İzmir</option>
                                        <option value="Mugla" <? if ($results->location=="Mugla"){ echo "selected";} ?> >Muğla</option>
                                        <option value="Adana" <? if ($results->location=="Adana"){ echo "selected";} ?> >Adana</option>
                                        <option value="Adiyaman" <? if ($results->location=="Adiyaman"){ echo "selected";} ?> >Adıyaman</option>
                                        <option value="Afyonkarahisar" <? if ($results->location=="Afyonkarahisar"){ echo "selected";} ?> >Afyonkarahisar</option>
                                        <option value="Agiri" <? if ($results->location=="Agiri"){ echo "selected";} ?> >Ağrı</option>
                                        <option value="Amasya" <? if ($results->location=="Amasya"){ echo "selected";} ?> >Amasya</option>
                                        <option value="Antalya" <? if ($results->location=="Antalya"){ echo "selected";} ?> >Antalya</option>
                                        <option value="Artvin"  <? if ($results->location=="Artvin"){ echo "selected";} ?> >Artvin</option>
                                        <option value="Aydin"  <? if ($results->location=="Aydin"){ echo "selected";} ?> >Aydın</option>
                                        <option value="Balikesir"  <? if ($results->location=="Balikesir"){ echo "selected";} ?> >Balıkesir</option>
                                        <option value="Bilecik"  <? if ($results->location=="Bilecik"){ echo "selected";} ?> >Bilecik</option>
                                        <option value="Bingol"  <? if ($results->location=="Bingol"){ echo "selected";} ?> >Bingöl</option>
                                        <option value="Bitlis"  <? if ($results->location=="Bitlis"){ echo "selected";} ?> >Bitlis</option>
                                        <option value="Bolu"  <? if ($results->location=="Bolu"){ echo "selected";} ?> >Bolu</option>
                                        <option value="Burdur"  <? if ($results->location=="Burdur"){ echo "selected";} ?> >Burdur</option>
                                        <option value="Bursa"  <? if ($results->location=="Bursa"){ echo "selected";} ?> >Bursa</option>
                                        <option value="Canakkale"  <? if ($results->location=="Canakkale"){ echo "selected";} ?> >Çanakkale</option>
                                        <option value="Cankiri"  <? if ($results->location=="Cankiri"){ echo "selected";} ?> >Çankırı</option>
                                        <option value="Corum"  <? if ($results->location=="Corum"){ echo "selected";} ?> >Çorum</option>
                                        <option value="Denizli"  <? if ($results->location=="Denizli"){ echo "selected";} ?> >Denizli</option>
                                        <option value="Diyarbakir"  <? if ($results->location=="Diyarbakir"){ echo "selected";} ?> >Diyarbakır</option>
                                        <option value="Edirne"  <? if ($results->location=="Edirne"){ echo "selected";} ?> >Edirne</option>
                                        <option value="Elazig"  <? if ($results->location=="Elazig"){ echo "selected";} ?> >Elâzığ</option>
                                        <option value="Erzincan"  <? if ($results->location=="Erzincan"){ echo "selected";} ?> >Erzincan</option>
                                        <option value="Erzurum"  <? if ($results->location=="Erzurum"){ echo "selected";} ?> >Erzurum</option>
                                        <option value="Eskisehir"  <? if ($results->location=="Eskisehir"){ echo "selected";} ?> >Eskişehir</option>
                                        <option value="Gaziantep"  <? if ($results->location=="Gaziantep"){ echo "selected";} ?> >Gaziantep</option>
                                        <option value="Giresun"  <? if ($results->location=="Giresun"){ echo "selected";} ?> >Giresun</option>
                                        <option value="Gumushane"  <? if ($results->location=="Gumushane"){ echo "selected";} ?> >Gümüşhane</option>
                                        <option value="Hakkari"  <? if ($results->location=="Hakkari"){ echo "selected";} ?> >Hakkâri</option>
                                        <option value="Hatay"  <? if ($results->location=="Hatay"){ echo "selected";} ?> >Hatay</option>
                                        <option value="Isparta"  <? if ($results->location=="Isparta"){ echo "selected";} ?> >Isparta</option>
                                        <option value="Mersin"  <? if ($results->location=="Mersin"){ echo "selected";} ?> >Mersin</option>
                                        <option value="Kars"  <? if ($results->location=="Kars"){ echo "selected";} ?> >Kars</option>
                                        <option value="Kastamonu"  <? if ($results->location=="Kastamonu"){ echo "selected";} ?> >Kastamonu</option>
                                        <option value="Kayseri" <? if ($results->location=="Kayseri"){ echo "selected";} ?>>Kayseri</option>
                                        <option value="Kirklareli" <? if ($results->location=="Kirklareli"){ echo "selected";} ?>>Kırklareli</option>
                                        <option value="Kirsehir" <? if ($results->location=="Kirsehir"){ echo "selected";} ?>>Kırşehir</option>
                                        <option value="Kocaeli" <? if ($results->location=="Kocaeli"){ echo "selected";} ?>>Kocaeli</option>
                                        <option value="Konya" <? if ($results->location=="Konya"){ echo "selected";} ?>>Konya</option>
                                        <option value="Kutahya" <? if ($results->location=="Kutahya"){ echo "selected";} ?>>Kütahya</option>
                                        <option value="Malatya" <? if ($results->location=="Malatya"){ echo "selected";} ?>>Malatya</option>
                                        <option value="Manisa" <? if ($results->location=="Manisa"){ echo "selected";} ?>>Manisa</option>
                                        <option value="Kahramanmaraş" <? if ($results->location=="Kahramanmaraş"){ echo "selected";} ?>>Kahramanmaraş</option>
                                        <option value="Mardin" <? if ($results->location=="Mardin"){ echo "selected";} ?>>Mardin</option>
                                        <option value="Mus" <? if ($results->location=="Mus"){ echo "selected";} ?>>Muş</option>
                                        <option value="Nevsehir" <? if ($results->location=="Nevsehir"){ echo "selected";} ?>>Nevşehir</option>
                                        <option value="Nigde" <? if ($results->location=="Nigde"){ echo "selected";} ?>>Niğde</option>
                                        <option value="Ordu" <? if ($results->location=="Ordu"){ echo "selected";} ?>>Ordu</option>
                                        <option value="Rize" <? if ($results->location=="Rize"){ echo "selected";} ?>>Rize</option>
                                        <option value="Sakarya" <? if ($results->location=="Sakarya"){ echo "selected";} ?>>Sakarya</option>
                                        <option value="Samsun" <? if ($results->location=="Samsun"){ echo "selected";} ?>>Samsun</option>
                                        <option value="Siirt" <? if ($results->location=="Siirt"){ echo "selected";} ?>>Siirt</option>
                                        <option value="Sinop" <? if ($results->location=="Sinop"){ echo "selected";} ?>>Sinop</option>
                                        <option value="Sivas" <? if ($results->location=="Sivas"){ echo "selected";} ?>>Sivas</option>
                                        <option value="Tekirdag" <? if ($results->location=="Tekirdag"){ echo "selected";} ?>>Tekirdağ</option>
                                        <option value="Tokat" <? if ($results->location=="Tokat"){ echo "selected";} ?>>Tokat</option>
                                        <option value="Trabzon" <? if ($results->location=="Trabzon"){ echo "selected";} ?>>Trabzon</option>
                                        <option value="Tunceli" <? if ($results->location=="Tunceli"){ echo "selected";} ?>>Tunceli</option>
                                        <option value="Sanliurfa" <? if ($results->location=="Sanliurfa"){ echo "selected";} ?>>Şanlıurfa</option>
                                        <option value="Usak" <? if ($results->location=="Usak"){ echo "selected";} ?>>Uşak</option>
                                        <option value="Van"  <? if ($results->location=="Van"){ echo "selected";} ?>>Van</option>
                                        <option value="Yozgat" <? if ($results->location=="Yozgat"){ echo "selected";} ?>>Yozgat</option>
                                        <option value="Zonguldak" <? if ($results->location=="Zonguldak"){ echo "selected";} ?>>Zonguldak</option>
                                        <option value="Aksaray" <? if ($results->location=="Aksaray"){ echo "selected";} ?>>Aksaray</option>
                                        <option value="Bayburt" <? if ($results->location=="Bayburt"){ echo "selected";} ?>>Bayburt</option>
                                        <option value="Karaman" <? if ($results->location=="Karaman"){ echo "selected";} ?>>Karaman</option>
                                        <option value="Kirikkale" <? if ($results->location=="Kirikkale"){ echo "selected";} ?>>Kırıkkale</option>
                                        <option value="Batman" <? if ($results->location=="Batman"){ echo "selected";} ?>>Batman</option>
                                        <option value="Sirnak" <? if ($results->location=="Sirnak"){ echo "selected";} ?>>Şırnak</option>
                                        <option value="Bartın" <? if ($results->location=="Bartın"){ echo "selected";} ?>>Bartın</option>
                                        <option value="Ardahan" <? if ($results->location=="Ardahan"){ echo "selected";} ?>>Ardahan</option>
                                        <option value="Igdir" <? if ($results->location=="Igdir"){ echo "selected";} ?>>Iğdır</option>
                                        <option value="Yalova" <? if ($results->location=="Yalova"){ echo "selected";} ?>>Yalova</option>
                                        <option value="Karabuk" <? if ($results->location=="Karabuk"){ echo "selected";} ?>>Karabük</option>
                                        <option value="Kilis" <? if ($results->location=="Kilis"){ echo "selected";} ?>>Kilis</option>
                                        <option value="Osmaniye" <? if ($results->location=="Osmaniye"){ echo "selected";} ?>>Osmaniye</option>
                                        <option value="Duzce" <? if ($results->location=="Duzce"){ echo "selected";} ?>>Düzce</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3 text-left">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Bedrooms
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>
                                    </label>
                                    <input type="number" name="bedroom" placeholder="Bedrooms" class="form-control" value="<?= $results->bedroom; ?>"
                                           required>
                                </div>
                                <div class="form-group col-md-3 text-left">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Bathrooms
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>

                                    </label>
                                    <input type="number" name="bathroom" placeholder="Bathrooms" class="form-control"  value="<?= $results->bathroom; ?>"
                                           required>
                                </div>
                                <div class="form-group col-md-3 text-left">
                                    <label style="padding-top:20px;padding-bottom:5px;" class="control-label">
                                        <small>
                                            <strong>
                                                Space (sqm)
                                            </strong>
                                        </small>
                                        <span class="required text-danger">*</span>

                                    </label>
                                    <input type="number" name="living_space" placeholder="Living space sqm"  value="<?= $results->living_space; ?>"
                                           class="form-control" required>
                                </div>
                                <div class="form-group col-md-3 text-left mt-md-5 pt-md-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="pool" name="pool" style="width: 30px;height: 30px"  <? if ($results->pool==1){ echo "checked='checked'";} ?> >
                                        <label class="form-check-label ml-md-4 mt-md-2  ml-3 mt-2 " for="pool">
                                            <strong>
                                                POOL
                                            </strong>
                                        </label>
                                    </div>
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
                                    <input type="text" class="form-control" name="title" id="title" required  value="<?= $results->title; ?>">
                                    <div id="title_duplicate_error" class="text-danger"></div>
                                    <div id="title_length_error" class="text-danger"></div>
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
                                    <input type="number" class="form-control" name="price" id="price" required  value="<?= $results->price; ?>">
                                    <div class="mx-1 font-weight-bold" id="price_comma"></div>
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
                                        <textarea name="description" id="description" class="form-control" rows="6"><?= $results->description; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $results->id; ?>" >
                                        <input type="submit" class="btn btn-block btn-primary" value="Edit Property Info" id="submit">
                                    </div>
                                </div>
                            </div>
                        </form>
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
        let price_comma = $('#price').val();
        $('#price_comma').text('$'+addCommas(price_comma));
        $('#title').change(function(){
            $("#submit").prop("disabled",false);
            let value_data = $(this).val();
            $('#title_duplicate_error').text('');
            $('#title_length_error').text('');
            $.ajax({
                url:'<?= base_url(); ?>User/propertyTitleCheck',
                method: 'POST',
                data: {value_data: value_data},
                dataType: 'json',
                success: function(response){
                    $.each(response, function (i, item) {
                        $('#title_duplicate_error').text('this title is used , please choose another one');
                        $("#submit").prop("disabled",true);

                    });
                }
            });
            if (value_data.length > 50 ){
                $('#title_length_error').text('this title is too long');
                $("#submit").prop("disabled",true);
            }
        });
        $('#price').keyup(function () {
            let x = $(this).val();
            $('#price_comma').text('$'+addCommas(x));
        });
        function addCommas(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
    });
</script>
<script type="text/javascript">
    function AddProperty(){
        document.getElementById('my_map_error').innerText='';
        let correctFlag = true;
        let lat = document.getElementById("latit");
        let long = document.getElementById("longit");
        if (!lat.value && !long.value ){
            correctFlag = false;
            document.getElementById('my_map_error').innerText='Please select your property location on the map';
            document.getElementById('my_map').focus();
        }
        return correctFlag;
    }
</script>
</body>
</html>
