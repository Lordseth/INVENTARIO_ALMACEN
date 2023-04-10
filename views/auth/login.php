<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia sesion con tus datos</p>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
 ?>

<form class="formulario" action="/" method="post">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Tu Email">
    </div>
    <div class="campo">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Tu Password">
    </div>
    <input class="boton" type="submit" value="Iniciar Sesion">
</form>

<div class="acciones">
    
    <a href="/olvide">Olvidaste tu password?</a>
</div>