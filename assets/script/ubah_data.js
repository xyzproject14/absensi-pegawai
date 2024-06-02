var container_hapus = document.getElementsByClassName("container-popup");
var btn_hapus = document.getElementById("hapus-data");
var batal_hapus = document.getElementById("batal-hapus");

btn_hapus.addEventListener("click", function () {
	container_hapus[0].classList.toggle("active");
	console.log("ell ayu");
});
batal_hapus.addEventListener("click", function () {
	container_hapus[0].classList.toggle("active");
});
