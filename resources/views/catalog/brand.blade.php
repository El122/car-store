@extends("layouts.main")

@section("content")

<main>
    <div class="container">
        <h2>Продажа новых автомобилей {{$brandInfo->name}} в Санкт-Петербурге</h2>
        @foreach($models as $item)
        <a href="{{route('catalog.model', ['brand' => $brandInfo->id, 'model' => $item->id, $params])}}" type="button" class="btn btn-primary mb-4">{{$item->model}}</a>
        @endforeach
        <hr>
        <div class="row">
            @foreach ($cars as $car)
            <div class="col-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$car->car->mark->name." ".$car->car->model}}</h5>
                        <p class="card-text mb-0"><b>Привод: </b>{{$car->drive->name}}</p>
                        <p class="card-text"><b>Тип двигателя: </b>{{$car->engineType->name}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

@endsection