<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 05/11/18
 * Time: 15:28
 */

class TimeTravel
{

    public $start;
    public $end;

    public function __construct()
    {
        $this->start = new DateTime('1985-12-31');
        $this->end = new DateTime('1985-12-31');
    }

    public function findDate(DateInterval $interval)
    {
        $docTarget = $this->end->sub($interval);
        return $docTarget->format('Y-m-d');
    }

    public function getTravelInfo()
    {
        $info = $this->start->diff($this->end);
        return $info->format("Il y a %y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates.");
    }

    public function backToFutureStepByStep(DatePeriod $step)
    {
        foreach ($step as $etape) {
            $tableau[] = $etape->format('M d Y A h:m ');
        }
        return $tableau;
    }
}