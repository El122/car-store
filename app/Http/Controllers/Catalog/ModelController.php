<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Models\Cars;
use App\Models\Drive;
use App\Models\EngineType;
use App\Models\Product;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function __invoke($brand, $model, Request $request)
    {
        $filter = app()->make(ProductFilter::class, ["queryParams" => array_filter($request->query())]);
        $data = Product::with("car")->whereHas('car', function ($query) use ($brand, $model) {
            return $query->where('mark_id', '=', $brand)->where('car_id', '=', $model);
        })->filter($filter)->get();

        $drive = Drive::all();
        $engins = EngineType::all();
        $title = Cars::where("id", "=", $model)->select("model", "mark_id")->first();

        return view(
            "catalog.model",
            [
                "title" => $title->mark->name . " " . $title->model,
                "drive" => $drive,
                "engins" => $engins,
                "cars" => $data,
                "params" => $request->getQueryString()
            ]
        );
    }
}
