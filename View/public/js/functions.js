function enableAll(form)
{
    form.querySelectorAll('input').forEach(function(i) { i.disabled = false; });
    form.querySelectorAll('select').forEach(function(i) { i.disabled = false; });
}