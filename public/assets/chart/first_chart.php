<html>
<head>
<title>My first chart using FusionCharts Suite XT</title>
<script type="text/javascript" src="js/fusioncharts.js"></script>
<script type="text/javascript" src="js/themes/fusioncharts.theme.fint.js"></script>

<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "legacyguidance";
	
	$con = mysqli_connect("$host","$user","$pass","$db");
	//end of connection here...
	//start of query here...
	
	$student_count_M = "";//variable for boys
	$student_count_F = "";//variable for boys
	$student_count_R = "";
	$student_count_INC = "";
	$student_count_C = "";
	
	$sql1 = "SELECT count(DISTINCT studentID) FROM rate";
	$result1 = mysqli_query($con, $sql1);
	while($res1 = mysqli_fetch_array($result1))
	{
		 $student_count_ = $res1['count(DISTINCT studentID)'];
	}
	
	
	
	
	
?>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "column2d",
        "renderAt": "chartContainer",
        "width": "500",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Teachers Evaluation Overview",
              "subCaption": "Legacy College of Compostela",
              "xAxisName": "Student",
              "yAxisName": "Number of Student",
              "theme": "fint"
           },
          "data": [
              {
                 "label": "Girls",
                 "value": "<?php echo $student_count_; ?>"
              },
           ]
        }
    });

    revenueChart.render();
})

</script>


</script>
</head>

<body>
	<div id="chartContainer">Chart will load here!</div>

	<h2>Welcome Jason this is you first Creation of graph</h2>
	<a href="guage.php">Navigate to GUAGE</a>
</body>

</html>