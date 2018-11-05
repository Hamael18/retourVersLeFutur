<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<style>
    body {background-image: url('http://www.dailymars.net/wp-content/uploads/2015/10/Visuel-a-plat.jpg'); color:white}

</style>

<div class="container">
<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 05/11/18
 * Time: 15:28
 */

require 'TimeTravel.php';
$timeTravel = new TimeTravel();
$debut = $timeTravel->start->setDate(1985, 12, 31);
echo "L'accident temporel de Doc a eu lieu le <span class='text-danger'>".$debut->format('l d F Y').".</span><br>";
echo '<hr>';

$interval = new DateInterval('PT1000000000S');
echo "1 milliard de secondes plus tôt, Doc se retrouve coincé à la date du <span class='text-danger'>".$timeTravel->findDate($interval).".</span>";
echo '<hr>';

echo $timeTravel->getTravelInfo()."<br>";
echo '<hr>';
echo "Sachant qu'on ne peut faire qu'un saut de 1 mois, 1 semaine et 1 jour !<br>";

$interval2 = new DateInterval('P1M8D');

$step = new DatePeriod($timeTravel->end, $interval2, $timeTravel->start);
$etapes = $timeTravel->backToFutureStepByStep($step);

echo "Voici toutes les étapes du voyage pour aller chercher Doc :".'<br>';
echo "<br/> ";

foreach ($etapes as $etape) {
    @$count=$count +1;
    echo '<table><th>étape '.$count.' </th><td> '.$etape . '</td></table>';
}
?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
