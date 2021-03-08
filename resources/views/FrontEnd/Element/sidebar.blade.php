
   <div class="container-fluid p-5">
<div class="row">
<div class="col-sm-3">
	<!-- Category -->
	<div class="single category">
		<h3 class="side-title">Kategorie</h3>
		<ul class="list-unstyled">
		  @foreach($kategorie as $kategoria)
        <li><a class="category-item" href="/kategoria/{{ $kategoria->id }}/{{ str_replace(' ', '-', strtolower($kategoria->Nazwa)) }}">{{ $kategoria->Nazwa }}<i class="fas fa-chevron-right" style="float:right;"></i> </a></li>
           @endforeach
		</ul>
   </div>
   <br>
   <h3><p class="text-center">Kalendarz Wizyt na targu</p></h3>
           <br>
   <div id='calendar'></div>
</div> 
<main role="main"  class="container col-sm-8 "  >
        
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