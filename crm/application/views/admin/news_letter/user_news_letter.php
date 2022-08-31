<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage News Letter</title>
    <?php $this->load->view('template/admin-css');?>
	<style>
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
		<?php 
			//print_r($this->session->userdata('id'));
		?>
        <main class="app-main">
            <div class="wrapper">
    			<div class="page">
    				<div class="page-inner">
    				
 
<?php
// echo $this->session->userdata('email');
if(isset($_FILES["attachment"]["name"])){
    error_reporting(0);
    $subject = $_POST['subject'];
    $message = $_POST['comment'];
    $fromemail = $this->session->userdata('email'); 
    $email_message = '<div>'.$message.'</div>';
    $semi_rand = md5(uniqid(time()));
    $headers = "From: ".$fromemail;
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
 
    $headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=\"{$mime_boundary}\"";
 
    if($_FILES["attachment"]["name"]!= ""){  
    	$strFilesName = $_FILES["attachment"]["name"];  
    	$strContent = chunk_split(base64_encode(file_get_contents($_FILES["attachment"]["tmp_name"])));  
        $email_message .= "This is a multi-part message in MIME format.\n\n" .
        "--{$mime_boundary}\n" .
        "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
        "Content-Transfer-Encoding: 7bit\n\n" .
        $email_message .= "\n\n";
     
     
        $email_message .= "--{$mime_boundary}\n" .
        "Content-Type: application/octet-stream;\n" .
        " name=\"{$strFilesName}\"\n" .
        //"Content-Disposition: attachment;\n" .
        //" filename=\"{$fileatt_name}\"\n" .
        "Content-Transfer-Encoding: base64\n\n" .
        $strContent  .= "\n\n" .
        "--{$mime_boundary}--\n";
    }

    foreach($_POST['lead_id'] as $key => $value){
        if($this->input->post('lead_id')[$key]!=""){
            $l_data=$this->User_Model->get_single_lead($this->input->post('lead_id')[$key]);
            $toemail =  $l_data->email;
     	    $data=array(
     	        'news_letter_user_id'=>$this->session->userdata('id'),
     	        'news_letter_lead_id'=>$this->input->post('lead_id')[$key],
     	        'news_letter_date'=>date('Y-m-d h:i:s'));
     	    $data=$this->db->insert("news_letter",$data);
    		$mail_data=mail($toemail, $subject, $email_message, $headers);
    		if($mail_data & $data){
    		    $this->session->set_flashdata('message', "<div class='alert alert-success'>News Letter Send Successfully</div>");
	            return redirect($this->agent->referrer());
    		}
        }
    }
}
   ?>

        <!-- Display submission status -->

<!-- Display contact form -->
<!--<form method="post" action="" enctype="multipart/form-data">-->
<!--    <div class="form-group">-->
<!--        <input type="text" name="name" class="form-control"  placeholder="Name" required="">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <input type="email" name="email" class="form-control"  placeholder="Email address" required="">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <input type="text" name="subject" class="form-control"  placeholder="Subject" required="">-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <textarea name="comment" class="form-control summernote" placeholder="Write your message here" required=""></textarea>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <input type="file" name="attachment" class="form-control">-->
<!--    </div>-->
<!--    <div class="submit">-->
<!--        <input type="submit" name="submit" class="btn" value="SEND MESSAGE">-->
<!--    </div>-->
<!--</form>-->
 

<?php
//  if(isset($_POST) && !empty($_POST)) {
//      if(!empty($_FILES['attachment']['name'])) {
//         $file_name = $_FILES['attachment']['name'];  
//         $temp_name = $_FILES['attachment']['tmp_name'];  
//         $file_type = $_FILES['attachment']['type'];
//         //print_r($this->input->post('lead_id'));
        
        

        
//       $base = basename($file_name);
//       $extension = substr($base, strlen($base)-4, strlen($base));
     
//       //only these file types will be allowed
//       $allowed_extensions = array(".doc", "docx", ".pdf", ".zip", ".png", ".jpg");
//     //  print_r($this->input->post('email'));
//       //check that this file type is allowed
//       if(in_array($extension,$allowed_extensions)) {
//           //mail essentials
//         //   $from = $_POST['user_mail'];
//           $from = "info@primepropertyturkey.com";
          
//           $message = $_POST['comment'];
     
//           //things u need
//           $file = $temp_name;
//           $content = chunk_split(base64_encode(file_get_contents($file)));
//           $uid = md5(uniqid(time()));  //unique identifier
     
//           //standard mail headers
//           $header = "From: ".$from."\r\n";
//         //   $header .= "Reply-To: ".$replyto. "\r\n";
//           $header .= "MIME-Version: 1.0\r\n";
     
     
//           //declare multiple kinds of email (plain text + attch)
//           $header .="Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n";
//           $header .="This is a multi-part message in MIME format.\r\n";
     
//           //plain txt part
     
