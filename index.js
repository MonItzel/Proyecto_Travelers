var passInput = document.getElementById("passInput");
var userInput = document.getElementById("userInput");
var check = document.getElementById("check");

var userSection = document.getElementById("userSection");

function login(){

    /*Validar*/

        if(!isFormValid())
        {   
            console.log("Los datos son incorrectos");
            return;
            
        }



    /*Login*/

    //Me da verdadero y falsp
    if(check.checked){
        window.localStorage.setItem("user", userInput.value);
        window.localStorage.setItem("pass", passInput.value);
        goToProducts();
    }
    else{
        window.localStorage.clear();
    }

    console.log("Login");
}

function onLoad(){

    console.log(window.localStorage.getItem("valor"));

    let user = localStorage.getItem("user");
    let pass = localStorage.getItem("pass");

    if(user != null){
        //precargar
        userInput.value = user; 
    }

    if(pass != null){
        //precargar
        userInput.value = pass; 
    }

    /*console.log(user);
    console.log(pass);*/
}

function isFormValid(){
        if(userInput.value == ""){
            let error = document.createElement("span");
            error.innerText = "El usuario no puede quedar vacio";
            error.classList.add("textError");
            
            userSection.append(error);
             return false;
            
         }
        

    return true;
    
}


//Funcion para darle click al boton e ir a la otra pagina
function goToProducts()
{
    window.location.href = "./productos.html";
} 