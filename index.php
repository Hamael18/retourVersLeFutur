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
echo "L'accident temporel de Doc a eu lieu le ".$debut->format('l d F Y').".<br>";
echo '<hr>';

$interval = new DateInterval('PT1000000000S');
echo "1 milliard de secondes plus tôt, Doc se retrouve coincé à la date du ".$timeTravel->findDate($interval).".";
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