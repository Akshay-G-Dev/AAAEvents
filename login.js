function open_popup(box) {
    $(".popup").addClass('open');
    $(".popup-box").slideDown();
    if(box==="register"){
        $("#login-popup-box").css({'display':'none'});
    }else{
        $("#register-popup-box").css({'display':'none'});
    }
    $("#"+box+"-popup-box").css({'display':'block'});
    
    
}

function close_popup() {
    $('.popup-box').slideUp();
    $(".popup").delay(0.5);
    $(".popup").removeClass('open');
    $("#login-popup-box").css({'display':'none'});
    $("#register-popup-box").css({'display':'none'});
}
$("#login-signup").on('click', function(e){open_popup("register")});
$(".close-popup").on('click', function(e){close_popup()});
$("#login-page-btn").on("click",function(e){open_popup('login')});
$("#signup-page-btn").on("click",function(e){open_popup('register')});


function  confirmpassword() {
    var password=document.getElementById("reg-psw").value;
    var confirmpassword=document.getElementById("psw-repeat").value;
    var message_line = document.getElementsByClassName("message-line")[0];
    if(password!=confirmpassword){
        message_line.innerHTML="<span color:#f00;>Password does not match</span>";
        
        return false;
    }
    else{
        message_line.innerHTML="";
        return true;
    }
    
}