document.getElementById("msg").style.transition = "0.4s"

setTimeout(function(){    
    document.getElementById("msg").style.paddingTop = "0rem"
    document.getElementById("msg").style.paddingBottom = "0rem"
    document.getElementById("msg").style.opacity = "0"
    document.getElementById("msg").style.height = "0px"
    
    setTimeout(function(){
        document.getElementById("msg").remove()
    }, 1000)

}, 5000)