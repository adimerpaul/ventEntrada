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
<div>Hola! Se ha realizado una nueva compra en el cinema!</div>
{{--<p>Los datos de la compra son:</p>--}}
<div>
    <b>Fecha emision: </b> {{$compra->fechaEmision}}<br>
    <b>Monto: </b> {{$compra->montoTotal}}<br>
    <b>Usuario: </b> {{$compra->user->name}}<br>
    <b>Correo: </b> {{$compra->user->email}}<br>
    <b>Pelicula: </b> {{$movie->title}}<br>
    <b>Funcion: </b> {{$cartelera->horaInicio}}<br>
    <b>Sala: </b> {{$sala->nombre}}<br>
{{--    <b>Asientos: </b> {{$ticketsVendidos}}<br>--}}
    @foreach($ticketsVendidos as $ticket)
        <b>Asiento: </b> {{$ticket}}<br>
    @endforeach
</div>
<p>Puedes ver mas detalles en el panel de administracion.</p>
<a href="{{env('URL_FRONT')}}admin">Ir al panel de administracion</a>
<p>Saludos!</p>
</body>
</html>
