<?php

namespace App\Utils;

use App\Models\Parcels;
use App\Models\TempParcel;

class ResiNumber {
    public static function generateResiNumber() {
        do {
            $ran = rand(10000000, 99999999);
            $resi = 'AP-' . $ran;
            $check = Parcels::where('resi_number', $resi)->first();
        } while ($check !== null);
        return $resi;
    }
    public static function generateTempResiNumber() {
        do {
            $ran = rand(1000, 9999);
            $resi = 'AP-' . $ran;
            $check = TempParcel::where('temp_resi_number', $resi)->first();
        } while ($check !== null);
        return $resi;
    }
}
