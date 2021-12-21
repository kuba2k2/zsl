<?php
    if (isset($_POST['film'])) {

        $id = $_POST['film'];

        $db = @mysqli_connect('localhost', 'root', '', 'dane3');
        if (!$db) {
            echo 'Błąd łączenia z bazą danych.';
            exit;
        }

        $query = 'DELETE FROM produkty WHERE id = '.$id.';';
        mysqli_query($db, $query);
        echo 'Wykonano zapytanie';
        mysqli_close($db);
    }
?>
