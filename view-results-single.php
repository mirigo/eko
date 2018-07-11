<!DOCTYPE html>
<?php
session_start();
if(isset($_GET["event"]))
  $event = $_GET["event"];

$conn=mycon();
$query = "SELECT * FROM event, questions WHERE event.event='".$event."' and event.eventID=questions.eventID ";
$result=mysql_query($query) or die(mysql_error());


$eventTitle = mysql_result($result,0,"Title");
$eventID = mysql_result($result,0,"eventID");
$eventDate = mysql_result($result,0,"start");
$deadline = mysql_result($result,0,"end");

$eventDate2 = strtotime($eventDate);
$eventDate3 = date("M d Y",$eventDate2);


$num=mysql_num_rows($result);

if ($currentQuestionNum==1)
{
	if (isset($_GET["event"])){
		$linkLeft = "";
		if($num > "1")
		$linkRight = "view-results.php?id=2&event=".$_GET["event"];
	}
	else {

    echo "It didn't get the event";
	}
}
else if ($currentQuestionNum==10)
{
	if (isset($_GET["event"])){
$linkLeft = "view-results.php?id=9&event=".$_GET["event"];
$linkRight = "";
	}
	else {
	echo "It didn't get the event";

	}
}
else 
{
	if (isset($_GET["ref"])){

  $linkLeft = "view-results.php?id=".($currentQuestionNum-1)."&event=".$_GET["event"];
if(($currentQuestionNum+1)<=$num)

  $linkRight = "view-results.php?id=".($currentQuestionNum+1)."&even=".$_GET["event"];
	}
	else {
		$linkLeft = "view-results.php?id=".($currentQuestionNum-1);
		if(($currentQuestionNum+1)<=$num)
		$linkRight = "view-results.php?id=".($currentQuestionNum+1);
	}
}



$i=0;
$questionTypeArray = array();
$questionTextArray = array();
while ($i < $num) {
$questionTypeArray[$i] = mysql_result($result,$i,"responseType");
$questionTextArray[$i] = mysql_result($result,$i,"questionText");
$i++;
}
//we have now gathered the sets of question texts and response types

//now get response values from db


$query="SELECT *, DATE_FORMAT(dateSubmit, '%e %M %Y') as formatted_date FROM Response, event WHERE event ='".$event."' and  Response.eventID=event.eventID";
$result=mysql_query($query) or die(mysql_error());
$num_results = mysql_num_rows($result);
if ($num_results > 0)
{
//number of responses returned for this eventID, ordered by requestID and orderID
$num2=mysql_num_rows($result);
$i=0;
$responseValArray = array();
$responseOrderArray = array();
while ($i < $num2) {
$responseValArray[$i] = mysql_result($result,$i,"responseValue");
$dateArray[$i] = mysql_result($result,$i,"formatted_date");
$i++;
}
//we have now gathered the sets of question texts, response types and response values
//lets divide up and extract only the answers for this question
//first make sure it is a graph question
$index = $currentQuestionNum-1;
if ($questionTypeArray[$index]==0)
{
//we have checked and this question is A-E response, let's go
$numFeedback = count($responseValArray)/$num;
$maxResponse = ($numFeedback * $num)-1;

$j=$index;
$k=0;
$graphArray = array(0,0,0,0,0);
while ($j <= $maxResponse) 
{

switch ($responseValArray[$j])
{
case "1":
$graphArray["0"] = $graphArray["0"]+1;
  break;
case "2":
$graphArray["1"] = $graphArray["1"]+1;
  break;
case "3":
$graphArray["2"] = $graphArray["2"]+1;
  break;
case "4":
$graphArray["3"] = $graphArray["3"]+1;
  break;
case "5":
$graphArray["4"] = $graphArray["4"]+1;
  break;
default:
//do nothing
}

//$graphArray[$k] = $responseValArray[$j];
$j = $j+$num;
}

}
else if ($questionTypeArray[$index]==1)
{
//we have checked and this question is a text response, let's go
//let's get the number of feedback sets provided, count all responses and divide by $num
$numFeedback = count($responseValArray)/$num;
//let's get the maximum index we'll use to lift the results from response array (moving in 10's)
$maxResponseIndex = ($numFeedback * $num)-1;
$j=$index;
$k=0;
$textArray = array('');
$dateArrayUse = array('');
while ($j <= $maxResponseIndex) 
{
$textArray[$k] = $responseValArray[$j];
$dateArrayUse[$k] = $dateArray[$j];
$j = $j+$num;
$k = $k+1;
}

}
else if ($questionTypeArray[$index]==2)
{
//we have checked and this question is YES-NO response, let's go
$numFeedback = count($responseValArray)/$num;
$maxResponse = ($numFeedback * $num)-1;
$j=$index;
$k=0;
$graphArray2 = array(0,0);
while ($j <= $maxResponse) 
{

switch ($responseValArray[$j])
{
case "Yes":
$graphArray2["0"] = $graphArray2["0"]+1;
  break;
case "No":
$graphArray2["1"] = $graphArray2["1"]+1;
  break;
default:
//do nothing
}

//$graphArray[$k] = $responseValArray[$j];
$j = $j+$num;
}

}}
?>

