<!DOCTYPE html>
<?php
include("q_bank.php");
include('connection.php');
session_start();
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
	
	<!--link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css"-->
		
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
		<nav class="navbar navbar-inverse navbar-fixed-top mobile-only-brand pull-left">
			<a href="index1.php">
				<img class="brand-img" src="dist/img/logo.png" alt="EKO"/>
				<img class="brand-img" width="60px;" src="dist/img/Beta1.png" alt="EKO"/>
				<!--span class="brand-text">Live-360</span-->
			</a>
			<span class="pull-right" style="font-size: x-large;  padding-top:17px;"><a data-toggle="modal" data-target="#faqs" data-whatever="@mdo" class="fa fa-question-circle-o" ></a></span>
			<!--div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.php">
							<img class="brand-img" src="dist/img/logo.png" alt="brand"/>
							<!--span class="brand-text">Live-360</span-->
						<!--/a>
					</div>
				</div-->	
				<!--a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a-->
				
			<!--/div!-->
				
		</nav>
		
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		
		<!-- /Right Sidebar Menu -->
		
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
			 <form id="newEventForm" method="post" name="name" action="new-event.php" data-abide>	
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Create an Event</h5>
					</div>
				
				</div>
				<!-- /Title -->

				<!--Row-->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Event Information</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="form-wrap">
										
											<div class="row">
												<div class="col-sm-4">
													<div class="form-group has-warning">
														<label class="control-label mb-10 text-left">Event Title</label>
														<input type="text" id="eventTitle" required name="eventTitle" class="form-control state-warning" placeholder="Event title">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group has-success">
														<label class="control-label mb-10 text-left">Event Date  </label>
														<div class='input-group date' id='datetimepicker1'>
															<input type='text' id="startDate" required name="startDate" class="form-control state-success"  placeholder="Event date"/>
															<span class="input-group-addon">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-sm-4">
													<div class="form-group has-error">
														<label class="control-label mb-10 text-left">Deadline for Feedback  </label>
														<div class='input-group date' id='datetimepicker0'>
															<input type='text' id="endDate" required name="endDate" class="form-control state-danger" placeholder="Deadline for feedback" />
															<span class="input-group-addon">
																<span class="fa fa-calendar"></span>
															</span>
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

				
					<!--/Row-->

				<!--Row-->
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Add Some Questions</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div  class="panel-wrapper collapse in">
								<div  class="panel-body">
								
									<div class="button-list mt-10">
										<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#textresp" data-whatever="@mdo">Open Text Questions</button>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#rank" data-whatever="@mdo">Ratings</button>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#yesno" data-whatever="@mdo">Yes/No Options</button>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#bank" data-whatever="@mdo">Question Bank</button>
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

									<!--Modals questions-->
								
									<div class="modal fade" id="textresp" tabindex="-1" role="dialog" aria-labelledby="ModalLabel1">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header ">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h5 class="modal-title" id="ModalLabel1">Open Text Question</h5>
												</div>
												<div class="modal-body">
													
														<div class="form-group">
															<label for="recipient-name" class="control-label mb-10"></label>
															<input type="text"  class="form-control" id="recipient-name1" placeholder="Enter Question Here">
														</div>
														
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addTextRow(document.getElementById('recipient-name1').value)">Add Question</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" id="rank" tabindex="-1" role="dialog" aria-labelledby="ModalLabel2">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h5 class="modal-title" id="Label2">Rantings 1=Poor, 2=Not so good, 3=OK, 4=Good, 5=Excellent</h5>
												</div>
												<div class="modal-body">
												
														<div class="form-group">
															<label for="recipient-name" class="control-label mb-10"></label>
															<input type="text"  class="form-control required" id="recipient-name2" placeholder="Enter Question Here">
														</div>
														
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addAERow(document.getElementById('recipient-name2').value)">Add Question</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" id="yesno" tabindex="-1" role="dialog" aria-labelledby="ModalLabel3">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h5 class="modal-title" id="Label3">Yes/No Option Question</h5>
												</div>
												<div class="modal-body">
													
														<div class="form-group">
															<label for="recipient-name" class="control-label mb-10"></label>
															<input type="text"  class="form-control required" id="recipient-name3" placeholder="Enter Question Here">
														</div>
														
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addYesNoRow(document.getElementById('recipient-name3').value)">Add Question</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" id="bank" tabindex="-1" role="dialog" aria-labelledby="ModalLabel4">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h5 class="modal-title" id="Label4">Question Bank</h5>
												</div>
												<div class="modal-body">
													
														<div class="form-group">
															<label for="recipient-name" class="control-label mb-10"></label>
															<select class="selectpicker" id="sel" data-style="btn-primary btn-outline" >
																
															<?php
																mysql_connect("server","user","pwd","db") or
																    die("Could not connect: " . mysql_error());
																mysql_select_db("db");

																$result = mysql_query("SELECT question,questionTexto, questionTypes FROM QBank");

																while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
																   echo("<option id ='".$row['questionType']."'' value=".$row['questionID'].">".$row['questionText']."</option>");
																}

																mysql_free_result($result);
																																
															?>
															</select>
														</div>
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="run()">Add Question</button>
												</div>
											</div>
										</div>
									</div>
								
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-9">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Questions</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in margin-bottom:25px">
								<div class="panel-body required has-success">
									<ul id="sortable">

									</ul>
								</div>
								
								<div style="padding-bottom: 30px;"><button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button></div>
								<div><!--input type="submit" value="Main"--></div>
							</div>
						</div>
						
					</div>
				</div>
				<!--Row-->
				
			

			<!--Row-->
			<div class="row">
				
			</div>
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
		</form>		
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->

	
	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Datetimepicker JavaScript -->
    <script src="vendors/bower_components/moment/min/moment.min.js"></script>
	<script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Moment JavaScript -->
	<script type="text/javascript" src="vendors/bower_components/moment/min/moment-with-locales.min.js"></script>
	
	<!-- Bootstrap Colorpicker JavaScript -->
	<script src="vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
			
	<!-- Bootstrap Datetimepicker JavaScript -->
	<script type="text/javascript" src="vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	
	<!-- Bootstrap Daterangepicker JavaScript -->
	<script src="vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<!-- Form Picker Init JavaScript -->
	<script src="dist/js/form-picker-data.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- simpleWeather JavaScript -->
	
	<script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="dist/js/simpleweather-data.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="vendors/chart.js/Chart.min.js"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="vendors/bower_components/morris.js/morris.min.js"></script>
    <!--script src="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script-->
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<!--script src="dist/js/dashboard-data.js"></script-->

	<!--script src="dialog.js"></script-->
	
	
    <script>


    
    	

    	
		function run() {
	    	var e = document.getElementById("sel");
			var name = e.options[e.selectedIndex].id;
			
			var text = e.options[e.selectedIndex].text;
	        addQuestionBank(text,name);
	    }


  $('body').on('click', 'input.deleteDep', function() {
       $(this).parents('tr').remove();  
    });

  $(function () {
    // when the modal is closed
    $('#modal-container').on('hidden.bs.modal', function () {
        // remove the bs.modal data attribute from it
        $(this).removeData('bs.modal');
        // and empty the modal-content element
        $('#modal-container .modal-content').empty();
    });
});


  function showQuestions() {
      
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp2=new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp2.onreadystatechange=function() {
            if (xmlhttp2.readyState==4 && xmlhttp2.status==200) {
                if (xmlhttp2.responseText == "")
                    document.getElementById("qb").innerHTML="No active jobs currently found for this company.";
                else
                    document.getElementById("qb").innerHTML=xmlhttp2.responseText;
            }
        }
        xmlhttp2.open("GET","getQuestionBank.php",true);
        xmlhttp2.send();
        
    }

