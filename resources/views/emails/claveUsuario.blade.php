<!DOCTYPE html>
<html>
<head>
    <title>AirWay</title>
</head>
<body>
    @if(!$recuperacion)
    <h1>¡Bienvenido a AirWay!</h1>
    @else
    <h1>¡Recuperación de contraseña de AirWay!</h1>
    @endif
    <p>Estimado {{$nombre}}, te enviamos tu clave de acceso: {{$clave}}</p>
    <p>Ahora puede acceder a la APP MÓVIL </p>
</body>
</html>