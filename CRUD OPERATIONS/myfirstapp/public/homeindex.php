<?php
$conn=mysqli_connect("localhost","root","","localdb");
$sql = "select sum(amount) as amount, type from bills group by type";
$result = $conn->query($sql);
while ($graph = $result->fetch_assoc()) {
    $graphs[] = array(
        'y' => $graph["amount"],
        'indexLabel' => $graph["type"],
    );
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Expenses Report</title>

	<link rel="stylesheet" href="http://fonts.google.com/css?family=Economica:400,700|Pacifico" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript">
   window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Summary of Expenses Spent"
      },
      data: [
      {
       type: "doughnut",
       dataPoints: <?php echo json_encode($graphs); ?>
      //  sample data
    //    [
    //    {  y: 53.37, indexLabel: "Groceries" },
    //    {  y: 35.0, indexLabel: "Shopping" },
    //    {  y: 7, indexLabel: "Food" },
    //    {  y: 2, indexLabel: "Entertainment" },
    //    {  y: 14, indexLabel:"Gas"},
    //    {  y: 5, indexLabel: "Others" }
    //    ]
     }
     ]
   });

    chart.render();
  }
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>
<body>
	<header id="header" class="page-header">
		<div class="fixed-width clearfix">
			<em class="identity">ExRe</em>
			
			<nav>
				<ul>
					<li><a href="#"><em>DASHBOARD</em></a></li>
                    <li><a href="addbill.php"><em>Addbill</em></a></li>
                    <li><a href="viewbill.php"><em>viewbill</em></a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section class="fixed-width">
		<!-- main content -->
<div id="chartContainer" style=" width: 100%; height: 280px; padding-top:35px;  padding-bottom: 35px;">
</div>
		
	</section>

	</body>
</html>