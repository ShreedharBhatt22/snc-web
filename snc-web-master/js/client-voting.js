function vote(entry, emoji) {
    let exist_emoji = localStorage.getItem(emoji);

    if (check_field(exist_emoji)) $('#' + exist_emoji).prop('checked', false);

    localStorage.setItem(emoji, entry + '_' + emoji);
    $('#' + entry + '_' + emoji).prop('checked', true);
}

function voteReset() {
    $('input[type=radio]').prop('checked', false);
}

function validatePhone(phoneNum) {
    let phoneEle = $('#phoneNumber');
    if (phoneNum.indexOf('+91') === -1) phoneEle.val('+91 ' + phoneEle.val());
    if (phoneEle.val().length <= 4) phoneEle.val('+91 ');
    phoneNum = phoneNum.replace('+91', '');
    phoneNum = phoneNum.replace(' ', '');
    let phoneNumPattern = /^[0-9]{10}$/g;
    if (!phoneNum.match(phoneNumPattern)) {
        phoneEle.siblings('.inp-data-error').css('display', 'block');
        return false;
    }
    else {
        phoneEle.siblings('.inp-data-error').css('display', 'none');
        return true;
    }
}

function render() {
    window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        'callback': () => $('#phoneNumberSubmit').prop('disabled', false)
    });
    recaptchaVerifier.render();
}

let confirmFunc = '';

function phoneAuth(event, eventId) {
    event.preventDefault();
    $('#phoneNumberSubmit').prop('disabled', true).text('Wait...');
    var number = $('#phoneNumber').val();

    $.post({
        url: './include/client-voting-script.php',
        data: {
            status: 'PHONE_EXIST',
            phoneNum: number,
            eventId
        },
        success: (res) => {
            // console.log(res);
            if (res == 1) {
                firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then((confirmResult) => {
                    confirmFunc = confirmResult;
                    $.post({
                        url: './include/client-voting-script.php',
                        data: {
                            status: 'STORE_PHONE',
                            phoneNum: number,
                            eventId
                        },
                        success: (res) => {
                            // console.log(res);
                            if (res == 1) {
                                $('#askPhoneModal').modal('hide');
                                $('#otp-confirmation').text('We have sent you an OTP on given phone number.');
                            }
                            else swal('Oops!', 'Something went wrong.', 'error');
                        },
                        error: (err) => {
                            // console.log(err);
                            swal('Oops!', 'Something went wrong.', 'error');
                        },
                        complete: () => {
                            $('#phoneNumberSubmit').prop('disabled', false).text('Send OTP');
                        }
                    });
                }).catch(function (error) {
                    $('#phoneNumberSubmit').prop('disabled', false).text('Send OTP');
                    swal('Oops!', error.message, 'error');
                });
            }
            else if (res === 'duplicateEntry') swal('Oops!', 'You have already voted for this event.', 'warning');
            else swal('Oops!', 'Something went wrong.', 'error');
        },
        error: () => {
            // console.log(err);
            swal('Oops!', 'Something went wrong.', 'error');
        },
        complete: () => {
            $('#phoneNumberSubmit').prop('disabled', false).text('Send OTP');
        }
    });
}

$(document).on('submit', '#voteRespForm', (e) => {
    e.preventDefault();
    let enteredOtp = '';
    let err_flag = false;
    for (let i = 1; i <= 6; i++) {
        if ($('#codeBox' + i).val() !== '') {
            if (Number.isInteger(parseInt($('#codeBox' + i).val()))) enteredOtp += $('#codeBox' + i).val();
            else {
                err_flag = true;
                break;
            }
        }
        else {
            err_flag = true;
            break;
        }
    }
    if (err_flag) swal('Invalid OTP code', 'Please provide a valid OTP code in digits.', 'error');
    else if (err_flag === false && enteredOtp.length === 6 && check_field(confirmFunc)) {
        let votes = {};
        $('input[type=radio]:checked').each(function(ele) {
            let grp_name = $(this).attr('name');
            if(!check_field(votes[grp_name])) votes[grp_name] = $('input[name=' + grp_name + ']:checked').val();
        });
        if (JSON.stringify(votes) !== '{}') {
            confirmFunc.confirm(enteredOtp).then(() => {
                $.post({
                    url: './include/client-voting-script.php',
                    data: {
                        status: 'SUBMIT_VOTE',
                        eventId: $('#eventId').val(),
                        votes: JSON.stringify(votes)
                    },
                    success: (res) => {
                        // console.log(res);
                        if (res == 1) swal('Thank you!', 'Your votes are recorded.', 'success').then(() => window.location.href = '/');

                        else if (res === 'emptyVotes') swal('Give your votes', 'You can give minimum 1 and maximum 3 votes.', 'warning');
                        
                        else swal('Oops!', 'Something went wrong.', 'error');
                    },
                    error: (err) => {
                        console.log(err);
                        swal('Oops!', 'Something went wrong.', 'error');
                    }
                })
            }).catch(function (error) {
                if (error.message.indexOf('verification code') !== -1 && error.message.indexOf('invalid') !== -1) swal('Invalid OTP code', 'Please verify your OTP code and try again.', 'error');
            });
        }
        else {
            swal('Give your votes', 'You can give minimum 1 and maximum 3 votes.', 'warning');
        }
    }
    else swal('Oops!', 'Something went wrong.', 'error');
});

$(document).ready(() => {
    let firebaseConfig = {
        apiKey: "AIzaSyB6HB2bCp5dVGda3oIL8jrBxgIBo4Ou1Js",
        authDomain: "votingauth.firebaseapp.com",
        databaseURL: "https://votingauth.firebaseio.com",
        projectId: "votingauth",
        storageBucket: "votingauth.appspot.com",
        messagingSenderId: "644999803539",
        appId: "1:644999803539:web:71000d63536a42d9c7d366",
        measurementId: "G-34PKXD11L1"
    }
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    $('#phoneNumberSubmit').prop('disabled', true);
    $('#askPhoneModal').modal('show');
    render();
});