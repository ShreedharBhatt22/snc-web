<?php

    if (isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userOrg']) && isset($_POST['eventName']) && isset($_POST['suggestions']) && isset($_POST['rating'])) {
    
        require_once('./general.php');
        require_once('./mail-script.php');
    
        try {
            // $file_open = fopen("feedback.csv", "a");
            // $no_rows = count(file("feedback.csv"));
            // if($no_rows > 1) $no_rows = ($no_rows - 1) + 1;

            $userName = clean_text($_POST['userName']);
            $userEmail = clean_text($_POST['userEmail']);
            $userOrg = clean_text($_POST['userOrg']);
            $eventName = clean_text($_POST['eventName']);
            $suggestions = clean_text($_POST['suggestions']);
            $rating = clean_text($_POST['rating']);
            

            // $form_data = array (
            //     'sr_no' => $no_rows,
            //     'userName' => $userName,
            //     'userEmail' => $userEmail,
            //     'userOrg' => $userOrg,
            //     'eventName' => $eventName,
            //     'suggestions'=> $suggestions,
            //     'rating'=> $rating
            // );

            // fputcsv($file_open, $form_data);

                
            $subject = 'Feedback confirmation - S&C';
            $content = '
                <html>
                <head>
                <style>
                    body
                    {
                        background-color: #F1F1F1;
                        font-family: Verdana;
                        text-align: center;
                        display: flex;
                        justify-content: center;
                    }
                    body > center {
                        max-width: 500px;
                        background: #FFF;
                    }
                    #message
                    {
                        padding: 40px;
                        text-align: left;
                    }
                    img
                    {
                        width: 100%;
                        height: 90px;
                    }
                    #logo
                    {
                        width: 120px;
                        padding-right: 20px;
                        border-right: 3px solid grey;
                    }
                    #text
                    {
                        padding-left: 20px;
                        height: 70px;
                    }
                </style>
                </head>
                <body>
                <center>
                    <header style="padding: 20px;">
                        <center>
                            <table>
                                <tr>
                                    <td id="logo">
                                        <img src="https://sncpdpu.com/assets/images/SnC_logo.png" />
                                    </td>
                                    <td id="text">
                                        Social & Cultural Committee
                                    </td>
                                </tr>
                            </table>
                            <span>
                
                            </span>
                        </center>
                    </header>
                        <center>
                            <div id="message">
                                Dear '.$userName.',
                                <br/>
                                <br/>
                                We appreciate your valuable Feedback & Time. Hope to hear more from you in the near future. 
                                <br/>
                                <br/>
                                <br/>
                                Thank You.
                                <br/>
                                <br/>
                                <div style="text-align: left;">Regards,<br/>S&C Team.</div>
                                <br/>
                                <br/>
                                <div id="follow" style="text-align: right; margin: 10px;">Follow Us</div>
                            <div id="social" style="float: right; display:flex; justify-content:center;">
                                <div style="margin: 10px;">
                                    <a href="https://www.instagram.com/social_n_cultural_committee">
                                        <img src="https://sncpdpu.com/assets/images/instagram.png" style="width: 36px; height: 36px;" />
                                    </a>
                                </div>
                                <div style="margin: 10px;">
                                    <a href="https://www.facebook.com/pdpu.sal">
                                    <img src="https://sncpdpu.com/assets/images/facebook.png" style="width: 30px; height: 30px;" />
                                    </a>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                            </div>
                        </center>
                </center>
                </body>
            </html>';


            echo sendEmail($userName, $userEmail, $subject, $content, 'Feedback confiramation mail is sent to ' . $userEmail . '.', 'Error in sending feedback confirmation mail on ' . $userEmail . '.');
            return;

            // $logFile = fopen($logFileName, 'a');
            // $logMsg = 'Error in sending feedback confirmation mail on ' . $_POST['userEmail'] . '.';
            // if ($mail->send() == 1) {
            //     $logMsg = 'Feedback confiramation mail is sent to ' . $_POST['userEmail'] . '.';
            //     echo '1';
            // }
            // fwrite($logFile, date('Y-m-d h:i:s a') . ' -> ' . $logMsg . "\r\n\r\n");
            // fclose($logFile);
            // return;
        }
        catch (Exception $e) {
            $logText = $e . '\nWhile sending mail on ' . $userEmail . ".\r\n\r\n";
            saveLog($logText, 'error');
            echo 'error';
            return;
        }
    }
    else {
        header('Location: index.php');
    }

?>