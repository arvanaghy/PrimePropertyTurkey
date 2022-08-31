<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">
	<?php $this->load->view("template/web-css"); ?>
</head>
<body>
    <div class="page-wrapper">
	    <?php $this->load->view("template/web-menu"); ?>
        <main class="main">		
		<?php $this->load->view("template/banner"); ?>
			<div class="container mt-5 mb-10">
				<h1 class="text-dark-gray text-700 mtopbot0 ng-binding text-center mt-5 mb-5">लखनऊ मर्चेंट</h1>
				<div class="row">
					<div class="col-md-12">
						<div class="main-timeline9">
							<div class="timeline">
								<div class="timeline-content">
									<div class="circle"><span><i class="fa fa-globe"></i></span></div>
									<div class="content">
										
										<h4 class="title">सामान खरीदे </h4>
										<p class="description">
											आपकी सबसे पसंदीदा किराने की दुकान, आपका सबसे विश्वसनीय ब्रांड, अब आपकी उंगलियों पर! बस इस नंबर पर फ़ोन करे और अपना आर्डर लिखवाये किराने का सामान आसानी से आपके घर पहुंच जायेगा। पूरे नए तरीके से अपना सामान खरीदें!	</p>
										<div class="icon"><span></span></div>
									</div>
								</div>
							</div>
							<div class="timeline">
								<div class="timeline-content">
									<div class="circle"><span><i class="fa fa-rocket"></i></span></div>
									<div class="content">
										
										<h4 class="title">उसी दिन सामान प्राप्त करे</h4>
										<p class="description">
											हम आपको आपकी मर्जी का सामान आपके घर पर उसी दिन जल्द से जल्द पॅहुचाने का वादा करते है हम आपको आपकी हर जरूरत का सामान आपके दरवाजे पर उपलब्ध कराऐंगे यदि आप एक बार कि मिनिमम खरीद 500रू करतेे है तो हम आपसे किसी भी प्रकार का डिलिवरी चार्ज नहीें लेेंगे वो कम्पनी देगी खरीददारी कम होने कि स्थिति में डिलिवरी चार्ज कन्ज्यूमर को अलग से देना होगा ।
                                        </p>
										<div class="icon"><span></span></div>
									</div>
								</div>
							</div>
							<div class="timeline">
								<div class="timeline-content">
									<div class="circle"><span><i class="fa fa-briefcase"></i></span></div>
									<div class="content">
										
										<h4 class="title">संतुष्टि की गारंटी</h4>
										<p class="description">
											हमारा प्रमुख उद्देशय है गुणवत्ता, बचत और ग्राहक सेवा  हैं। विश्वास के साथ हमारे यहाँ से खरीदारी करें, हम आपको संतुष्टि की गारंटी देते हैं।
										</p>
										<div class="icon"><span></span></div>
									</div>
								</div>
							</div>
							<div class="timeline">
								<div class="timeline-content">
									<div class="circle"><span><i class="fa fa-mobile"></i></span></div>
									<div class="content">
										<h4 class="title">उपहार</h4>
										<p class="description">
											हमारे प्लान के साथ जुड़े और अच्छा कमीशन प्राप्त करे.<a href="<?php echo base_url("plan"); ?>" style="color:blue;font-weight:bold;"> प्लान को समझने के लिए यहाँ  पर क्लिक करे
										</a></p>
										<div class="icon"><span></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="p-4 bg-warning text-center" style="color:blue;font-size:20px;font-weight:bold;">सामान आर्डर करने के लिए 7607619009 इस नम्बर पर फ़ोन या वाट्सएप्प करे </div>
			
        </main>
        <?php $this->load->view("template/web-footer"); ?> 
    </div>
     <?php $this->load->view("template/web-js"); ?>
</body>
</html>