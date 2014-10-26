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
		$sql="SELECT * from EQM_EQUITY_SHARE_DATA as eqsd where eqsd.COMPANY_ID=".$q;
		$result = $db->query($sql);
		echo "<table><tr><th></th><th>No. of Months</th><th>12</th><th>12</th><th>12</th><th>12</th><th>12</th></tr>". "\n";
		echo "<tr><th>Equity Share Data</th><th>Year Ending</th><th>Mar-10</th><th>Mar-11</th><th>Mar-12</th><th>Mar-13</th><th>Mar-14</th></tr>". "\n";
		$row1 = $result->fetchArray(SQLITE3_ASSOC);
		$row2 = $result->fetchArray(SQLITE3_ASSOC);
		$row3 = $result->fetchArray(SQLITE3_ASSOC);
		$row4 = $result->fetchArray(SQLITE3_ASSOC);
		$row5 = $result->fetchArray(SQLITE3_ASSOC);
		echo "<tr><td>High</td><td>Rs</td><td>" . $row1['HIGH'] . "</td><td>" . $row2['HIGH'] . "</td><td>" . $row3['HIGH'] . "</td><td>" . $row4['HIGH'] . "</td><td>" . $row5['HIGH'] . "</td></tr>". "\n";
		echo "<tr><td>Low</td><td>Rs</td><td>" . $row1['HIGH'] . "</td><td>" . $row2['HIGH'] . "</td><td>" . $row3['HIGH'] . "</td><td>" . $row4['HIGH'] . "</td><td>" . $row5['HIGH'] . "</td></tr>". "\n";
		echo "<tr><td>Sales per share (Unadj.)</td><td>Rs</td><td>" . $row1['SALES_PER_SHARE_UNADJ'] . "</td><td>" . $row2['SALES_PER_SHARE_UNADJ'] . "</td><td>" . $row3['SALES_PER_SHARE_UNADJ'] . "</td><td>" . $row4['SALES_PER_SHARE_UNADJ'] . "</td><td>" . $row5['SALES_PER_SHARE_UNADJ'] . "</td></tr>". "\n";
		echo "<tr><td>Earnings per share (Unadj.)</td><td>Rs</td><td>" . $row1['EARNINGS_PER_SHARE_UNADJ'] . "</td><td>" . $row2['EARNINGS_PER_SHARE_UNADJ'] . "</td><td>" . $row3['EARNINGS_PER_SHARE_UNADJ'] . "</td><td>" . $row4['EARNINGS_PER_SHARE_UNADJ'] . "</td><td>" . $row5['EARNINGS_PER_SHARE_UNADJ'] . "</td></tr>". "\n";
		echo "<tr><td>Diluted earnings per share</td><td>Rs</td><td>" . $row1['DILUTED_EARNINGS_PER_SHARE'] . "</td><td>" . $row2['DILUTED_EARNINGS_PER_SHARE'] . "</td><td>" . $row3['DILUTED_EARNINGS_PER_SHARE'] . "</td><td>" . $row4['DILUTED_EARNINGS_PER_SHARE'] . "</td><td>" . $row5['DILUTED_EARNINGS_PER_SHARE'] . "</td></tr>". "\n";
		echo "<tr><td>Cash flow per share (Unadj.)</td><td>Rs</td><td>" . $row1['CASH_FLOW_PER_SHARE_UNADJ'] . "</td><td>" . $row2['CASH_FLOW_PER_SHARE_UNADJ'] . "</td><td>" . $row3['CASH_FLOW_PER_SHARE_UNADJ'] . "</td><td>" . $row4['CASH_FLOW_PER_SHARE_UNADJ'] . "</td><td>" . $row5['CASH_FLOW_PER_SHARE_UNADJ'] . "</td></tr>". "\n";
		echo "<tr><td>Dividends per share (Unadj.)</td><td>Rs</td><td>" . $row1['DIVIDENDS_PER_SHARE_UNADJ'] . "</td><td>" . $row2['DIVIDENDS_PER_SHARE_UNADJ'] . "</td><td>" . $row3['DIVIDENDS_PER_SHARE_UNADJ'] . "</td><td>" . $row4['DIVIDENDS_PER_SHARE_UNADJ'] . "</td><td>" . $row5['DIVIDENDS_PER_SHARE_UNADJ'] . "</td></tr>". "\n";
		echo "<tr><td>Adj. dividends per share</td><td>Rs</td><td>" . $row1['HIGH'] . "</td><td>" . $row2['HIGH'] . "</td><td>" . $row3['HIGH'] . "</td><td>" . $row4['HIGH'] . "</td><td>" . $row5['HIGH'] . "</td></tr>". "\n";
		echo "<tr><td>Dividend yield (eoy)</td><td>%</td><td>" . $row1['ADJ_DIVIDENDS_PER_SHARE'] . "</td><td>" . $row2['ADJ_DIVIDENDS_PER_SHARE'] . "</td><td>" . $row3['ADJ_DIVIDENDS_PER_SHARE'] . "</td><td>" . $row4['ADJ_DIVIDENDS_PER_SHARE'] . "</td><td>" . $row5['ADJ_DIVIDENDS_PER_SHARE'] . "</td></tr>". "\n";
		echo "<tr><td>Book value per share (Unadj.)</td><td>Rs</td><td>" . $row1['BOOK_VALUE_PER_SHARE_UNADJ'] . "</td><td>" . $row2['BOOK_VALUE_PER_SHARE_UNADJ'] . "</td><td>" . $row3['BOOK_VALUE_PER_SHARE_UNADJ'] . "</td><td>" . $row4['BOOK_VALUE_PER_SHARE_UNADJ'] . "</td><td>" . $row5['BOOK_VALUE_PER_SHARE_UNADJ'] . "</td></tr>". "\n";
		echo "<tr><td>Adj. book value per share</td><td>Rs</td><td>" . $row1['ADJ_BOOK_VALUE_PER_SHARE'] . "</td><td>" . $row2['ADJ_BOOK_VALUE_PER_SHARE'] . "</td><td>" . $row3['ADJ_BOOK_VALUE_PER_SHARE'] . "</td><td>" . $row4['ADJ_BOOK_VALUE_PER_SHARE'] . "</td><td>" . $row5['ADJ_BOOK_VALUE_PER_SHARE'] . "</td></tr>". "\n";
		echo "<tr><td>Shares outstanding (eoy)</td><td>m</td><td>" . $row1['SHARES_OUTSTANDING_EOY'] . "</td><td>" . $row2['SHARES_OUTSTANDING_EOY'] . "</td><td>" . $row3['SHARES_OUTSTANDING_EOY'] . "</td><td>" . $row4['SHARES_OUTSTANDING_EOY'] . "</td><td>" . $row5['SHARES_OUTSTANDING_EOY'] . "</td></tr>". "\n";
		echo "<tr><td>Bonus/Rights/Conversions</td><td></td><td>" . $row1['BONUS_RIGHTS_CONVERSIONS'] . "</td><td>" . $row2['BONUS_RIGHTS_CONVERSIONS'] . "</td><td>" . $row3['BONUS_RIGHTS_CONVERSIONS'] . "</td><td>" . $row4['BONUS_RIGHTS_CONVERSIONS'] . "</td><td>" . $row5['BONUS_RIGHTS_CONVERSIONS'] . "</td></tr>". "\n";
		echo "<tr><td>Price / Sales ratio</td><td>x</td><td>" . $row1['PRICE_BY_SALES_RATIO'] . "</td><td>" . $row2['PRICE_BY_SALES_RATIO'] . "</td><td>" . $row3['PRICE_BY_SALES_RATIO'] . "</td><td>" . $row4['PRICE_BY_SALES_RATIO'] . "</td><td>" . $row5['PRICE_BY_SALES_RATIO'] . "</td></tr>". "\n";
		echo "<tr><td>Avg P/E ratio</td><td>x</td><td>" . $row1['AVG_PE_RATIO'] . "</td><td>" . $row2['AVG_PE_RATIO'] . "</td><td>" . $row3['AVG_PE_RATIO'] . "</td><td>" . $row4['AVG_PE_RATIO'] . "</td><td>" . $row5['AVG_PE_RATIO'] . "</td></tr>". "\n";
		echo "<tr><td>P/CF ratio (eoy)</td><td>x</td><td>" . $row1['PRICE_BY_CASHFLOW_RATIO_EOY'] . "</td><td>" . $row2['PRICE_BY_CASHFLOW_RATIO_EOY'] . "</td><td>" . $row3['PRICE_BY_CASHFLOW_RATIO_EOY'] . "</td><td>" . $row4['PRICE_BY_CASHFLOW_RATIO_EOY'] . "</td><td>" . $row5['PRICE_BY_CASHFLOW_RATIO_EOY'] . "</td></tr>". "\n";
		echo "<tr><td>Price / Book Value ratio</td><td>x</td><td>" . $row1['PRICE_BY_BOOK_VALUE_RATIO'] . "</td><td>" . $row2['PRICE_BY_BOOK_VALUE_RATIO'] . "</td><td>" . $row3['PRICE_BY_BOOK_VALUE_RATIO'] . "</td><td>" . $row4['PRICE_BY_BOOK_VALUE_RATIO'] . "</td><td>" . $row5['PRICE_BY_BOOK_VALUE_RATIO'] . "</td></tr>". "\n";
		echo "<tr><td>Dividend payout</td><td>%</td><td>" . $row1['DIVIDEND_PAYOUT'] . "</td><td>" . $row2['DIVIDEND_PAYOUT'] . "</td><td>" . $row3['DIVIDEND_PAYOUT'] . "</td><td>" . $row4['DIVIDEND_PAYOUT'] . "</td><td>" . $row5['DIVIDEND_PAYOUT'] . "</td></tr>". "\n";
		echo "<tr><td>Avg Mkt Cap</td><td>Rs m</td><td>" . $row1['AVG_MARKET_CAP'] . "</td><td>" . $row2['AVG_MARKET_CAP'] . "</td><td>" . $row3['AVG_MARKET_CAP'] . "</td><td>" . $row4['AVG_MARKET_CAP'] . "</td><td>" . $row5['AVG_MARKET_CAP'] . "</td></tr>". "\n";
		echo "<tr><td>No. of employees</td><td>`000</td><td>" . $row1['NO_OF_EMPLOYEES'] . "</td><td>" . $row2['NO_OF_EMPLOYEES'] . "</td><td>" . $row3['NO_OF_EMPLOYEES'] . "</td><td>" . $row4['NO_OF_EMPLOYEES'] . "</td><td>" . $row5['NO_OF_EMPLOYEES'] . "</td></tr>". "\n";
		echo "<tr><td>Total wages/salary</td><td>Rs m</td><td>" . $row1['TOTAL_WAGES_PER_SALARY'] . "</td><td>" . $row2['TOTAL_WAGES_PER_SALARY'] . "</td><td>" . $row3['TOTAL_WAGES_PER_SALARY'] . "</td><td>" . $row4['TOTAL_WAGES_PER_SALARY'] . "</td><td>" . $row5['TOTAL_WAGES_PER_SALARY'] . "</td></tr>". "\n";
		echo "<tr><td>Avg. sales/employee</td><td>Rs Th</td><td>" . $row1['AVG_SALES_PER_EMPLOYEE'] . "</td><td>" . $row2['AVG_SALES_PER_EMPLOYEE'] . "</td><td>" . $row3['AVG_SALES_PER_EMPLOYEE'] . "</td><td>" . $row4['AVG_SALES_PER_EMPLOYEE'] . "</td><td>" . $row5['AVG_SALES_PER_EMPLOYEE'] . "</td></tr>". "\n";
		echo "<tr><td>Avg. wages/employee</td><td>Rs Th</td><td>" . $row1['AVG_WAGES_PER_EMPLOYEE'] . "</td><td>" . $row2['AVG_WAGES_PER_EMPLOYEE'] . "</td><td>" . $row3['AVG_WAGES_PER_EMPLOYEE'] . "</td><td>" . $row4['AVG_WAGES_PER_EMPLOYEE'] . "</td><td>" . $row5['AVG_WAGES_PER_EMPLOYEE'] . "</td></tr>". "\n";
		echo "<tr><td>Avg. net profit/employee</td><td>Rs Th</td><td>" . $row1['AVG_NET_PROFIT_PER_EMPLOYEE'] . "</td><td>" . $row2['AVG_NET_PROFIT_PER_EMPLOYEE'] . "</td><td>" . $row3['AVG_NET_PROFIT_PER_EMPLOYEE'] . "</td><td>" . $row4['AVG_NET_PROFIT_PER_EMPLOYEE'] . "</td><td>" . $row5['AVG_NET_PROFIT_PER_EMPLOYEE'] . "</td></tr>". "\n";

		echo "</table>". "\n";
		echo "</div></div>". "\n";
		echo '<div id="navigation">';
		$sql="SELECT * from EQM_EQUITY_SHARE_DATA as eqsd where eqsd.COMPANY_ID=".$q;
		$result = $db->query($sql);
		$row1 = $result->fetchArray(SQLITE3_ASSOC);
		echo "<p><strong>Company Specific Links</strong></p>". "\n";
		echo '<ul><li><strong>Equity share data</strong></li>';
		echo '<li><a href="com_id.php?COMPANY_ID='.$q.'">Income data</a></li>';
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





