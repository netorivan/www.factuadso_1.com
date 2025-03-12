document.getElementById("loginForm").addEventListener("submit", async function (event) {
    event.preventDefault(); // Evita que el formulario recargue la página

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
        const response = await fetch("http://localhost/www.factuadso_1.com/controllers/API_login.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password_user: password })
        });

        const data = await response.json();

        if (data.success) {
            alert("Login exitoso, redirigiendo...");
            localStorage.setItem("user", JSON.stringify(data.user));

            if (data.user.role == 1) {
                window.location.href = "/www.factuadso_1.com/index.php";

            } else {
                window.location.href = "/www.factuadso_1.com/factura.php";

            }
        } else {
            alert(data.message);
        }
    } catch (error) {
        console.error("Error en el login:", error);
        alert("Ocurrió un error en el sistema");
    }
});
