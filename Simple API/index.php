<?php

/*
If you are using Apache, make sure to use the .htaccess file provided!
For Nginx you do not need it.
*/

// Define your API endpoints and their respective actions
$endpoints = [
    '/hello' => function() {
        return ['message' => 'Hello, world!'];
    },
    '/time' => function() {
        return ['time' => date('Y-m-d H:i:s')];
    },
];

// Retrieve the requested endpoint
$request = $_SERVER['REQUEST_URI'];

// Check if the endpoint exists
if (isset($endpoints[$request])) {
    // Call the associated function for the endpoint
    $response = $endpoints[$request]();
    
    // Set response headers
    header('Content-Type: application/json');
    
    // Output the response as JSON
    echo json_encode($response);
} else {
    // Endpoint not found, return a 404 error
    http_response_code(404);
    echo json_encode(['error' => 'Endpoint not found']);
}