var antVen = "verB";
var BonSec = {
	"verB": "ver",
	"ediB": "editar",
	"boB": "borrar",
	"reB": "regresar"
}
var options = ["verB", "ediB", "boB", "reB"];

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

acc = document.getElementById(options[2]);
acc.addEventListener("click", function () {
	var resultado = window.confirm('¿Seguro que quieres eliminar este elemento?');
	if (resultado === true) {
		var cod = getParameterByName('codigo');
		var tip = getParameterByName('tipo');
		const datos = {
			accion: "eliminar",
			tipo: tip,
	    	codigo: cod
		};

		const xhr = new XMLHttpRequest();

		xhr.open('POST', '../app/serverAcc.inc.php', true); 
		xhr.setRequestHeader('Content-Type', 'application/json'); 

		xhr.onload = function() {
		    if (xhr.status === 200) {
		    	window.alert(xhr.responseText);
				window.location.href = '../';
		    } else {
		        console.error('Error al enviar los datos:', xhr.responseText);
		    }
		};

		const datosJSON = JSON.stringify(datos);
		xhr.send(datosJSON);
	} 
});

acc = document.getElementById(options[3]);
acc.addEventListener("click", function () {
	window.history.back();
	
});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

document.getElementById('miFormulario').addEventListener('submit', function(event) {
	event.preventDefault(); // Evitar que el formulario se envíe automáticamente

	const formulario = document.getElementById('miFormulario');
	const datosFormulario = new FormData(formulario);
	var tipo = getParameterByName("tipo");
	datosFormulario.append('update', "updateSi");
	datosFormulario.append('tipo', tipo);


	const xhr = new XMLHttpRequest();

	xhr.open('POST', "../app/serverAcc.inc.php", true);

	xhr.onload = function() {
		if (xhr.status === 200) {
			var respuesta = xhr.responseText;
			console.log(respuesta);
			window.location.reload();
		} else {
			console.error('Error al enviar el formulario: ' + respuesta);
		}
	};

	xhr.send(datosFormulario);
});