let total = 0;
let precioTotalProducto = document.getElementsByClassName('totalProducto');
let pagarTotalEnEuros = document.getElementById('total');
//console.log(precioTotalProducto);

for(let precioTotal of precioTotalProducto){
    total += parseInt(precioTotal.innerHTML);
}

pagarTotalEnEuros.innerHTML = total + '€';