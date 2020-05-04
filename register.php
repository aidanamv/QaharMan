<?php
$host = "localhost";
$db_name = "demand";
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

function saveData($name, $surname,$age, $phone,$address, $help1, $help2, $help3, $help4, $help5){
global $connection;
$query = "INSERT INTO patients(name,surname,age,phone,address,help1, help2, help3, help4, help5) VALUES( :name, :surname, :age,:phone,:address,:help1,:help2,:help3,:help4,:help5)";

$callToDb = $connection->prepare( $query );
$name=htmlspecialchars(strip_tags($name));
$surname=htmlspecialchars(strip_tags($surname));
$age=htmlspecialchars(strip_tags($age));
$phone=htmlspecialchars(strip_tags($phone));
$address=htmlspecialchars(strip_tags($address));
$help1=htmlspecialchars(strip_tags($help1));
$help2=htmlspecialchars(strip_tags($help2));
$help3=htmlspecialchars(strip_tags($help3));
$help4=htmlspecialchars(strip_tags($help4));
$help5=htmlspecialchars(strip_tags($help5));

$callToDb->bindParam(":name",$name);
$callToDb->bindParam(":surname",$surname);
$callToDb->bindParam(":age",$age);
$callToDb->bindParam(":phone",$phone);
$callToDb->bindParam(":address",$address);
$callToDb->bindParam(":help1",$help1);
$callToDb->bindParam(":help2",$help2);
$callToDb->bindParam(":help3",$help3);
$callToDb->bindParam(":help4",$help4);
$callToDb->bindParam(":help5",$help5);


#if($callToDb->execute()){
#return '<h3 style="text-align:center;">Спасибо за заявку! Mы скоро с вами свяжемся!</h3>';
#}
}

if( isset($_POST['submit'])){
$name = htmlentities($_POST['name']);
$surname = htmlentities($_POST['surname']);
$age = htmlentities($_POST['age']);
$phone = htmlentities($_POST['phone']);
$address = htmlentities($_POST['address']);
$help1 = htmlentities($_POST['help1']);
$help2 = htmlentities($_POST['help2']);
$help3 = htmlentities($_POST['help3']);
$help4 = htmlentities($_POST['help4']);
$help5 = htmlentities($_POST['help5']);

//then you can use them in a PHP function. 
$result = saveData($name, $surname, $age,$phone, $address, $help1, $help2, $help3, $help4, $help5);
echo $result;
}
else{
echo '<h3 style="text-align:center;">A very detailed error message ( ͡° ͜ʖ ͡°)</h3>';
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="stylesheet" href="assets/css/main.css" />
         <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
         <!-- Main css -->
       <<link rel="stylesheet" href="css/style.css">
    </head>
<body class="is-preload">
    <div id="page-wrapper">

            <!-- Header -->
                <header id="header">
                    <nav id="nav">
                        <ul>
                            <li><a href="index.html">Домой</a></li>
                            <li>
                                <a href="#" class="icon solid fa-angle-down">Меню</a>
                                <ul>
                                    <li><a href="contact.html">Связаться с нами</a></li>
                                    
                                </ul>
                            </li>
                            <li><a href="#" class="button">Войти</a></li>
                        </ul>
                    </nav>
                </header>
                 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

       <section id="banner">
					<h3 style="font-family:'Courier New'">Спасибо за заказ! Мы очень скоро с вами свяжемся!</h3>
				</section>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html> 