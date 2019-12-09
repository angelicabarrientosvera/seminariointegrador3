
    function actulizarR() {
    if(document.forms["rectanguloForm"]["origenx"].value!="" && document.forms["rectanguloForm"]["origeny"].value !="" && document.forms["rectanguloForm"]["alto"].value != "" && document.forms["rectanguloForm"]["ancho"].value != ""){
        var orix =parseFloat(document.forms["rectanguloForm"]["origenx"].value);
        var oriy =parseFloat(document.forms["rectanguloForm"]["origeny"].value);
        var cox =parseFloat(document.forms["rectanguloForm"]["coordenadax"].value);
        var coy =parseFloat(document.forms["rectanguloForm"]["coordenaday"].value);
        var alto =parseFloat(document.forms["rectanguloForm"]["alto"].value);
        var ancho =parseFloat(document.forms["rectanguloForm"]["ancho"].value);

        var parametros = {
            "orix": orix,
            "oriy": oriy,
            "alto":ancho,
            "ancho":ancho,
            "act": "actualizar"
        };
        $.ajax({
            type: "POST",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                var jsonData = JSON.parse(response);
                alert("Origen X : "+ jsonData.origenx+ " Origen Y : "+jsonData.origeny + " Ancho "+ jsonData.ancho + " alto " + jsonData.alto);
            }
        });
    }else{
        alert("debe llenar todos los campos")
    }


    }

function ubicacion() {
    if(document.forms["rectanguloForm"]["origenx"].value!="" && document.forms["rectanguloForm"]["origeny"].value !="" && document.forms["rectanguloForm"]["alto"].value != "" && document.forms["rectanguloForm"]["ancho"].value != "" && document.forms["rectanguloForm"]["coordenadax"].value != "" && document.forms["rectanguloForm"]["coordenaday"].value != ""){
        var orix =parseFloat(document.forms["rectanguloForm"]["origenx"].value);
        var oriy =parseFloat(document.forms["rectanguloForm"]["origeny"].value);
        var cox =parseFloat(document.forms["rectanguloForm"]["coordenadax"].value);
        var coy =parseFloat(document.forms["rectanguloForm"]["coordenaday"].value);
        var alto =parseFloat(document.forms["rectanguloForm"]["alto"].value);
        var ancho =parseFloat(document.forms["rectanguloForm"]["ancho"].value);
        var parametros = {
            "orix": orix,
            "oriy": oriy,
            "alto":ancho,
            "ancho":ancho,
            "cox":cox,
            "coy": coy,
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

