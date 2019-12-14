function getCookie(name)
{
    // Creamos el valor de asignación
    var assign = name + "=";
    // Obtenemos las cookies
    var decodedcookies = decodeURIComponent(document.cookie);
    // Las separamos en un array
    var cookies = decodedcookies.split(';');
    // Recorremos el array en busca de la nuestra
    for(var cookie of cookies)
    {
        // Quitamos los espacios
        cookie = cookie.trim();
        // Comprobamos si nuestra cookie está
        if(cookie.indexOf(assign) == 0)
        {
            // Devolvemos su valor
            return cookie.substring(assign.length, cookie.length);
        }
    }
    // Si no está devolvemos undefined
    return undefined;
}


function setCookie(name, value)
{
    // Creamos la fecha de expiración
    var expire = new Date();
    // Hacemos que dure 30 días
    expire.setDate(expire.getDate() + (30*24*60*60*1000));
    // Añadimos la cookie
    document.cookie = name + "=" + value + ";expires=" + expire.toUTCString(); + ";path=/";
}