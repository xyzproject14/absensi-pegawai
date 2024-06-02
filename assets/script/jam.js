console.log("ell marsya");
var ell = document.getElementById("ell");
var buttons = document.getElementsByClassName("button");

// buttons.addEventListener("click", function () {
// 	buttons.disabled = "disable";
// });

var isi_jam = document.getElementById("isi_jam");
var form_jam = document.getElementById("container-jam");
var tutup_form = document.getElementById("tutup-form");
isi_jam.addEventListener("click", function () {
	form_jam.classList.add("active");
});
tutup_form.addEventListener("click", function () {
	form_jam.classList.remove("active");
});

// ===== MENGATUR WARNA SELANG SELING TABLE =====
var tanggal = new Date();
var jumlah_hari = function (bulan, tahun) {
	return new Date(tahun, bulan, 0).getDate();
};
total_hari = jumlah_hari(tanggal.getMonth() + 1, 2022) + 4;

var td = document.getElementsByClassName("td");
// for (i = 0; i < td.length; i++) {
// 	if (i % (total_hari * 2) <= total_hari - 1) {
// 		if (i % total_hari == hari_ini + 3) {
// 			td[i].classList.add("yellow");
// 		} else {
// 			td[i].classList.add("grey");
// 		}
// 	} else {
// 		if (i % total_hari == hari_ini + 3) {
// 			td[i].classList.add("yellow");
// 		}
// 	}
// }

// ====== MENGATUR WARNA HARI INI =======
var hari = new Date();
var hari_ini = hari.getDate();
// console.log(hari_ini);

for (i = 0; i < td.length; i++) {
	if (i % total_hari == hari_ini + 3) {
		td[i].classList.add("yellow");
	}
}

// ell.addEventListener("click", function () {
// 	// ell.disabled = "disable";
// 	for (i = 0; i < buttons.length; i++) {
// 		buttons[i].disabled = "disable";
// 	}
// });

// function disable(id) {
// 	console.log("ini id.id : " + id.id);
// 	real_id = id.id;
// 	var button = document.getElementById(real_id);
// 	button.disabled = "disable";
// }

// setInterval(disable(id), 5000);

// nama = "ell";
// var button = document.getElementById(nama);
// console.log("button : " + button.id);
var absen_jam = document.getElementsByClassName("form-ubah-absen-jam");
var ubah_absen_jam = document.getElementById("ubah-absen-jam");
var container_form = document.getElementsByClassName("containerdatabaru");
var body = document.getElementsByClassName("body");
var close = document.getElementsByClassName("close");

ubah_absen_jam.addEventListener("click", function () {
	container_form[0].classList.add("active");
	absen_jam[0].classList.add("active");
	// header[0].classList.remove("active");
	body[0].classList.remove("active");
	// console.log();

	console.log("masuk pak eko");
});

close[0].addEventListener("click", function () {
	container_form[0].classList.remove("active");
	absen_jam[0].classList.remove("active");
	// header[0].classList.add("active");
	body[0].classList.add("active");
});

var isi_jam_p = document.getElementById("isi_jam_p");
var container_p = document.getElementsByClassName("container-jam");
var form_isi_praktek = document.getElementsByClassName("form-absen");
var tutup_p = document.getElementById("tutup-form-p");

tutup_p.addEventListener("click", function () {
	container_p[1].classList.remove("active");
});

var ubah_absen_jam_p = document.getElementById("ubah-absen-jam-praktek");

ubah_absen_jam_p.addEventListener("click", function () {
	console.log("jam praktek");

	container_form[1].classList.add("active");
	absen_jam[1].classList.add("active");
	// header[0].classList.remove("active");
	body[0].classList.remove("active");
	// console.log();
});

close[1].addEventListener("click", function () {
	container_form[1].classList.remove("active");
	absen_jam[1].classList.remove("active");
	// header[0].classList.add("active");
	body[0].classList.add("active");
});

// ======== MENAMPILKAN LIST BULAN UNTUK ABSEN JAM SEBELUMNYA ======
var cetak_teori = document.getElementById("cetak-absen-jam");
var cetak_praktek = document.getElementById("tampilkan-absen-jam-praktek");
var container_cetak_teori = document.getElementsByClassName(
	"container-data-sebelumnya"
);

// ====== TAMPILKAN HALAMAN CETAK UNTUK PRODI (TEORI) ======
cetak_teori.addEventListener("click", function () {
	body[0].classList.remove("active");
	container_cetak_teori[0].classList.add("active");
});

close[2].addEventListener("click", function () {
	container_cetak_teori[0].classList.remove("active");
	// header[0].classList.add("active");
	body[0].classList.add("active");
});

// ====== TAMPILKAN HALAMAN CETAK UNTUK PRODI (PRAKTEK) ======
cetak_praktek.addEventListener("click", function () {
	body[0].classList.remove("active");
	container_cetak_teori[1].classList.add("active");
});

close[3].addEventListener("click", function () {
	container_cetak_teori[1].classList.remove("active");
	// header[0].classList.add("active");
	body[0].classList.add("active");
	console.log("ell teori anjay");
});