function addQuestionBank(value,type){
  var res = value.split("|");
 // var questionText = res[0];
 // var questionType = res[1];
 	var questionText = value;
 	var questionType = type;

  	var ul = document.getElementById("sortable");
  	var li = document.createElement("li");
    var liList = document.getElementById("sortable").getElementsByTagName("li");
    var largo = liList.length;

    li.appendChild(document.createTextNode(""+questionType+""));
    //li.setAttribute("id","element4");
    li.setAttribute("class", "ui-state-default ui-sortable-handle");
    
    var x = document.createElement("input");
    x.setAttribute("type", "text");
    x.setAttribute("class", "required form-control state-warning");

    x.setAttribute("name", "questionText[]");
    x.setAttribute("placeholder", "Enter Question Here");
    x.setAttribute("value", "" +questionText + "");
    x.setAttribute("style","margin-top: 10px; width: 60%;");
    var tID = "t" + largo;
    x.setAttribute("id","" +tID + "");
    var y = document.createElement("div");
    y.setAttribute("class","questionRemove");
    y.setAttribute("style","margin-top: 10px; margin-bottom: 25px;");
    
    var z = document.createElement("a");
    z.setAttribute("href","#");
    var qID = "q" + largo;
    var questionID = "deleteRow('"+qID+"')";

    var type = document.createElement("input");
    type.setAttribute("type", "hidden");
    type.setAttribute("class", "novalidate");
    type.setAttribute("value", ""+questionType+"");
    
    
    
    type.setAttribute("name", "questionType[]");
    
    
    li.setAttribute("id", qID);
    var aID = "a" + largo;
    z.setAttribute("onclick", questionID);
    z.setAttribute("id", aID);
    
    y.appendChild(z);



    var yy = document.createElement("div");
   // yy.setAttribute("class","questionRemove3");
   // yy.setAttribute("style","margin-top: 40px; margin-right: 120px;");
    
    var zz = document.createElement("a");
    zz.setAttribute("href","#");
    var questionID2 = "addQB('"+questionText+"|"+questionType+"|"+tID+"')";
    
    zz.setAttribute("onclick", questionID2);
    var aID2 = "a2" + largo;
   // zz.setAttribute("id", aID2);

   // yy.appendChild(zz);
    
    li.appendChild(x);
    li.appendChild(yy);
    li.appendChild(y);
    li.appendChild(type);
    ul.appendChild(li);
    document.getElementById(aID).innerHTML = "Remove";
   // document.getElementById(aID2).innerHTML = "Add to Question Bank";
}

  
function addTextRow(value) {
  var ul = document.getElementById("sortable");
  var li = document.createElement("li");
    var liList = document.getElementById("sortable").getElementsByTagName("li");
    var largo = liList.length;
    
  li.appendChild(document.createTextNode("(Text Response)"));
  //li.setAttribute("id","element4");
  li.setAttribute("class", "ui-state-default ui-sortable-handle");
  
  var x = document.createElement("input");
  x.setAttribute("type", "text");
  x.setAttribute("class", "form-control required state-warning");
  x.setAttribute("name", "questionText[]");
  x.setAttribute("placeholder", "Enter Question Here");
  x.setAttribute("value", "" +value + "");
  x.setAttribute("style","margin-top: 10px; width: 60%;");
  var y = document.createElement("div");
  y.setAttribute("class","questionRemove");
  y.setAttribute("style","margin-top: 10px; margin-bottom: 25px;");
  var tID = "t" + largo;
  x.setAttribute("id","" +tID + "");
  var z = document.createElement("a");
  z.setAttribute("href","#");
  var qID = "q" + largo;
  var questionID = "deleteRow('"+qID+"')";

  var type = document.createElement("input");
  type.setAttribute("type", "hidden");
    type.setAttribute("class", "novalidate");
  type.setAttribute("value", "(Text Response)");
  type.setAttribute("name", "questionType[]");
  
  
  li.setAttribute("id", qID);
  var aID = "a" + largo;
  z.setAttribute("onclick", questionID);
  z.setAttribute("id", aID);
  
  y.appendChild(z);
  
  var yy = document.createElement("div");
  //yy.setAttribute("class","questionRemove3");
  //yy.setAttribute("style","margin-top: 40px; margin-right: 120px;");
  
  var zz = document.createElement("a");
  zz.setAttribute("href","#");
  var questionID2 = "addQB('"+value+"|(Text Response)|"+tID+"')";
  
  zz.setAttribute("onclick", questionID2);
  var aID2 = "a2" + largo;
  //zz.setAttribute("id", aID2);

  //yy.appendChild(zz);
  li.appendChild(x);
  li.appendChild(yy);
  li.appendChild(y);
  li.appendChild(type);
  ul.appendChild(li);
  document.getElementById(aID).innerHTML = "Remove";

}

