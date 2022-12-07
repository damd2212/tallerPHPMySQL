<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista de productos</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
    <br>
    <div class="card" style="width: 20rem">
        <h5 style="text-align:center ;"> Registrar Cancion</h5>

        <div  class="card-body">
            <form action="guadar_cancion.php" method="POST">
                <div class="form-group">
                    <label for="lidTrack">Id Cancion</label>
                    <input type="number" class="form-control" id="TrackId" name="TrackId"
                        placeholder="Ingrese el id de la cancion" />
                </div>

                <div class="form-group">
                    <label for="lName">Nombre de la cancion</label>
                    <input type="text" class="form-control" id="Name" name="Name"
                        placeholder="Ingrese el nombre de la cancion" />
                </div>

                <div class="form-group">
                    <label for="lidTrack">Id album</label>
                    <input type="number" class="form-control" id="TrackId" name="TrackId"
                        placeholder="Ingrese el id de la cancion" />
                </div>

                <div class="form-group">
                    <label for="lMediaTypeId">Media Type</label>
                    <select class="form-select" id="MediaTypeId">
                        <option selected>Seleccione una opcion</option>
                        <?php
                        /* $query = "SELECT * FROM  MediaType";
                        $resultado = mysqli_query($conn, $query);
                        while ($valores = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$valores['MediaTypeId'].'">'.$valores['Name'].'</option>';
                        } */
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lGenre">Genero</label><br>
                    <select class="form-select" id="GenreId">
                        <option selected>Seleccione una opcion</option>
                        <?php
                        /* $query = "SELECT * FROM  genre";
                        $resultado = mysqli_query($conn, $query);
                        while ($valores = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$valores['GenreId'].'">'.$valores['Name'].'</option>';
                        } */
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lComposer">Nombre col compositor</label>
                    <input type="text" class="form-control" id="Composer" name="Composer"
                        placeholder="Ingrese el nombre del compositor" />
                </div>

                <div class="form-group">
                    <label for="lMilliseconds">Duracion en milisegundos</label>
                    <input type="number" class="form-control" id="Milliseconds" name="Milliseconds"
                        placeholder="Ingrese la duracion de la cancion" />
                </div>

                <div class="form-group">
                    <label for="lBytes">Bytes</label>
                    <input type="number" class="form-control" id="Bytes" name="Bytes"
                        placeholder="Ingrese los bytes" />
                </div>
                
                <div class="form-group">
                    <label for="lUnitPrice">Precio unitario</label>
                    <input type="number" class="form-control" id="UnitPrice" name="UnitPrice"
                        placeholder="Ingrese el precio unitario" />
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Guardar Cancion</button>
            </form>
        </div>
    </div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Compositor</th>
      <th scope="col">Duración</th>
      <th scope="col">Precio Unitario</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($this->ServiceTracks->Listar() as $objTrack): ?>                        
                            <tr>
                                <td><?php echo $objTrack->Name ?></td>
                                <td><?php echo $objTrack->Composer ?></td>
                                <td><?php echo $objTrack->Milliseconds ?></td>
                                <td><?php echo $objTrack->UnitPrice ?></td>
                            </tr>                        
                        <?php endforeach ?>
  </tbody>
</table>
    </body>

</html>