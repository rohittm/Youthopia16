
		$(function(){
			var part1 = $("#secondPart"), part2 = $("#fourthPart"), a, b;
			if($(window).width() > 675){
				a = 0.4;
				b = 0.4;
			}
			else{
				a = 0.4;
				b = 0.7;
			}
			var point = getPoint(a, b), nav = $(".navigation"),
				scroll = $("body").scrollTop() + $(window).height() - 300 + parseInt(nav.attr("data-scroll"));


			var x = point[0], y = point[1];

			translateToPoint(x, y, part1, 0);
			translateToPoint(x - part2.width(), y - part2.height()/2, part2, 250);

			$(window).resize(function(){
				point = getPoint(a, b);
				var x = point[0], y = point[1];
				translateToPoint(x, y, part1, 0);
				translateToPoint(x - part2.width(), y - part2.height()/2, part2, 250);
			});

			screwDesigners();
		});

		$(window).resize(function(){
			screwDesigners();
		});
