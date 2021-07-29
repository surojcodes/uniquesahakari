@extends('layouts.base') 
@section('title')
Unique Cooperative | Apply for loan
@endsection
@section('content') 
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $message)
		<li>{{ $message }}</li>
		@endforeach
	</ul>
</div>
@endif
@if(session('success'))	
	<div class="alert alert-success alert-dismissible fade show">
		<p>{{session('success')}}</p>
	</div>
@endif

<div class="container services mt-3 pb-5 mb-5 border shadow">
	<div class="section-title">
	<div class="logo m-auto">
			<a href="/"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid" width="5%"></a>
	</div>
		<h2 class='mt-3'>कर्जा आवेदन  फारम</h2>
		<small class='text-danger'><em>* लगाइएका बिवरणहरु आनिवार्य छन् </em></small> 
	</div>
	<form
		action="{{route('loan-store')}}"
		method="POST"
		enctype="multipart/form-data"
		class="px-3"
	>
		
	</form>
</div>
@endsection 
@section('scripts')

@endsection
