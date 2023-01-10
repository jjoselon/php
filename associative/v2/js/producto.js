document.getElementById("form-new-producto").addEventListener("submit", (e) => {
    e.preventDefault();
    var productoData = {
        nombre: document.getElementById("nombre").value,
        detalle: document.getElementById("detalle").value,
        cantidad: document.getElementById("cantidad").value,
        precio: document.getElementById("precio").value,
    };
    postData("../php/crear_producto.php", productoData).then( response => {
        console.log(response);
    })
});