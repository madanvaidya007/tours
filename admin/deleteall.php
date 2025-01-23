<?php

    include 'connection.php';
    $sql = "DELETE FROM clients WHERE 1";
   
    $con->query($sql);
    header('location: ./dash.php');
    exit();
?>
<script>
    alert("no record available")
</script>