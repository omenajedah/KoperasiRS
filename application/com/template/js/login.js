$("#submitButton").click(function (e) {

    var focusSet = false;
    if (!$('#username').val()) {
        if ($("#username").parent().next(".validation").length == 0) // only aTanggal if not aTanggaled
        {
            $("#username").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter email aTanggalress</div>");
        }
        e.preventDefault(); // prevent form from POST to server
        $('#username').focus();
        focusSet = true;
        return;

    } else {
        $("#username").parent().next(".validation").remove(); // remove it
    }

    if (!$('#password').val()) {
        if ($("#password").parent().next(".validation").length == 0) // only aTanggal if not aTanggaled
        {
            $("#password").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter password</div>");
        }
        e.preventDefault(); // prevent form from POST to server
        if (!focusSet) {
            $("#password").focus();
        }
        return;

    } else {
        $("#password").parent().next(".validation").remove(); // remove it
    }

    $.ajax({
        type: "POST",
        url: "koperasi/login",
        contentType: "application/json; charset=utf-8",
        data: '{"username":"' + $("#username").val() + '","password":"' + $("#password").val() + '"}',
        dataType: "json",
        success: function (result, status, xhr) {
            if (result.success) {
                if ($("#password").parent().next(".validation").length == 0) {
                    $("#password").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Login Berhasil</div>");
                } else {
                    $("#validation").text("Login Berhasil");
                }
                // $("#messageSpan").text("Login Successful, Redireting to your profile page.");
                setTimeout(function () { window.location = "/koperasi/"; }, 500);
            } else {
                if ($("#password").parent().next(".validation").length == 0) {
                    $("#password").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Username atau Password salah</div>");
                } else {
                    $("#validation").text("Username atau Password salah");
                }
            }
        },
        error: function (xhr, status, error) {
            $("#validation").html("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
        }
    });
});

$("#password").on('keyup', function (e) {
    if (e.keyCode == 13) {
        $("#submitButton").click();
    }
});

$(document).ajaxStart();