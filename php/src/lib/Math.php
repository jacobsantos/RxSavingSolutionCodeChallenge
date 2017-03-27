<?php
namespace JacobSantos;


class Math
{
    const EARTH_RADIUS_MILES = 3959;
    const Earth_RADIUS_KM = 6371;

    public static function distanceToMiles($latitude1, $longitude1, $latitude2, $longitude2, $radius = self::EARTH_RADIUS_MILES): float
    {
        $latitude1Radians = deg2rad($latitude1);
        $latitude2Radians = deg2rad($latitude2);
        $longitude1Radians = deg2rad($longitude1);
        $longitude2Radians = deg2rad($longitude2);

        $deltaLatitude = $latitude2Radians - $latitude1Radians;
        $deltaLongitude = $longitude2Radians - $longitude1Radians;

        $a = sin($deltaLatitude / 2) * sin($deltaLatitude / 2)
            + cos($latitude1Radians) * cos($latitude2Radians)
            *  sin($deltaLongitude / 2) * sin($deltaLongitude / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return floatval($radius) * $c;
        //return floatval($radius) * acos( sin($latitude1Radians) * sin($latitude2Radians) + cos($latitude1Radians) * cos($latitude2Radians) * cos(deg2rad($longitude1) - deg2rad($longitude2)) );
    }
}