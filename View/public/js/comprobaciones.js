/**
 * Autor: Diego Enrique Fontán Lorenzo
 * DNI: 77482941N
 * Fecha: 31/01/2019
 */

/**
 * Funciones de JavaScript pertenecientes a los formularios
 */

// -------------------- Comprobaciones

/**
 * Comprueba que el campo no esté vacío
 * 
 * @param campo  Campo en el cual se ejecuta la función
 * 
 * @return True si el formulario contiene algún campo vacío
 */
function comprobarVacio(campo)
{
    if(campo)
    {
        form.querySelectorAll('input[type="text"]').forEach(function(i) { if(i.value.length == 0) return true; });
        form.querySelectorAll('input[type="tel"]').forEach(function(i) { if(i.value.length == 0) return true; });
        form.querySelectorAll('input[type="date"]').forEach(function(i) { if(i.value.length == 0) return true; });
        form.querySelectorAll('input[type="password"]').forEach(function(i) { if(i.value.length == 0) return true; });
        form.querySelectorAll('select').forEach(function(i) { if(i.value.length == 0) return true; });
    }

    return false;
}

/**
 * Comprueba si el valor de un campo tiene un tamaño menor o igual al requerido
 * 
 * @param campo Campo a comprobar
 * @param size Tamaño máximo del campo
 * 
 * @return True si el campo cumple con el tamaño
 */
function comprobarTexto(campo, size)
{
    return (campo.value.length <= size);
}


/**
 * Comprueba si el valor de un campo cumple con una expresión regular
 * y además cumple con el tamaño máximo del campo
 * 
 * @param campo Campo a comprobar
 * @param exprreg Expresión regular a usar
 * @param size Tamaño máximo del campo
 * 
 * @return True si cumple con las condiciones
 */
function comprobarExpresionRegular(campo, exprreg, size)
{
    return (comprobarTexto(campo, size) ? campo.value.match(exprreg) : false);
}

/**
 * Comprueba si el campo sólamente tiene caracteres alfanuméricos
 * 
 * @param campo Campo a comprobar
 * @param size Tamaño máximo del campo
 *
 * @return True si cumple con las condiciones
 */
function comprobarAlfabetico(campo,size)
{
    return comprobarExpresionRegular(campo, "[a-zA-Z -_]*", size);
}

/**
 * Comprueba si el campo es un número entero entre un rango
 * 
 * @param campo Campo a comprobar
 * @param valormenor Cota inferior
 * @param valormayor Cota superior
 * 
 * @return True si cumple las condiciones
 */
function comprobarEntero(campo, valormenor, valormayor)
{
    var val = parseInt(campo.value);
    return (val >= valormenor && val <= valormayor);
}

/**
 * Comprueba si el campo es un número decimal entre un rango
 * 
 * @param campo Campo a comprobar
 * @param decimales Número máximo de decimales
 * @param valormenor Cota inferior
 * @param valormayor Cota superior
 * 
 * @return True si cumple las condiciones
 */
function comprobarEntero(campo, decimales, valormenor, valormayor)
{
    var val = parseFloat(campo.value).toFixed(decimales);
    return (val >= valormenor && val <= valormayor);
}

/**
 * Comprueba si el campo es un DNI
 * 
 * @param campo Campo a comprobar
 * 
 * @return True si cumple que es un DNI
 */
function comprobarDNI(campo)
{
    return comprobarExpresionRegular(campo,"[0-9]{8}[a-zA-Z]", 9);
}

/**
 * Comprueba si un campo es un número de teléfono español
 * 
 * @param campo Campo a comprobar
 * 
 * @return True si cumple que es un teléfono español
 */
function comprobarTelf(campo)
{
    return comprobarExpresionRegular(campo,"[679][0-9]{8}", 9);
}

/**
 * Comprueba si el año sigue los estándares académicos
 * y los modifica
 * 
 * @param campo Campo a comprobar
 */
