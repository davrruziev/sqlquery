<?php

include "db.php";

$index = new Data();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadval</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>ClientID</th>
            <th>Date</th>
            <th>PartnerID</th>
            <th>RegID</th>
            <th>ID:300</th>
            <th>ID:301</th>
            <th>ID:302</th>
            <th>ID:303</th>
            <th>ID:304</th>
            <th>ID:306</th>
            <th>Total Price</th>
            <th>Total Count</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($index->getSelect('test') as $row)
        {
            ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['client_id']?></td>
                <td><?=$row['date']?></td>
                <td><?=$row['partner_id']?></td>
                <td><?=$row['reg_id']?></td>
                <td><?=($row['count_300']) ? $row['count_300'] : '0'?></td>
                <td><?=($row['count_301']) ? $row['count_301'] : '0'?></td>
                <td><?=($row['count_302']) ? $row['count_302'] : '0'?></td>
                <td><?=($row['count_303']) ? $row['count_303'] : '0'?></td>
                <td><?=($row['count_304']) ? $row['count_304'] : '0'?></td>
                <td><?=($row['count_306']) ? $row['count_306'] : '0'?></td>
                <td><?=$row['total_price']?></td>
                <td><?=$row['total_count']?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