function addYesNoRow(value) {
  var ul = document.getElementById("sortable");
  var li = document.createElement("li");
    var liList = document.getElementById("sortable").getElementsByTagName("li");
    var largo = liList.length;
  li.appendChild(document.createTextNode("(Yes/No Choice)"));
  //li.setAttribute("id","element4");
  li.setAttribute("class", "ui-state-default ui-sortable-handle");
  
  var x = document.createElement("input");
  x.setAttribute("type", "text");
  x.setAttribute("class", "form-control required state-warning");
  var tID = "t" + largo;
  x.setAttribute("name", "questionText[]");
 //x.setAttribute("name", "" +tID + "");
  x.setAttribute("placeholder", "Enter Question Here");
  x.setAttribute("value", "" +value + "");
  x.setAttribute("style","margin-top: 10px; width: 60%;");
  
  x.setAttribute("id","" +tID + "");
  var y = document.createElement("div");
  y.setAttribute("class","questionRemove");
  y.setAttribute("style","margin-top: 10px; margin-bottom: 25px;");
  
  var z = document.createElement("a");
  z.setAttribute("href","#");
  var qID = "q" + largo;
  var questionID = "deleteRow('"+qID+"')";

  var type = document.createElement("input");
  type.setAttribute("type", "hidden");
    type.setAttribute("class", "novalidate");
  type.setAttribute("value", "(Yes-No Choice)");
  type.setAttribute("name", "questionType[]");
  
  li.setAttribute("id", qID);
  var aID = "a" + largo;
  z.setAttribute("onclick", questionID);
  z.setAttribute("id", aID);
  
  y.appendChild(z);

  var yy = document.createElement("div");
 // yy.setAttribute("class","questionRemove3");
 // yy.setAttribute("style","margin-top: 40px; margin-right: 120px;");
  
  var zz = document.createElement("a");
  zz.setAttribute("href","#");
  var questionID2 = "addQB('"+value+"|(Yes-No Choice)|"+tID+"')";
  
  zz.setAttribute("onclick", questionID2);
  var aID2 = "a2" + largo;
 // zz.setAttribute("id", aID2);

  //yy.appendChild(zz);
  li.appendChild(x);
  li.appendChild(yy);
  li.appendChild(y);
  li.appendChild(type);
  ul.appendChild(li);
  document.getElementById(aID).innerHTML = "Remove";

}

