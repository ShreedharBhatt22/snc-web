function checkField(ele) {
    if($(ele).val().trim() != "") {
        $(ele).addClass('has-val');
        $(ele).siblings('.label-input-field').css('display', 'none');
    }
    else {
        $(ele).removeClass('has-val');
        $(ele).siblings('.label-input-field').css('display', 'block');
    }
}

$(() => {
    $('.input-field').each( function () {
        checkField(this);
        $(this).on('blur', function () {
            checkField(this);
        })
    })


    // $('.input-field').each(function(){
    //     $(this).focus(function(){
    //        hideValidate(this);
    //     });
    // });

});

$(".is-floating-label input, .is-floating-label textarea").on("focus blur", function (e) {
    $(this).parents(".is-floating-label").toggleClass("is-focused", e.type === "focus" || this.value.length > 0);
}).trigger("blur");