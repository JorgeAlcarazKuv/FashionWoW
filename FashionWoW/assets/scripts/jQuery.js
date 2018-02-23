$(document).ready(function() {



    function login() {
        var valid = true;
        allFields.removeClass("ui-state-error");

        valid = valid && checkLength(name, "username", 3, 16);
        valid = valid && checkLength(password, "password", 5, 16);

        valid = valid && checkRegexp(name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter.");
        valid = valid && checkRegexp(password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9");
        var data = $("#login-form").serialize();
        $.ajax({
            type : 'POST',
            url  : "models/loginAjax.php",
            data : data,
            success :  function(response) {
                console.log(response)
            }
        }).done(function () {
            
        })
        return valid;
    }
});