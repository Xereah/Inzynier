<section class="section-content padding-y">
<div class="container">

<div class="row">
	<aside class="col-md-3">
		
<div class="card">
	<article class="filter-group">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
				<i class="icon-control fa fa-chevron-down"></i>
				<h6 class="title">Kategorie</h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse_1" style="">
			<div class="card-body">
				<form class="pb-3" >
				<div class="input-group">
				<input type="text" class="form-control" name="searchData" value="Szukaj " onfocus="this.value = '';" onblur="if (this.value == '') {
                        this.value = 'Search a product...';
                    }" required="">
				  <div class="input-group-append">
				    <button class="btn btn-light" type="submit"><i class="fa fa-search"></i></button>
				  </div>
				</div>
				</form>
				
				<ul class="menu-category">
            @foreach($kategorie as $kategoria)
        <li><a class="category-item" href="{{ url('produkty/kategorie/'.$kategoria->id) }}">{{ $kategoria->Nazwa }}<i class="fas fa-chevron-right" style="float:right;"></i> </a></li>
           @endforeach
			</ul>

			</div> <!-- card-body.// -->
		</div>
	</article> <!-- filter-group  .// -->
	
	</aside> <!-- col.// -->


