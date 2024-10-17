
/*
var object = {
   // productsCount: 10,
    "products": [
        {
            name: "Celular",
            id: "1", 
            img: "./assets/cel.jpg",
            price: 15345,
        },
        {
            name: "Computadora",
            id: "2", 
            img: "./assets/c.jpg",
            price: 20550,
        },
        {
            name: " Audifonos",
            id: "3", 
            img: "./assets/au.jpg",
            price: 1050,
        },
        {
            name: "Libreta",
            id: "4", 
            img: "./assets/lib.png",
            price: 50,
        },
        {
            name: "Mochila",
            id: "5", 
            img: "./assets/m.jpg",
            price: 1000,
        },
        {
            name: "Lapicero",
            id: "6", 
            img: "./assets/lapi.png",
            price: 10,
        },
        {
            name: "Cargador",
            id: "7", 
            img: "./assets/carga.jpg",
            price: 650,
        },
        {
            name: "Perfume",
            id: "8", 
            img: "./assets/p.jpg",
            price: 1800,
        },
        {
            name: "Protector",
            id: "9", 
            img: "./assets/protect.jpg",
            price: 320,
        },
        {
            name: "Tablet",
            id: "10", 
            img: "./assets/t.jpg",
            price: 2250,
        },  
        {
            name: "Blusa",
            id: "10", 
            img: "./assets/blusa.jpg",
            price: 2250,
        },  
        
    ]
}
*/



var products = [];
var nombre = [];
var valor = [];
var click_limit = [];
for(i = 0;i < object.products.length; i++) {
    click_limit[i] = 0;
    nombre[i] = object.products[i].name;
    valor[i] = object.products[i].price;
}
localStorage.setItem("precio", JSON.stringify(valor));
localStorage.setItem("nombre", JSON.stringify(nombre));

for(i = 0;i < object.products.length; i++) {
   
    var newDiv = document.createElement('div');
   
    var priceDiv = document.createElement('div');
    var titleDiv = document.createElement('div');
    var stockDiv = document.createElement('div');
  
    var add_cart = document.createElement('button');

    
    newDiv.classList.add("New_Div");
    newDiv.className = "New_Div";
    newDiv.id = "extraDiv" + i;
    add_cart.id = "button" + i;
    console.log(add_cart.id);
    add_cart.addEventListener("click", function(i) {
        
        return function(){
            if (click_limit[i] == object.products[i].quantity - 1) {
                
                document.getElementById("button" + i).disabled = true;
            }
           
            click_limit[i]++;
            
            localStorage.setItem("items_bought", JSON.stringify(click_limit));
        }
      }(i))
    
    newDiv.style.margin = "15px";
    newDiv.style.display = "inline-block";
   /* newDiv.style.flex = "row";
    
    newDiv.style.flex = wrap;
    */
    newDiv.style.height = "400px";
    newDiv.style.width = "400px";
    newDiv.style.border = "3px solid";
    newDiv.style.padding = "15px";
    newDiv.style.borderRadius = "18px";
    newDiv.style.position = "relative";
    add_cart.style.position = "absolute";
    add_cart.style.bottom = "0";
    add_cart.style.backgroundColor = "rgb(48, 158, 211)";
    add_cart.style.border = "none";
    add_cart.style.margin = "10px";
    add_cart.style.color = "white";
    add_cart.textContent = "Agregar al carrito";
    titleDiv.textContent = object.products[i].name;
    priceDiv.textContent = "$" + object.products[i].price + ".00";
   
    newDiv.appendChild(titleDiv);
    newDiv.appendChild(priceDiv);
    newDiv.appendChild(stockDiv);
    newDiv.appendChild(add_cart);
    document.body.appendChild(newDiv);
   
    var imgDivs = document.createElement('div');
    imgDivs.style.width = "400px";
    imgDivs.style.float = "left";
    imgDivs.style.marginTop = "20px";
    imgDivs.style.marginLeft = "20px";
    imgDivs.style.height = "250px";
    
    var img = document.createElement("img");
    img.style.maxWidth = "100%";
    img.style.maxHeight = "100%";
    img.src = object.products[i].img;
    imgDivs.appendChild(img);
    newDiv.appendChild(imgDivs);
}



console.log(object);
/*Lo imprime como texto plano*/
console.log(JSON.stringify(object));
window.localStorage.setItem("variable", JSON.stringify(object));


//Funcion para darle click al boton e ir a la otra pagina
function goToPage3()
{
    window.location.href = "./checkout.html";
   // function showCart(x){
        document.getElementById("products-id").style.display = "block";
    //}
  
} 


function goToindex()
{
    window.location.href = "./index.html";
} 




//variables
let allContainerCart = document.querySelector('.products');
let containerBuyCart = document.querySelector('.card-items');
let priceTotal = document.querySelector('.price-total')
let amountProduct = document.querySelector('.count-product');


let buyThings = [];
let totalCard = 0;
let countProduct = 0;

//functions
loadEventListenrs();
function loadEventListenrs(){
    allContainerCart.addEventListener('click', addProduct);

    containerBuyCart.addEventListener('click', deleteProduct);
}

function addProduct(e){
    e.preventDefault();
    if (e.target.classList.contains('btn-add-cart')) {
        const selectProduct = e.target.parentElement; 
        readTheContent(selectProduct);
    }
}

function deleteProduct(e) {
    if (e.target.classList.contains('delete-product')) {
        const deleteId = e.target.getAttribute('data-id');

        buyThings.forEach(value => {
            if (value.id == deleteId) {
                let priceReduce = parseFloat(value.price) * parseFloat(value.amount);
                totalCard =  totalCard - priceReduce;
                totalCard = totalCard.toFixed(2);
            }
        });
        buyThings = buyThings.filter(product => product.id !== deleteId);
        
        countProduct--;
    }
    loadHtml();
}

function readTheContent(product){
    const infoProduct = {
        image: product.querySelector('div img').src,
        title: product.querySelector('.title').textContent,
        price: product.querySelector('div p span').textContent,
        id: product.querySelector('a').getAttribute('data-id'),
        amount: 1
    }

    totalCard = parseFloat(totalCard) + parseFloat(infoProduct.price);
    totalCard = totalCard.toFixed(2);

    const exist = buyThings.some(product => product.id === infoProduct.id);
    if (exist) {
        const pro = buyThings.map(product => {
            if (product.id === infoProduct.id) {
                product.amount++;
                return product;
            } else {
                return product
            }
        });
        buyThings = [...pro];
    } else {
        buyThings = [...buyThings, infoProduct]
        countProduct++;
    }
    loadHtml();
    //console.log(infoProduct);
}

function loadHtml(){
    clearHtml();
    buyThings.forEach(product => {
        const {image, title, price, amount, id} = product;
        const row = document.createElement('div');
        row.classList.add('item');
        row.innerHTML = `
            <img src="${image}" alt="">
            <div class="item-content">
                <h5>${title}</h5>
                <h5 class="cart-price">${price}$</h5>
                <h6>Amount: ${amount}</h6>
            </div>
            <span class="delete-product" data-id="${id}">X</span>
        `;

        containerBuyCart.appendChild(row);

        priceTotal.innerHTML = totalCard;

        amountProduct.innerHTML = countProduct;
    });
}
 function clearHtml(){
    containerBuyCart.innerHTML = '';
 }