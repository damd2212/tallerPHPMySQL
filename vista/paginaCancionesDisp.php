<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Lista de productos</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../Estilos/estilos.css"/>
  <script type="text/javascript" src="../Js/jquery.js"></script> 
  <style>
    .inicio{
    margin: 10px;
    background-color: #f6f6ff;
    width: 82%;
    position: absolute;
    top: 9%;
  left: 9%;
  }          
  </style>
</head>

<body background="../imagenes/fondo.jpg">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link disabled" href="?c=tracks&a=Listar"><?php
                print_r("Bienvenido ");
                print_r($_SESSION['FirstName']);
                ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?c=tracks&a=Listar">Mis Canciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?c=playlist&a=Listar">Playlist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?c=playlist&a=ListarPlaylistTrack">Playlist con canciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?c=tracks&a=ListarNoCompradas">Comprar canción</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?c=playlist&a=Conteo">Conteo Canciones por Playlist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cerrarSesion.php">Cerrar Sesión</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <div class="card" style="width: 90rem; margin-left: auto;margin-right: auto">
        <table class="table table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Compositor</th>
              <th scope="col">Duración</th>
              <th scope="col">Precio</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->ServiceTracks->ListarNoCompradas() as $objTrack) : ?>
              <tr>
                <td><?php echo $objTrack->Name ?></td>
                <td><?php echo $objTrack->Composer ?></td>
                <td><?php echo $objTrack->Milliseconds ?></td>
                <td><?php echo $objTrack->UnitPrice ?></td>
                <td><a href="?c=tracks&a=Comprar&Id=<?php echo $objTrack->TrackId;?>"><img src="../imagenes/shopping-cart.png">Comprar</a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
</div>
    <script>
      $('.add_compra').click(function(e){
        e.preventDefault();
        var Compra = $(this).attr('idCompra');
        alert(Compra);
      });

    </script>
</body>

</html>