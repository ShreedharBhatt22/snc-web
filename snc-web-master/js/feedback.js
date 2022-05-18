let Error =1;        
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
    
    let reaction = $('input[name=emoji]:checked').val();
    let userName = $('#userName').val();
    let userEmail = $('#userEmail').val();
    let userOrg = $('#userOrg').val();
    let eventName = $('#eventName').val();
    let suggestions = $('#suggestions').val().replace(/</g, '&lt;');
    suggestions = $('#suggestions').val().replace(/>/g, '&gt;');
    
    if (parseInt(reaction) >= 1 && parseInt(reaction) <= 5) {
        $('.ratings').siblings('.inp-data-error').css('display', 'none');
        if (validateInput('userName') && validateInput('userEmail') && validateInput('userOrg') && validateInput('eventName')) {
            console.log(reaction);
            console.log(userName);
            console.log(userEmail);
            console.log(userOrg);
            console.log(eventName);
            console.log(suggestions);
            Error = 0;
        }
    }
    else {
        $('.ratings').siblings('.inp-data-error').css('display', 'block');
    }
});
    $("#feedback-form").submit(function(event){
        let id = event;
        setTimeout(function(id) {
                
        if(Error==0){
            console.log($(event.target).attr("action"));
            event.preventDefault();
            var post_url = $(event.target).attr("action"); //get form action url
            var form_data = $(event.target).serialize(); //Encode form elements for submission
            $.post( post_url, form_data, function( response ) {
            }, "json");
            Error=1;
        }
        }, 2500);
    });