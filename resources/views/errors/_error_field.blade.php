@if($errors->any())
	<ul class="collection">
		<li class="collection-item red white-text"><h5>Foram encontrados os seguintes erros:</h5></li>
		@foreach($errors->all() as $error)
			<li class="collection-item red white-text">{{$error}}</li>
		@endforeach
	</ul>
@endif