<?php 

require_once 'phplot.php';
$cnt = 0;
foreach ($questionTextArray as $q) {
	$out .= '"'.$q.'",';
}
$out .= "\n";
foreach ($questionTypeArray as $q) {
	switch ($q)
	{
		case "0":
			$out .= '"'."1-5 Rating (1=Poor, 2=Not so good, 3=OK, 4=Good, 5=Excellent)".'",';
			break;
		case "1":
			$out .= '"'."Open Text Response".'",';
			break;
		case "2":
			$out .= '"'."Yes/No Options".'",';
			break;		
		default:
			//do nothing
	}
}
$out .= "\n";
$o = 0;

for($f = 0; $f < $numFeedback*$num; $f = $f + $num) {
		for($g = 0; $g < count($questionTextArray); $g++) {
		$out .= '"'.$responseValArray[$f+$g].'",';
		}

	$out .= "\n";
	$cnt++;
	$o = $o + $num;
}

if($num_results == 0){
	$numFeedback = 0;
}
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
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">

   <!---old code for plotting --->	
  
	 <script type="text/javascript">
$(document).bind("mobileinit", function() {
	$.mobile.ajaxLinksEnabled = false;
  	$.mobile.ajaxFormsEnabled = false;
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	   var left = $(".linkLeft").attr("href");
	    if (left == "") {
	       // alert('I am LEFT empty href value');
	    	//$("#leftArrow").css("display", "none");
	    	$("#leftArrow").attr("src","img/arrow_left_b.png");
	    }
	   var right = $(".linkRight").attr("href");
	    if (right == "") {
	       // alert('I am RIGHT empty href value');
	    	//$("#rightArrow").css("display", "none");
	    	$("#rightArrow").attr("src","img/arrow_right_b.png");
	    }
	 });
</script>

