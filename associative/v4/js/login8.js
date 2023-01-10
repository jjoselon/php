if (document.readyState !== 'loading') {

} else {
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('formAuthenticationUser').addEventListener("submit", function (e) {
            e.preventDefault();
            const data = {
                nickname: document.getElementById("nickname").value,
                password: document.getElementById("password").value
            };

            postData('./check_login.php', JSON.stringify(data))
                .then(response => {
                    // Manipulate response here
                    console.log("response: ", response); // JSON data parsed by `data.json()` call
                    if (response.OK) {
                        window.document.location = response.RedirectURI;
                    } else {
                        alert("credenciales incorrectas")
                        //const myalert = new lialert(response.Message);
                        //myalert.show()
                    }
                });
        });
    })
}