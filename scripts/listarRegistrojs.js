
document.addEventListener("DOMContentLoaded", inicializar());

function inicializar(){
    const tabla = document.getElementById("tabla");
    const btnAgendar = document.getElementById("btnAgendar");
};


function cargarListaRegistro(){    
    let req = new XMLHttpRequest();
    // hace la request a la api por GET
    req.open('GET', 'http://localhost:80/lajuntaAPI/controller/RegistroController.php?action=getAllRegistros');
    req.onload = function(){
    // hace que entienda el contenido de la respuesta como un json
    let data = JSON.parse(req.responseText);
    renderHTML(data);
        };
        req.send();
    };

function deleteRegistro(id){
    let deleteReq = new XMLHttpRequest();
    let url = 'http://localhost:80/lajuntaAPI/controller/RegistroController.php';
    let params = 'action=deleteRegistro&id='+id;
    // hace la request a la api por POST
    
    deleteReq.open('POST', url, true);
    deleteReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    deleteReq.onreadystatechange = function() {//Call a function when the state changes.
        if(deleteReq.readyState == 4 && deleteReq.status == 200) {
            alert(deleteReq.responseText);
        }
    }
    deleteReq.send(params);
    cargarListaRegistro();

    // Como convertir un objeto en parametros, sera util

    // var params = new Object();
    // params.myparam1 = myval1;
    // params.myparam2 = myval2;
    
    // // Turn the data object into an array of URL-encoded key/value pairs.
    // let urlEncodedData = "", urlEncodedDataPairs = [], name;
    // for( name in params ) {
    //  urlEncodedDataPairs.push(encodeURIComponent(name)+'='+encodeURIComponent(params[name]));
    // }

};



// construye el html de la tabla, luego lo envia mediante insertAdjacentHTML
function renderHTML(data){
    
    tabla.innerHTML = "";
    
let HTMLstring = "";
HTMLstring +=  "<table><tr><th>Nombre</th><th>Apellido</th><th>id_habitacion</th><th>fecha_inicio</th>";
HTMLstring +=  "<th>fecha_termino</th><th>correo</th><th>telefono</th><th>telefono_2</th><th>costo_diario</th><th>costo_total</th></tr>";
for(i = 0; i<data.length; i++){
HTMLstring += "<tr><td>"+data[i].nombre+"</td><td>"+data[i].apellido+"</td><td>"+data[i].habitacion+"</td><td>"+data[i].fecha_inicio+"</td><td>"+data[i].fecha_termino+"</td><td>"+data[i].correo+"</td><td>"+data[i].fono1+"</td><td>"+data[i].fono2+"</td><td>"+data[i].costodiario+"</td><td>"+data[i].costoTotal+"</td>";
HTMLstring += "<td><button type='button' onclick='deleteRegistro("+data[i].id+")'>Eliminar</button></td></tr>";  
};
HTMLstring += "</table>";
tabla.insertAdjacentHTML('beforeend',HTMLstring);
};