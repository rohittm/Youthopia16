$(function() {
    if($(window).width() > 667){
        var duration = 500;
        // $(".static-content").css("opacity", 1);
        $(".aside.left").addClass(" animated fadeInDown");
        setTimeout('$(".badge").addClass(" animated fadeIn")',  duration*2);

        setTimeout('$(".grey-stripe").addClass(" animated fadeInDown")',  duration/3);
        // setTimeout('$(".event-link").addClass(" animated fadeInRight")',  duration/3);

        setTimeout('$(".big-grey-stripe").addClass(" animated fadeInDown")',  duration/2);
        // setTimeout('$(".event-left-link").addClass(" animated fadeIn")',  0.75*duration);

        setTimeout('$("#topPart").addClass(" animated fadeInDown")',  0.75*duration);
        setTimeout('$("#middlePart").addClass(" animated fadeIn")',  0.5*duration);
        setTimeout('$("#bottomPart").addClass(" animated fadeInUp")',  0.5*duration);

        setTimeout('$(".aside.right").addClass(" animated fadeInDown")',  0.5*duration);


        setTimeout('$(".mainTitle").addClass(" animated fadeInUp")',  duration);
        setTimeout('$(".note").addClass(" animated fadeInUp")',  duration*1.5);
        setTimeout('$(".date").addClass(" animated fadeInUp")',  duration*1.7);
        setTimeout('$(".city").addClass(" animated fadeInUp")',  duration*1.9);
        setTimeout('$(".company").addClass(" animated fadeInUp")',  duration*2.1);

        setTimeout('$(".bottom-link").addClass(" animated fadeInRight")',  duration*0.25);
    }
});