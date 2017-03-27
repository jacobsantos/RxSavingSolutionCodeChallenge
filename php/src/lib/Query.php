<?php
namespace JacobSantos;


class Query
{
    /**
     * Connect to PDO and return object.
     *
     * This retrieves the PDO connection info from the environment.
     *
     * @return \PDO
     * @throws \PDOException
     *   Will throw exception on failure.
     */
    public function pdo(): \PDO
    {
        $dsn = getenv('PDO_DSN');
        $username = getenv('PDO_USERNAME');
        $password = getenv('PDO_PASSWORD');
        $pdo = new \PDO($dsn, $username, $password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    /**
     * Calculate and retrieve the closest location to the point.
     *
     * Note: The distance calculation is based on a flat plane and unfortunately, the Earth is not a flat plane.
     * Ignoring the correct maths.
     *
     * Using distance formula instead of haversine.
     *
     * @param string $latitude
     *   Latitude for closest lookup
     * @param string $longitude
     *   Longitude for closest lookup.
     * @return array
     */
    public function lookup(string $latitude, string $longitude): array
    {
        // We approximate the distance using 2D distance formula. This is wrong. The better formula is costly, so we
        // aren't going to use it. The good news it that we will use this cheap-ish formula to get results that should
        // be in the area of closest.
        $query = $this->pdo()->query(sprintf('SELECT *, SQRT(SUM(POW((%.8d - `latitude`), 2), POW((%.8d - `longitude`), 2))) AS `distance` FROM `addresses`, 0 AS `miles` ORDER BY `distance` ASC LIMIT 3', $latitude, $longitude));
        $rows = $query->fetchAll(\PDO::FETCH_OBJ);

        // After we get the closest, we need to get the actual (approximate) distance in miles and add it to the object
        // Then get the closest from the available and return it. The answer will logically be the first item, but we
        // need to be sure in case. Well, technically the coordinates doesn't take into account elevation, but it's
        // math, you have to just accept some sort of precision will be lost. Either way, we need to calculate actual
        // miles between the two points.
        $closest = null;
        foreach ($rows as $row) {
            $row->miles = Math::distanceToMiles(floatval($latitude), floatval($longitude), $row->latitude, $row->longitude);
            if ($closest === null || (is_object($closest) && $row->miles < $closest->miles)) {
                $closest = $row;
            }
        }

        return $closest;
    }

}