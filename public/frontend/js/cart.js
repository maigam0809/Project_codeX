var btn_delete = document.getElementById('btn_delete');
var btn_add = document.getElementById('btn_add');
var count = document.getElementById('count');
var set_count = document.getElementById('set_count');

var cart_count = document.getElementById('cart_count');
var sum = document.getElementById('sum');
var sum_item = document.getElementById('sum_item');
var price = document.getElementById('price');
var item = document.getElementsByClassName('item');

btn_delete.addEventListener('click', x);
btn_add.addEventListener('click', y);

cart_count.addEventListener('onchange', a);
function a(){
    alert('av');
    
        console.log(item.length);
}
function x(){
    count.innerText= Number(count.innerText) - 1;
    if(Number(count.innerText) <= 1)
        count.innerText = 1;
    // console.log(count.innerText);
    set_count.value = Number(count.innerText);
    console.log(set_count.value);
}
function y(){
    count.innerText= Number(count.innerText) + 1;
    set_count.value = Number(count.innerText);
    console.log(set_count.value);
}