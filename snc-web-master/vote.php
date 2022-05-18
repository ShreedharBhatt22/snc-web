<?php
    require('./include/DB_Conn.php');
    $event_id = makeSafe($_GET['en'], 'decrypt');

    if (isset($_GET['en'])) $event_id = makeSafe($_GET['en'], 'decrypt');
    
    if (!is_string($event_id) || $event_id == '') header('Location: /');
    else {
        $eventName = 'None';
        $votingStatus = false;
        $mydb = new DbConn();
        $eventRow = $mydb->selectQry("SELECT * FROM event_details WHERE event_id = '$event_id' AND voting = '1'");
        if (mysqli_num_rows($eventRow) == 1) {
            $votingStatus = true;
            $mydb = new DbConn();
            $eventRow = $mydb->selectQry("SELECT event_name FROM event_details WHERE event_id = '$event_id'");
            $eventName = mysqli_fetch_assoc($eventRow)['event_name'];
            $mydb = new DbConn();
            $eventresult = $mydb->selectQry("SELECT `entry_id`,`person_name`,`image_path` FROM admin_voting WHERE event_id = '$event_id'");
            $eventcount = $mydb->selectcount($eventresult);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Voting for <?php echo $eventName ?> - Social and Cultural Committee of PDPU</title>

        <!-- Components CSS -->
        <!-- <link href='./css/input.css' rel='stylesheet' /> -->
        <link href='./css/otp.css' rel='stylesheet' />
        <link href='./css/feedback.css' rel='stylesheet' />
        <link href='./css/input.css' rel='stylesheet' />
        <link href='./css/person-card.css' rel='stylesheet' />
        <link href='./css/client-voting.css' rel='stylesheet' />
        <link href='./css/progress-bar.css' rel='stylesheet' />
        <link href='./css/vote.css' rel='stylesheet' />
  
        <?php
            include('./header.php');

            if ($votingStatus == true) {
                echo "<div class='clear-vote-div'>
                    <div class='heading main bold-text text-center text-capitalize'>Vote for $eventName</div>
                        <button type='button' onclick='voteReset()' class='btn btn-normal'>Reset votes</button>
                    </div>

                    <center>
                        <form id='voteRespForm'>
                            <input type='hidden' id='eventId' name='eventId' value='$event_id' />
                            <br/>
                            <div id='otp-confirmation' class='para-small-text bold-text'></div>
                            <br/>
                            <div class='otp-box'>
                                <div class='para-text'>Enter OTP</div><br/>
                                <span>
                                    <input class='otp' id='codeBox1' type='text' maxlength='1' onkeyup='onKeyUpEvent(1, event)' onfocus='onFocusEvent(1)'>
                                    <input class='otp' id='codeBox2' type='text' maxlength='1' onkeyup='onKeyUpEvent(2, event)' onfocus='onFocusEvent(2)'>
                                    <input class='otp' id='codeBox3' type='text' maxlength='1' onkeyup='onKeyUpEvent(3, event)' onfocus='onFocusEvent(3)'>
                                    <input class='otp' id='codeBox4' type='text' maxlength='1' onkeyup='onKeyUpEvent(4, event)' onfocus='onFocusEvent(4)'>
                                    <input class='otp' id='codeBox5' type='text' maxlength='1' onkeyup='onKeyUpEvent(5, event)' onfocus='onFocusEvent(5)'>
                                    <input class='otp' id='codeBox6' type='text' maxlength='1' onkeyup='onKeyUpEvent(6, event)' onfocus='onFocusEvent(6)'>
                                </span>
                            </div>
                            <br/><br/><br/>

                            <div class='voting-images' style='width: 100%;'>";

                                if($eventcount != 0) {
                                    $c = 0;
                                    while($row = mysqli_fetch_assoc($eventresult)) {
                                
                                        $entry_id=$row['entry_id'];
                                        $person_name=$row['person_name'];
                                        $image_path=$row['image_path'];

                                        echo "
                                        <div class='person-card'>
                                            <div class='thumbnail'>
                                                <img class='person-card-img voting-image' src='http://heart.sncpdpu.com/assets/images/events/voting/$image_path' alt='Person thumbnail' name='img_path1'>
                                            </div>
                                            <div class='person-card-content'>
                                                <h4 class='card-title'>$person_name</h4>
                                                <p class='card-text' name='entry_id1'>#$entry_id</p>
                                                <br/>
                                                <div>
                                                    <div class='ratings'>
                                                    <fieldset id='$entry_id-emoji'>
                                                        <input type='radio' name='$entry_id-emoji' class='3_star' value='3' id='".$entry_id."_emoji-3'>
                                                        <label for='".$entry_id."_emoji-3'  onclick='vote(\"$entry_id\", \"emoji-3\")'>
                                                            <img src='./assets/images/in-love.svg' alt='love'>
                                                        </label>
                                                        <input type='radio' name='$entry_id-emoji' class='2_star' value='2' id='".$entry_id."_emoji-2'>
                                                        <label for='".$entry_id."_emoji-2'  onclick='vote(\"$entry_id\", \"emoji-2\")'>
                                                            <img src='./assets/images/happy.svg' alt='happy'>
                                                        </label>
                                                        <input type='radio' name='$entry_id-emoji' class='1_star' value='1' id='".$entry_id."_emoji-1'>
                                                        <label for='".$entry_id."_emoji-1'  onclick='vote(\"$entry_id\", \"emoji-1\")'>
                                                            <img src='./assets/images/smile.svg' alt='smile'>
                                                        </label>
                                                    </fieldset>
                                                    </div>

                                                </div>
                                            <hr />
                                            </div>
                                        </div>";

                                        $c++;
                                    }
                                }

                                echo "</div>
                                <br/><br/>
                                        <button type='submit' id='voteRespSubmit' class='btn btn-normal text-uppercase'>Submit</button>
                                    </form>
                                </center>
                                <div class='modal fade' role='dialog' id='askPhoneModal' data-backdrop='static' data-keyboard='false'>
                                <div class='modal-dialog modal-lg'>
                                    <div class='modal-body' style='background: #FFF; padding: 20px;'>
                                        <center>
                                            <form id='phoneNumberForm'>
                                                <div class='heading' id='modal-vote-heading' style='white-space: normal;'>Vote for $eventName</div>
                                                <div class='input-div input-box' style='text-align: left;'>
                                                    <input class='input-field input-box' type='text' id='phoneNumber' name='phoneNumber' maxlength='14' onkeyup='validatePhone(this.value)' required />
                                                    <span class='label-input-field'>Phone number</span>
                                                    <div class='inp-data-error'>Enter a valid phone number.</div>
                                                </div>
                                                <br/><br/>
                                                <div id='recaptcha-container'></div>
                                                <br/><br/>
                                                <button class='btn btn-normal' type='submit' id='phoneNumberSubmit' onclick='phoneAuth(event, \"" . $event_id . "\")'>Send OTP</button>

                                                <div id='prgs-bar' style='display: none;'>
                                                    <div class='progress' style='position: relative;'>
                                                        <div class='progress-bar indeterminate' role='progressbar' style='background: #E259A3' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'></div>
                                                    </div>
                                                    <div class='para-small-text'>Sending you an OTP number</div>
                                                </div>
                                            </form>
                                        </center>
                                    </div>
                                </div>
                            </div>";
            }
            else {
                echo '<br/><br/><br/><div style="height: calc(100vh - 600px)" class="para-text text-center bold-text">Voting is not available for this event.</div>';
            }
        ?>

        <div style='margin-bottom: 100px;'></div>
        
		<script src='./js/jquery.js'></script>
		<script src='./js/bootstrap-min.js'></script>
		<script src='./js/general.js'></script>
		<script src='./js/client-voting.js'></script>
		<script src='./js/input.js'></script>
        <script src='./js/otp.js'></script>
        <script src='./js/swal.js'></script>

        <script src="https://www.google.com/recaptcha/api.js" async></script>
        <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-analytics.js"></script>
		
        <?php
            include('./footer.php');
        ?>