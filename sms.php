<?php
/*$token="1fdb0fjiUn";
$mobile=mysql_real_escape_string($_POST['phone']);
$msg=mysql_real_escape_string($_POST['msg']);
$site='www.howi.com';
$url="http://api.fast2sms.com/sms.php?token=".$token."&mobile=".$mobile."&message=".$msg."&sender".$site."&route=0";
$homepage=file_get_contents($url);*/
$servername="localhost";
$username="root";
$password="";
$dbname="test";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
die("connection failed:".$conn->connect_error);
}
else {
	echo "successfully connection established <br>";
$d= date("Y/m/d");
$sql="select * from birthdays where bdate='$d' ";
$result=$conn->query($sql);
if($result->num_rows> 0){
		while($row=$result->fetch_assoc()){
			$mobile=$row['number'];
			$message="HAPPY BIRTHDAY ".$row['name']."";
			$json = json_decode(file_get_contents("https://smsapi.engineeringtgr.com/send/?Mobile=9618261525&Password=Q3493H&Message=".urlencode($message)."&To=".urlencode($mobile)."&Key=xxxxxxxxxxxxxx"),true);
			if ($json["status"]==="success") {
			echo $json["msg"];
			}else{
			echo $json["msg"];
			}
		}
	}
}
?>