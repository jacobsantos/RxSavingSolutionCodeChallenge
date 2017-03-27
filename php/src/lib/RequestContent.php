<?php
namespace JacobSantos;

/**
 * Class RequestContent
 *
 * Allow retrieving input from request by json or post data content types.
 *
 * Content-Types 'application/json' or 'application/x-www-form-urlencoded' are supported. Attempts to JSON decode if
 * there is no content type and POST data is not available.
 *
 * @package JacobSantos
 */
class RequestContent
{
    const LATITUDE = 'latitude';
    const LONGITUDE = 'longitude';

    const JSON_CONTENT_TYPE = 'application/json';
    const POST_DATA_CONTENT_TYPE = 'application/x-www-form-urlencoded';

    /**
     * Attempt based on content-type header and default to JSON.
     *
     * @return array
     */
    public function input(): array
    {
        switch (strtolower($_SERVER['CONTENT_TYPE'])) {
            case self::JSON_CONTENT_TYPE:
                return $this->json();
            case self::POST_DATA_CONTENT_TYPE:
                return $this->postData();
            default:
                return $this->json();
        }
    }

    /**
     * Process input as JSON.
     *
     * @return array
     */
    public function json(): array
    {
        try {
            // We don't trust content length, because that could be wrong.
            // The JSON we need should fit into 100 characters. Actually about two-thirds that, but we should allow
            // extra to not be too strict.
            $raw = file_get_contents('php://input', false, null, 0, 100);

            $postData = json_decode($raw, true);

            if (!array_key_exists(self::LATITUDE, $postData) || !array_key_exists(self::LONGITUDE, $postData)) {
                errorJSON(406, "must include 'latitude' and 'longitude'");
            }

            if ( !validateCoordinate((string) $postData[self::LATITUDE]) ) {
                errorJSON(406, "latitude is incorrect; must be decimal");
            }

            if ( !validateCoordinate((string) $postData[self::LONGITUDE]) ) {
                errorJSON(406, "longitude is incorrect; must be decimal");
            }

            return [
                self::LATITUDE => (string) $postData[self::LATITUDE],
                self::LONGITUDE => (string) $postData[self::LONGITUDE],
            ];
        } catch (\Exception $e) {
            //errorJSON(500, 'could not process JSON');
            errorJSON(500, $e->getMessage());
        }
    }

    /**
     * Process input as post data.
     *
     * @return array
     */
    public function postData(): array
    {
        if (!array_key_exists(self::LATITUDE, $_POST) || !array_key_exists(self::LONGITUDE, $_POST)) {
            errorJSON(406, "must include 'latitude' and 'longitude'");
        }

        if ( !validateCoordinate((string) $_POST[self::LATITUDE]) ) {
            errorJSON(406, "latitude is incorrect; must be decimal");
        }

        if ( !validateCoordinate((string) $_POST[self::LONGITUDE]) ) {
            errorJSON(406, "longitude is incorrect; must be decimal");
        }

        return [
            self::LATITUDE => (string) $_POST[self::LATITUDE],
            self::LONGITUDE => (string) $_POST[self::LONGITUDE],
        ];
    }
}