<?php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
// Please dont remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
////// Your Database Details here /////////
//$dbservertype='mysql';
//$servername='127.0.0.1';
//$dbusername='test';
//$dbpassword='test';
//$dbname='sql_tutorial';

////////////////////////////////////////
////// DONOT EDIT BELOW /////////
///////////////////////////////////////

//connecttodb($servername,$dbname,$dbusername,$dbpassword);
//function connecttodb($servername,$dbname,$dbuser,$dbpassword)
//{
//global $link;
//$link=mysql_connect ("$servername","$dbuser","$dbpassword");
//if(!$link){die("Could not connect to MySQL");}
//mysql_select_db("$dbname",$link) or die ("could not open db".mysql_error());
//}
///////////////////// Main Code sarts ////////

include 'db_connect.php';
$db = new MyDB();
if(!$db){
	echo $db->lastErrorMsg();
} else {
	//echo "Opened database successfully". "\n";
}
$in=$_GET['txt'];
//echo $in;
$msg="";
if(strlen($in)>0 and strlen($in) <20 )
{
	$sql="SELECT m.COMPANY_NAME from COMPANY_MASTER as m where m.COMPANY_NAME like '".$in."%' limit 5";
	$result = $db->query($sql);
	while($row = $result->fetchArray(SQLITE3_ASSOC) )
	{
					$msg.=$row['COMPANY_NAME']."<br>";
	}
}
echo $msg;

?>