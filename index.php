<style>
    body {
        background-image: url('image/fond_mad2.avif');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;
        margin: 0;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

  /*  .phone-number {
        background: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        width: 300px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
*/
    .logo {
        max-width: 200px;
        /* Ajusta el tamaño del logo según tus necesidades */
    }

    .login-button {
        background: transparent;
        border: 2px solid white;
        color: white;
        padding: 10px 20px;
        font-size: 50px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        width: 500px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .login-button:hover {
        background: white;
        color: black;
        transition: 0.3s;
    }

    /* CSS anterior */

    .hidden-view {
        display: none;
        /* Oculta la vista adicional inicialmente */
        background: rgba(255, 255, 255, 0.9);
        /* Fondo semitransparente para la vista adicional */
        color: black;
        padding: 20px;
    }

    .footer {
        background: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
        color: #fff;
        padding: 10px;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    @media (max-width: 768px) {
        .footer {
            position: relative;
        }
    }
</style>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="#">
</head>

<body>
    <div class="container">
        <!-- Contenido de tu página -->
        <!--<div class="phone-number">Telefono: +1 123-456-7890</div>-->
        <img src="image/log.png" alt="Logo" class="logo">
        <button></button>
        <a class="login-button" id="showViewButton" href="login.php">INICIAR SESION </a>

    </div>
    <div class="content">
        <!-- Contenido de tu sitio web -->

        <div class="footer">
            <p>Contacto: ejemplo@email.com</p>
            <p>Teléfono: (123) 456-7890</p>
        </div>
    </div>

</body>

</html>