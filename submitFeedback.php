<!DOCTYPE html>
<?php

session_start();
$event = $_GET['event'];
include 'functions.php';
$today = date("Y-m-d");


?>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>EKO</title>
	<meta name="description" content="EKO is a Event Admin Site Responsive by Skill-Pill." />
	<meta name="keywords" content="admin, cms, crm, EKO Admin, EKOadmin" />
	<meta name="author" content="Skill-Pill"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.png">
	<link rel="icon" href="favicon.png" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!--link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css"!-->
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">

	<!-- Bootstrap Colorpicker CSS -->
	<link href="vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Bootstrap Datetimepicker CSS -->
	<link href="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Bootstrap Daterangepicker CSS -->
	<link href="vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>

</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-4-active pimary-color-red">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<a href="index1.php">
				<img class="brand-img" src="dist/img/logo.png" alt="EKO"/>
				<img class="brand-img" width="60px;" src="dist/img/Beta1.png" alt="EKO"/>
				<!--span class="brand-text">Live-360</span-->
			</a>
			<span class="pull-right" style="font-size: x-large;  padding-top:17px;"><a data-toggle="modal" data-target="#faqs" data-whatever="@mdo" class="fa fa-question-circle-o" ></a></span>	
		</nav>
				
		</nav>
			
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Submit Feedback</h5>
					</div>
				
					
				</div>
				<!-- /Title -->

				

				<!--Row-->
				<div class="row">
					<div class="col-md-12">

						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter"><span class=""><?php echo $feedbackEvent; ?></span></span>
														<span class="weight-500 uppercase-font txt-gery block">Event Name</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
														<i class="pe-7s-note2 txt-danger data-right-rep-icon"></i>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

							<div class="panel panel-default card-view pa-0">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter"><span class=""><?php echo $startDate; ?></span></span>
														<span class="weight-500 uppercase-font txt-grey block font-13">Event Date</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="pe-7s-alarm txt-danger data-right-rep-icon"></i>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter"><span class=""><?php echo $numQuestions; ?></span></span>
														<span class="weight-500 uppercase-font txt-grey block">Number of Questions</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="pe-7s-help1 txt-warning data-right-rep-icon"></i>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter"><span class=""><?php echo $expireDate; ?></span></span>
														<span class="weight-500 uppercase-font txt-grey block">Deadline Date for Responses</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="pe-7s-pen txt-success data-right-rep-icon"></i>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="panel panel-default card-view">

						<div>
							
							<h5 style="text-transform: none;">Please note that the feedback you provide will be anonymous. We ask that you keep your comments clear and constructive.</h5>
						</div>
						<?php
							$conn = mycon();
							
							$query="SELECT title FROM Feedback WHERE event=".$eventID;
							$result2=mysql_query($conn,$query) or die(mysql_error());  
							$i=0;
							$title = mysql_result($result2,$i,"title");
							$feedbackEvent = 'Event: '.$eventTitle;
							mysql_close();
			
							$query="SELECT * FROM questions WHERE event=".$eventID." ORDER BY orderID";
							$result=mysql_query($conn,$query) or die(mysql_error());  
							$num=mysql_numrows($result);
							for ($i=0; $i <= $num-1; $i += 1) {
								$questionArray[$i] = mysql_result($result,$i,"qText");
							}
							for ($j=0; $j <= $num-1; $j += 1) {
								$questionTypeArray[$j] = mysql_result($result,$j,"respType");
							}
							mysql_close();

						?>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<form id="feedbackForm" method="post" action="submit_feedback1.php?responder=<?php echo $responder?>&eventID=<?php echo $eventID?>">
								<?php 
									for ($j=1; $j <= $num; $j += 1) {?>
									<h5>Question <?php echo $j;?></h5>
									<div class="form-group has-success" id="slickbox<? echo $j ?>"><p><?php echo $questionArray[$j-1]; ?></p>
										<?php 
									if ($questionTypeArray[$j-1] == "1")
									{
									echo "<textarea class='form-group' required cols='25' rows='4' name='q".$j."Text' id='q".$j."Text'></textarea><br><br>";
									}
									elseif ($questionTypeArray[$j-1] == "2"){
										echo "<div data-role='fieldcontain' class='form-group'>
									    <fieldset data-role='controlgroup' data-type='horizontal'>
									         	<label for='".$j."radio-view-Yes' ><input class='radio radio-default vertical-align:text-bottom;' required style='margin-right:10px;' type='radio' name='".$j."radio-view2' id='".$j."radio-view-Yes' value='Yes'  />Yes
									         	</label>
									         	<label for='".$j."radio-view-No' ><input class='radio radio-default vertical-align:text-bottom;' required style='margin-right:10px;' type='radio' name='".$j."radio-view2' id='".$j."radio-view-No' value='No'  />No
									         	</label>
									    </fieldset>
									</div><br>";
									}
									else
									{
								
									echo "<div data-role='fieldcontain' class='form-group'>
									<fieldset data-type='horizontal' data-role='fieldcontain'>
										<p>Rating (1=Poor, 2=Not so good, 3=OK, 4=Good, 5=Excellent)</p>
											<label for='".$j."radio-view-a'><input required style='margin-right:10px;' class='radio radio-default vertical-align:text-bottom;' type='radio' name='".$j."radio-view' id='".$j."radio-view-a' value='1'  />1
											</label>
												
											<label for='".$j."radio-view-b' ><input  required style='margin-right:10px;' type='radio' class='radio radio-default vertical-align:text-bottom;' name='".$j."radio-view' id='".$j."radio-view-b' value='2'  />2
											</label> 
									         	
									        <label for='".$j."radio-view-c'><input required style='margin-right:10px;' type='radio' class='radio radio-default vertical-align:text-bottom;' name='".$j."radio-view' id='".$j."radio-view-c' value='3'  />3
									        </label> 
									         	
									         <label for='".$j."radio-view-d' ><input required style='margin-right:10px;' type='radio' class='radio radio-default vertical-align:text-bottom;' name='".$j."radio-view' id='".$j."radio-view-d' value='4'  />4
									         </label>
									         	
									         <label for='".$j."radio-view-e' ><input required style='margin-right:10px;' type='radio' class='radio radio-default vertical-align:text-bottom;' name='".$j."radio-view' id='".$j."radio-view-e' value='5'  />5
									         </label> 
									    </fieldset>  
									    </div><br>";

									}
									?>
									</div>
								<? 
									
									} 
									?>
							</div>

						</div>
								    
					    <div class="row form" style="padding-right: 0px;">
					        <div class="large-3 small-12 right" >
					          <input type="hidden" id="numberOfAnswers" name="numberOfAnswers" value="<?php echo $num?>" />
					          <input type="hidden" id="requestID" name="requestID" value="<?php echo $requestID?>" />
					          
					          <div style="padding-bottom: 20px; text-align: center;">
					          	<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i>	<span class="btn-text">Submit Feedback</span></button>
					          </div>
					       
					        </div>
						</div>
						</form>
					</div>
							<!-- FAQ's -->
									<div class="modal fade" id="faqs" tabindex="-1" role="dialog" aria-labelledby="ModalLabel7">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h5 class="modal-title" id="Label2">FAQ </h5>
												</div>
												<div class="modal-body">
													<div class="panel-wrapper collapse in">
														<div class="panel-body">
															<div class="panel-group accordion-struct"  role="tablist" aria-multiselectable="true">
																<div class="panel panel-default">
																	<div class="panel-heading activestate" role="tab" id="heading_5">
																		<a role="button" data-toggle="collapse" href="#collapse_5" aria-expanded="true" >What is EKO? What does it do?</a> 
																	</div>
																	<div id="collapse_5" class="panel-collapse collapse in" role="tabpanel">
																		<div class="panel-body pa-15 text-white "> EKO is a simple to use, cloud-based tool to help you get your colleagues to provide you with feedback on events – such as a key presentation. You stay in control – setting the feedback parameters, the feedback group and the events you want to be critiqued on. </div>
																	</div>
																</div>
																<div class="panel panel-default">
																	<div class="panel-heading" role="tab" id="heading_6">
																		<a class="collapsed" role="button" data-toggle="collapse" href="#collapse_6" aria-expanded="false" >How does it work? </a>
																	</div>
																	<div id="collapse_6" class="panel-collapse collapse" role="tabpanel">
																		<div class="panel-body pa-15 text-light"> You create a feedback form for a recent, or upcoming event, to send to your colleagues. You select the questions you would like to include, choosing from a range of formats including: open text questions, ratings, or yes/no questions. You can also select from our question bank of common questions. You will then be provided with two links: one to send to the group of peers you would like to receive feedback from, and one for you to review the feedback. </div>
																	</div>
																</div>
																<div class="panel panel-default">
																	<div class="panel-heading" role="tab" id="heading_7">
																		<a class="collapsed" role="button" data-toggle="collapse"  href="#collapse_7" aria-expanded="false">Why don’t I need to log in?</a>
																	</div>
																	<div id="collapse_7" class="panel-collapse collapse" role="tabpanel">
																		<div class="panel-body pa-15 text-light"> EKO is completely anonymised, and as a result we don’t require a login or any personal details from you. </div>
																	</div>
																</div>
																<div class="panel panel-default">
																	<div class="panel-heading" role="tab" id="heading_8">
																		<a class="collapsed" role="button" data-toggle="collapse"
																		 href="#collapse_8" aria-expanded="false" > I’ve lost my link – What can I do?</a>
																	</div>
																	<div id="collapse_8" class="panel-collapse collapse" role="tabpanel">
																		<div class="panel-body pa-15 text-light"> We’re sorry to hear that you’ve lost your link. If you sent your link via email you may be able to find it in your email sent box. We do not save any links and we will not be able to provide you with any lost links so please ensure you save them in a safe place!</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													
												</div>
											</div>
										</div>
									</div>
						
							
				</div>
			</div>
		
			<!--Row-->
				
			

			<!--Row-->
			
			<!-- /Row -->
				
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30 padding-bottom: 30px;" >
				<div class="row">
					<div class="col-sm-12">
						<p>2018 &copy; Skill-Pill. <a style="color: white;" href="//www.skill-pill.com/termsandconditions/Terms and Conditions including Copyright and Privacy Policy for Website April 2018.pdf" target="_BLANK">Terms and Conditions</a>
							<span class="pull-right" style="font-size: large; margin-left: 7px; "><a  class="fa fa-twitter" href="//twitter.com/skillpill" target="_BLANK">
    					
  						</a></span><span class="pull-right" style="font-size: large; margin-right: 7px; "><a  class="fa fa-linkedin" href="//www.linkedin.com/company/skill-pill-m-learning/" target="_BLANK">
    					
  						</a></span></p>
					</div>
					
				</div>
			</footer>
			<!-- /Footer -->
			
		
        <!-- /Main Content -->
        </div>
    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->


	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	
	<!-- Progressbar Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>


	
	
			
	
</body>

</html>
