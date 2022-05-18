<?php
    session_start();

    require_once('./DB_Conn.php');
    require_once('./general.php');
    require_once('./log-script.php');

    if (isset($_POST['status']) && $_POST['status'] === 'PHONE_EXIST' && isset($_POST['eventId']) && isset($_POST['phoneNum'])) {

        $phoneNum = clean_text($_POST['phoneNum']);
        $eventId = clean_text($_POST['eventId']);


        $mydb = new DbConn();
        $res = $mydb->selectQry("SELECT * FROM voting_details WHERE phone_no = '$phoneNum' AND event_id = '$eventId' AND vote_success = '0'");
        
        if (mysqli_num_rows($res) > 0) {
            $mydb = new DbConn();
            $mydb->nonSelectQry("DELETE FROM voting_details WHERE phone_no = '$phoneNum' AND event_id = '$eventId' AND vote_success = '0'");
        }

        $mydb = new DbConn();
        $res = $mydb->selectQry("SELECT * FROM voting_details WHERE phone_no = '$phoneNum' AND event_id = '$eventId' AND vote_success = '1'");

        if (mysqli_num_rows($res) > 0) echo 'duplicateEntry';
        else echo '1';
    }

    else if (isset($_POST['status']) && $_POST['status'] === 'SUBMIT_VOTE' && isset($_POST['votes']) && isset($_POST['eventId']) && $_SESSION['phoneNum']) {

        $eventId = clean_text($_POST['eventId']);
        $phoneNum = $_SESSION['phoneNum'];

        if ($_POST['votes'] != '{}') {
        
            $votes = json_decode($_POST['votes'], true);
            
            $err_flag = true;

            $mydb = new DbConn();
            $voteRow = $mydb->selectQry("SELECT vote_id from voting_details where phone_no = '$phoneNum' AND event_id = '$eventId' AND vote_success = '0'");

            if (mysqli_num_rows($voteRow) == 1) {

                $vote_id = mysqli_fetch_assoc($voteRow)['vote_id'];
                
                foreach($votes as $key => $val) {
                    
                    $entryName = explode('-', $key);

                    $mydb = new DbConn();

                    // ADD INSERT QUERY FOR VOTING_STATS
                    $insert_vote = $mydb->nonSelectQry("INSERT INTO `voting_stats` (`vote_id`, `entry_id`, `points`) VALUES('$vote_id', '$entryName[0]', '$val')");

                    if ($insert_vote != 1) $err_flag = $insert_vote;
                    else $err_flag = false;
                }
            }

            if ($err_flag == false) {
                
                $mydb = new DbConn();
                $success_vote = $mydb->nonselectQry("UPDATE voting_details SET vote_success='1' WHERE phone_no = '$phoneNum' AND event_id = '$eventId'");

                if ($success_vote == 1) {
                    saveLog('Voting details are submitted using ' . $_SESSION['phoneNum'] . '.', 'success');
                    echo '1';
                }
                else {
                    saveLog('Error in updating voting status for ' . $_SESSION['phoneNum'] . '.', 'success');
                    echo $success_vote;
                }
            }
            else {
                saveLog('Error in submitting voting details for ' . $_SESSION['phoneNum'] . '.', 'success');
                echo $err_flag;
            }
        }
        else echo 'emptyVotes';
        return;
    }

    else if (isset($_POST['status']) && $_POST['status'] === 'STORE_PHONE' && isset($_POST['eventId']) && isset($_POST['phoneNum'])) {
        $eventId = clean_text($_POST['eventId']);
        $phoneNum = clean_text($_POST['phoneNum']);

        $mydb = new DbConn();
        $res = $mydb->selectQry("SELECT * FROM voting_details WHERE phone_no = '$phoneNum' AND event_id = '$eventId'");

        if (mysqli_num_rows($res) == 0) {

            $_SESSION['phoneNum'] = $phoneNum;
            $mydb = new DbConn();
            $res = $insert_Pn = $mydb->nonselectQry("INSERT into voting_details (event_id, phone_no) VALUES ('$eventId', '$phoneNum')");

            if ($res == 1) {
                saveLog('OTP code is sent on ' . $phoneNum . '.', 'success');
                echo '1';
            }
            else {
                saveLog($res, 'error');
                echo $res;
            }
        }
        else echo 'duplicateEntry';
        return;

    }

    else header('Location: /');

?>