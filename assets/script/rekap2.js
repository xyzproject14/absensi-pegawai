console.log("ell gantnng");

// ============== MEMUNCULKAN FORM TAMBAH DATA PEGAWAI BARU ======
var tambah_data = document.getElementById("tampilkan-form");
var container_form = document.getElementsByClassName("containerdatabaru");
var header = document.getElementsByClassName("header");
var body = document.getElementsByClassName("body");
var form_data = document.getElementsByClassName("databaru");
var close = document.getElementsByClassName("close");

tambah_data.addEventListener("click", function () {
	container_form[0].classList.add("active");
	form_data[0].classList.add("active");
	header[0].classList.remove("active");
	body[0].classList.remove("active");
	// console.log("ell marsya");
});
close[0].addEventListener("click", function () {
	container_form[0].classList.remove("active");
	form_data[0].classList.remove("active");
	header[0].classList.add("active");
	body[0].classList.add("active");
});

// =========== UBAH DATA ABSEN HARIAN ===========
var ubah_absen_harian = document.getElementById("ubah-absen-harian");
var absen_harian = document.getElementsByClassName("form-ubah-absen-harian");

ubah_absen_harian.addEventListener("click", function () {
	container_form[0].classList.add("active");
	absen_harian[0].classList.add("active");
	header[0].classList.remove("active");
	body[0].classList.remove("active");
});
close[1].addEventListener("click", function () {
	container_form[0].classList.remove("active");
	absen_harian[0].classList.remove("active");
	header[0].classList.add("active");
	body[0].classList.add("active");
});

// ========== UBAH DATA ABSEN JAM ==============
var absen_jam = document.getElementsByClassName("form-ubah-absen-jam");
var ubah_absen_jam = document.getElementById("ubah-absen-jam");

ubah_absen_jam.addEventListener("click", function () {
	container_form[0].classList.add("active");
	absen_jam[0].classList.add("active");
	header[0].classList.remove("active");
	body[0].classList.remove("active");
});
close[2].addEventListener("click", function () {
	container_form[0].classList.remove("active");
	absen_jam[0].classList.remove("active");
	header[0].classList.add("active");
	body[0].classList.add("active");
});

// ====== CONTAINER LIST BULAN =========
var list_bulan = document.getElementsByClassName("container-list-bulan");
var rekap_bulan_sebelumnya = document.getElementById("rekap_sebelumnya");

rekap_bulan_sebelumnya.addEventListener("click", function () {
	container_form[0].classList.add("active");
	list_bulan[0].classList.add("active");
	header[0].classList.remove("active");
	body[0].classList.remove("active");
});
close[3].addEventListener("click", function () {
	container_form[0].classList.remove("active");
	list_bulan[0].classList.remove("active");
	header[0].classList.add("active");
	body[0].classList.add("active");
});

// =========== MEMUNCULKAN FORM LIST PEGAWAI =======
var list_pegawai_btn = document.getElementById("ubah-data-pegawai");
var list_pegawai_container = document.getElementsByClassName(
	"container-ubah-data-pegawai"
);

list_pegawai_btn.addEventListener("click", function () {
	container_form[0].classList.add("active");
	list_pegawai_container[0].classList.add("active");
	header[0].classList.remove("active");
	body[0].classList.remove("active");
});
close[4].addEventListener("click", function () {
	container_form[0].classList.remove("active");
	list_pegawai_container[0].classList.remove("active");
	header[0].classList.add("active");
	body[0].classList.add("active");
});

// ====== MEMUNCULKAN POP UP HAPUS DATA PEGAWAI ======

// $(".hapus-data").on("click", function () {
// 	console.log($(this).val());
// });
// // btn_hapus.addEventListener("click", function () {
// 	console.log("ell ganteng");
// });
// ======== FITUR PRINT ==========

// ====== EFEK SELANG SELING BARIS ========

var td = document.getElementsByClassName("td");

for (i = 0; i < td.length; i++) {
	if (i % 22 <= 10) {
		td[i].classList.add("bisque");
	}
}
