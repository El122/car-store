<form method="GET" action="{{url()->current()}}">
    <h3>Привод</h3>
    @foreach($drive as $item)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="drive" id="drive-{{$item->id}}" value="{{$item->id}}">
        <label class="form-check-label" for="drive-{{$item->id}}">
            {{$item->name}}
        </label>
    </div>
    @endforeach
    <hr>
    <h3>Тип двигателя</h3>
    @foreach($engins as $item)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="engine_type" id="engine-{{$item->id}}" value="{{$item->id}}">
        <label class="form-check-label" for="engine-{{$item->id}}">
            {{$item->name}}
        </label>
    </div>
    @endforeach
    <button class="btn btn-primary">Применить</button>
</form>