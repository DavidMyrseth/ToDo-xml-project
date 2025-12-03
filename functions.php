<?php

// Leia taskid õppeaine järgi
function findBySubject($subject) {
    $xml = simplexml_load_file("data.xml");
    $result = [];

    foreach ($xml->task as $task) {
        if (strcasecmp((string)$task->dim2->subject, $subject) == 0) {
            $result[] = $task;
        }
    }
    return $result;
}


// Leia taskid tähtaja järgi
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

// Leia kõik taskid märksõna järgi (otsib kogu XML sees)
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
