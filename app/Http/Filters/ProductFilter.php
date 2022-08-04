<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const ENGINE_TYPE = "engine_type";
    public const DRIVE = "drive";


    protected function getCallbacks(): array
    {
        return [
            self::ENGINE_TYPE => [$this, 'engine_type'],
            self::DRIVE => [$this, 'drive'],
        ];
    }

    public function engine_type(Builder $builder, $value)
    {
        $builder->where('engine_type_id', $value);
    }

    public function drive(Builder $builder, $value)
    {
        $builder->where('drive_id', $value);
    }
}
