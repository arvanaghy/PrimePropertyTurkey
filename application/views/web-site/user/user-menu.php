<div class="col-md-4 text-center side-bar my-2">
    <? if (isset($images)): ?>
        <div class="card mb-2">
            <div class="card-header font-weight-bold">
                Property Images
            </div>
            <div class="card-body">
                <ul style="list-style: none" class="text-left">
                    <? if ($images): ?>
                        <? foreach ($images as $image): ?>
                            <li class="my-2 d-flex justify-content-around align-items-center">
                                <img src="<?= base_url(); ?>assets/web-site/images/resales/original/<?= $image->image; ?>" style="width: 60px;height: 60px" >
                                <a href="<?php echo base_url("User/Delete_Resale_Image/$image->id"); ?>" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </li>
                            <hr>
                        <? endforeach; ?>
                    <? endif; ?>
                </ul>
                <?php
                $condition = array('onsubmit'=>'return EditResaleImageUpload();');
                echo form_open_multipart(base_url().'User/Resale_Images_Update_Submit',$condition);?>
                <div class="col form-group">
                    <label for="New_images">
                        <small>
                            <b>
                                Add New Images
                            </b>
                        </small>
                    </label>
                    <input type="file" id="New_images" name="New_images[]"  multiple="true" class="form-control" required accept=".jpg" >
                    <div id="property_images_error" class="text-danger"></div>
                </div>
                <div class="col-12 form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
                    <input type="hidden" name="property" value="<?= $this->uri->segment(3); ?>">
                </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
            function EditResaleImageUpload() {
                document.getElementById('property_images_error').innerText='';
                let correctFlag = true;
                let fileUpload = document.getElementById("New_images");
                let images_cont = fileUpload.files.length;
                for (let i = 0; i < images_cont; i++) {
                    if ((fileUpload.files[i].size/1024).toFixed(0)>2048){
                        document.getElementById('property_images_error').innerText='image size is more than 2 MB, please reduce your image size';
                        document.getElementById('New_images').focus();
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
                                document.getElementById('New_images').focus();
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
    <? endif; ?>
    <div class="card" style="position: sticky !important;top: 100px;">
        <div class="card-body">
            <div class="card-title">
                <b>
                    <?= $this->session->userdata('username'); ?>
                </b>
            </div>
            <hr>
            <div id="menu_section">
                <ul>
                    <li class="<? if ($this->uri->segment(2)=='Profile'){ echo 'menu_activated';} ?>">
                        <a href="<?= base_url(); ?>User/Profile">
                            <i class="fas fa-user" aria-hidden="true"></i>
                            My Profile
                        </a>
                    </li>
                    <li class="<? if ($this->uri->segment(2)=='Add_Property'){ echo 'menu_activated';} ?>">
                        <a href="<?= base_url(); ?>User/Add_Property">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                            Add Property For Sale
                        </a>
                    </li>
                    <li class="<? if ($this->uri->segment(2)=='Properties_In_Progress'){ echo 'menu_activated';} ?>">
                        <a href="<?= base_url(); ?>User/Properties_In_Progress" >
                            <i class="fa fa-spinner" aria-hidden="true"></i>
                            Properties In Progress
                        </a>
                    </li>
                    <li class="<? if ($this->uri->segment(2)=='Published_Properties'){ echo 'menu_activated';} ?>">
                        <a href="<?= base_url(); ?>User/Published_Properties" >
                            <i class="fa fa-certificate" aria-hidden="true"></i>
                            Published Properties
                        </a>
                    </li>
                    <hr width="75%">
                    <li>
                        <a href="<?= base_url();?>User/logout" class="btn btn-danger btn-block text-white">
                            <i class="fas fa-sign-out text-white"></i>
                            LOG OUT
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
