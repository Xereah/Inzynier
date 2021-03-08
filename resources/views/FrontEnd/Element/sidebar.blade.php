
  <div class="container-fluid py-3 p-5" >
    <div class="row">
        <div class="col-sm-3 " >
        <div class="list-group-item active" style="background-color:#84C639;" >Oferta</div>
    <ul class="list-group list-group-flush">
        @foreach($kategorie as $kategoria)
        <li class="list-group-item"><a class="category-item" href="/kategoria/{{ $kategoria->id }}/{{ str_replace(' ', '-', strtolower($kategoria->Nazwa)) }}">{{ $kategoria->Nazwa }} </a><i class="fas fa-chevron-right" style="float:right;"></i></li>
           @endforeach
           <hr>
           <br>
           <h3><p class="text-center">Kalendarz Wizyt na targu</p></h3>
           <br>
        <div id='calendar'></div>
     </ul>
        </div>   
      
        <main role="main" class="container " >
        
        @yield('content')
    </main>
       
        
    </div>
  
</div>
@include('FrontEnd.Element.footer')
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
                    // url : '{{ route('index.show', $task->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>
@endsection