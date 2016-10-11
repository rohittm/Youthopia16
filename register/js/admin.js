jQuery.expr[':'].Contains = function(a, i, m) {
    return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
};

$(document).ready(function() {
    $("#topmenu").pushpin();
    checkCookies();
});

$("#search").keyup(function() {
    var rows = $(".tableBody").find("tr").hide();
    if (this.value.length) {
        var data = this.value.split(" ");
        $.each(data, function(i, v) {
            rows.filter(":Contains('" + v + "')").show();
        });
    } else rows.show();
});

$("#login").on("submit", function(event) {
    $("#overlay").show();
    dat = $(this).serialize();
    $.ajax({
        url: "php/validateLogin.php",
        type: "POST",
        data: dat,
        success: function(result) {
            res = JSON.parse(result);
            $("#overlay").hide();
            if (res.status === "success") {
                showToast("Login - Successful");
                checkCookies();
            } else if (res.status === "fail") {
                showToast("Login - Failed");
            } else {
                errorHandler();
            }
        },
        error: errorHandler,
    });
    event.preventDefault();
});

function deleteCookie(name) {
    document.cookie = name + '=""; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
}

function checkCookies() {
    $.ajax({
        url: "php/autoCheckCookie.php",
        type: "POST",
        success: function(result) {
            res = JSON.parse(result);
            if (res.status === "success") {
                logIn();
            } else if (res.status === "fail") {
                logOut();
            } else {
                errorHandler();
            }
        },
        error: errorHandler,
    });
}

function logIn() {
    $("#loginBox").hide();
    $("#addAppBtn").show();
    $("#registersBox").show();
    getApplns();
}

function logOut() {
    deleteCookie("authCode");
    deleteCookie("userName");
    $("#registersBox").hide();
    $("#loginBox").show();
    $("#overlay").hide();
}

function payUpdate(regId) {
    if (!confirm("Confirm PAYMENT by pressing OK!")) return;
    $("#overlay").show();
    dat = "rg=" + regId;
    $.ajax({
        url: "php/updatePayStatus.php",
        type: "POST",
        data: dat,
        success: function(result) {
            res = JSON.parse(result);
            if (res.status === "success") {
                getApplns();
                showToast("Payment Status Updated!");
            } else if (res.status === "fail") {
                $("#overlay").hide();
                showToast("Unable to Update, Try Again!");
            } else {
                errorHandler();
            }
        },
        error: errorHandler,
    });
}

function getApplns() {
    $("#overlay").show();
    $.ajax({
        url: "php/viewRegistrations.php",
        type: "POST",
        success: function(result) {
            res = JSON.parse(result);
            if (res.status === "success") {
                showToast("Data Retrieved - Successfully");
                prettyPrint(res);
                $("#overlay").hide();
            } else if (res.status === "fail") {
                $("#overlay").hide();
                showToast("Unable to Retrieve, Try Again!");
            } else {
                errorHandler();
            }
        },
        error: errorHandler,
    });
}

function prettyPrint(data) {
    var content = '<table class="bordered striped responsive-table"><thead><tr><th class="dateTime">Date &amp; Time</th><th class="regId">Registration Id</th><th class="evId">Event Id</th><th class="pay">Dues</th><th class="nm">Name</th><th class="age">Age</th><th class="gn">Gender</th><th class="eid">Email</th><th class="mob">Mobile</th><th class="clg">College Name, City</th></tr></thead>';
    content += '<tbody class="tableBody">';
    $(data.regtrns).each(function(index) {
        dat = data.regtrns[index];
        if (dat.payment !== "0") {
            mark = "red accent-1";
            dispNone = "style='font-weight:bold;cursor:pointer;'";
            eventClick = "payUpdate('" + dat.registration_id + "');";
        } else {
            mark = "";
            dispNone = "";
            eventClick = "";
        }
        content += '<tr id="regId_' + dat.registration_id + '" class="' + mark + '"><td>' + dat.creation + '</td><td>' + dat.registration_id + '</td><td>' + dat.event_id + '</td><td ' + dispNone + ' onclick="' + eventClick + '">&#8377; ' + dat.payment + '</td><td>' + dat.first_name + ' ' + dat.last_name + '</td><td>' + dat.age + '</td><td>' + dat.gender + '</td><td>' + dat.email + '</td><td>' + dat.mobile + '</td><td>' + dat.college_name + ', ' + dat.college_city + '</td></tr>';
    });
    content += '</tbody></table>';
    $("#stage").html("");
    $("#stage").append(content);
}

function showToast(msg) {
    Materialize.toast(msg, 5000, "rounded");
}

function errorHandler(error) {
    $("#overlay").hide();
    Materialize.toast("Error Occured, Try Again! :/", 10000);
}