document.getElementById("form-new-cuenta").addEventListener("submit", (e) => {

    e.preventDefault();

    var cuentaData = {

        nickname: document.getElementById("nickname").value,
        password: document.getElementById("password").value,
        email: document.getElementById("email").value,
        telefono: document.getElementById("telefono").value,

        };

    postData("../php/crear_cuenta.php", cuentaData).then( response => {

        window.alert(response.Message);
        window.document.location = response.RedirectURI;

    })

});