<?php
$host = "localhost";
$db_name = "supply";
$username = "admin";
$password = "md11Swac@#";
$connection = null;
#connecting to the server
try{
$connection = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
$connection->exec("set names utf8");
}catch(PDOException $exception){
echo "Connection error: " . $exception->getMessage();
}


function saveData($name1, $surname1, $phone1,$email, $service1, $service2, $service3, $service4, $service5, $password1,$re_password){
global $connection;
$query = "INSERT INTO volunteers(name1,surname1,phone1,email,service1, service2, service3, service4, service5, password1,re_password) VALUES( :name1, :surname1,:phone1,:email,:service1,:service2,:service3,:service4,:service5,:password1,:re_password)";

$callToDb = $connection->prepare( $query );
$name1=htmlspecialchars(strip_tags($name1));
$surname1=htmlspecialchars(strip_tags($surname1));
$phone1=htmlspecialchars(strip_tags($phone1));
$email=htmlspecialchars(strip_tags($email));
$service1=htmlspecialchars(strip_tags($service1));
$service2=htmlspecialchars(strip_tags($service2));
$service3=htmlspecialchars(strip_tags($service3));
$service4=htmlspecialchars(strip_tags($service4));
$service5=htmlspecialchars(strip_tags($service5));
$password1=htmlspecialchars(strip_tags($password1));
$re_password=htmlspecialchars(strip_tags($re_password));


$callToDb->bindParam(":name1",$name1);
$callToDb->bindParam(":surname1",$surname1);
$callToDb->bindParam(":phone1",$phone1);
$callToDb->bindParam(":email",$email);
$callToDb->bindParam(":service1",$service1);
$callToDb->bindParam(":service2",$service2);
$callToDb->bindParam(":service3",$service3);
$callToDb->bindParam(":service4",$service4);
$callToDb->bindParam(":service5",$service5);
$callToDb->bindParam(":password1",$password1);
$callToDb->bindParam(":re_password",$re_password);



#if($callToDb->execute()){
#return '<h3 style="text-align:center;">Спасибо за интерес! Mы скоро с вами свяжемся!</h3>';}
}


if( isset($_POST['submit'])){

	if ($_POST['re_password'] == $_POST['password1']) {
	include 'registrationsuccessfull.html';  
	$name1 = htmlentities($_POST['name1']);
	$surname1 = htmlentities($_POST['surname1']);
	$phone1 = htmlentities($_POST['phone1']);
	$email = htmlentities($_POST['email']);
	$service1 = htmlentities($_POST['service1']);
	$service2 = htmlentities($_POST['service2']);
	$service3 = htmlentities($_POST['service3']);
	$service4 = htmlentities($_POST['service4']);
	$service5 = htmlentities($_POST['service5']);
	$password1 = htmlentities($_POST['password1']);
	$re_password = htmlentities($_POST['re_password']);

	//then you can use them in a PHP function. 
	$result = saveData($name1, $surname1,$phone1, $email, $service1, $service2, $service3, $service4, $service5, $password1, $re_password);
	echo $result;}
		
}
else{
echo '<h3 style="text-align:center;">A very detailed error message ( ͡° ͜ʖ ͡°)</h3>';
}

?>

