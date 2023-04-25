<?php

/*

    DATES
        date(string $format, ?int $timestamp = null): string
    
        FORMATS
            d - day
            m - month 
            Y - Year
            l - Day of the week 
            h - hours
            i - mins
            s - secs
            a - AM or PM 

*/

// Setting Time Zone 
date_default_timezone_set("Asia/Manila");

echo date('h:i:sa');

/*
    strtotime(string $datetime, ?int $baseTimestamp = null): int|false
        converts string to time 
        examples:
            strtotime('7:00pm March 22 2018)
            strtotime('tomorrow')
            strtotime('next Sunday')
            strtotime('+2 days')
            strtotime('next 2 months')
*/


?>