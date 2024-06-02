console.log("ell ganteng");

const simpan = document.getElementById("tampilkan");
const container = document.getElementById("container");
const isi_absen = document.getElementById("isi_absen");
const kembali = document.getElementById("kembali");

simpan.addEventListener("click", function () {
	container.classList.add("flex");
	isi_absen.classList.add("flex");
});
kembali.addEventListener("click", function () {
	container.classList.remove("flex");
	isi_absen.classList.remove("flex");
});
