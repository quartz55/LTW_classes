function regform(form, username, pass, conf) {
    if (username.value == '' || pass.value == '') {
        alert('You must provide both a username and password');
        return false;
    }

    var re = /^\w+$/;
    if(!re.test(form.username.value)) {
        alert("Username must contain only letters, numbers and underscores");
        form.username.focus();
        return false;
    }

    if (pass.value.length < 3) {
        alert("Password must be at least 3 characters long");
        form.password.focus();
        return false;
    }

    if (pass.value != conf.value) {
        alert("Passwords don't match");
        form.confirm.focus();
        return false;
    }

    var confirm_btn = document.createElement("input");
    confirm_btn.name = "confirm_btn";
    confirm_btn.type = "hidden";
    form.appendChild(confirm_btn);

    form.submit();
    return true;
}
