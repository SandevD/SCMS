<?php

namespace App\Helpers;

use App\Models\User;
use DateTime;

class CoreHelper
{
    public static function getCode($length = 6)
    {
        $characters = '123456789';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function getYears($years = 10)
    {
        $currentYear = date('Y');
        $endYear = $currentYear + $years;
        $years = range($currentYear, $endYear);

        $yearOptions = [];
        foreach ($years as $year) {
            // Create a DateTime object for the first day of the year
            $firstDayOfYear = new DateTime("$year-01-01");
            // Format the date as YYYY-MM-DD
            $firstDayOfYearFormatted = $firstDayOfYear->format('Y');
            // Use the first day of the year as the value and the year as the option text
            $yearOptions[$firstDayOfYearFormatted] = $year;
        }

        return $yearOptions;
    }

    public static function getPastYears($years = 30)
    {
        $currentYear = date('Y');
        $startYear = $currentYear - $years;
        $years = range($startYear, $currentYear); // Include the current year

        $yearOptions = [];
        foreach ($years as $year) {
            // Create a DateTime object for the first day of the year
            $firstDayOfYear = new DateTime("$year-01-01");
            // Format the date as YYYY-MM-DD
            $firstDayOfYearFormatted = $firstDayOfYear->format('Y');
            // Use the first day of the year as the value and the year as the option text
            $yearOptions[$firstDayOfYearFormatted] = $year;
        }

        return $yearOptions;
    }

    public static function getTrx($length = 12)
    {
        $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