function addAERow(value) {
  var ul = document.getElementById("sortable");
  var li = document.createElement("li");
    var liList = document.getElementById("sortable").getElementsByTagName("li");
    var largo = liList.length;
  li.appendChild(document.createTextNode("(1-5 Ranking Choice)(1 = lowest, 5 = highest)"));
  li.setAttribute("class", "ui-state-default ui-sortable-handle");
  var x = document.createElement("input");
  x.setAttribute("type", "text");
  x.setAttribute("class", "form-control required state-warning");
  x.setAttribute("name", "questionText[]");
  x.setAttribute("placeholder", "Enter Question Here");
  x.setAttribute("value", "" +value + "");
  x.setAttribute("style","margin-top: 10px; width: 60%;");
  var tID = "t" + largo;
  x.setAttribute("id","" +tID + "");
  var y = document.createElement("div");
  y.setAttribute("class","questionRemove margin-bottom: 25px;");
  y.setAttribute("style","margin-top: 10px;");
  
  var z = document.createElement("a");
  z.setAttribute("href","#");
  var qID = "q" + largo;
  var questionID = "deleteRow('"+qID+"')";

  
  var type = document.createElement("input");
  type.setAttribute("type", "hidden");
    type.setAttribute("class", "novalidate");
  type.setAttribute("value", "(1-5 Ranking Choice)(1 = lowest, 5 = highest)");
  type.setAttribute("name", "questionType[]");
  
  
  
  li.setAttribute("id", qID);
  var aID = "a" + largo;
  z.setAttribute("onclick", questionID);
  z.setAttribute("id", aID);
  
  y.appendChild(z);

  var yy = document.createElement("div");
  //yy.setAttribute("class","questionRemove3");
  //yy.setAttribute("style","margin-top: 40px; margin-right: 120px;");
  
  var zz = document.createElement("a");
  zz.setAttribute("href","#");
  var questionID2 = "addQB('"+value+"|(1-5 Ranking Choice)(1 = lowest, 5 = highest)|"+tID+"')";
  
  zz.setAttribute("onclick", questionID2);
  var aID2 = "a2" + largo;
  //zz.setAttribute("id", aID2);

  //yy.appendChild(zz);
  li.appendChild(x);
  li.appendChild(yy);
  li.appendChild(y);
  li.appendChild(type);
  ul.appendChild(li);
  document.getElementById(aID).innerHTML = "Remove";
  
  
}

function deleteRow(liID) {
  var x = liID;
  var elem = document.getElementById(x);
    var aux = elem.parentNode;
    aux.removeChild(elem);
}

</script>
			
	
</body>

</html>