<script type="text/javascript" src="js/raphael-min.js"></script>
<script type="text/javascript" src="js/g.raphael-min.js"></script>
<script type="text/javascript" src="js/g.pie-min.js"></script>
<script type="text/javascript" src="js/g.bar-min.js"></script>
<script type="text/javascript" src="js/graph_script.js"></script>


  <script type="text/javascript">
        window.onload = function () 
		{
            var r = Raphael("holder");
            var yesno = "<? echo $yesno;?>";
           
                fin = function () {
                    this.flag = r.g.popup(this.bar.x, this.bar.y, this.bar.value || "0").insertBefore(this);
                },
                fout = function () {
                    this.flag.animate({opacity: 0}, 300, function () {this.remove();});
                },
                fin2 = function () {
                    var y = [], res = [];
                    for (var i = this.bars.length; i--;) {
                        y.push(this.bars[i].y);
                        res.push(this.bars[i].value || "0");
                    }
                    this.flag = r.g.popup(this.bars[0].x, Math.min.apply(Math, y), res.join(", ")).insertBefore(this);
                },
                fout2 = function () {
                    this.flag.animate({opacity: 0}, 300, function () {this.remove();});
                };
            r.g.txtattr.font = "10px 'Verdana', Verdana, sans-serif";

			//supply values in array form for the graph
            if (yesno == "no"){
             var labels = ["1", "2", "3", "4", "5"];
            var values = [<?php echo $graphArray[0]?>,<?php echo $graphArray[1]?>,<?php echo $graphArray[2]?>,<?php echo $graphArray[3]?>,<?php echo $graphArray[4]?>];
            }
            else{
            	 var labels = ["Yes", "No"];
                 var values = [<?php echo $graphArray2[0]?>,<?php echo $graphArray2[1]?>]; 
            }
			//create the graph based on the 2 arrays
            r.g.barchart(10, 5, 250, 110, values).hover(fin, fout).label(labels); 

        };
        </script>
        
        
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	
	
	<!---end old code for plotting --->
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
			
				
		</nav>
		
		
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
            	
				<!-- FAQ's -->
									
				<!--Row--><!--Show the event information-->
				<div class="row">
					<div class="col-md-12">

						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter"><span class=""><?php echo $eventTitle; ?></span></span>
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
					
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

							<div class="panel panel-default card-view pa-0">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter"><span class=""><?php echo $eventDate3; ?></span></span>
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
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-default card-view pa-0">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter"><span class=""><?php echo $numFeedback; ?></span></span>
														<span class="weight-500 uppercase-font txt-grey block">Number of Responses</span>
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
					
				</div>
				</div>
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
				<!--Row-->
				<div class="row">
					
				</div>
							<?php
						if($num_results==0){ ?>

							
								<div class="col-lg-6 col-md-4 col-sm-5 col-xs-12">
									<div class="panel panel-warning card-view">
										<div class="panel-heading small-panel-heading relative">
											<div class="pull-left">
												<h6 class="panel-title txt-light">You have not had feedback yet. Please come back later. </h6>
											</div>
											<div class="clearfix"></div>
											<div class="head-overlay"></div>
										</div>
									</div>
								</div>



					<?php	}
						else{
							$accord = 0;
							for($f = 0; $f < $numFeedback*$num; $f = $f + $num) {
									for($g = 0; $g < count($questionTextArray); $g++) {
									$out .= '"'.$responseValArray[$f+$g].'",';
									}

								$out .= "\n";
								$cnt++;
								$o = $o + $num;
							}
							$nrow=1;
							$ncol=1;
							for($i = 0; $i < $num; $i++){
								if ($nrow<=1)
								{	?>
									<div class="row">
								<?php $nrow=$nrow+1;
								 } else {
								 	$nrow=1;
								}
								if ($ncol<=2)
								{	?>
									<div class="col-lg-6">
								<?php $ncol=$ncol+1;
								 } else {
								 	$ncol=1;
								}

								if ($questionTypeArray[$i]==0)
								{
									//we have checked and this question is A-E response, let's go
									$numFeedback = count($responseValArray)/$num;
									$maxResponse = ($numFeedback * $num)-1;

									$j=$i;
									$k=0;
									$graphArray = array(0,0,0,0,0);
									while ($j <= $maxResponse)
									{

										switch ($responseValArray[$j])
										{
											case "1":
												$graphArray["0"] = $graphArray["0"]+1;
												break;
											case "2":
												$graphArray["1"] = $graphArray["1"]+1;
												break;
											case "3":
												$graphArray["2"] = $graphArray["2"]+1;
												break;
											case "4":
												$graphArray["3"] = $graphArray["3"]+1;
												break;
											case "5":
												$graphArray["4"] = $graphArray["4"]+1;
												break;
											default:
												//do nothing
										}
										
							
										$j = $j+$num;
									}

								}
								else if ($questionTypeArray[$i]==1)
								{
									

									//we have checked and this question is a text response, let's go
									//let's get the number of feedback sets provided, count all responses and divide by $num
									$numFeedback = count($responseValArray)/$num;
									//let's get the maximum index we'll use to lift the results from response array (moving in 10's)
									$maxResponseIndex = ($numFeedback * $num)-1;
									$j=$i;
									$k=0;
									$textArray = array('');
									$dateArrayUse = array('');
									while ($j <= $maxResponseIndex)
									{
										$textArray[$k] = $responseValArray[$j];
										$dateArrayUse[$k] = $dateArray[$j];
									
									//	$out .= '"'.$responseValArray[$j].'",';
										
										$j = $j+$num;
										$k = $k+1;
									}
									?>

													
									
								<?php
								}

							
								else if ($questionTypeArray[$i]==2)
								{
									//we have checked and this question is YES-NO response, let's go
									$numFeedback = count($responseValArray)/$num;
									$maxResponse = ($numFeedback * $num)-1;
									$j=$i;
									$k=0;
									$graphArray2 = array(0,0);
									while ($j <= $maxResponse)
									{

										switch ($responseValArray[$j])
										{
											case "Yes":
												$graphArray2["0"] = $graphArray2["0"]+1;
												break;
											case "No":
												$graphArray2["1"] = $graphArray2["1"]+1;
												break;
											default:
												//do nothing
										}

									
										$j = $j+$num;
									}	
								}

							if ($questionTypeArray[$i]==0) 
							{ 
							?>
							<script type="text/javascript">

							// Load the Visualization API and the piechart package.
							google.load('visualization', '1.0', {'packages':['corechart']});

							// Set a callback to run when the Google Visualization API is loaded.
							google.setOnLoadCallback(drawChart);

							// Callback that creates and populates a data table,
							// instantiates the pie chart, passes in the data and
							// draws it.
							function drawChart() {

							var maxgrid = <?php echo $num + 1?>;
								
								// Create the data table.
								var data = new google.visualization.DataTable();
								data.addColumn('string', 'Ranking');
								data.addColumn('number', 'Number of Votes');
								data.addRows([
								['1', <?php echo $graphArray[0];?>],
								['2', <?php echo $graphArray[1];?>],
								['3', <?php echo $graphArray[2];?>],
								['4', <?php echo $graphArray[3];?>],
								['5', <?php echo $graphArray[4];?>]
								]);

								// Set chart options
									
								
								var options = {'title':'<?php echo $questionTextArray[$i]?>',
								'width':300,
								'height':300,
								'axisTitlesPosition':'out',
								 'gridlines': maxgrid,
								hAxis: {title: 'Rating (1=Poor, 2=Not so good, 3=OK, 4=Good, 5=Excellent)', titleTextStyle: {color: '#333'}}, 
								vAxis: {title: 'Number of Votes', titleTextStyle: {color: '#333'}},
								legend: {position: 'none'}, 
								}

								
								// Instantiate and draw our chart, passing in some options.
								var chart = new google.visualization.ColumnChart(document.getElementById('chart_div<?php echo $i?>'));
								chart.draw(data, options);
							}
							</script>

									
									<div class="columns large-5" style="margin-top: 30px; margin-bottom: 30px;">
										<table class="table" style="text-align: center; background-color: rgba(0,0,0,0.0); border: 0px">
											<tr style="text-align: center; background-color: rgba(0,0,0,0.0)">
												<td style="text-align: left; padding: 0px">
													<h6 class="panel-title txt-light">Question <?php echo $i + 1;?> - <?php echo $questionTextArray[$i];?></h6>
												</td> 
											</tr>
											<tr style="text-align: center; background-color: rgba(0,0,0,0.0)">
												<td>
													<div class="smallScrollNote row show-for-small"></div>
												</td>
											</tr>
											<tr>
												<td >
													<div class="columns"  style="margin-left: auto; margin-right: auto; padding-right: 0px;">

										   				<div id="chart_div<?php echo $i?>" style="width: 304px; border-style: ridge; border-width: 2px; border-color: red;"></div>
													</div>
												</td>
											</tr>
										</table>
									</div>
								
				
							<?php 

							}
							//YESNO PLOT
							else if ($questionTypeArray[$i]==2) 
							{ ?>
						
							<div class="col-lg-6 col-md-4 col-sm-5 col-xs-12">
								<div class="panel panel-warning card-view">
									<div class="panel-heading small-panel-heading relative">
										<div class="pull-left">
											<h6 class="panel-title txt-light">Question <?php echo $i + 1;?> - <?php echo $questionTextArray[$i];?></h6>
										</div>
										<div class="clearfix"></div>
										<div class="head-overlay"></div>
									</div>		
									<div class="panel-wrapper collapse in">
										<div class="panel-body row pa-0">
											<div class="sm-data-box data-with-border bg-yellow">
												<div class="container-fluid">
													<div class="row">
														<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
															<span class="weight-500 uppercase-font txt-light block">Yes</span>
															<span class="txt-light block counter"><span class="counter-anim"><?php echo $graphArray2[0]?></span></span>
														</div>
														<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
															<span class="weight-500 uppercase-font txt-light  block">No</span>
															<span class="txt-light block counter"><span class="counter-anim"><?php echo $graphArray2[1]?></span></span>
														</div>
													</div>	
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						
							
							<?php 
							}
							else
							{

							$m=0;

							?>  

									<div class="panel panel-default card-view">
										<div class="panel-heading">
											<div class="pull-left">
												<h6 class="panel-title txt-dark">Question <?php echo $i + 1;?> - <?php echo $questionTextArray[$i];?> </h6>
											</div>
											<div class="clearfix"></div>
										</div>										
									</div>	
									<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="panel-group accordion-struct"  role="tablist" aria-multiselectable="true">
											<div class="panel panel-default">								
									

														<?php 

														while ($m<count($textArray))
														{

															if($textArray[$m] != ""){
														
														?>



													<div class="panel-heading activestate" role="tab" id="heading_<?php echo $accord;?>">
												<a class="collapsed" role="button" data-toggle="collapse" href="#collapse_<?php echo $accord;?>" aria-expanded="false" >Response <?php echo $m+1;?></a> 
															</div>


														  
													<div id="collapse_<?php echo $accord;?>" class="panel-collapse collapse in" role="tabpanel">
																<div class="panel-body pa-15"> <?php echo $textArray[$m];?> </div>
															</div>														  



														<?php if ($m == count($textArray)-1) { ?>


														  <?php  }?>
														<?php 
															}
														$m = $m+1;
														$accord = $accord+1;	
														}//while
														?>
												</div>

											</div>
										</div>
									</div>
						<?php }//else
								if ($nrow<=1)
								{	?>
									</div>
								<?php
								 }
								if ($ncol<=2)
								{	?>
									</div>
								<?php
								 }
						} //for
					}//else if has results							?>
							
							</div>
						</form>
					</div>
				</div>

				
				<!-- /Row -->
			
				<div class="row">
				
				</div>

				<div class="row col-md-12" >
				<!-- Footer -->
					<div class="clearfix"></div>
					<footer class="footer container-fluid pl-30 pr-30 padding-bottom: 30px;" >
						<div class="row">
							<div class="col-sm-12" style="padding-left: 50px;">
								<p>2018 &copy; Skill-Pill. <a style="color: white;" href="//www.skill-pill.com/termsandconditions/Terms and Conditions including Copyright and Privacy Policy for Website April 2018.pdf" target="_BLANK">Terms and Conditions</a>
								<span class="pull-right" style="font-size: large; margin-left: 5px; "><a  class="fa fa-twitter" href="//twitter.com/skillpill" target="_BLANK">
    					
  								</a></span><span class="pull-right" style="font-size: large; margin-right: 5px; "><a  class="fa fa-linkedin" href="//www.linkedin.com/company/skill-pill-m-learning/" target="_BLANK">
    					
  								</a></span></p>
							</div>
					
						</div>
					</footer>
				<!-- /Footer -->
				</div>
			</div>
			
			</div>
        <!-- /Main Content -->
    	</div>
    
    <!-- /#wrapper -->
	
	<!-- JavaScript -->

 	<!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="vendors/chart.js/Chart.min.js"></script>
	<!--script src="dist/js/chartjs-data.js"></script-->

	<!-- Morris Charts JavaScript -->
    <script src="vendors/bower_components/raphael/raphael.min.js"></script>
    <script src="vendors/bower_components/morris.js/morris.min.js"></script>
    <!--script src="dist/js/morris-data.js"></script-->
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>	
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
<script type="text/javascript">

		
		var ctx2 = document.getElementById("yn").getContext("2d");
		
		var data2 = {
			//labels: ["Question1", "Question2","Question3"],
			labels: ["Question1"],
			datasets: [
				{
					label: "no",
					backgroundColor: "rgba(220,70,102,.8)",
					borderColor: "rgba(220,70,102,.8)",
					//data: [5, 7,4]
					data: [<?php echo $graphArray2[1]?>]
				},
				{
					label: "yes",
					backgroundColor: "rgba(70,148,8,.8)",
					borderColor: "rgba(70,148,8,.8)",
					data: [<?php echo $graphArray2[0]?>]
				}
			]
		};
		
		var hBar = new Chart(ctx2, {
			type:"horizontalBar",
			data:data2,
			
			options: {
				tooltips: {
					mode:"label"
				},
				scales: {
					yAxes: [{
						stacked: true,
						gridLines: {
							color: "#878787",
						},
						ticks: {
							fontFamily: "Roboto",
							fontColor:"#878787"
						}
					}],
					xAxes: [{
						stacked: true,
						gridLines: {
							color: "#878787",
						},
						ticks: {
							fontFamily: "Roboto",
							fontColor:"#878787"
						}
					}],
					
				},
				elements:{
					point: {
						hitRadius:40
					}
				},
				animation: {
					duration:	3000
				},
				responsive: true,
				legend: {
					display: false,
				},
				tooltip: {
					backgroundColor:'rgba(33,33,33,1)',
					cornerRadius:0,
					footerFontFamily:"'Roboto'"
				}
				
			}
		});
	
	//if($('#morris_extra_bar_chart').length > 0)
		// Morris bar chart
		Morris.Bar({
			element: 'morris_extra_bar_chart',
			data: [{
				y: '2006',
				a: 100,
				b: 90,
				c: 60
			}],
			xkey: 'y',
			ykeys: ['a', 'b', 'c'],
			labels: ['A', 'B', 'C'],
			barColors:['#e69a2a', '#ea6c41', '#177ec1'],
			hideHover: 'auto',
			gridLineColor: '#878787',
			resize: true,
			barGap:7,
			gridTextColor:'#878787',
			gridTextFamily:"Roboto"
		});
	
	
	</script>
	
	
			
	
</body>

</html>