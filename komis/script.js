const wyb_marka = document.getElementById('wyb_marka');
const wyb_od = document.getElementById('wyb_od');
const wyb_do = document.getElementById('wyb_do');
const od_range = document.getElementById('od_range');
const do_range = document.getElementById('do_range');
const btn_pokaz = document.getElementById('btn_pokaz');
const odp = document.getElementById('od');
const dop = document.getElementById('do');
const lista = document.getElementById('lista');



function ustaw()
{
    wyb_od.innerHTML = od_range.value;
    odp.value = od_range.value;
    wyb_do.innerHTML = do_range.value;
    dop.value = do_range.value;
    wyb_marka.innerHTML = lista.value;
}

od_range.addEventListener('input', function(){
    ustaw();
})
do_range.addEventListener('input', function(){
    ustaw();
})
lista.addEventListener('input', function(){
    ustaw();
})