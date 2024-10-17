

const compra = new Carrito();
const listaCompra = document.querySelector("#lista-compra tbody");
const carrito = document.getElementById('carrito');
const procesarCompraBtn = document.getElementById('procesar-compra');
const procesarCompras = document.getElementById('hola');
//const cliente = document.getElementById('cliente');
//const correo = document.getElementById('correo');
//const vaciarCarritoBtn = document.getElementById('vacia');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');


cargarEventos();

function cargarEventos() {
    document.addEventListener('DOMContentLoaded', compra.leerLocalStorageCompra());

    //Eliminar productos del carrito
    carrito.addEventListener('click', (e) => { compra.eliminarProducto(e) });

    compra.calcularTotal();

    //cuando se selecciona procesar Compra
    procesarCompraBtn.addEventListener('click', procesarCompra);

   // procesarCompras.addEventListener('click', addElement);

    carrito.addEventListener('change', (e) => { compra.obtenerEvento(e) });
    carrito.addEventListener('keyup', (e) => { compra.obtenerEvento(e) });
    
    //vaciarCarritoBtn.addEventListener('click', (e)=>{carro.vaciarCarrito(e)});
    //Al vaciar carrito
    vaciarCarritoBtn.addEventListener('click', (e)=>{carro.vaciarCarrito(e)});


}


function procesarCompra() {
     e.preventDefault();
    if (compra.obtenerProductosLocalStorage().length === 0) {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'No hay productos, selecciona alguno',
            showConfirmButton: false,
            timer: 2000
        }).then(function () {
            window.location = "index.html";
        })
    }
}


   
 


var contenedor = document.getElementById("contenedor");
var elements = [];
var cont = "subtotal";
//var id =getElementById("total");
 

function addElement(){
    
    let newId = "Muchas Gracias por su compra" ; //contador

    let newElement = { 
        id: newId,
        status: "none"
    }

    //console.log(newElement);

    let button = document.createElement("button");
    button.textContent = "Ok";
    button.style.background ="rgb(48, 158, 211)";
    button.style.float = "right";
    button.style.margin = "15px";
    button.style.border ="none";
    button.style.color = "white";
   

    let text = document.createElement("h1");
    text.textContent = newId;

    let newDiv = document.createElement("div");
    newDiv.id = newId;
    newDiv.classList.add("element");
    newDiv.append(button);
    newDiv.append(text);
    
    contenedor.append(newDiv);
    button.onclick = Elimina() ;
    
    //Añado el elemento a mi lista de elementos
    elements.push(newElement);
  // button.onclick = Elimina() ;
}

 //Elimina todos los productos
 function elim(e){
    setTimeout(() => {
        compra.vaciarLocalStorage();
        enviado.remove();
        window.location = "index.html";
    }, 2000);
    
}


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


 function Elimina() {
    // e.preventDefault();
   
    
    compra.vaciarLocalStorage();
    setTimeout(function(){

        window.location.href = "http://127.0.0.1:5500/Carrito/productos.html";
    }, 2000);
    
    enviado.remove();
    
                  
    
                       // window.location.assign("prductos.html")
                    

    
}
