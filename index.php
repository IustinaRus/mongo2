<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
</head>
<body>
    <?php 
    require_once 'connection.php';
    $query = new MongoDB\Driver\Query([]);
    $rows = $client->executeQuery("flowers.flori", $query);
    ?>

    <table>
        <tr>
            <td>Nume</td>
            <td>Culoare</td>
            <td>Marime</td>
            <td>Pret</td>
            <td colspan="3">Actions</td>
        </tr>
        <?php foreach($rows as $val):?>
            <?php if((isset($val->nume))&&(isset($val->culoare))&&(isset($val->marime))&&(isset($val->pret))&& ($val->nume!="")&&($val->culoare!="")):?>
                <tr>
                    <td><?php echo $val->nume;?>
                    <td><?php echo $val->culoare;?>
                    <td><?php echo $val->marime;?>
                    <td><?php echo $val->pret;?>
                    <td><?php echo "<a href=\"view.php?id=".$val->_id."\">View</a>";?>
                    <?php echo "<a href=\"edit.php?id=".$val->_id."\">Edit</a>";?>
                    <?php echo "<a href=\"delete.php?id=".$val->_id."\" onclick=\" return confirm ('Are you sure?')\";>Delete</a>";?>
            </td>
            </tr> 
            <?php endif;?>
            <?php endforeach;?>
            </table>
            <a href="insert.php">Add a new record</a><br><br>
            <a href="search_form.php">Search</a><br>
            </body>
            </html>
