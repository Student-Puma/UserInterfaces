function traducir(idioma)
{
    // Comprobamos si se ha efectuado un cambio de idioma
    if(idioma === undefined)
    {
        // Comprobamos si existe una cookie con el idioma
        var cookie = getCookie('idioma');
        idioma = cookie === undefined ? 'es' : cookie;
    }

    // Asignamos la cookie con el idioma actual
    setCookie('idioma',idioma);

    // Comprobamos los idiomas disponibles
    if(idioma !== 'es' && idioma !== 'en' && idioma !== 'gl')
        return false;
    
    // Obtenemos las traducciones
    var locale = strings[idioma]

    // Traducimos todas las coincidencias
    for(var clave in locale)
    {
        // Obtenemos todos los elementos HTML con esa clave
        var elem = document.getElementsByClassName("trad_" + clave);
        // Iteramos sobre los elementos
        for(var elemento of elem)
        {
            elemento.innerHTML = locale[clave];
        }
    }
    return true;   
}
