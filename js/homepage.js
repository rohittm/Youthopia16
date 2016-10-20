function animateItems(duration){
	$(".static-content").css("opacity", 1);
	$(".aside.left").addClass(" animated fadeInDown");
	setTimeout('$(".event-link").addClass(" animated fadeInRight")', duration/2);
	setTimeout('$(".badge").addClass(" animated fadeIn")', duration*2);
	setTimeout('$(".big-grey-stripe").addClass(" animated fadeInDown")', duration);
	setTimeout('$(".event-left-link").addClass(" animated fadeIn")', 1.5*duration);
	setTimeout('$(".bottom-link").addClass(" animated fadeInRight")', duration*2);
	setTimeout('$(".aside.right").addClass(" animated fadeInDown")', duration*2);
	setTimeout('$(".inside").addClass(" animated fadeInDown")', duration*2.5);
	setTimeout('$(".date").addClass(" animated fadeInUp")', duration*2.9);
	setTimeout('$(".city").addClass(" animated fadeInUp")', duration*3.1);
	setTimeout('$(".company").addClass(" animated fadeInUp")', duration*3.3);
	setTimeout('$("#mainId, #sideBarId").css({"transition": "all 1s ease-out", "filter": "blur(0)"})', duration*4);
	return true;
}

$(function() {
	var endDate = "October 20, 2016 09:00:00";
	if (new Date(endDate) - Date.now() > 0)
	{
		$('.countdown.styled').countdown({
		  date: endDate,
		  render: function(data) {
			$(this.el).html("<div>" + this.leadingZeros(data.days, 1) + " <span>days</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>hrs</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>min</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>sec</span></div>");
		  }
		});
	}
});

$( window ).resize(function(){
    animateItems(500);
});
