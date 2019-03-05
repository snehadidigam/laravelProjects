<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Expenses Report</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
	<header id="header" class="page-header">
		<div class="fixed-width clearfix">
			<em class="identity">ExRe</em>
			
			<nav>
				<ul>
					<li><a href="homeindex.php"><em>DASHBOARD</em></a></li>
                    <li><a href="addbill.php"><em>Addbill</em></a></li>
                    <li><a href="#"><em>viewbill</em></a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section class="fixed-width">
		<!-- main content -->
		<center>
            <h1>BILLS ADDED</h1>
<?php
        $conn=mysqli_connect("localhost","root","","localdb");
        $sql = "SELECT amount, date, type, Notes FROM bills order by date desc";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><td><em>DATE</em></td> <td><em>AMOUNT SPENT</em></td> <td><em>CATEGORY</em></td><td><em>NOTES</em></td></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr> <td> ". $row["date"]. "</td> <td>". $row["amount"]. "$</td> <td> " . $row["type"] . "</td> <td> " . $row["Notes"] . "</td><tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
?>
        </center>
    </section>
</body>
</html>