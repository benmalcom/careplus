/**
 * Created by Malcom on 7/7/2016.
 */
$(document).ready(function(){
    $('.alert-danger,.alert-success').delay(8000).fadeOut("slow");


    $("form").submit(function() {
        var phoneInput = $('.phone'),
            submitBtn = $('button[type=submit]');
        if($(this).find(phoneInput).val())
        {
            phoneInput.val(phoneInput.intlTelInput("getNumber"));
        }
        submitBtn.addClass("disabled");
    });

    $('.profile-file').change(function(){
        var $this = $(this),
            val = $this.val(),
            file = this.files[0],
            reader = new FileReader(),
            imageUrl = null;

        reader.onload = function(event){
            imageUrl = event.target.result;
            $('.profile-pic-nav').attr("src",imageUrl);
        };
        reader.readAsDataURL(file);
    });
});