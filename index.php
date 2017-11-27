<?php

if(isset($_POST['id']) && $_POST['id'] != ""){
  require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'us2',
    'encrypted' => true
  );

  $pusher = new Pusher\Pusher(
    '7892267db562b6e4976b',
    '54907386b038aaf937e1',
    '436334',
    $options
  );

  //Variables del formulario

  $_data = array();
  $_data['id'] = $_POST['id'];
  $_data['producto'] = $_POST['producto'];
  $_data['precio'] = $_POST['precio'];
  $_data['asesor'] = $_POST['asesor'];

  // Simulamos que se creó en la base de datos.

  $data = json_encode($_data);

  // Publicamos en el channel de pedidos y en el evento actualizar
  $pusher->trigger('pedidos', 'actualizar', $data);
  echo "Si hay datos :D";
}
  

?>

<!DOCTYPE html>
<html>
<head>
  <title>servidor</title>
</head>
<body>
<form action="#" method="post" name="form" id="form">
  <label>id pedido</label>
  <input type="text" name="id"></input>
  <label>producto</label>
  <input type="text" name="producto"></input>
  <label>precio</label>
  <input type="text" name="precio"></input>
  <label>asesor</label>
  <input type="text" name="asesor"></input>
  <input type="submit" value="Enviar XD"></input>
  <button>Enviar</button>
</form>
</body>
</html>


