<?php
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'chinook'
    );

    if (isset($conn)) {
        echo 'La BD chinook esta conectada';
    }

?>