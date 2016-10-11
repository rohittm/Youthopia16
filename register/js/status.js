var countdownId;
$(document).ready(function() {
    $(".button-collapse").sideNav();
    $("#topmenu").pushpin({ top: 0});
    $("#statusBox").show();
    updateTimer();
    countdownId = setInterval(updateTimer, 15000);
    $("#regID").on("blur", function(){
        $("#regID").removeClass("valid");
        $("#regID").removeClass("invalid");
    });
    $("body").css("overflow", "visible");
    $("#overlay").hide();
    $("#status").submit(function(event){
        $("#regID").removeClass("valid");
        $("#regID").removeClass("invalid");
        $.ajax({
            url: "php/checkPayStatus.php",
            type: "POST",
            async: false,
            data: $("#status").serialize(),
            success: function(res) {
                if (res.sta === "done") {
                    grecaptcha.reset();
                    $("#regID").addClass("valid");
                } else if (res.sta === "fail" && $("#regID").val() != "") {
                    grecaptcha.reset();
                    $("#regID").addClass("invalid");
                    errorHandler(res.msg);
                } else {
                    errorHandler(res.msg);
                }
            },
            error: function(res) {
                errorHandler();
            }
        });
        event.preventDefault();
    });
});
function updateTimer() {
    var targetDate = new Date("October 19, 2016 14:00:00");
    var remainingSeconds = ~ ~((targetDate - new Date()) / 1000);
    var remainingTime = {
        "day(s)": remainingSeconds / (60 * 60 * 24),
        "hour(s)": (remainingSeconds % (60 * 60 * 24)) / (60 * 60),
        "minute(s)": (remainingSeconds % (60 * 60)) / 60
        /*"second(s)": remainingSeconds % 60*/
    };
    if (remainingSeconds > 0)   {
        var str = "Time Left to do Payment : ";
        for (var i in remainingTime) {
            str += ~ ~remainingTime[i] + " " + i + ", ";
        }
        $("#countdown").text(str.substring(0, str.length - 2));
    } else {
        clearInterval(countdownId);
        $("#countdown").text("Payment Time is Over!");
    }
}
function showToast(msg) {
    Materialize.toast(msg, 5000, "rounded");
}
function errorHandler(error) {
    $("#overlay").hide();
    if (error)
        Materialize.toast(error, 10000);
    else
        Materialize.toast("Error Occured, Try Again! :/", 10000);
}