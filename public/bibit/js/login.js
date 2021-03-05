var header = document.getElementById("tes");
var btns = header.getElementsByClassName("login-nav__item");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

function login() {
    // document.querySelector(".login").style.cssText ="display:block;";
    $(".login").fadeIn(700);
    $(".register").hide();
}

function register() {
    $(".register").fadeIn(700);

    $(".login").hide();
}
