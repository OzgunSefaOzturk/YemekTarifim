$(function() {
	$("input[name=rating]").click(function() {
		var oy = $(this).val();
		var id = $("div.rating").attr('id');

		$.ajax({
			type: 'POST',
			url : '/web/api/puan.php',
			data: {'id': id, 'oyla': 'true', 'puan': oy},
			success: function(result) {
				json = JSON.parse(result);
				puan = Math.round(json.ortalama * 100) / 100;
				$("div#ortalama-puan").html("Ortalama puan: "+ puan);
				$("div.rating").fadeOut(1000);
			}
		});

		
	});

	$("button#favori").click(function() {
		var id = $(this).attr('name');

		$.ajax({
			type: 'POST',
			url : '/web/api/favori.php',
			data: {'id': id, 'fav': 'true'},
			success: function(result) {
				$("div.favori").html(result);
			}
		});		
	});
});