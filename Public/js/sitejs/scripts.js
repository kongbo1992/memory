
jQuery(document).ready(function() {
    $('.page-container form').submit(function(){
        var username = $(this).find('.username').val();
        var password = $(this).find('.password').val();
        if(username == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '27px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.username').focus();
            });
            return false;
        }
        if(password == '') {
            $(this).find('.error').fadeOut('fast', function(){
                $(this).css('top', '96px');
            });
            $(this).find('.error').fadeIn('fast', function(){
                $(this).parent().find('.password').focus();
            });
            return false;
        }
        $.ajax({
            type: "post",
            url: "login",
            data:{user_mobile:username,user_pwd:password},
            success:function(data){
                if(data.code == 200){
                    window.location.href="../Index/index";
                }else if(data.code == 201){
                    $("#pwd").css("border","1px solid #ff6b49");
                    $("#pwd").siblings('.err').show().html(data.msg);
                }
            }
        });
        return false;
    });

    $('.page-container form .username, .page-container form .password').keyup(function(){
        $(this).parent().find('.error').fadeOut('fast');
    });

});
