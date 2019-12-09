function recargarCafe() {
    var cafe = parseFloat(document.getElementById("cafeRe").value);
    var ingresos = parseFloat(document.getElementById("ingresos").innerHTML);
    var egresos = parseFloat(document.getElementById("egresos").innerHTML);
    var precioc  = parseFloat("10");
    var parametros = {
        "cafe": cafe,
        "ingresos": ingresos,
        "egresos":egresos,
        "precioC":precioc,
        "funcion": "cafe"
    };
    $.ajax({
        type: "POST",
        url: 'control.php',
        data: parametros,
        success: function (response) {
            var jsonData = JSON.parse(response);
            document.getElementById('cafe').innerHTML = jsonData.success;
            document.getElementById('gananciasB').innerHTML = jsonData.gananciasB;
            document.getElementById('neto').innerHTML = jsonData.gananciasN;
            document.getElementById('impuestos').innerHTML = jsonData.impuestos;
            document.getElementById('egresos').innerHTML = jsonData.egresos;

        }
    });
}
   function init() {
        var parametros = {
            "funcion": "ini"
        };
        $.ajax({
            type: "GET",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                var jsonData = JSON.parse(response);
                document.getElementById('cafe').innerHTML = jsonData.cafe;
                document.getElementById('azucar').innerHTML = jsonData.azucar;
                document.getElementById('vasos').innerHTML = jsonData.vasos;
                document.getElementById('egresos').innerHTML = jsonData.egresos;
                document.getElementById('ingresos').innerHTML = jsonData.ingresos;
                document.getElementById('gananciasB').innerHTML = jsonData.ganancias;
                document.getElementById('base').innerHTML = jsonData.base;
                document.getElementById('impuestos').innerHTML = jsonData.impuestos;

            }

        });
    }

    function prepararCafe() {
        var x =parseFloat(document.forms["prepararCafeForm"]["tipo"].value);
        var y =parseFloat(document.forms["prepararCafeForm"]["dulce"].value);
        var ccafe= parseFloat(document.getElementById('cafe').innerHTML);
        var cazucar = parseFloat(document.getElementById('azucar').innerHTML);
        var cvasos = parseFloat(document.getElementById('vasos').innerHTML);
        var egresos = parseFloat(document.getElementById('egresos').innerHTML);
        var ingresos = parseFloat(document.getElementById('ingresos').innerHTML);
        var gananciasB =parseFloat(document.getElementById('gananciasB').innerHTML);
        var precioBase = parseFloat(document.getElementById('base').innerHTML);
        var impuestos = parseFloat(document.getElementById('impuestos').innerHTML);
        var neto = parseFloat(document.getElementById('neto').innerHTML);

        console.log(x,y);
        var parametros = {
            "x": x,
            "y": y,
            "ccafe":ccafe,
            "cazucar":cazucar,
            "cvasos":cvasos,
            "egresos":egresos,
            "ingresos": ingresos,
            "ganaciasB": gananciasB,
            "precioBase":precioBase,
            "impuestos":impuestos,
            "neto": neto,
            "act": "preparar"
        };
        $.ajax({
            type: "POST",
            url: 'control.php',
            data: parametros,
            success: function (response) {
                console.log(response);
                var jsonData = JSON.parse(response);
                document.getElementById('precio').innerHTML = jsonData.success;
                document.getElementById('cafe').innerHTML = jsonData.cafe;
                document.getElementById('azucar').innerHTML = jsonData.azucar;
                document.getElementById('vasos').innerHTML = jsonData.vasos;
                document.getElementById('egresos').innerHTML = jsonData.egresos;
                document.getElementById('ingresos').innerHTML = jsonData.ingresos;
                document.getElementById('gananciasB').innerHTML = jsonData.ganancias;
                document.getElementById('base').innerHTML = jsonData.base;
                document.getElementById('impuestos').innerHTML = jsonData.impuestos;
                document.getElementById('neto').innerHTML = jsonData.neto;
            }
        });

    }

function fijarPrecio() {
    var precio = parseFloat(document.getElementById("cafePre").value);

    var parametros = {
        "precio": precio,
        "acto": "precio"
    };
    $.ajax({
        type: "POST",
        url: 'control.php',
        data: parametros,
        success: function (response) {
            var jsonData = JSON.parse(response);
            document.getElementById('base').innerHTML = jsonData.success;

        }
    });
    }

function recargarAzucar() {
    var azucar = parseFloat(document.getElementById("azucarRe").value);
    var egresos = parseFloat(document.getElementById("egresos").innerHTML);
    var precioc  = parseFloat("10");
    var parametros = {
        "azucar": azucar,
        "egresos":egresos,
        "precioC":precioc,
        "fun": "azucar"
    };
    $.ajax({
        type: "POST",
        url: 'control.php',
        data: parametros,
        success: function (response) {
            var jsonData = JSON.parse(response);
            document.getElementById('azucar').innerHTML = jsonData.success;
            document.getElementById('egresos').innerHTML = jsonData.egresos;
        }
    });
}
function recargarVasos() {
    var vasos = parseFloat(document.getElementById("vasosRe").value);
    var egresos = parseFloat(document.getElementById("egresos").innerHTML);
    var precioc  = parseFloat("10");
    var parametros = {
        "vasos": vasos,
        "egresos":egresos,
        "precioC":precioc,
        "func": "vasos"
    };
    $.ajax({
        type: "POST",
        url: 'control.php',
        data: parametros,
        success: function (response) {
            var jsonData = JSON.parse(response);
            document.getElementById('vasos').innerHTML = jsonData.success;
            document.getElementById('egresos').innerHTML = jsonData.egresos;
        }
    });
}

init();
// elsewhere in code