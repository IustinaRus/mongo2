<?php 
require_once 'connection.php';

$bulk = new MongoDB\Driver\BulkWrite;
$id = new \MongoDB\BSON\ObjectID($_GET['id']);
$filter = ['_id' => $id];

$bulk->delete($filter);

$client->executeBulkWrite('flowers.flori',$bulk);

header('location:index.php');
?>