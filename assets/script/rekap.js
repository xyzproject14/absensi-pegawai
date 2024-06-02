// var xhr = new XMLHttpRequest();
function tampilkanSemuaMenu() {
	$.getJSON("menu.json", function (data) {
		let menu = data.menu;

		// Perulangan dalam javascript
		$.each(menu, function (i, data) {
			$("#daftarMenu").append(
				' <div class="col-md-4"><div class="card"><img src="../img/menu/' +
					data.gambar +
					'" class="card-img-top" alt="..." /> <div class="card-body"><h5 class="card-title">' +
					data.nama +
					'</h5><p class="card-text">' +
					data.deskripsi +
					'</p><h5 class="card-title">' +
					data.harga +
					'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>'
			);
			// console.log(data.nama);
		});
	});
}

tampilkanSemuaMenu();

$(".nav-link").on("click", function () {
	$(".nav-link").removeClass("active");
	$(this).addClass("active");
	// $('.nav-link').removeClass('active2');
	// $(this).addClass('active2');
	let kategori = $(this).html();
	// console.log(kategori);

	$("#kategori").html(kategori);

	if (kategori == "All Menu") {
		tampilkanSemuaMenu();
		return;
	} else {
		$.getJSON("menu.json", function (data) {
			let content = "";
			let menu = data.menu;
			$.each(menu, function (i, data) {
				if (data.kategori.toLowerCase() == kategori.toLowerCase()) {
					// console.log(kategori);
					content +=
						' <div class="col-md-4"><div class="card"><img src="../img/menu/' +
						data.gambar +
						'" class="card-img-top" alt="..." /> <div class="card-body"><h5 class="card-title">' +
						data.nama +
						'</h5><p class="card-text">' +
						data.deskripsi +
						'</p><h5 class="card-title">' +
						data.harga +
						'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>';
				}
			});
			$("#daftarMenu").html(content);
		});
	}
});

// console.log('ell ganteng');
