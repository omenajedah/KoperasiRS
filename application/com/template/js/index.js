$(document).ready(function() {
    $("#logout").click(function (e) {
        $.ajax({
            type: "POST",
            url: "/koperasi/logout",
            success: function (result, status, xhr) {
                setTimeout(function () { window.location = ""; }, 500);
            },
            error: function (xhr, status, error) {
                console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText);
            }
        });
    });
});



