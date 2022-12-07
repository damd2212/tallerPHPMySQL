<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Lista de productos</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="Estilos/estilos.css"/>
  <style>
    .inicio{
    margin: 10px;
    background-color: #f6f6ff;
    width: 78%;
    position: absolute;
    top: 10%;
  left: 10%;
  }          
  </style>
</head>

<body background="imagenes/fondo.jpg">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="cerrarSesion.php">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?c=playlist&a=Listar">Playlist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="inicio">
  <div class="container">
    <div class="row">
      <div class="col-md-4" >
      <br>  
      <div class="card">
          <h5 style="text-align:center ;"> Comprar Canción</h5>
        </div>
        <div class="card-body">
          <form action="guadar_cancion.php" method="POST">
            <div class="form-group">
              <label for="lidTrack">Id Cancion</label>
              <input type="number" class="form-control" id="TrackId" name="TrackId" placeholder="Ingrese el id de la cancion" />
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Comprar</button>
          </form>
        </div>


      </div>
      <div class="col-md-8">
        <table class="table table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Compositor</th>
              <th scope="col">Duración</th>
              <th scope="col">Precio Unitario</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->ServiceTracks->Listar() as $objTrack) : ?>
              <tr>
                <td><?php echo $objTrack->Name ?></td>
                <td><?php echo $objTrack->Composer ?></td>
                <td><?php echo $objTrack->Milliseconds ?></td>
                <td><?php echo $objTrack->UnitPrice ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


</body>

</html>