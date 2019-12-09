
function cambiarPrecio() {
    if (document.getElementById("pbscompra").value != "" && document.getElementById("pbsventa").value !=""){
        var pbscompra = parseFloat(document.getElementById("pbscompra").value);
        var pbsventa = parseFloat(document.getElementById("pbsventa").value);
        var parametros = {
            "pbscompra": pbscompra,
            "pbsventa": pbsventa,
            "opc1":"opc1"
        };
        $.ajax({
            type: "POST",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                var jsonData = JSON.parse(response);
                document.getElementById('bscompra').innerHTML = jsonData.bscompra;
                document.getElementById('bsventa').innerHTML = jsonData.bsventa;
                document.getElementById('bsganancia').innerHTML = jsonData.bsganancia;
                alert("se actualizo los precios del Bolivar");

            }
        });
    }else{
        alert("debe llenar todos los campos")
    }

}


function inyectarPesos() {
    if (document.getElementById("pesos").value != ""){
        var pesos = parseFloat(document.getElementById("pesos").value);
        var parametros = {
            "pesos": pesos,
            "opc2":"opc2"
        };
        $.ajax({
            type: "POST",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                var jsonData = JSON.parse(response);
                document.getElementById('pscaja').innerHTML = jsonData.pesos;
                alert("se agregaron pesos a la caja");

            }
        });
    }else{
        alert("debe llenar todos los campos")
    }

}


function inyectarBolivares() {
    if (document.getElementById("bolivares").value != ""){
        var bolivares = parseFloat(document.getElementById("bolivares").value);
        var parametros = {
            "bolivares": bolivares,
            "opc3":"opc3"
        };
        $.ajax({
            type: "POST",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                var jsonData = JSON.parse(response);
                document.getElementById('bscaja').innerHTML = jsonData.bolivares;
                alert("se agregaron bolivares a la caja");

            }
        });
    }else{
        alert("debe llenar todos los campos")
    }

}

function comprarBolivares() {
    if (document.getElementById("bscompra").innerHTML!=="0"){
        if (document.getElementById("bolivaresComprar").value !== ""){
            var bscompra =parseFloat(document.getElementById("bscompra").innerHTML);
            var bscaja =parseFloat(document.getElementById("bscaja").innerHTML);
            var pscaja =parseFloat(document.getElementById("pscaja").innerHTML);
            var bscomprados =parseFloat(document.getElementById("bscomprados").innerHTML);
            var bolivaresC = parseFloat(document.getElementById("bolivaresComprar").value);
            var parametros = {
                "bolivaresC": bolivaresC,
                "bscompra": bscompra,
                "bscaja": bscaja,
                "pscaja": pscaja,
                "bscomprados": bscomprados,
                "opc4":"opc4"
            };
            console.log(bscaja);
            $.ajax({
                type: "POST",
                url: 'control.php',
                data: parametros,
                success: function (response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success){
                        document.getElementById('bscaja').innerHTML = jsonData.bscaja;
                        document.getElementById('pscaja').innerHTML = jsonData.pscaja;
                        document.getElementById('bscomprados').innerHTML = jsonData.bscomprados;
                        alert("se compraron bolivares");
                    }else {
                        alert("no se pueden comprar bolivares");
                    }


                }
            });
        }else{
            alert("debe llenar todos los campos")
        }
    }else{
        alert("debe ingresar una cantidad correcta")
    }


}

function venderBolivares() {
    if (document.getElementById("bscompra")!=="0"){
        if (document.getElementById("bolivaresVender").value !== ""){
            var bscompra =parseFloat(document.getElementById("bscompra").innerHTML);
            var bsventa =parseFloat(document.getElementById("bsventa").innerHTML);
            var bscaja =parseFloat(document.getElementById("bscaja").innerHTML);
            var pscaja =parseFloat(document.getElementById("pscaja").innerHTML);
            var bscomprados =parseFloat(document.getElementById("bscomprados").innerHTML);
            var bsvendidos =parseFloat(document.getElementById("bsvendidos").innerHTML);
            var bolivaresV = parseFloat(document.getElementById("bolivaresVender").value);
            var parametros = {
                "bolivaresV": bolivaresV,
                "bscompra": bscompra,
                "bscaja": bscaja,
                "pscaja": pscaja,
                "bsventa": bsventa,
                "bsvendidos": bsvendidos,
                "bscomprados": bscomprados,
                "opc5":"opc5"
            };
            $.ajax({
                type: "POST",
                url: 'control.php',
                data: parametros,
                success: function (response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success){
                        document.getElementById('bscaja').innerHTML = jsonData.bsocaja;
                        document.getElementById('pscaja').innerHTML = jsonData.psocaja;
                        document.getElementById('bsvendidos').innerHTML = jsonData.bsvendidos;
                        document.getElementById('impuestos').innerHTML = jsonData.impuestos;
                        document.getElementById('ganancias').innerHTML = jsonData.ganancias;
                        alert("se vendieron bolivares");
                    }else{
                        alert("No se pueden vender boivares");
                    }


                }
            });
        }else{
            alert("debe llenar todos los campos")
        }
    }


}