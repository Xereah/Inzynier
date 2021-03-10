@extends('FrontEnd.FrontEndSzablon')

@section('title', 'Kategorie')
@section('content')

<div class="container ">
<div class="col-lg-12">
<div class="w3l_banner_nav_right">
    <!-- login -->
    <div class="w3_login">
        <h3>Edycja hasła</h3><br><br>
        <div class="danger">{{ Session::get('message') }}</div>
        <div class="w3_login_module">
            {!! Form::open(['url'=>'/uzytkownik/password-update', 'name'=>'myForm', 'onsubmit'=>'return validateForm()', 'method'=>'POST']) !!}
            <div class="form-group">
                <input type="password" name="oldPassword" id="oldPassword" required placeholder="Wpisz stare hasło" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" required placeholder="Wpisz nowe hasło" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password2" id="password2" required placeholder="Powtórz nowe hasło" class="form-control"> 
            </div>
            <input type="submit" name="c_btn" value="Zmień" class="btn btn-success">
            {!! Form::close() !!}
        </div>
    </div>
    <!-- //login -->
</div>



</div>
</div>

@endsection

@section('js-scripts')
<script>
    function validateForm() {
    var password = document.forms["myForm"]["password"].value;
    var password2 = document.forms["myForm"]["password2"].value;
    if (password != password2) {
        alert("Nowe hasła nie są takie same!");
        return false;
    }
}
</script>
@endsection