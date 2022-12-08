<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Playlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body background="../imagenes/fondo.jpg">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
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
    
    
    <h4 style="text-align:center; color: white;">Lista de Playlist</h4>
    <br>
    <h5 style="text-align: center;">
        <a href="?c=playlist&a=Formulario"><img src="../imagenes/img6.png">Nueva Playlist</a>
      </h5>
    <div class="card" style="width: 50rem; margin-left: auto;margin-right: auto">
      
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id Cancion</th>
                    <th scope="col">Nombre Cancion</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->ServicePlaylist->Listar() as $objPlaylist): ?>                        
                    <tr>
                        <td><?php echo $objPlaylist->PlaylistId ?></td>
                        <td><?php echo $objPlaylist->Name ?></td>
                        <td>
                          <a href="?c=playlist&a=FormularioUpdate&PlaylistId=<?php echo $objPlaylist->PlaylistId ?>"><img src="../imagenes/img4.png">Editar</a>
                        </td>
                        <td>
                          <a onclick="javascript: return confirm('\¿Esta seguro de eliminar esta Playlist?');"
                            href="?c=playlist&a=Eliminar&PlaylistId=<?php echo $objPlaylist->PlaylistId ?>"><img src="../imagenes/img5.png">Eliminar</a>
                        </td>
                        
                    </tr>                        
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>