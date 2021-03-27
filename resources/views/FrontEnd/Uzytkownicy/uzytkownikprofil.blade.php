@extends('FrontEnd.FrontEndSzablon3')

@section('title', 'Użytkownik')
@section('content')
    <!-- login -->
    <div class="card mx-auto " style="max-width: 500px; margin-top:150px;margin:10px;">
      <div class="card-body">
        <h3 class="text-center">Profil Użytkownika</h3><br><br>
        <div>
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
                    <td><a href="{{ url('/uzytkownik/password-change') }}" class="btn btn-info float-right" role="button">Zmiana hasła</a></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- //login -->
</div>
</div>





@endsection
