<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Playlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    
    <h5>
        <a href="?c=playlist&a=Formulario">Nueva Playlist</a>
    </h5>
    <br>
    <div class="card" style="width: 50rem; margin-left: auto;margin-right: auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id Cancion</th>
                    <th scope="col">Nombre Cancion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->ServicePlaylist->Listar() as $objPlaylist): ?>                        
                    <tr>
                        <td><?php echo $objPlaylist->PlaylistId ?></td>
                        <td><?php echo $objPlaylist->Name ?></td>
                        <td><a href="editar_tarea.php?id=<?php echo $fila['id_tarea'] ?>">Editar</a>
                            <a href="eliminar_tarea.php?id=<?php echo $fila['id_tarea'] ?>">Eliminar</a>
                        </td>
                    </tr>                        
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>