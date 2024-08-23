
acc = document.getElementById("reB");
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
	datosFormulario.append('nuevo', "nuevo");
    datosFormulario.append('tipo', tipo);

	const xhr = new XMLHttpRequest();

	xhr.open('POST', "../app/serverAcc.inc.php", true);

	xhr.onload = function() {
		if (xhr.status === 200) {
			window.location.href = '../';
		} else {
			let respuesta = xhr.responseText;
			console.error('Error al enviar el formulario: ' + respuesta);
		}
	};

	xhr.send(datosFormulario);
});