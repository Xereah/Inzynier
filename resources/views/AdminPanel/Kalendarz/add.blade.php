@extends('layouts.app')

@section('title', 'Kategorie')
@section('content')
<form action="{{ route('task.store') }}" method="post">
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
  <input type="submit" value="Zapisz" />
</form>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
@endsection