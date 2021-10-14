<!-- Index.php mi sluzi da dodjem do prijave, 
na gitu ne postavljam zipove i arhive!!!!  -->

<!-- getujem i loginujem user-a -->

<?php

require "dbBroker.php"; //on ucitava sve iz sebe i kreira konekciju
//zatim se ucitava user.php, i uspostavlja se konekcija izmedju user-a i baze
require "model/User.php";

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){

    $uname=$_POST['username'];
    $upass=$_POST['password'];

    //POST obuhvata sva input polja, i button i hvata njihove nazive, za taj naziv hvata njihovu vrednost

    $korisnik= new User( 1, $uname, $upass);
   // $odg=$korisnik->logInUser($uname, $upass, new mysqli());
   $odg= User::logInUser($korisnik, $conn); //pozivam staticku metodu preko klase


   //u odg mi se vraca return iz loginUsera, tj proveravam da li mi je vraceno 1,
   //to znaci da hocu da znam da li mi se vratio 1 uspesno logovani user, onda hocu njega da logujem dalje
   if($odg){
       //ako je pozitivan odg, vodi me na stranicu i ispisi skript tag
      // echo "Uspesno ste se prijavili"; svaki put ce se refresovati, kad me odvede na drugu stranicu

      echo ` <script>
        console.log("Uspesno ste se ulogovali"); 
        </script> `; // ` ovaj bektik, pored jedinice levo, mi omogucava da pisem string u vise redova

        $_SESSION['user_id']=$korisnik->id;
        header('Location: home.php');
        exit();

   }else{
       echo ` <script>
       console.log("Niste se uspesno ulogovali"); 
       </script> `;
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control"  required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>

        
    </div>
</body>
</html>