<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Canciones y playlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="cerrarSesion.php">Active</a>
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
          <a class="nav-link active" href="?c=playlist&a=Conteo">Conteo Canciones por Playlist</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
    </div>
  </nav>
    <br>
    
    
    <h4 style="text-align:center;">Lista de Playlist con numero de canciones</h4>
    <br>
    <div class="card" style="width: 50rem; margin-left: auto;margin-right: auto">
      
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre playlist</th>
                    <th scope="col">Numero de canciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->ServicePlaylist->ConteoPT() as $objPT): ?>                        
                    <tr>
                        <td><?php echo $objPT->PlaylistName ?></td>
                        <td><?php echo $objPT->total ?></td>                        
                    </tr>                        
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>