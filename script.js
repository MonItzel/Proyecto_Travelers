const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
     
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

function showMenu() {
            
    var options = document.getElementsByClassName("option");
    console.log(options);
    Array.prototype.forEach.call(options, function(option) {
        if(option.id != "menuicon") {
            option.style.display = option.style.display == "" || option.style.display == "none" ? "block" : "none";

           
        }           
    })
}