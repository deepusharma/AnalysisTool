<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Discovery</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div id="container">
<div id="header"><h1><a href="../index.html">Discovery</a></h1></div>
  <div id="wrapper">
    <div id="content">
<?php
		//get the q parameter from URL
		$q=$_GET["COMPANY_ID"];
		include 'db_connect.php';
		$db = new MyDB();
		if(!$db){
			echo $db->lastErrorMsg();
		} else {
			//echo "Opened database successfully". "\n";
		}

		$sql="SELECT m.COMPANY_NAME from COMPANY_MASTER as m where m.COMPANY_ID=".$q;
		$result = $db->query($sql);
		while($row = $result->fetchArray(SQLITE3_ASSOC) ) {
					echo "<p><strong> Company Name : ".$row['COMPANY_NAME'] . "</strong></p>" . "\n";
		}
		$sql="SELECT * from EQM_CASHFLOW as ecf where ecf.COMPANY_ID=".$q;
		$result = $db->query($sql);
		echo "<table><tr><th></th><th>No. of Months</th><th>12</th><th>12</th><th>12</th><th>12</th><th>12</th></tr>". "\n";
		echo "<tr><th>Cash Flow Data</th><th>Year Ending</th><th>Mar-10</th><th>Mar-11</th><th>Mar-12</th><th>Mar-13</th><th>Mar-14</th></tr>". "\n";
		$row1 = $result->fetchArray(SQLITE3_ASSOC);
		$row2 = $result->fetchArray(SQLITE3_ASSOC);
		$row3 = $result->fetchArray(SQLITE3_ASSOC);
		$row4 = $result->fetchArray(SQLITE3_ASSOC);
		$row5 = $result->fetchArray(SQLITE3_ASSOC);
		echo "<tr><td>From operations</td><td>Rs m</td><td>" . $row1['FROM_OPERATIONS'] . "</td><td>" . $row2['FROM_OPERATIONS'] . "</td><td>" . $row3['FROM_OPERATIONS'] . "</td><td>" . $row4['FROM_OPERATIONS'] . "</td><td>" . $row5['FROM_OPERATIONS'] . "</td></tr>". "\n";
		echo "<tr><td>From investments</td><td>Rs m</td><td>" . $row1['FROM_INVESTMENTS'] . "</td><td>" . $row2['FROM_INVESTMENTS'] . "</td><td>" . $row3['FROM_INVESTMENTS'] . "</td><td>" . $row4['FROM_INVESTMENTS'] . "</td><td>" . $row5['FROM_INVESTMENTS'] . "</td></tr>". "\n";
		echo "<tr><td>From financial activity</td><td>Rs m</td><td>" . $row1['FROM_FINANCIAL_ACTIVITY'] . "</td><td>" . $row2['FROM_FINANCIAL_ACTIVITY'] . "</td><td>" . $row3['FROM_FINANCIAL_ACTIVITY'] . "</td><td>" . $row4['FROM_FINANCIAL_ACTIVITY'] . "</td><td>" . $row5['FROM_FINANCIAL_ACTIVITY'] . "</td></tr>". "\n";
		echo "<tr><td>Net cashflow</td><td>Rs m</td><td>" . $row1['NET_CASHFLOW'] . "</td><td>" . $row2['NET_CASHFLOW'] . "</td><td>" . $row3['NET_CASHFLOW'] . "</td><td>" . $row4['NET_CASHFLOW'] . "</td><td>" . $row5['NET_CASHFLOW'] . "</td></tr>". "\n";

		echo "</table>". "\n";
		echo "</div></div>". "\n";
		echo '<div id="navigation">';
		$sql="SELECT * from EQM_CASHFLOW as ecf where ecf.COMPANY_ID=".$q;
		$result = $db->query($sql);
		$row1 = $result->fetchArray(SQLITE3_ASSOC);
		echo "<p><strong>Company Specific Links</strong></p>". "\n";
		echo '<ul><li><a href="com_eqsd.php?COMPANY_ID='.$q.'">Equity share data</a></li>';
		echo '<li><a href="com_id.php?COMPANY_ID='.$q.'">Income data</a></li>';
		echo '<li><a href="com_bsd.php?COMPANY_ID='.$q.'">Balance Sheet Data</a></li>';
		echo '<li><strong>Cash Flow</strong></li>';
		echo '<li><a href="com_sh.php?COMPANY_ID='.$q.'">Share Holding</a></li></ul>';
  ?>
    <p><strong>Important Links</strong></p>
    <ul>
      <li><a href="http://www.equitymaster.com/" target="_blank">Equity Master</a></li>
      <li><a href="http://www.moneycontrol.com/" target="_blank">Money Control</a></li>
      <li><a href="http://economictimes.indiatimes.com/" target="_blank">Economic Times</a></li>
      <li><a href="https://newtrade.sharekhan.com/rmmweb/" target="_blank">ShareKhan</a></li>
    </ul>
   </div>
  <div id="extra">
    <p><strong>Latest News</strong></p>
    <p>News items related to stocks in our portfolio.</p>
  </div>
  <div id="footer">
    <p><center> Copyright 2014 Shruti Deepak Sharma</center></p>
  </div>
</div>
</body>
</html>





