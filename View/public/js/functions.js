/**
 * Autor: Diego Enrique Fontán Lorenzo
 * DNI: 77482941N
 * Fecha: 31/01/2019
 */

/**
 * Funciones de JavaScript pertenecientes a los formularios
 */

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