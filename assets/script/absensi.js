// const container = document.getElementById("container");

var body = document.getElementsByClassName("body");
var footer = document.getElementsByClassName("footer");
var header = document.getElementsByClassName("header");
const containerisiabsen = document.getElementsByClassName("containerisiabsen");
const form_absen = document.getElementById("form_absen");
const container_form = document.getElementById("container_form");
const btn_form_absen = document.getElementById("btn_form_absen");
const kembali = document.getElementById("kembali");
var radio = document.getElementsByClassName("radio__input");
var tanggal22 = document.getElementsByClassName("tanggal2");

btn_form_absen.addEventListener("click", function () {
	containerisiabsen[0].classList.add("flex");
	body[0].classList.remove("active");
	container_form.classList.add("flex");
	form_absen.classList.add("flex");

	// ====== MENGOSONGKAN ISI RADIO SEMUANYA =======
	for (var i = 0; i < radio.length; i++) {
		radio[i].checked = false;
	}
});
kembali.addEventListener("click", function () {
	containerisiabsen[0].classList.remove("flex");
	body[0].classList.add("active");
	form_absen.classList.remove("flex");
	container_form.classList.remove("flex");
});

var logout = document.getElementById("log_out");

logout.addEventListener("click", function () {
	console.log("ell ganteng");
});

// ============ MEWARNAI TABEL ======================
var tanggal = new Date();
var hari_ini = tanggal.getDate();
console.log(tanggal.getDate());

var td = document.getElementsByClassName("td");
var jumlah_hari = function (bulan, tahun) {
	return new Date(tahun, bulan, 0).getDate();
};

total_hari = jumlah_hari(tanggal.getMonth() + 1, 2022);
loop_tabel = total_hari + 4;
console.log(total_hari + "aku ganteng");

// === EFEK SELANG SELING
// ==== WARNAI HARI INI

var ubah = document.getElementById("ubah-absen-harian");
var containerdata = document.getElementsByClassName("containerdatabaru");
var close = document.getElementsByClassName("close");

ubah.addEventListener("click", function () {
	header[0].classList.remove("active");
	body[0].classList.remove("active");
	footer[0].classList.remove("active");
	containerdata[0].classList.add("active");
});
close[0].addEventListener("click", function () {
	header[0].classList.add("active");
	body[0].classList.add("active");
	footer[0].classList.add("active");
	containerdata[0].classList.remove("active");
});

// =========== FORM TAMBAH DATA PEGAWAI BARU =========
var tambah = document.getElementById("tambah-databaru");
var form_tambahdata = document.getElementsByClassName("containertambahdata");

tambah.addEventListener("click", function () {
	header[0].classList.remove("active");
	body[0].classList.remove("active");
	footer[0].classList.remove("active");
	form_tambahdata[0].classList.add("active");
});
close[1].addEventListener("click", function () {
	header[0].classList.add("active");
	body[0].classList.add("active");
	footer[0].classList.add("active");
	form_tambahdata[0].classList.remove("active");
});

// ======== MEMUNCULKAN REKAP DATA BULAN SEBELUMNYA ======
var rekap = document.getElementById("rekap-data-absen-harian");
var container_rekap = document.getElementsByClassName("rekap-data-pegawai");

rekap.addEventListener("click", function () {
	container_rekap[0].classList.add("active");
	header[0].classList.toggle("active");
	body[0].classList.toggle("active");
});
close[2].addEventListener("click", function () {
	container_rekap[0].classList.remove("active");
	header[0].classList.toggle("active");
	body[0].classList.toggle("active");
});

// ========== UBAH DATA PEGAWAI ==========

let ubahData = document.getElementById("ubah-data-pegawai");
let containerUbah = document.getElementsByClassName("main-container-ubah-data");

ubahData.addEventListener("click", function () {
	// console.log("ell berubah");
	containerUbah[0].classList.toggle("active");
	header[0].classList.toggle("active");
	body[0].classList.toggle("active");
});
close[3].addEventListener("click", function () {
	containerUbah[0].classList.toggle("active");
	header[0].classList.toggle("active");
	body[0].classList.toggle("active");
});

// var td2 = document.getElementsByClassName("td2");
for (i = 0; i < td.length + 1; i++) {
	if (i % (2 * loop_tabel) <= loop_tabel - 1) {
		if (i % loop_tabel == hari_ini + 3) {
			td[i].classList.add("td-yellow");
		} else {
			td[i].classList.add("td-red");
		}
	} else {
		if (i % loop_tabel == hari_ini + 3) {
			td[i].classList.add("td-yellow");
		}
	}
}

// ====== MENDISABLEKAN TOMBOL TAMBAH DATA ======
