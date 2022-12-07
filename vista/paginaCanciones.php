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
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
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
          <h5 style="text-align:center ;"> Registrar Canción</h5>

        </div>
        <div class="card-body">
          <form action="guadar_cancion.php" method="POST">
            <div class="form-group">
              <label for="lidTrack">Id Cancion</label>
              <input type="number" class="form-control" id="TrackId" name="TrackId" placeholder="Ingrese el id de la cancion" />
            </div>

            <div class="form-group">
              <label for="lName">Nombre de la cancion</label>
              <input type="text" class="form-control" id="Name" name="Name" placeholder="Ingrese el nombre de la cancion" />
            </div>

            <div class="form-group">
              <label for="lidTrack">Id album</label>
              <input type="number" class="form-control" id="TrackId" name="TrackId" placeholder="Ingrese el id de la cancion" />
            </div>

            <div class="form-group">
              <label for="lMediaTypeId">Media Type</label>
              <select class="form-select" id="MediaTypeId">
                <option selected>Seleccione una opcion</option>
                <?php

                foreach ($this->ServiceMedia->Listar() as $objMedia) {
                  echo '<option value="' . $objMedia->MediaTypeId . '">' . $objMedia->Name . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="lGenre">Genero</label><br>
              <select class="form-select" id="GenreId">
                <option selected>Seleccione una opcion</option>
                <?php
                foreach ($this->ServiceGenre->Listar() as $objGenre) {
                  echo '<option value="' . $objGenre->GenreId . '">' . $objGenre->Name . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="lComposer">Nombre col compositor</label>
              <input type="text" class="form-control" id="Composer" name="Composer" placeholder="Ingrese el nombre del compositor" />
            </div>

            <div class="form-group">
              <label for="lMilliseconds">Duracion en milisegundos</label>
              <input type="number" class="form-control" id="Milliseconds" name="Milliseconds" placeholder="Ingrese la duracion de la cancion" />
            </div>

            <div class="form-group">
              <label for="lBytes">Bytes</label>
              <input type="number" class="form-control" id="Bytes" name="Bytes" placeholder="Ingrese los bytes" />
            </div>

            <div class="form-group">
              <label for="lUnitPrice">Precio unitario</label>
              <input type="number" class="form-control" id="UnitPrice" name="UnitPrice" placeholder="Ingrese el precio unitario" />
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar Cancion</button>
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