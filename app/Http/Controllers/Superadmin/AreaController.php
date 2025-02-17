<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Services\District\DistrictService;
use App\Services\Province\ProvinceService;
use App\Services\Regency\RegencyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    protected $districtService;
    protected $regencyService;
    protected $provinceService;

    public function __construct(DistrictService $districtService, RegencyService $regencyService, ProvinceService $provinceService)
    {
        $this->districtService = $districtService;
        $this->regencyService = $regencyService;
        $this->provinceService = $provinceService;
    }

    public function index(Request $request)
    {
        $areas = Area::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $areas->where('name', 'like', "%$search%");
        }

        $areasWithDetails = $areas->get()->map(function ($area) {
            $province = DB::table('provinces')->where('id', $area->id)->first();

            $regency = DB::table('regencies')->where('id', $area->id)->first();

            $districtIds = json_decode($area->district_coverage, true); // Menguraikan array JSON

            $districts = DB::table('districts')->whereIn('id', $districtIds)->get();

            return [
                'area' => $area,
                'province' => $province,
                'regency' => $regency,
                'district' => $districts,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $areasWithDetails,
        ], 200);
    }
}
