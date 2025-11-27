<?php
$xml = simplexml_load_file("data.xml");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO List</title>
</head>
<body>

<h2>TODO List (XML → PHP → HTML)</h2>

<table border="1" cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Kuupäev</th>
        <th>Tähtaeg</th>
        <th>Õppeaine</th>
        <th>Tüüp</th>
        <th>Info</th>
        <th>Kommentaar</th>
    </tr>

    <?php foreach ($xml->task as $task): ?>
        <tr>
            <td><?= $task['id'] ?></td>
            <td><?= $task->dim1->date ?></td>
            <td><?= $task->dim1->deadline ?></td>
            <td><?= $task->dim2->subject ?></td>
            <td><?= $task->dim2->type ?></td>
            <td><?= $task->dim3->info ?></td>
            <td><?= $task->dim3->comment ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
