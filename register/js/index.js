var countdownId;
$(document).ready(function() {
    $(".button-collapse").sideNav();
    $("#topmenu").pushpin({ top: 0});
    $("select").material_select();
    $("#registerBox").show();
    updateTimer();
    countdownId = setInterval(updateTimer, 15000);
    $("input").on("blur", function(){
        validate($(this),true);
    });
    $("body").css("overflow", "visible");
    $("#overlay").hide();
    $("#register").submit(function(event){
        if (confirm("Are you sure to Register?") && !invalidExists()) {
            $.ajax({
                url: "php/validateAll.php",
                type: "POST",
                async: false,
                data: $("#register").serialize(),
                success: function(res) {
                    if (res.sta === "done") {
                        var evId = res.msg.split(",")[0];
                        var regId = res.msg.split(",")[1];
                        showToast("Registration Successful, Mail Sent!");
                        showToast("Registration Id: "+regId+ " for Event Id: "+evId);
                        $("#register")[0].reset();
                        grecaptcha.reset();
                    } else if (res.sta === "fail") {
                        errorHandler(res.msg);
                    } else {
                        errorHandler();
                    }
                },
                error: function(res) {
                    errorHandler();
                }
            });   
        }
        event.preventDefault();
    });
});
function updateTimer() {
    var targetDate = new Date("October 19, 2016 13:00:00");
    var remainingSeconds = ~ ~((targetDate - new Date()) / 1000);
    var remainingTime = {
        "day(s)": remainingSeconds / (60 * 60 * 24),
        "hour(s)": (remainingSeconds % (60 * 60 * 24)) / (60 * 60),
        "minute(s)": (remainingSeconds % (60 * 60)) / 60
        /*"second(s)": remainingSeconds % 60*/
    };
    if (remainingSeconds > 0)   {
        var str = "Time Left to Register : ";
        for (var i in remainingTime) {
            str += ~ ~remainingTime[i] + " " + i + ", ";
        }
        $("#countdown").text(str.substring(0, str.length - 2));
    } else {
        clearInterval(countdownId);
        $("#countdown").text("Registration Time is Over!");
    }
}
function validate(e, asyn) {
    e = e.target?e.target:e.context?e.context:e;
    e = e[0];
    elName = e.name;
    elValue = e.value;
    elLabel = e.nextElementSibling;
    if (elName === "ev" || elName === "gn") return;
    $(e).removeClass("valid");
    $(e).removeClass("invalid");
    if (!$(e).hasClass("select-dropdown")) {
        $(e).attr("disabled","");
        $.ajax({
            url: "php/validateSingle.php",
            type: "POST",
            async: asyn,
            data: "nm="+elName+"&val="+elValue,
            success: function(res) {
                $(e).removeAttr("disabled");
                if (res.sta === "done") {
                    $(elLabel).attr("data-success", res.msg);
                    $(e).addClass("valid");
                } else if (res.sta === "fail") {
                    $(elLabel).attr("data-error", res.msg);
                    $(e).addClass("invalid");
                } else {
                    errorHandler();
                }
            },
            error: function(res) {
                $(e).removeAttr("disabled");
                errorHandler();
            }
        });
    }
}
function invalidExists() {
    exists = false;
    $("input").each(function() {
        validate($(this),false);
        if ($(this).hasClass("invalid")) {
            exists = true;
            return exists;
        }
    });
    return exists;
}
function showToast(msg) {
    Materialize.toast(msg, 10000, "rounded");
}
function errorHandler(error) {
    $("#overlay").hide();
    if (error)
        Materialize.toast(error, 15000);
    else
        Materialize.toast("Error Occured, Try Again! :/", 15000);
}