<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formuario Playlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="?c=tracks&a=Listar">Mis Canciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=playlist&a=Listar">Playlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=playlist&a=ListarPlaylistTrack">Playlist con canciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=tracks&a=ListarNoCompradas">Comprar canción</a>
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
    <div class="card" style="width: 20rem; margin-left: auto;margin-right: auto">
        <h5 style="text-align:center ;">
            Agregar cancion a playlist
        </h5>

        <div style="text-align: center;" class="card-body">
            <form action="?c=playlist&a=Asociar" method="POST">
                <div class="form-group">
                    <label for="lidPlaylist">Id de la cancion</label>
                    <input type="number" class="form-control" id="TrackId" name="TrackId" readonly value="<?php echo $idCancion; ?>" placeholder="Ingrese el id cancion"/>                        
                </div>

                <div class="form-group">
                    <label for="lGenre">Playlist</label><br>
                    <select class="form-select" id="PlaylistId" name="PlaylistId">
                        <option value="0">Seleccione una opcion</option>
                        <?php
                        
                            foreach( $this->ServicePlaylist->Listar() as $objP){
                                echo '<option value="'.$objP->PlaylistId.'">'.$objP->Name.'</option>';
                            } 
                        ?>
                    </select>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Guardar Playlist</button>
            </form>
        </div>
    </div>
</body>
</html>