function showPassword() {
    var show = document.getElementById("password");
    if (show.type === "password") {
        show.type = "text";
    } else {
        show.type = "password";
    }
}
