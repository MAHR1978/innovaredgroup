<?php namespace App\Interfaces;

use Carbon\Carbon;

interface HoraServiceInterface
{
    public function getAvailableIntervals($date, $doctorId);

    public function isAvailableIntervals($date, $doctorId, Carbon $start);
}