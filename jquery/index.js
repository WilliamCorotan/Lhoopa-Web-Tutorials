$("document").ready(()=>{
    
    const btn1 = document.querySelector("#btn1")
    
    console.log(btn1)
    btn1.addEventListener('click', ()=>{
        $('p:nth(even)').css('background-color', 'orange')
        console.log($("#p1")[0].innerHTML) 
        $("#div4").on("")
        
    })

    const showBtn = document.querySelector("#show-btn")
    const hideBtn = document.querySelector("#hide-btn")
    const toggleBtn = document.querySelector("#toggle-btn")

    console.log(showBtn)
    $("#show-btn").on("click", ()=>{
        console.log('show')
        $("#div4").show()
    })

    $("#hide-btn").on("click", ()=>{
        console.log("hide")
        $("#div4").hide()
    })

    $("#toggle-btn").on("click", ()=>{
        console.log("toggle")
        $("#div4").toggle()
    })
})
