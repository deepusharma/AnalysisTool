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
	  <?php
         class MyDB extends SQLite3
         {
            function __construct()
            {
               $this->open('../db/eqm.db');
            }
         }
         $db = new MyDB();
         if(!$db){
            echo $db->lastErrorMsg();
         } else {
            echo "Opened database successfully\n";
         }
      
         $sql ="SELECT * from EQM_PRICE_HISTORY";
      
         $ret = $db->query($sql);
         while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
            echo "PRICE = ". $row['PRICE'] . "\n";
            echo "MARKET_CAP = ". $row['MARKET_CAP'] ."\n";
            echo "VOLUME = ". $row['VOLUME'] ."\n";
            echo "P_E =  ".$row['P_E'] ."\n\n";
         }
         echo "Operation done successfully\n";
         $db->close();
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





