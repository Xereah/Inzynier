@extends('layouts.app')

@section('title', 'Kalendarz')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Dodawanie nowego wpisu do kalendarza</h3>
    </div>
    <form action="{{ route('task.store') }}" method="post" id="Kalendarz-form">
        <div class="card-body">
            {{ csrf_field() }}
            <label>Nazwa Wpisu</label>
            <br />
            <input type="text" name="Nazwa" class="form-control" />
            <br /><br />
            <label>Opis Wpisu</label>
            <br />
            <textarea name="Opis" class="form-control"></textarea>
            <br /><br />
            <label>Data wpisu</label>
            <br />
            <input type="date" name="Data" class="input-group" />
            <br /><br />
            <button type="submit" name="btn" class="btn btn-primary przyciskwyslij float-right">Dodaj</button>
    </form>
</div>
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
$('.date').datepicker({
    autoclose: true,
    dateFormat: "yy-mm-dd"
});
</script>
@endsection

@section('js')
{{-- Laravel Javascript Validation --}}

<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Kalendarz\StoreKalendarzRequest', '#Kalendarz-form'); !!}



@endsection