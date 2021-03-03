
<div class="spacer"></div>
<div class="panelboczny" >
<div class="list-group-item active">Oferta</div>
    <ul class="list-group list-group-flush">
        @foreach($kategorie as $kategoria)
        <li class="list-group-item"><a class="category-item" href="/kategoria/{{ $kategoria->id }}/{{ str_replace(' ', '-', strtolower($kategoria->Nazwa)) }}">{{ $kategoria->Nazwa }}</a></li>
           @endforeach
     </ul>
</div>
</div>