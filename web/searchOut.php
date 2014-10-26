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

		$sql="SELECT * from COMPANY_MASTER as m where m.COMPANY_ID=".$q;
		$result = $db->query($sql);
		while($row = $result->fetchArray(SQLITE3_ASSOC) ) {
			echo "<p><strong> Company Name : ".$row['COMPANY_NAME'] . "</strong></p>" . "\n";
		}
		$sql="SELECT * from EQM_PRICE_HISTORY as ph where ph.COMPANY_ID=".$q;
		$result = $db->query($sql);
		echo "<table><tr><th>Price History Parameters</th><th>Data</th><th>Parameters</th><th>Data</th></tr>". "\n";
		while($row = $result->fetchArray(SQLITE3_ASSOC) ) {
			echo "<tr><td>Record date</td><td>" . $row['RECORD_DATE'] . "</td><td>SHARES OUTSTANDING</td><td>" . $row['SHARES_OUTSTANDING'] . "</td></tr>". "\n";
			echo "<tr><td>Price</td><td>" . $row['PRICE'] . "</td><td>PERCENT CHANGE</td><td>" . $row['PERCENT_CHANGE'] . "</td></tr>". "\n";
			echo "<tr><td>Market cap</td><td>" . $row['MARKET_CAP'] . "</td><td>PERCENT CHANGE WEEK</td><td>" . $row['PERCENT_CHANGE_WEEK'] . "</td></tr>". "\n";
			echo "<tr><td>Volume</td><td>" . $row['VOLUME'] . "</td><td>PERCENT CHANGE MONTH</td><td>" . $row['PERCENT_CHANGE_MONTH'] . "</td></tr>". "\n";
			echo "<tr><td>P/E</td><td>" . $row['P_E'] . "</td><td>PERCENT CHANGE 12MONTH</td><td>" . $row['PERCENT_CHANGE_12MONTH'] . "</td></tr>". "\n";
			echo "<tr><td>P/CF</td><td>" . $row['P_CF'] . "</td><td>HIGH 52 WEEK</td><td>" . $row['HIGH_52_WEEK'] . "</td></tr>". "\n";
			echo "<tr><td>EPS(TTM)</td><td>" . $row['EPS_TTM'] . "</td><td>HIGH 52 LOW</td><td>" . $row['HIGH_52_LOW'] . "</td></tr>". "\n";
		}
		echo "</table>". "\n";
	echo "</div></div>". "\n";
 	echo '<div id="navigation">';
 	$row = $result->fetchArray(SQLITE3_ASSOC);
	echo "<p><strong>Company Specific Links</strong></p>". "\n";
	echo '<ul><li><a href="com_eqsd.php?COMPANY_ID='.$row['COMPANY_ID'].'">Equity share data</a></li>';
	echo '<li><a href="com_id.php?COMPANY_ID='.$row['COMPANY_ID'].'">Income data</a></li>';
	echo '<li><a href="com_bsd.php?COMPANY_ID='.$row['COMPANY_ID'].'">Balance Sheet Data</a></li>';
	echo '<li><a href="com_cf.php?COMPANY_ID='.$row['COMPANY_ID'].'">Cash Flow</a></li>';
	echo '<li><a href="com_sh.php?COMPANY_ID='.$row['COMPANY_ID'].'">Share Holding</a></li></ul>';
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





