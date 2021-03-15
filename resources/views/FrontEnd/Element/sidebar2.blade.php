
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
   <h3><p class="text-left kalendarz">Cena</p></h3>
   <hr>
    <form action="{{ url('searchprice') }}">
    <div class="d-flex align-items-center mt-4 pb-1 form-group">
          <div class="md-form md-outline my-0">   
    <input type="text" id="from" class="form-control mb-0" name="searchData1" value="Od" onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = '1zł';
                    }" required="">
                    </div>
                    <p class="px-2 mb-0 text-muted"> - </p>
                    <div class="md-form md-outline my-0 ">  
      <input type="text" class="form-control mb-0" name="searchData2" value="Do" onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = '10zł';
                    }" required="">
     
  
    
                </div>
                <br>
               
                </div>
                <button type="submit" class="btn btn-outline-secondary col-sm-12 ">Filtruj</button>
                </form>
   <!-- <h3><p class="text-center kalendarz">Kalendarz Wizyt na targu</p></h3>
           <br> -->
   <!-- <div id='calendar'></div> -->


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