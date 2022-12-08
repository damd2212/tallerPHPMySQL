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
    <br>
    <div class="card" style="width: 20rem; margin-left: auto;margin-right: auto">
        <h5 style="text-align:center ;">
            Registrar Playlist
        </h5>

        <div style="text-align: center;" class="card-body">
            <form action="?c=playlist&a=Guardar" method="POST">
                <div class="form-group">
                    <label for="lidPlaylist">Id Playlist</label>
                    <input type="number" class="form-control" id="PlaylistId" name="PlaylistId" placeholder="Ingrese el id de la playlist"/>                        
                </div>

                <div class="form-group">
                    <label for="lName">Nombre de la playlist</label>
                    <input type="text" class="form-control" id="Name" name="Name"
                        placeholder="Ingrese el nombre de la playlist" />
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Guardar Playlist</button>
            </form>
        </div>
    </div>
</body>
</html>