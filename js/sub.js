
		$(function(){
			var part1 = $("#firstPart"), part2 = $("#secondPart"), part3 = $("#thirdPart"), part4 = $("#fourthPart");
			var point = getPoint(0.4, 0.3);
			generateFigure(point, part1, part2, part3, part4);
			$(window).resize(function(){
				point = getPoint(0.4, 0.3);
				generateFigure(point, part1, part2, part3, part4);
			});
			screwDesigners();
		});

		$(window).resize(function(){
			screwDesigners();
		});
