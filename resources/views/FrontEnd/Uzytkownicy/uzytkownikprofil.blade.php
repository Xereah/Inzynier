@extends('FrontEnd.FrontEndSzablon')

@section('title', 'Użytkownik')
@section('content')

<div class="container ">
<div class="col-lg-12">
<div class="w3l_banner_nav_right">
    <!-- login -->
    <div class="w3_login paneluzytkownika">
        <div class="well lead text-center text-success">{{ Session::get('message') }}</div>
        <h3>Profil Użytkownika</h3><br><br>
        <div class="w3_login_module">
            <table class="stripe">
                <tr>
                    <th>Imie</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->name }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Nazwisko</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->surname }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->email }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Numer telefonu</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->phone }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>Addres</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td>{{ $Uzytkownik->adress }}</td>
                </tr>
                <tr>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th><a href="{{ url('/uzytkownik/edit-profile') }}" class="btn btn-info" role="button">Edycja profilu</a></th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    <td><a href="{{ url('/uzytkownik/password-change') }}" class="btn btn-info" role="button">Zmiana hasła</a></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- //login -->
</div>
<div class="clearfix"></div>
</div>



</div>
</div>

@endsection
