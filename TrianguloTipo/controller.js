
    function actulizarM() {
    if(document.forms["trianguloForm"]["lado1"].value!="" && document.forms["trianguloForm"]["lado2"].value !="" && document.forms["trianguloForm"]["lado3"].value != ""){
        var x =parseFloat(document.forms["trianguloForm"]["lado1"].value);
        var y =parseFloat(document.forms["trianguloForm"]["lado2"].value);
        var z =parseFloat(document.forms["trianguloForm"]["lado3"].value);

        var parametros = {
            "x": x,
            "y": y,
            "z":z,
            "act": "actualizar"
        };
        $.ajax({
            type: "POST",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                var jsonData = JSON.parse(response);
                alert("Lado Uno : "+ jsonData.lado1+ " Lado Dos : "+jsonData.lado2 + " Lado Tres "+ jsonData.lado3)
            }
        });
    }else{
        alert("debe llenar todos los campos")
    }


    }

function tipo() {
    if(document.forms["trianguloForm"]["lado1"].value!="" && document.forms["trianguloForm"]["lado2"].value !="" && document.forms["trianguloForm"]["lado3"].value != "") {
        var x = parseFloat(document.forms["trianguloForm"]["lado1"].value);
        var y = parseFloat(document.forms["trianguloForm"]["lado2"].value);
        var z = parseFloat(document.forms["trianguloForm"]["lado3"].value);
        var parametros = {
            "x": x,
            "y": y,
            "z": z,
            "tipo": "tipo"
        };
        $.ajax({
            type: "POST",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                var jsonData = JSON.parse(response);
                alert("El tringulo es " + jsonData.success);
            }
        });
    }else{
            alert("debe llenar todos los campos")
        }

    }