//           $header .= "--".$uid."\r\n";
//           $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
//         //   $header = "MIME-Version: 1.0" . "\r\n";
//         //   $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//           $header .= "Content-Transfer-Encoding: 7bit\r\n";
//           $header .= $message. "\r\n";

     
//           //attch part
//           $header .= "--".$uid."\r\n";
//           $header .= "Content-Type: ".$file_type."; name=\"".$file_name."\"\r\n";
//           $header .= "Content-Transfer-Encoding: base64\r\n";
//           $header .= "Content-Disposition: attachment; filename=\"".$file_name."\"\r\n";
//           $header .= $content."\r\n";  //chucked up 64 encoded attch
     
     
//           //sending the mail - message is not here, but in the header in a multi part
//             // $contacts = array(
//             //         "prateekmishra681@gmail.com",
//             //         "prateekmishra0804@gmail.com",
//             //         );
//     //         print_r($this->input->post('email'));
//     //         error_reporting(0);
//     //         foreach($_POST['email'] as $key => $value){
//     //             echo $to =  $this->input->post('email')[$key];
//     //             $subject= $this->input->post('subject');
//     //             //echo $this->input->post('lead_id')[$key];
// 		 	//     $data=array(
// 		 	//         'news_letter_user_id'=>$this->session->userdata('id'),
// 		 	//         'news_letter_lead_id'=>$this->input->post('lead_id')[$key],
// 		 	//         'news_letter_date'=>date('Y-m-d h:i:s'));
// 		 	//     $assign_data=$this->db->insert("news_letter",$data);
// 				// mail($to, $subject, $message, $header); 
//     //         }
//             foreach($_POST['lead_id'] as $key => $value){
//              $subject= $this->input->post('subject');
//              $to="prateekmishra681@gmail.com";
// 	 	    $data=array(
// 	 	        'news_letter_user_id'=>$this->session->userdata('id'),
// 	 	        'news_letter_lead_id'=>$this->input->post('lead_id')[$key],
// 	 	        'news_letter_date'=>date('Y-m-d h:i:s'));
// 	 	    $new_letter_data=$this->db->insert("news_letter",$data);
// 	 	    mail($to, $subject, $message, $header); 
//         }
//             $this->session->set_flashdata('message', "<div class='alert alert-success'>News Letter Sent Successfully</div>");
//     		return redirect($this->agent->referrer());
//             // foreach($contacts as $contact) {
//           // $subject = "test";
//             //     $to      =  $contact;
//             //   // mail($to, $subject, $message, $headers, $returnpath);
//             //   echo  mail($to, $subject, $message, $header);  
//             // }
//         //   echo "success";
//       }else {
//         //   echo "file type not allowed"; 
//           $this->session->set_flashdata('message', "<div class='alert alert-danger'>File type not allowed</div>");
//     	   return redirect($this->agent->referrer());
//         }    //echo an html file
        
//     }else {
// //   echo "no file posted";
//           $this->session->set_flashdata('message', "<div class='alert alert-danger'>News Letter Not Send</div>");
//     	   return redirect($this->agent->referrer());
//   }    
// }
?>
 
<!--<form method="post" enctype="multipart/form-data">-->
<!--	<input type="text" id="contact_name" class="form-control" placeholder="Name" name="name"/>-->
	<!--<input type="text" id="contact_email" class="form-control" placeholder="Email Address"     -->
	<!--name="user_mail">-->
<!--	<textarea id="contact_message" class="form-control" rows="7" placeholder="Write a -->
<!--	message" name="comment"></textarea>-->
<!--	<input name="attachment" type="file">      -->
<!--	<input type="submit" value="Send mail" class="btn btn-primary pull-right"/>-->
<!--</form>-->
    				    
    				    
    				    <?php echo $this->session->flashdata('message'); ?>
    				    <!--<form method="post" enctype="multipart/form-data">-->
    				    <form action="<?php //echo base_url("User/send_manage_news_letter"); ?>" method="POST" enctype="multipart/form-data">
        					<div class="col-lg-12 mb-2">
        						<div class="alert alert-danger alert-dismissible fade show row" style="color: red!important;font-size:18px;">
        							<strong>Manage News Letter</strong>
        						</div>
        						<p class="text-right">
        						    <button type="button" class="toggle-btn btn btn-success">Toggle Paragraphs</button>
        						</p>
        					</div>
    					
                            <div class="p card p-3" style="display:none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6 class="form-group">Subject</h6>
                                            <input type="text" name="subject" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h6 class="form-group">Attachment</h6>
                                            <input type="file" name="attachment" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6 class="form-group">Enter Mail Details</h6>
                                            <textarea class="form-control summernote" name="comment" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="text-right col-md-12">
                                        <button type="submit" name="submit" class="btn btn-success">Send Mail</button>
                                    </div>
                                </div>
                            </div>						
    					
        					<section class="card">						
        						<div class="col-md-12">	
        							<div class="card-body pb-5">
        								<div class="table-responsive">
        									<table class="table table-bordered">
        										<thead>
        										  <tr>
        											<th>&nbsp;<input type="checkbox" id="select_all">&nbsp;&nbsp;&nbsp;&nbsp;Select All</th>
        											<th>Name</th>
        											<th>Email</th>
        											<th>Phone</th>
        											<th>Status</th>
        										  </tr>
        										</thead>
        										<tbody>
        										    
        											<?php
        											$rows=$this->User_Model->get_all_lead_list(); 
        											$counter=1;
        											foreach($all_leads as $row){
        											    
        											?> 
        											<!--<input type="hidden" name="email[]" value="<?php //echo"$row->email"; ?>">-->
        										    <!--<input type="hidden" name="name[]" value="<?php //echo"$row->first_name $row->second_name"; ?>">-->
        											<tr>
        											    <td><?php echo $counter++; ?>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" class="checkbox" name="lead_id[]" value="<?php echo $row->Lead_id; ?>"></td>
        											    <td><?php echo"$row->first_name $row->second_name"; ?></td>
        											    <td><?php echo $row->email; ?></td>
        											    <td><?php echo $row->mobile; ?></td>
        											    <td>
        											        <?php 
        											            $m_count=$this->User_Model->get_mail_sent_count($row->Lead_id);
        											        ?>
        											        <span class="badge badge-success"><?php echo $m_count; ?></span>
        											    </td>
        											</tr>
        											
        											<?php } ?> 
        										</tbody>
        									</table>
        								</div>
        							</div>
        						</div>
    					</section>
    					</form>
					<p class="pagination"><?php echo $all_links; ?></p>
    						  
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
    <script>
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
