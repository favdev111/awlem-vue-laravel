<?php

namespace App\Http\Controllers\API;

use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;

class RegionsController extends Controller
{
    public function getRegions()
    {
        $regions = Region::select('id', 'name')->get();
        return response()->json($regions, 200);
    }

    public function getAreasByRegionId($regionId)
    {
        $areas = Area::select('id', 'region_id', 'name')->where('region_id', $regionId)->get();
        return response()->json($areas, 200);
    }

    public function searchForAreas(Request $request)
    {
        $areas = Area::select('id', 'region_id', 'name')->where('name', 'LIKE', '%' . $request->searchValue . '%')->get();
        return response()->json($areas,200);
    }
}
