const btn1 = document.querySelector("#btn1")

console.log(btn1)
btn1.addEventListener('click', ()=>{
    $('p:nth(even)').css('background-color', 'orange')
    console.log($("#p1")[0].innerHTML) 
})