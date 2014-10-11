<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Chotu-Motu Stocks Select</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="../styles.css" />
</head>
<body>
<div id="container">
<div id="header"><h1><a href="http://www.chotu-motu-stock-select.com">Chotu-Motu Stocks Select</a></h1></div>
  <div id="wrapper">
    <div id="content">
      <p><strong>Content here.</strong></p>
	  <p><strong> Company Name : </strong></p>
<?
	$query = "SELECT * FROM cars;";

	$result = mysql_query($query); //fetch the data from the database
	$num = mysql_num_rows($result);
	echo "Num of rows:".$num;
	while ($row = mysql_fetch_row($result)) 
	{
		//$row = mysql_fetch_row($result);
		echo "ID:".$row{0}." Name:".$row{1}."Year:".$row{2}."<br>";
	}
	 echo "Operation done successfully\n";
        mysql_close();
?>

    </div>
  </div>
  <div id="navigation">
    <p><strong>Important Links</strong></p>
    <ul>
      <li><a href="http://www.equitymaster.com/">Equity Master</a></li>
      <li><a href="http://www.moneycontrol.com/">Money Control</a></li>
      <li><a href="http://economictimes.indiatimes.com/">Economic Times</a></li>
      <li><a href="http://www.sharekhan.com/welcome/default.html">ShareKhan</a></li>
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





