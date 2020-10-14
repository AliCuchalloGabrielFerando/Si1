<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema Ventas</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
   	
   	<form action="{{route('login')}}" method="post">
       @csrf
   		<img src="img/user.png" class="user">
		   <h3>Acceder</h3>
   		   <input type="text" name="email" value="{{old('email')}}" placeholder="Usuario" id="email" class="t" >
              {!! $errors->first('email', '<span style="color:red">(*):message</span>') !!}
		   <input type="password" name="password" id="password" placeholder="Contraseña" class="t">
           {!! $errors->first('password', '<span style="color:red">(*):message</span>') !!}

   		<input type="submit" value="INGRESAR" id="b">
   	</form>
</body>
</html>