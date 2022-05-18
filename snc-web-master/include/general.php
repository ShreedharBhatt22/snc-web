<?php

    function clean_text($string) {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    function convertDate($date) {
        $month=substr($date,5,2);
        $res='';
        switch((int)$month) {
        case 1:
            $res='JAN';
            break;
        case 2:
            $res='FEB';
            break;
        case 3:
            $res='MAR';
            break;
        case 4:
            $res='APR';
            break;
        case 5:
            $res='MAY';
            break;
        case 6:
            $res='JUN';
            break;
        case 7:
            $res='JUL';
            break;
        case 8:
            $res='AUG';
            break;
        case 9:
            $res='SEP';
            break;
        case 10:
            $res='OCT';
            break;
        case 11:
            $res='NOV';
            break;
        case 12:
            $res='DEC';
            break;
        default :
            $res='ERROR';
            break;
        }
        return $res;
    }

    function convertTime($time) {
        $hour = (int)substr($time, 0, 2);
        $meridien = "";
        
        if ($hour < 12) $meridien = "AM";
        else $meridien = "PM";
        
        if ($hour == 0) $hour += 12;
        else if ($hour > 12) $hour -= 12;
        
        $hour = strval($hour);
        return $hour . substr($time, 2, 3) . " " . $meridien;
    }

?>