<!-- ovde cu uspostaviti krstku konekciju sa bazom -->

<?php

$host="localhost";
$db="kolokvijumi";
$user="root";
$pass="";

$conn= new mysqli($host,$user, $pass, $db); //kreiram novu konekciju ka bazi


//proveravam da li je dobro uspostavljena konekcija
if($conn->connect_errno){
//vraca broj kao npr 404 not found
exit("Neuspesna konekcija : greska> ".$conn->connect_error.", err kod>".$conn->connect_errno);

}
?>
