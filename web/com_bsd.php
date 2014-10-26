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
		$sql="SELECT * from EQM_BALANCE_SHEET_DATA as ebsd where ebsd.COMPANY_ID=".$q;
		$result = $db->query($sql);
		echo "<p><strong>Balance Sheet Data</strong></p>" . "\n";
		echo "<table><tr><th></th><th>No. of Months</th><th>12</th><th>12</th><th>12</th><th>12</th><th>12</th></tr>". "\n";
		echo "<tr><th>Balance Sheet Data</th><th>Year Ending</th><th>Mar-10</th><th>Mar-11</th><th>Mar-12</th><th>Mar-13</th><th>Mar-14</th></tr>". "\n";
		$row1 = $result->fetchArray(SQLITE3_ASSOC);
		$row2 = $result->fetchArray(SQLITE3_ASSOC);
		$row3 = $result->fetchArray(SQLITE3_ASSOC);
		$row4 = $result->fetchArray(SQLITE3_ASSOC);
		$row5 = $result->fetchArray(SQLITE3_ASSOC);
		echo "<tr><td>Current assets</td><td>Rs m</td><td>" . $row1['CURRENT_ASSETS'] . "</td><td>" . $row2['CURRENT_ASSETS'] . "</td><td>" . $row3['CURRENT_ASSETS'] . "</td><td>" . $row4['CURRENT_ASSETS'] . "</td><td>" . $row5['CURRENT_ASSETS'] . "</td></tr>". "\n";
		echo "<tr><td>Current liabilities</td><td>Rs m</td><td>" . $row1['CURRENT_LIABILITIES'] . "</td><td>" . $row2['CURRENT_LIABILITIES'] . "</td><td>" . $row3['CURRENT_LIABILITIES'] . "</td><td>" . $row4['CURRENT_LIABILITIES'] . "</td><td>" . $row5['CURRENT_LIABILITIES'] . "</td></tr>". "\n";
		echo "<tr><td>Net working cap to sales</td><td>%</td><td>" . $row1['NET_WORKING_CAP_TO_SALES'] . "</td><td>" . $row2['NET_WORKING_CAP_TO_SALES'] . "</td><td>" . $row3['NET_WORKING_CAP_TO_SALES'] . "</td><td>" . $row4['NET_WORKING_CAP_TO_SALES'] . "</td><td>" . $row5['NET_WORKING_CAP_TO_SALES'] . "</td></tr>". "\n";
		echo "<tr><td>Current ratio</td><td>x</td><td>" . $row1['CURRENT_RATIO'] . "</td><td>" . $row2['CURRENT_RATIO'] . "</td><td>" . $row3['CURRENT_RATIO'] . "</td><td>" . $row4['CURRENT_RATIO'] . "</td><td>" . $row5['CURRENT_RATIO'] . "</td></tr>". "\n";
		echo "<tr><td>Inventory days</td><td>Days</td><td>" . $row1['INVENTORY_DAYS'] . "</td><td>" . $row2['INVENTORY_DAYS'] . "</td><td>" . $row3['INVENTORY_DAYS'] . "</td><td>" . $row4['INVENTORY_DAYS'] . "</td><td>" . $row5['INVENTORY_DAYS'] . "</td></tr>". "\n";
		echo "<tr><td>Debtors days</td><td>Days</td><td>" . $row1['DEBTORS_DAYS'] . "</td><td>" . $row2['DEBTORS_DAYS'] . "</td><td>" . $row3['DEBTORS_DAYS'] . "</td><td>" . $row4['DEBTORS_DAYS'] . "</td><td>" . $row5['DEBTORS_DAYS'] . "</td></tr>". "\n";
		echo "<tr><td>Net fixed assets</td><td>Rs m</td><td>" . $row1['NET_FIXED_ASSETS'] . "</td><td>" . $row2['NET_FIXED_ASSETS'] . "</td><td>" . $row3['NET_FIXED_ASSETS'] . "</td><td>" . $row4['NET_FIXED_ASSETS'] . "</td><td>" . $row5['NET_FIXED_ASSETS'] . "</td></tr>". "\n";
		echo "<tr><td>Share capital</td><td>Rs m</td><td>" . $row1['SHARE_CAPITAL'] . "</td><td>" . $row2['SHARE_CAPITAL'] . "</td><td>" . $row3['SHARE_CAPITAL'] . "</td><td>" . $row4['SHARE_CAPITAL'] . "</td><td>" . $row5['SHARE_CAPITAL'] . "</td></tr>". "\n";
		echo "<tr><td>Free reserves</td><td>Rs m</td><td>" . $row1['FREE_RESERVES'] . "</td><td>" . $row2['FREE_RESERVES'] . "</td><td>" . $row3['FREE_RESERVES'] . "</td><td>" . $row4['FREE_RESERVES'] . "</td><td>" . $row5['FREE_RESERVES'] . "</td></tr>". "\n";
		echo "<tr><td>Net worth</td><td>Rs m</td><td>" . $row1['NET_WORTH'] . "</td><td>" . $row2['NET_WORTH'] . "</td><td>" . $row3['NET_WORTH'] . "</td><td>" . $row4['NET_WORTH'] . "</td><td>" . $row5['NET_WORTH'] . "</td></tr>". "\n";
		echo "<tr><td>Long term debt</td><td>Rs m</td><td>" . $row1['LONG_TERM_DEBT'] . "</td><td>" . $row2['LONG_TERM_DEBT'] . "</td><td>" . $row3['LONG_TERM_DEBT'] . "</td><td>" . $row4['LONG_TERM_DEBT'] . "</td><td>" . $row5['LONG_TERM_DEBT'] . "</td></tr>". "\n";
		echo "<tr><td>Total assets</td><td>Rs m</td><td>" . $row1['TOTAL_ASSETS'] . "</td><td>" . $row2['TOTAL_ASSETS'] . "</td><td>" . $row3['TOTAL_ASSETS'] . "</td><td>" . $row4['TOTAL_ASSETS'] . "</td><td>" . $row5['TOTAL_ASSETS'] . "</td></tr>". "\n";
		echo "<tr><td>Interest coverage</td><td>x</td><td>" . $row1['INTEREST_COVERAGE'] . "</td><td>" . $row2['INTEREST_COVERAGE'] . "</td><td>" . $row3['INTEREST_COVERAGE'] . "</td><td>" . $row4['INTEREST_COVERAGE'] . "</td><td>" . $row5['INTEREST_COVERAGE'] . "</td></tr>". "\n";
		echo "<tr><td>Debt to equity ratio</td><td>x</td><td>" . $row1['DEBT_TO_EQUITY_RATIO'] . "</td><td>" . $row2['DEBT_TO_EQUITY_RATIO'] . "</td><td>" . $row3['DEBT_TO_EQUITY_RATIO'] . "</td><td>" . $row4['DEBT_TO_EQUITY_RATIO'] . "</td><td>" . $row5['DEBT_TO_EQUITY_RATIO'] . "</td></tr>". "\n";
		echo "<tr><td>Sales to assets ratio</td><td>x</td><td>" . $row1['SALES_TO_ASSETS_RATIO'] . "</td><td>" . $row2['SALES_TO_ASSETS_RATIO'] . "</td><td>" . $row3['SALES_TO_ASSETS_RATIO'] . "</td><td>" . $row4['SALES_TO_ASSETS_RATIO'] . "</td><td>" . $row5['SALES_TO_ASSETS_RATIO'] . "</td></tr>". "\n";
		echo "<tr><td>Return on assets</td><td>%</td><td>" . $row1['RETURN_ON_ASSETS'] . "</td><td>" . $row2['RETURN_ON_ASSETS'] . "</td><td>" . $row3['RETURN_ON_ASSETS'] . "</td><td>" . $row4['RETURN_ON_ASSETS'] . "</td><td>" . $row5['RETURN_ON_ASSETS'] . "</td></tr>". "\n";
		echo "<tr><td>Return on equity</td><td>%</td><td>" . $row1['RETURN_ON_EQUITY'] . "</td><td>" . $row2['RETURN_ON_EQUITY'] . "</td><td>" . $row3['RETURN_ON_EQUITY'] . "</td><td>" . $row4['RETURN_ON_EQUITY'] . "</td><td>" . $row5['RETURN_ON_EQUITY'] . "</td></tr>". "\n";
		echo "<tr><td>Return on capital</td><td>%</td><td>" . $row1['RETURN_ON_CAPITAL'] . "</td><td>" . $row2['RETURN_ON_CAPITAL'] . "</td><td>" . $row3['RETURN_ON_CAPITAL'] . "</td><td>" . $row4['RETURN_ON_CAPITAL'] . "</td><td>" . $row5['RETURN_ON_CAPITAL'] . "</td></tr>". "\n";
		echo "<tr><td>Exports to sales</td><td>%</td><td>" . $row1['EXPORTS_TO_SALES'] . "</td><td>" . $row2['EXPORTS_TO_SALES'] . "</td><td>" . $row3['EXPORTS_TO_SALES'] . "</td><td>" . $row4['EXPORTS_TO_SALES'] . "</td><td>" . $row5['EXPORTS_TO_SALES'] . "</td></tr>". "\n";
		echo "<tr><td>Imports to sales</td><td>%</td><td>" . $row1['IMPORTS_TO_SALES'] . "</td><td>" . $row2['IMPORTS_TO_SALES'] . "</td><td>" . $row3['IMPORTS_TO_SALES'] . "</td><td>" . $row4['IMPORTS_TO_SALES'] . "</td><td>" . $row5['IMPORTS_TO_SALES'] . "</td></tr>". "\n";
		echo "<tr><td>Exports (fob)</td><td>Rs m</td><td>" . $row1['EXPORTS_FOB'] . "</td><td>" . $row2['EXPORTS_FOB'] . "</td><td>" . $row3['EXPORTS_FOB'] . "</td><td>" . $row4['EXPORTS_FOB'] . "</td><td>" . $row5['EXPORTS_FOB'] . "</td></tr>". "\n";
		echo "<tr><td>Imports (cif)</td><td>Rs m</td><td>" . $row1['IMPORTS_CIF'] . "</td><td>" . $row2['IMPORTS_CIF'] . "</td><td>" . $row3['IMPORTS_CIF'] . "</td><td>" . $row4['IMPORTS_CIF'] . "</td><td>" . $row5['IMPORTS_CIF'] . "</td></tr>". "\n";
		echo "<tr><td>Fx inflow</td><td>Rs m</td><td>" . $row1['FX_INFLOW'] . "</td><td>" . $row2['FX_INFLOW'] . "</td><td>" . $row3['FX_INFLOW'] . "</td><td>" . $row4['FX_INFLOW'] . "</td><td>" . $row5['FX_INFLOW'] . "</td></tr>". "\n";
		echo "<tr><td>Fx outflow</td><td>Rs m</td><td>" . $row1['FX_OUTFLOW'] . "</td><td>" . $row2['FX_OUTFLOW'] . "</td><td>" . $row3['FX_OUTFLOW'] . "</td><td>" . $row4['FX_OUTFLOW'] . "</td><td>" . $row5['FX_OUTFLOW'] . "</td></tr>". "\n";
		echo "<tr><td>Net fx</td><td>Rs m</td><td>" . $row1['NET_FX'] . "</td><td>" . $row2['NET_FX'] . "</td><td>" . $row3['NET_FX'] . "</td><td>" . $row4['NET_FX'] . "</td><td>" . $row5['NET_FX'] . "</td></tr>". "\n";


		echo "</table>". "\n";
		echo "</div></div>". "\n";
		echo '<div id="navigation">';
		echo "<p><strong>Company Specific Links</strong></p>". "\n";
		echo '<ul><li><a href="com_eqsd.php?COMPANY_ID='.$q.'">Equity share data</a></li>';
		echo '<li><a href="com_id.php?COMPANY_ID='.$q.'">Income data</a></li>';
		echo '<li><strong>Balance Sheet Data</strong></li>';
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





