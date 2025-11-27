<?php

// Otsi taskid õppeaine järgi
function findBySubject($subject) {
    $xml = simplexml_load_file("data.xml");
    $result = [];
    foreach ($xml->task as $task) {
        if ((string)$task->dim2->subject === $subject) {
            $result[] = $task;
        }
    }
    return $result;
}

// Otsi taskid tähtaja järgi
function findByDeadline($deadline) {
    $xml = simplexml_load_file("data.xml");
    $result = [];
    foreach ($xml->task as $task) {
        if ((string)$task->dim1->deadline === $deadline) {
            $result[] = $task;
        }
    }
    return $result;
}

// Otsi märksõna järgi (otsi kõikjal)
function searchKeyword($keyword) {
    $xml = simplexml_load_file("data.xml");
    $result = [];
    foreach ($xml->task as $task) {
        if (strpos(strtolower($task->asXML()), strtolower($keyword)) !== false) {
            $result[] = $task;
        }
    }
    return $result;
}
