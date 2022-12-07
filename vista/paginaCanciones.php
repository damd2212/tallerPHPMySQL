<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista de productos</title>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>

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