<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Grzybobranie</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="miniatura">
    <a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie"></a>
    </div>

       <div id="tytul">
        <h1>Idziemy na grzyby!</h1>
       </div>

         <div id="lewy">
<?php
//utworzenie zmiennych polaczeniowych

$server = 'localhost';
$user = 'root';
$passwd = '';
$dbname = 'dane2';

$conn = mysqli_connect($server,$user,$passwd,$dbname);

//sprawdzenie polaczenia 

/*
if(!$conn){
  die ("fatal error:".mysqli_error($conn));
} echo "jest okej";
*/

$sql = "SELECT `nazwa_pliku`, `potoczna` FROM `grzyby`;";
$zapytanie = mysqli_query($conn,$sql);

while ($wynik=mysqli_fetch_row($zapytanie)){
  echo "<img src='$wynik[0]' alt='$wynik[1]'>";
}

?>
         </div>

           <div id="prawy">
           <h2>Grzyby jadalne</h2>
<?php

$sql2 ="SELECT `nazwa`, `potoczna` FROM `grzyby` WHERE `jadalny`='1';";
$zapytanie2 = mysqli_query($conn,$sql2);

while ($wynik2 = mysqli_fetch_row($zapytanie2)){
  echo "<p>". $wynik2[0] . " ". "(".$wynik2[1].")". "</p>";
}

?>
           <h2>Polecamy do sosów</h2>
           <ol>
<?php

$sql3 = "SELECT grzyby.nazwa, grzyby.potoczna, rodzina.nazwa FROM grzyby, rodzina, potrawy WHERE grzyby.rodzina_id = rodzina.id AND grzyby.potrawy_id = potrawy.id AND potrawy.nazwa = 'sos';";
$zapytanie3 = mysqli_query($conn,$sql3);
while ($wynik3 = mysqli_fetch_row($zapytanie3)){
  echo "<li>" .$wynik3[0]. " ". "(".$wynik3[1].")". " rodzina: ". "<br>". $wynik3[2]. "</li>";
}

mysqli_close($conn);

?>
</ol>
           </div>

              <div id="stopka">
              <p>Autor: 000000000</p>
              </div>
</body>
</html>