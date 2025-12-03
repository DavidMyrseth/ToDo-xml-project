<?php
require_once "functions.php";
$xml = simplexml_load_file("data.xml");

// Kontrollime, millist otsingut kasutaja tegi
if (!empty($_GET["subject"])) {
    $tasks = findBySubject($_GET["subject"]);
}
elseif (!empty($_GET["deadline"])) {
    $tasks = findByDeadline($_GET["deadline"]);
}
elseif (!empty($_GET["keyword"])) {
    $tasks = searchKeyword($_GET["keyword"]);
}
else {
    // Kui otsingut ei tehta → näita kõiki ülesandeid
    $tasks = $xml->task;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO List</title>
</head>
<body>

<h2>TODO List</h2>

<h3>Otsing</h3>

<form method="GET">
    Otsi õppeaine järgi:
    <input type="text" name="subject">
    <button type="submit">Otsi</button>
</form>

<form method="GET">
    Otsi tähtaeg (YYYY-MM-DD):
    <input type="date" name="deadline">
    <button type="submit">Otsi</button>
</form>

<form method="GET">
    Otsi märksõna järgi:
    <input type="text" name="keyword">
    <button type="submit">Otsi</button>
</form>

<hr>

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

    <?php foreach ($tasks as $task): ?>
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

<!-- СЮДА ВСТАВЛЯТЬ JS -->
<script>
    window.onload = function () {
        document.querySelectorAll("input").forEach(input => input.value = "");
    };
</script>

</body>
</html>
