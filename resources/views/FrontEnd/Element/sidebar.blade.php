
  <div class="container-fluid py-5">
    <div class="row">
        <div class="col-sm-3 ">
        <div class="list-group-item active" style="background-color:grey;" >Oferta</div>
    <ul class="list-group list-group-flush">
        @foreach($kategorie as $kategoria)
        <li class="list-group-item"><a class="category-item" href="/kategoria/{{ $kategoria->id }}/{{ str_replace(' ', '-', strtolower($kategoria->Nazwa)) }}">{{ $kategoria->Nazwa }}</a></li>
           @endforeach
           <br>
           <h3>Kalendarz</h3>
        <div id='calendar'></div>
     </ul>
        </div>
        <div class="col-sm-9">
        <img src="{{url('/Zdjecie/baner1.jpg')}}" style="height:300px" class="d-block w-100" alt="..." />
        <main role="main" class="container padding-top-content py-5" >
        
        @yield('content')
    </main>
        </div>
        @include('FrontEnd.Element.footer')
    </div>
</div>
@section('js-scripts')
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="{{ asset('js/calendar2.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/calendar.js') }}"></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($tasks as $task)
                {
                    title : '{{ $task->Nazwa }}',
                    start : '{{ $task->Data }}',
                    url : '{{ route('task.show', $task->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>
@endsection