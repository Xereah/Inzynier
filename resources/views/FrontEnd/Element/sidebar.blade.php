<!-- 
<div class="spacer"></div>
<div class="panelboczny" >
<div class="list-group-item active">Oferta</div>
    <ul class="list-group list-group-flush">
        @foreach($kategorie as $kategoria)
        <li class="list-group-item"><a class="category-item" href="/kategoria/{{ $kategoria->id }}/{{ str_replace(' ', '-', strtolower($kategoria->Nazwa)) }}">{{ $kategoria->Nazwa }}</a></li>
           @endforeach
     </ul>
</div>
</div> -->


<div class="spacer"></div>
<div class="container-fluid  ">
  <div class="row ">
    <div class="col-6 col-md-2 panelboczny ">
    <div class="list-group-item active">Oferta</div>
    <ul class="list-group list-group-flush">
        @foreach($kategorie as $kategoria)
        <li class="list-group-item"><a class="category-item" href="/kategoria/{{ $kategoria->id }}/{{ str_replace(' ', '-', strtolower($kategoria->Nazwa)) }}">{{ $kategoria->Nazwa }}</a></li>
           @endforeach
     </ul>
    </div>
    <div class="col-6 col-md-10 w-100 p-3 " style="background-color:red">
    <div class="col-12 col-md-12 w-100 h-25 " style="background-color:yellow">
</div>
    </div>
  </div>
  
  </div>
