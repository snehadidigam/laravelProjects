<?php
    if(isset($_POST['savebill'])) {
        saveBills();
    }
    function saveBills(){
        $con=mysqli_connect("localhost","root","","localdb");
        $query = mysqli_query($con, "INSERT INTO bills (amount, date, type, Notes) VALUES('".$_POST['expense']."','". $_POST['date']."','". $_POST['cate']."','". $_POST['notes']."')");
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Expenses Report</title>

	<!-- <link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css"> -->
	<!-- <link rel="stylesheet" href="http://fonts.google.com/css?family=Economica:400,700|Pacifico" type="text/css"> -->
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
                    <li><a href="#"><em>Addbill</em></a></li>
                    <li><a href="viewbill.php"><em>viewbill</em></a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section class="fixed-width">
		<!-- main content -->
		<center>
        <h1>ADD NEW BILL</h1>
        <form action="addbill.php" method="post" accept-charset="utf-8">
        <table>
        <tr>
        <td><label>Amount spent:</label></td><td><input type="text" name="expense" placeholder="Enter Amount"><br></td>
        </tr>
        <tr>
        <td><label>Date Spent:</label></td><td><input type="date" name="date" placeholder="date"> <br></td>
        </tr>
        <tr>
        <td><label>Category:</label></td>
        <td><select name="cate">
            <option value="others">others</option>
            <option value="grocery">grocery</option>
            <option value="shopping">shopping</option>
            <option value="food">food</option>
            <option value="entertainment">entertainment</option>
            <option value="gas">gas</option>
        </select></td>
        <tr>
        <td><label>Notes:</label></td><td><input type="text" name="notes"></td>
        <tr>
        <td><button><a href="viewbill.php">view bills</a></button></td>
        <td><button type="submit" name="savebill" value="savebill">save</button></td>
        </tr>
        </form>
        </center>
    </section>
</body>
</html>