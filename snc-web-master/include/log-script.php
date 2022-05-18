<?php
    require_once(dirname(__FILE__) . '/DB_Conn.php');
    function saveLog($logText, $status) {
        $mydb = new DbConn();
        $save = $mydb->nonselectQry("INSERT INTO `activity_log`(`log_text`, `status`) VALUES ('$logText','$status')");
        if(!$save) {
            $logFile = fopen('error-log.txt', 'a');
            fwrite($logFile, date('Y-m-d h:i:s a') . ' -> ' . $status . ' -> ' . $logText . "\r\n\r\n");
            fclose($logFile);
        }
        return;
    }
?>