function comprobarAnho(campo)
{
    if(campo)
    {
        var anhos = campo.value.split('-');
        if(anhos.length == 2)
        {
            var primero = parseInt(anhos[0]);
            var segundo = parseInt(anhos[1]);
            if(primero + 1 != segundo)
            {
                campo.value = "" + primero + "-" + (primero + 1);
            }
        }
        else if(anhos.length == 1)
        {
            var primero = parseInt(anhos[0]);
            campo.value = "" + primero + "-" + (primero + 1);
        }
    }
}

// -------------------- Submits
 
/**
 * Comprueba la subida del formulario de USUARIOS
 * 
 * @return True si cumple todos los requisitos
 */
function submitUsuario()
{
    var foto = document.getElementById('fotopersonal');
    if(foto.files.length == 0)
    {
        showModal('foto');
        return false;
    }

    return true;
}

/**
 * Comprueba el formulario del edificio
 * 
 * @param form Formulario en el cual se ejecuta la función
 * 
 * @return True si cumple los requisitos
 */
function submitEdificio(form)
{
    if(err) return _ ;

    if(!form) return false;
    return (!comprobarVacio(form) &&
        comprobarAlfabetico(form.getElementById('nombre'), 50));
}

/**
 * Comprueba el formulario del centro
 * 
 * @param form Formulario en el cual se ejecuta la función
 * 
 * @return True si cumple los requisitos
 */
function submitCentro(form)
{
    if(err) return _ ;

    if(!form) return false;
    return (!comprobarVacio(form) &&
        comprobarAlfabetico(form.getElementById('nombre'), 50) &&
        comprobarAlfabetico(form.getElementById('responsables'), 60));
}

/**
 * Comprueba el formulario del espacios
 * 
 * @param form Formulario en el cual se ejecuta la función
 * 
 * @return True si cumple los requisitos
 */
function submitEspacio(form)
{
    if(err) return _ ;

    if(!form) return false;
    return (!comprobarVacio(form) &&
        comprobarEntero(form.getElementById('superficie'), 4) &&
        comprobarEntero(form.getElementById('numinventario'), 8));
}

/**
 * Comprueba el formulario del profesor
 * 
 * @param form Formulario en el cual se ejecuta la función
 * 
 * @return True si cumple los requisitos
 */
function submitProfesor(form)
{
    if(err) return _ ;

    if(!form) return false;
    return (!comprobarVacio(form) &&
        comprobarDNI(form.getElementById('dni')) &&
        comprobarAlfabetico(form.getElementById('nombre'), 15) &&
        comprobarAlfabetico(form.getElementById('apellidos'), 30));
}

/**
 * Comprueba el formulario del titulación
 * 
 * @param form Formulario en el cual se ejecuta la función
 * 
 * @return True si cumple los requisitos
 */
function submitTitulacion(form)
{
    if(err) return _ ;

    if(!form) return false;
    return (!comprobarVacio(form) &&
        comprobarAlfabetico(form.getElementById('nombre'), 50) &&
        comprobarAlfabetico(form.getElementById('responsable'), 60));
}

// -------------------- Auxiliares

/**
 * Activa todos los inputs y selects desactivados para poder
 * mandar sus valores mediante el formulario
 * 
 * @param form Formulario en el cual se ejecuta la función
 */
function enableAll(form)
{
    if(!form) return;
    form.querySelectorAll('input').forEach(function(i) { i.disabled = false; });
    form.querySelectorAll('select').forEach(function(i) { i.disabled = false; });
}

/**
 * Muestra un mensaje de error modal
 * 
 * @param msg Mensaje a mostrar
 */
function showModal(msg)
{
    switch(msg)
    {
        case 'foto': document.getElementById('modal-msg-photo').style.display = "block"; break;
        case 'email': document.getElementById('modal-msg-email').style.display = "block"; break;
        default: break;
    }
    document.getElementById('modal').style.display = "flex";
}

/**
 * Cierra la ventana modal
 */
function closeModal(e)
{
    e.preventDefault();
    document.getElementById('modal').style.display = "none";
    document.getElementById('modal-msg-photo').style.display = "none"
    document.getElementById('modal-msg-email').style.display = "none"
    return false;
}