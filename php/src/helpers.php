<?php
namespace JacobSantos;

/**
 * Display JSON error message with HTTP response status code.
 *
 * This does not conform to any established JSON standard for APIs. It would be improved by using Fractal library.
 *
 * @param int $statusCode
 *   HTTP status code.
 * @param string $message
 *   Error message to be displayed as the result.
 */
function errorJSON(int $statusCode, string $message)
{
    header('Content-Type: application/json', true, $statusCode);
    echo json_encode([
        'status_code' => $statusCode,
        'error_message' => $message,
    ]);
    exit;
}

/**
 * Validate latitude and longitude similar to decimal.
 *
 * @param string $value
 *   Should be coordinate decimal value.
 * @return bool
 *   Whether the value matches decimal within the limitations of latitude and longitude.
 */
function validateCoordinate(string $value): bool
{
    return preg_match('#[-]?[0-9]{1,3}(?:[.][0-9]+)?#', $value) === 1;
}