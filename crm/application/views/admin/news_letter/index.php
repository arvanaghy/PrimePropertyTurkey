<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage News Letter</title>
    <?php $this->load->view('template/admin-css');?>
	<style type="text/css">
		@media (min-width: 992px){
			.modal-lg {
				max-width: 95%;
			}
		}
	</style>
  </head>
<body>
    <div class="app">
		<?php $this->load->view("template/admin-header"); ?>
        <main class="app-main">
            <div class="wrapper">
    			<div class="page">
    				<div class="page-inner">
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="row">
                            <div class="col-lg-12 my-2">
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <h2 class="d-inline py-2 font-weight-bold m-3 text-danger">
                                            Manage News Letter
                                        </h2>
                                        <a href="https://www.primepropertyturkey.com/newsletter-statistics.txt" class="mx-3 btn btn-lg btn-info" download="logfile.txt">Download Log File</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <? if ($DisableCheck!="Disable"): ?>
                        <?php
                        $params = array('class'=>'mb-3 mt-1');
                        echo form_open_multipart('User/SendNewsLetterSubmit',$params);?>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h6 class="form-group">Subject</h6>
                                        <input type="text" name="subject" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h6 class="form-group">Attachment</h6>
                                        <input type="file" name="attachment_file" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h6 class="form-group">Enter Mail Details</h6>
                                        <textarea class="form-control summernote" name="comment" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end align-items-center">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="SourceEnquiry" id="SourceEnquiry1" value="All" checked>
                                        <label class="form-check-label" for="SourceEnquiry1">
                                            All Clients <span class="badge badge-info"><?= $DubaiLeadsCount+$normalLeadsCount; ?></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="SourceEnquiry" id="SourceEnquiry2" value="Dubai">
                                        <label class="form-check-label" for="SourceEnquiry2">
                                            Dubai Pool Clients <span class="badge badge-info"><?= $DubaiLeadsCount; ?></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="SourceEnquiry" id="SourceEnquiry3" value="Normal">
                                        <label class="form-check-label" for="SourceEnquiry3">
                                            Normal Pool Clients <span class="badge badge-info"><?= $normalLeadsCount;  ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="" id="" value="Send Message">
                                </div>
                            </div>
                        </form>
                        <? else: ?>
                        <div class="row justify-content-center align-items-center">
                            <div class="col">
                                the last request is not completed yet !
                            </div>
                        </div>
                        <? endif; ?>
    				</div>
                </div>
            </div>
        </main>
    </div>
    <?php $this->load->view('template/admin-js'); ?>
    <script>
        var select_all = document.getElementById("select_all"); //select all checkbox
        var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
        //select all checkboxes
        select_all.addEventListener("change", function(e){
        	for (i = 0; i < checkboxes.length; i++) { 
        		checkboxes[i].checked = select_all.checked;
        	}
        });
        for (var i = 0; i < checkboxes.length; i++) {
        	checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
        		//uncheck "select all", if one of the listed checkbox item is unchecked
        		if(this.checked == false){
        			select_all.checked = false;
        		}
        		//check "select all" if all checkbox items are checked
        		if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
        			select_all.checked = true;
        		}
        	});
        }
    </script>
    <script>
        $(document).ready(function(){
            // Display alert message after toggling paragraphs
            $(".toggle-btn").click(function(){
                $(".p").toggle(1000, function(){
                    // Code to be executed
                    // alert("The toggle effect is completed.");
                });
            });
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
      $('.summernote').summernote({
        placeholder: 'Enter About Content',
        tabsize: 2,
        height: 150
      });
      var postForm = function() {
			var content = $('textarea[name="content"]').html($('.summernote').code());
		}
	</script>
  </body>
</html>