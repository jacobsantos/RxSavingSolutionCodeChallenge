<?php

// Only allow POST HTTP methods. This could be extended to include GET, or PUT and PATCH.
if (!in_array(strtolower($_SERVER['REQUEST_METHOD']), ['post'])) {
    \JacobSantos\errorJSON(406, 'Allowed HTTP methods: POST');
}

$coordinates = (new \JacobSantos\RequestContent())->input();

header('Content-Type: application/json');

echo json_encode((new \JacobSantos\Query())->lookup($coordinates['latitude'], $coordinates['longitude']));

