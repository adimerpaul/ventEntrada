<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Compra</title>
</head>
<body>
<p>Hola! Se ha realizado una nueva compra en el cinema!</p>
<p>Los datos de la compra son:</p>
<pre>{{json_encode($compra)}}</pre>
<p>Puedes ver mas detalles en el panel de administracion.</p>
<a href="{{env('URL_FRONT')}}admin">Ir al panel de administracion</a>
<p>Saludos!</p>
</body>
</html>
