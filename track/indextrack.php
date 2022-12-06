<?php
    include('../modelo/conexion_db.php')
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <title>TrackPHP</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Canciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PlayList</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Agregar a PlayList</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    

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
                        $query = "SELECT * FROM  MediaType";
                        $resultado = mysqli_query($conn, $query);
                        while ($valores = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$valores['MediaTypeId'].'">'.$valores['Name'].'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lGenre">Genero</label><br>
                    <select class="form-select" id="GenreId">
                        <option selected>Seleccione una opcion</option>
                        <?php
                        $query = "SELECT * FROM  genre";
                        $resultado = mysqli_query($conn, $query);
                        while ($valores = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$valores['GenreId'].'">'.$valores['Name'].'</option>';
                        }
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

                <button type="submit" class="btn btn-primary">Guardar Cancion</button>
            </form>
        </div>
    </div>


</body>

</html>
