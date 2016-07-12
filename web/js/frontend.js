/**
 * Crea un contador de tiempo que se actualiza cada segundo y que muestra
 * cuánto falta para que expire la oferta.
 */
/*function muestraCuentaAtras(id, fecha) {
    var horas, minutos, segundos;
    
    var ahora = new Date();
    var fechaExpiracion = new Date(fecha.ano, fecha.mes, fecha.dia, fecha.hora, fecha.minuto, fecha.segundo);
    
    var falta = Math.floor( (fechaExpiracion.getTime() - ahora.getTime()) / 1000 );
    
    if (falta < 0) {
        cuentaAtras = '-';
    }
    else {
        horas = Math.floor(falta/3600);
        falta = falta % 3600;
        
        minutos = Math.floor(falta/60);
        falta = falta % 60;
        
        segundos = Math.floor(falta);
        
        cuentaAtras = (horas < 10    ? '0' + horas    : horas)    + 'h '
                    + (minutos < 10  ? '0' + minutos  : minutos)  + 'm '
                    + (segundos < 10 ? '0' + segundos : segundos) + 's ';
        
        setTimeout(function() {
            muestraCuentaAtras(id, fecha);
        }, 1000);
    }
    
    document.getElementById(id).innerHTML = cuentaAtras;
}*/


function muestraMsj() {
    alert('Gracias por pinchar');
}
window.onload = function() {
    document.getElementById("pincha").onclick = muestraMsj;
    document.getElementById("seccion").onmouseover = resalta;
    document.getElementById("seccion").onmouseout = resalta;
}

function resalta(elEvento) {
    var evento = elEvento || window.event;
    switch(evento.type) {
        case 'mouseover':
            this.style.borderColor = 'black';
            break;
        case 'mouseout':
            this.style.borderColor = 'silver';
            break;
    }
}

function permite(elEvento, permitidos) {
    var numeros = "0123456789";
    var letras = " abcdefghijklmnñopqrstuvwxyz";
    var especiales = [8, 46];
    
    switch(permitidos) {
        case 'num':
            permitidos = numeros;
            break;
        case 'let':
            permitidos = letras;
            break;
    }
    var evento = elEvento || windows.vent;
    var codigoCaracter = evento.charCode || evento.keyCode;
    var letra = String.fromCharCode(codigoCaracter);
    
    var tecla_especial = false;
    for(var i in especiales) {
        if(codigoCaracter == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    
    return permitidos.indexOf(letra) != -1 || tecla_especial;
}

var año = document.getElementById("ano").value;
var mes = document.getElementById("mes").value;
var dia = document.getElementById("dia").value;

valor = new Date (año, mes, dia);

if( !isNaN(valor) ) {
    return false;
}