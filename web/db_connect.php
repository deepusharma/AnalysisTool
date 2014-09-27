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




