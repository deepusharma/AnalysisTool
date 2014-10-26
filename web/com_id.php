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
		$sql="SELECT * from EQM_INCOME_DATA as eid where eid.COMPANY_ID=".$q;
		$result = $db->query($sql);
		echo "<table><tr><th></th><th>No. of Months</th><th>12</th><th>12</th><th>12</th><th>12</th><th>12</th></tr>". "\n";
		echo "<tr><th>Income Data</th><th>Year Ending</th><th>Mar-10</th><th>Mar-11</th><th>Mar-12</th><th>Mar-13</th><th>Mar-14</th></tr>". "\n";
		$row1 = $result->fetchArray(SQLITE3_ASSOC);
		$row2 = $result->fetchArray(SQLITE3_ASSOC);
		$row3 = $result->fetchArray(SQLITE3_ASSOC);
		$row4 = $result->fetchArray(SQLITE3_ASSOC);
		$row5 = $result->fetchArray(SQLITE3_ASSOC);
		echo "<tr><td>Net Sales</td><td>Rs m</td><td>" . $row1['NET_SALES'] . "</td><td>" . $row2['NET_SALES'] . "</td><td>" . $row3['NET_SALES'] . "</td><td>" . $row4['NET_SALES'] . "</td><td>" . $row5['NET_SALES'] . "</td></tr>". "\n";
		echo "<tr><td>Other income</td><td>Rs m</td><td>" . $row1['OTHER_INCOME'] . "</td><td>" . $row2['OTHER_INCOME'] . "</td><td>" . $row3['OTHER_INCOME'] . "</td><td>" . $row4['OTHER_INCOME'] . "</td><td>" . $row5['OTHER_INCOME'] . "</td></tr>". "\n";
		echo "<tr><td>Total revenues</td><td>Rs m</td><td>" . $row1['TOTAL_REVENUES'] . "</td><td>" . $row2['TOTAL_REVENUES'] . "</td><td>" . $row3['TOTAL_REVENUES'] . "</td><td>" . $row4['TOTAL_REVENUES'] . "</td><td>" . $row5['TOTAL_REVENUES'] . "</td></tr>". "\n";
		echo "<tr><td>Gross Profit</td><td>Rs m</td><td>" . $row1['GROSS_PROFIT'] . "</td><td>" . $row2['GROSS_PROFIT'] . "</td><td>" . $row3['GROSS_PROFIT'] . "</td><td>" . $row4['GROSS_PROFIT'] . "</td><td>" . $row5['GROSS_PROFIT'] . "</td></tr>". "\n";
		echo "<tr><td>Depreciation</td><td>Rs m</td><td>" . $row1['DEPRECIATION'] . "</td><td>" . $row2['DEPRECIATION'] . "</td><td>" . $row3['DEPRECIATION'] . "</td><td>" . $row4['DEPRECIATION'] . "</td><td>" . $row5['DEPRECIATION'] . "</td></tr>". "\n";
		echo "<tr><td>Interest</td><td>Rs m</td><td>" . $row1['INTEREST'] . "</td><td>" . $row2['INTEREST'] . "</td><td>" . $row3['INTEREST'] . "</td><td>" . $row4['INTEREST'] . "</td><td>" . $row5['INTEREST'] . "</td></tr>". "\n";
		echo "<tr><td>Profit before tax</td><td>Rs m</td><td>" . $row1['PROFIT_BEFORE_TAX'] . "</td><td>" . $row2['PROFIT_BEFORE_TAX'] . "</td><td>" . $row3['PROFIT_BEFORE_TAX'] . "</td><td>" . $row4['PROFIT_BEFORE_TAX'] . "</td><td>" . $row5['PROFIT_BEFORE_TAX'] . "</td></tr>". "\n";
		echo "<tr><td>Minority interest</td><td>Rs m</td><td>" . $row1['MINORITY_INTEREST'] . "</td><td>" . $row2['MINORITY_INTEREST'] . "</td><td>" . $row3['MINORITY_INTEREST'] . "</td><td>" . $row4['MINORITY_INTEREST'] . "</td><td>" . $row5['MINORITY_INTEREST'] . "</td></tr>". "\n";
		echo "<tr><td>Prior period items</td><td>Rs m</td><td>" . $row1['PRIOR_PERIOD_ITEMS'] . "</td><td>" . $row2['PRIOR_PERIOD_ITEMS'] . "</td><td>" . $row3['PRIOR_PERIOD_ITEMS'] . "</td><td>" . $row4['PRIOR_PERIOD_ITEMS'] . "</td><td>" . $row5['PRIOR_PERIOD_ITEMS'] . "</td></tr>". "\n";
		echo "<tr><td>Extraordinary inc exp</td><td>Rs m</td><td>" . $row1['EXTRAORDINARY_INC_EXP'] . "</td><td>" . $row2['EXTRAORDINARY_INC_EXP'] . "</td><td>" . $row3['EXTRAORDINARY_INC_EXP'] . "</td><td>" . $row4['EXTRAORDINARY_INC_EXP'] . "</td><td>" . $row5['EXTRAORDINARY_INC_EXP'] . "</td></tr>". "\n";
		echo "<tr><td>Tax</td><td>Rs m</td><td>" . $row1['TAX'] . "</td><td>" . $row2['TAX'] . "</td><td>" . $row3['TAX'] . "</td><td>" . $row4['TAX'] . "</td><td>" . $row5['TAX'] . "</td></tr>". "\n";
		echo "<tr><td>Profit after tax</td><td>Rs m</td><td>" . $row1['PROFIT_AFTER_TAX'] . "</td><td>" . $row2['PROFIT_AFTER_TAX'] . "</td><td>" . $row3['PROFIT_AFTER_TAX'] . "</td><td>" . $row4['PROFIT_AFTER_TAX'] . "</td><td>" . $row5['PROFIT_AFTER_TAX'] . "</td></tr>". "\n";
		echo "<tr><td>Gross profit margin</td><td>%</td><td>" . $row1['GROSS_PROFIT_MARGIN'] . "</td><td>" . $row2['GROSS_PROFIT_MARGIN'] . "</td><td>" . $row3['GROSS_PROFIT_MARGIN'] . "</td><td>" . $row4['GROSS_PROFIT_MARGIN'] . "</td><td>" . $row5['GROSS_PROFIT_MARGIN'] . "</td></tr>". "\n";
		echo "<tr><td>Effective tax rate</td><td>%</td><td>" . $row1['EFFECTIVE_TAX_RATE'] . "</td><td>" . $row2['EFFECTIVE_TAX_RATE'] . "</td><td>" . $row3['EFFECTIVE_TAX_RATE'] . "</td><td>" . $row4['EFFECTIVE_TAX_RATE'] . "</td><td>" . $row5['EFFECTIVE_TAX_RATE'] . "</td></tr>". "\n";
		echo "<tr><td>Net profit margin</td><td>%</td><td>" . $row1['NET_PROFIT_MARGIN'] . "</td><td>" . $row2['NET_PROFIT_MARGIN'] . "</td><td>" . $row3['NET_PROFIT_MARGIN'] . "</td><td>" . $row4['NET_PROFIT_MARGIN'] . "</td><td>" . $row5['NET_PROFIT_MARGIN'] . "</td></tr>". "\n";

		echo "</table>". "\n";
		echo "</div></div>". "\n";
		echo '<div id="navigation">';
		$sql="SELECT * from EQM_INCOME_DATA as eid where eid.COMPANY_ID=".$q;
		$result = $db->query($sql);
		$row1 = $result->fetchArray(SQLITE3_ASSOC);
		echo "<p><strong>Company Specific Links</strong></p>". "\n";
		echo '<ul><li><a href="com_eqsd.php?COMPANY_ID='.$q.'">Equity share data</a></li>';
		echo '<li><strong>Income data</strong></li>';
		echo '<li><a href="com_bsd.php?COMPANY_ID='.$q.'">Balance Sheet Data</a></li>';
		echo '<li><a href="com_cf.php?COMPANY_ID='.$q.'">Cash Flow</a></li>';
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





