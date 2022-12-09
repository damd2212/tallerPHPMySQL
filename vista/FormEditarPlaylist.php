<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Playlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estilos/errors.css"/>
</head>
<body>
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
          <a class="nav-link active" href="?c=playlist&a=Listar">Playlist</a>
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
            Editar Playlist
        </h5>

        <div style="text-align: center;" class="card-body">
            <form action="?c=playlist&a=Actualizar" method="POST">
                <div class="form-group">
                    <label for="lidPlaylist">Id Playlist</label>
                    <input type="number" class="form-control" id="PlaylistId" readonly value="<?php echo $obj->PlaylistId; ?>" name="PlaylistId"/>                        
                </div>

                <div class="form-group">
                    <label for="lName">Nombre de la playlist</label>
                    <input type="text" class="form-control" value="<?php echo $obj->Name ?>" id="Name" name="Name"
                        placeholder="Ingrese el nombre de la playlist" />
                </div>

                <br>
                <input class="styled" type="button" value="Actualizar Playlist" onclick="validar()">
            </form>
            <script>    
              function validar(){
                let id = document.getElementById("PlaylistId");
                let nombre = document.getElementById("Name");
                if (id.value == '') {
                  alert('Debe ingresar el id');
                  id.focus();   
                  return;
                }
                if (nombre.value == '') {
                  alert('Debe ingresar el nombre');
                  nombre.focus();   
                  return;
                }
                document.forms[0].submit();
              }
            </script>
        </div>
    </div>
</body>
</html>