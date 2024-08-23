var antVen = "reB";
var BonSec = {
	"reB": "resumen",
	"eqB": "equipo",
}
var options = ["reB", "eqB"];

var acc = document.getElementById(options[0]);
acc.addEventListener("click", function () {
	var element = document.getElementById(BonSec[options[0]]);
	element.classList.remove("ocultar");
	element = document.getElementById(options[0]);
	element.classList.add("menuSel");

	if (antVen != null && antVen != options[0]) {
		var element = document.getElementById(BonSec[antVen]);
		element.classList.add("ocultar");
		element = document.getElementById(antVen);
		element.classList.remove("menuSel");

	}
	antVen = options[0];
});

acc = document.getElementById(options[1]);
acc.addEventListener("click", function () {
	var element = document.getElementById(BonSec[options[1]]);
	element.classList.remove("ocultar");
	element = document.getElementById(options[1]);
	element.classList.add("menuSel");


	if (antVen != null && antVen != options[1]) {
		var element = document.getElementById(BonSec[antVen]);
		element.classList.add("ocultar");
		element = document.getElementById(antVen);
		element.classList.remove("menuSel");
	}
	antVen = options[1];
});