<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Models\CarMark;
use App\Models\Cars;
use App\Models\Drive;
use App\Models\EngineType;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __invoke($brand, Request $request)
    {
        $filter = app()->make(ProductFilter::class, ["queryParams" => array_filter($request->query())]);
        $cars = Product::with("car")->whereHas('car', function ($query) use ($brand) {
            return $query->where("mark_id", "=", $brand);
        })->filter($filter)->get();

        $brandInfo = CarMark::where("id", "=", $brand)->select("name", "id")->first();
        $models = Cars::where("mark_id", "=", $brand)->get();
        $drive = Drive::all();
        $engins = EngineType::all();

        return view(
            "catalog.brand",
            [
                "brandInfo" => $brandInfo,
                "cars" => $cars,
                "drive" => $drive,
                "engins" => $engins,
                "models" => $models,
                "params" => $request->getQueryString()
            ]
        );
    }
}
