<?php
    require('./include/geodata.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include('./seo.php');
        $title = 'Feedback - Social and Cultural Committee of PDPU';
        $desc = 'Feedback for the Social and Cultural Committee of PDPU and it\'s events. This committee is the responsible for organizing the social and cultural events in the Pandit Deendayal Petroleum University.';
        $url = 'https://sncpdpu.com/feedback';
        echo get_seo($title, $desc, $url);
    ?>
    <title>Feedback - Social and Cultural Committee of PDPU</title>
    <link rel="stylesheet" href="./css/feedback.css" />
    <link rel="stylesheet" href="./css/contact-us.css" />
    <link rel="stylesheet" href="./css/input.css" />
    
    <?php
        include('./header.php');
    ?>

    <center>
        <div class='feedback-container'>
            <div class="feedback-section">
                <div class='contact-us-div'>
                    <?php
                        include('./contact-us.php');
                    ?>
                </div>
            </div>
            <div class="feedback-section">
                <div class='heading bold-text text-uppercase'>Feedback</div>
                <br/><br/>
                <form id='feedback-form' name='feedback-form'>
                    <div class="feedback-div">
                        <div class="ratings">
                            <input type="radio" name="Reaction" value='1' id="emoji-1">
                            <label for="emoji-1">
                                <img src="./assets/images/angry.svg" alt="angry">
                            </label>
                            <input type="radio" name="Reaction" value='2' id="emoji-2">
                            <label for="emoji-2">
                                <img src="./assets/images/sad.svg" alt="sad">
                            </label>
                            <input type="radio" name="Reaction" value='3' id="emoji-3">
                            <label for="emoji-3">
                                <img src="./assets/images/smile.svg" alt="smile">
                            </label>
                            <input type="radio" name="Reaction" value='4' id="emoji-4">
                            <label for="emoji-4">
                                <img src="./assets/images/happy.svg" alt="happy">
                            </label>
                            <input type="radio" name="Reaction" value='5' id="emoji-5">
                            <label for="emoji-5">
                                <img src="./assets/images/in-love.svg" alt="love">
                            </label>
                        </div>
                        <div class='inp-data-error' style='text-align: left; margin: 5px;'>Please select one reaction.</div>
                        <br/>
                        <div class="input-div input-box">
                            <input class="input-field input-box" type="text" id='userName' name="Name" onkeyup='validateInput("userName")' required>
                            <span class="label-input-field">Name</span>
                            <div class='inp-data-error'>Enter a valid name.</div>
                        </div>
                        <div class="input-div input-box">
                            <input class="input-field input-box" type="text" id='userEmail' name="Email" onkeyup='validateInput("userEmail")' required>
                            <span class="label-input-field">Email Address </span>
                            <div class='inp-data-error'>Enter a valid email address.</div>
                        </div>
                        <div class="input-div input-box">
                            <input class="input-field input-box" type="text" id='userOrg' name="Organization" onkeyup='validateInput("userOrg")' required>
                            <span class="label-input-field">Organization</span>
                            <div class='inp-data-error'>Enter a valid organization name.</div>
                        </div>
                        <div class="input-div input-box">
                            <input class="input-field input-box" type="text" id='eventName' name="Event Name" onkeyup='validateInput("eventName")' required>
                            <span class="label-input-field">Event name</span>
                            <div class='inp-data-error'>Enter a valid event name.</div>
                        </div>
                        <div class="is-floating-label">
                            <label>Suggestions</label>
                            <textarea rows="4" id='suggestions' name='Suggestions' required></textarea>
                        </div>
                    </div>
                    <br/><br/>
                    <button type='submit' id='submitBtn' class='btn btn-normal sub-heading white-text'>Submit</button>
                </form>
            </div>
        </div>
    </center>
    <br/><br/><br/>
    
    <script src='./js/jquery.js'></script>
    <script src='./js/bootstrap-min.js'></script>
    <script src='./js/swal.js'></script>
    <script src='./js/input.js'></script>
    <script>
                
        function validateInput(id) {
            let pattern = '';
            if (id === 'userName' || id === 'eventName') pattern = /^[a-zA-Z\s]+$/g;
            if (id === 'userEmail') pattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/g;
            if (id === 'userOrg') pattern = /^[a-zA-Z0-9 !@&]+$/g;

            if (pattern !== '') {
                if (!pattern.test($('#' + id).val())) $('#' + id).siblings('.inp-data-error').css('display', 'block');
                else {
                    $('#' + id).siblings('.inp-data-error').css('display', 'none');
                    return true;
                }
            }
            return false;
        }
        
        $(document).on('submit', '#feedback-form', (e) => {
            e.preventDefault();
            
            let reaction = $('input[name=Reaction]:checked').val();
            let userName = $('#userName').val();
            let userEmail = $('#userEmail').val();
            let userOrg = $('#userOrg').val();
            let eventName = $('#eventName').val();
            let suggestions = $('#suggestions').val().replace(/</g, '&lt;');
            suggestions = $('#suggestions').val().replace(/>/g, '&gt;');
            
            if (parseInt(reaction) >= 1 && parseInt(reaction) <= 5) {
                $('.ratings').siblings('.inp-data-error').css('display', 'none');
                if (validateInput('userName') && validateInput('userEmail') && validateInput('userOrg') && validateInput('eventName')) {

                    $('#submitBtn').text('Wait...').prop('disabled', 'disabled');

                    $('#submitBtn').after('<input type="hidden" name="Timestamp" value="' + new Date().toString() + '" />')

                    const scriptUrl = 'https://script.google.com/macros/s/AKfycbyN7hx0sVjggT9zsjRzqSySbPzYcJ6tvTe4wTd8VYMvYSi1BN8/exec';
                    const form = document.forms['feedback-form'];

                    console.log(...new FormData(form));

                    let xhr = new XMLHttpRequest();

                    xhr.open('POST', scriptUrl);
                    xhr.send(new FormData(form));
                    xhr.onload = () => {
                        if (xhr.status === 200) {
                            $.post({
                                url: './include/feedback-script.php',
                                method: 'POST',
                                data: {
                                    userName,
                                    userEmail,
                                    userOrg,
                                    eventName,
                                    suggestions,
                                    rating: reaction
                                },
                                success: (res) => {
                                    if (res === '1') swal('Thank you!', 'Your feedback is recorded successfully.', 'success');
                                    else swal('Oops!', 'Something went wrong. Please try again later.', 'error');
                                },
                                error: (err) => {
                                    swal('Oops!', 'Something went wrong. Please try again later.', 'error');
                                },
                                complete: () => {
                                    $('#submitBtn').text('Submit').removeAttr('disabled');
                                }
                            });
                        }
                        else {
                            console.log('error');
                        }
                    }
                    xhr.onerror = (err) => {
                        console.log(err);
                    }
                }
            }
            else {
                $('.ratings').siblings('.inp-data-error').css('display', 'block');
            }
        });
    </script>
    
    <?php
        include('./footer.php');
    ?>