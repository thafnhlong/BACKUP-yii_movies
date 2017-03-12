<?php
header('Content-Type: application/json');   
$data = array(
    [1,2,4],
    [1,2,4],
);
echo json_encode($data);
?>