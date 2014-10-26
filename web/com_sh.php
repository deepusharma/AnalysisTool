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
		$sql="SELECT * from EQM_SHAREHOLDING as esh where esh.COMPANY_ID=".$q;
		$result = $db->query($sql);
		echo "<table><tr><th>Share Holding Parameters</th><th>Data</th></tr>". "\n";
		while($row = $result->fetchArray(SQLITE3_ASSOC) ) {
			echo "<tr><td>Indian promoters</td><td>" . $row['INDIAN_PROMOTERS'] . "</td></tr>". "\n";
			echo "<tr><td>Foreign collaborators</td><td>" . $row['FOREIGN_COLLABORATORS'] . "</td></tr>". "\n";
			echo "<tr><td>Indian inst/Mut Fund</td><td>" . $row['INDIAN_INST_MUT_FUND'] . "</td></tr>". "\n";
			echo "<tr><td>FIIs</td><td>" . $row['FIIS'] . "</td></tr>". "\n";
			echo "<tr><td>ADR/GDR</td><td>" . $row['ADR_GDR'] . "</td></tr>". "\n";
			echo "<tr><td>Free float</td><td>" . $row['FREE_FLOAT'] . "</td></tr>". "\n";
			echo "<tr><td>Shareholders</td><td>" . $row['SHAREHOLDERS'] . "</td></tr>". "\n";
			echo "<tr><td>Pledged promoter(s) holding</td><td>" . $row['PLEDGED_PROMOTER_HOLDING'] . "</td></tr>". "\n";
		}
		echo "</table>". "\n";
		echo "</div></div>". "\n";
		echo '<div id="navigation">';
		$sql="SELECT * from EQM_SHAREHOLDING as esh where esh.COMPANY_ID=".$q;
		$result = $db->query($sql);
		$row1 = $result->fetchArray(SQLITE3_ASSOC);
		echo "<p><strong>Company Specific Links</strong></p>". "\n";
		echo '<ul><li><a href="com_eqsd.php?COMPANY_ID='.$q.'">Equity share data</a></li>';
		echo '<li><a href="com_id.php?COMPANY_ID='.$q.'">Income data</a></li>';
		echo '<li><a href="com_bsd.php?COMPANY_ID='.$q.'">Balance Sheet Data</a></li>';
		echo '<li><a href="com_cf.php?COMPANY_ID='.$q.'">Cash Flow</a></li>';
		echo '<li><strong>Share Holding</strong></li></ul>';
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





