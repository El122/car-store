<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Models\CarMark;
use App\Models\Drive;
use App\Models\EngineType;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $filter = app()->make(ProductFilter::class, ["queryParams" => array_filter($request->query())]);
        $cars = Product::with("car")->filter($filter)->get();

        $drive = Drive::all();
        $engins = EngineType::all();
        $marks = CarMark::all();

        return view(
            "catalog.index",
            [
                "cars" => $cars,
                "drive" => $drive,
                "engins" => $engins,
                "marks" => $marks,
                "params" => $request->getQueryString()
            ]
        );
    }
}
