document.addEventListener("DOMContentLoaded", inicializar());

function inicializar(){
    const select = document.getElementById("select");
    const btnbuscar = document.getElementById("btn-buscarporfecha");
    const inputfi = document.getElementById("fecha_inicio");
    const inputft = document.getElementById("fecha_termino");
    
};
btnbuscar.addEventListener("click", cargarSelectHabitaciones);



function cargarSelectHabitaciones(){    
    let req = new XMLHttpRequest();
    // hace la request a la api por GET
    let fi = document.getElementById("fecha_inicio").value;
    let ft = document.getElementById("fecha_termino").value;

    let url = 'http://localhost:80/lajuntaAPI/controller/RegistroController.php';
    let params = 'action=checkhabitaciones&fechaI='+fi+'&fechaT='+ft;
    req.open('POST', url, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send(params);
    req.onload = function(){
    // hace que entienda el contenido de la respuesta como un json
    let data = JSON.parse(req.responseText);

    for(index in example_array) {
        select.options[select.options.length] = new Option(example_array[index], index);
    }
    renderHTML(data);
        };
        req.send();



       
        
        // hace la request a la api por POST
        







    };



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