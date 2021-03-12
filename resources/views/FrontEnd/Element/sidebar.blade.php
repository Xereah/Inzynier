
   <div class="container-fluid col-sm-10 mx-auto">
<div class="row">
<div class="col-sm-3">
	<!-- Category -->
	<div class="single category">
    <h3 class="side-title" ><i class="fas fa-bars"></i> Kategorie</h3>
		<ul class="list-unstyled">
		  @foreach($kategorie as $kategoria)
        <li><a class="category-item" href="{{ url('produkty/kategorie/'.$kategoria->id) }}">{{ $kategoria->Nazwa }}<i class="fas fa-chevron-right" style="float:right;"></i> </a></li>
           @endforeach
		</ul>
   </div>
   <br>
   <h3><p class="text-center kalendarz">Kalendarz Wizyt na targu</p></h3>
           <br>
   <div id='calendar'></div>
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
                    // url : '{{ route('index.show', $task->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>
@endsection