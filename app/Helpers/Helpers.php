<?php

namespace App\Helpers;

use Carbon\Carbon;
use DateTimeInterface;
use Exception;


class Helpers
{
    public static function parseDate($value): ?Carbon
    {
        if (empty($value)) {
            return null;
        }

        if ($value instanceof Carbon) {
            return $value;
        }
        
        if ($value instanceof DateTimeInterface) {
            return Carbon::instance($value);
        }
        
        $value = trim((string) $value);

        $formats = [
            'd/m/Y',
            'Y-m-d',
            'Y-m-d H:i:s',
            'Ymd',
        ];

        foreach ($formats as $format) {
            try 
            {
                return Carbon::createFromFormat($format, $value);
            } 
            catch (\Exception $e) {
            }
        }

        try 
        {
            return Carbon::parse($value);
        } 
        catch (\Exception $e) {
            return null;
        }
    }
}
