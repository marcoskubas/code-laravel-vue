{{-- @if($errors->any())
	{{dd($errors)}}
@endif --}}
<div class="row">
    <div class="input-field col s6">
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', null) !!}
    </div>
</div>