<?php

namespace App\Helpers;

use Carbon\Carbon;
use DateTimeInterface;


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
        
        if (preg_match('/^\d{2}\/\d{2}\/\d{2}$/', $value)) {
            [$day, $month, $year] = explode('/', $value);

            $year = (int) $year;

            $year = $year <= 50 
                ? 2000 + $year   // 00–50 → 2000–2050
                : 1900 + $year;  // 51–99 → 1951–1999

            return Carbon::createFromDate($year, (int)$month, (int)$day);
        }

        $formats = [
            'd/m/Y',
            'Y-m-d',
            'Y-m-d H:i:s',
            'Ymd',
        ];

        foreach ($formats as $format) {
            try 
            {
                $date = Carbon::createFromFormat($format, $value);
                
                if ($date && $date->format($format) === $value) {
                    return $date;
                }
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
