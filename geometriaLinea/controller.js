
    function actulizarC() {
    if(document.forms["cuadranteForm"]["punto1x"].value!="" && document.forms["cuadranteForm"]["punto1y"].value !="" && document.forms["cuadranteForm"]["punto2x"].value != "" && document.forms["cuadranteForm"]["punto2y"].value != ""){
        var punto1x =parseFloat(document.forms["cuadranteForm"]["punto1x"].value);
        var punto1y =parseFloat(document.forms["cuadranteForm"]["punto1y"].value);
        var punto2x =parseFloat(document.forms["cuadranteForm"]["punto2x"].value);
        var punto2y =parseFloat(document.forms["cuadranteForm"]["punto2y"].value);
        var parametros = {
            "punto1x": punto1x,
            "punto1y": punto1y,
            "punto2x":punto2x,
            "punto2y":punto2y,
            "act": "actualizar"
        };
        $.ajax({
            type: "POST",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                var jsonData = JSON.parse(response);
                alert("Punto Uno X: "+ jsonData.puntoux+ ", Punto Uno Y : "+jsonData.puntouy + ", Punto Dos X "+ jsonData.puntodx + " , Punto Dos y " + jsonData.puntody);
            }
        });
    }else{
        alert("debe llenar todos los campos")
    }


    }

function ubicacion() {
    if(document.forms["cuadranteForm"]["punto1x"].value!="" && document.forms["cuadranteForm"]["punto1y"].value !="" && document.forms["cuadranteForm"]["punto2x"].value != "" && document.forms["cuadranteForm"]["punto2y"].value != ""){
        var punto1x =parseFloat(document.forms["cuadranteForm"]["punto1x"].value);
        var punto1y =parseFloat(document.forms["cuadranteForm"]["punto1y"].value);
        var punto2x =parseFloat(document.forms["cuadranteForm"]["punto2x"].value);
        var punto2y =parseFloat(document.forms["cuadranteForm"]["punto2y"].value);
        var parametros = {
            "punto1x": punto1x,
            "punto1y": punto1y,
            "punto2x":punto2x,
            "punto2y":punto2y,
            "posicion": "posicion"
        };
        $.ajax({
            type: "POST",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                var jsonData = JSON.parse(response);
                alert("Ubicacion " + jsonData.success);
            }
        });
    }else{
            alert("debe llenar todos los campos")
        }

    }

