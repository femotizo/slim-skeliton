/**
 * Created by tmack on 2016/11/01.
 */


function valid() {
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('re-password');
    var name = document.getElementById('first-name');
    var surname = document.getElementById('surname');
    var email = document.getElementById('email');
    var err_msg = "";
    var xmlhttp = new XMLHttpRequest();
    var toto = 0;

    if (pass1.value != pass2.value) {
        err_msg = err_msg + " *Passwords do not match ";
        pass1.style.border = "red solid 2px";
        pass2.style.border = "red solid 2px";
    }
    else{
        pass1.style.border = "green solid 2px";
        pass2.style.border = "green solid 2px";
    }

    var matches = name.value.match(/^[a-zA-Z ]*$/);
    if (!matches){
        err_msg = err_msg + " *Name is invalid ";
        name.style.border = "red solid 2px";
    }
    else{
        name.style.border = "green solid 2px";
    }

    var matches1 = surname.value.match(/^[a-zA-Z ]*$/);
    if (!matches1){
        err_msg = err_msg + " *Surname is invalid ";
        surname.style.border = "red solid 2px";
    }
    else{
        surname.style.border = "green solid 2px";
    }

        var matches2 = email.value.match(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/);
    if (!matches2){
        err_msg = err_msg + " *Email is invalid ";
        email.style.border = "red solid 2px";
    }
    else{
        email.style.border = "green solid 2px";
    }

    if (!err_msg)
        return true;
    else{
        $('#err_msg').innerHTML = err_msg;
        return false;
    }
}

$("#btn-create_account")
    .click(function () {
         valid();
    }
   );

var modal_container = document.getElementById('modal-container');
window.onclick = function(event) {
    if (event.target == modal_container) {
        $("#myModal").fadeOut("slow");
    }
};

$("#navtabs").click(function (ev) {
    ev.preventDefault();
    $("#myModal").fadeIn("slow");
    $("#modal-container").fadeIn("slow");
});

$(".close").click(function () {
    $("#myModal").fadeOut("slow");
});



$(document).on("click", "#btn-create_account", function (e) {
    alert("here");
    var data = $("#Create_account").serialize();
    $.ajax({
        type: "POST",
        url: "matcha/src/public/signin.php",
        contentType: "application/x-www-form-urlencoded",
        success: function(response) {
            if (response == "invalid email") {
                alert("here");
            }
                else{
                    alert("success");
                }
            }
    });
});

