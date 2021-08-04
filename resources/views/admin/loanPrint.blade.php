@extends('admin.adminMinlayout')
@section('title')
Unique Cooperative | Loan Print
@endsection
@section('content') 
<div class="container services mt-3 pb-5 mb-5 ">
	<div class="section-title">
	<div class="logo m-auto">
			<a href="/"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid" width="5%"></a>
	</div>
		<h2 class='mt-3'>कर्जा आवेदन  फारम</h2>
		<small class='text-danger'><em>* लगाइएका बिवरणहरु आनिवार्य छन् </em></small> 
	</div>
	<form
		class="px-3"
	>
	@csrf
		<div id="general">
			<h3>१. निवेदकको परिचय</h3>
			<hr />
			<div class="form-group">
				<label for="operation"><strong>Salutation: </strong></label> <br />
				<input type="radio" name="salutation" {{$loan->salutation=='mr'?'checked':'disabled'}} />
				<label for="mr">Mr. ( श्रीमान )</label>
				<input
					type="radio"
					{{$loan->salutation=='mrs'?'checked':'disabled'}} 
					class="ml-3"
				/>
				<label for="mrs">Mrs. ( श्रीमती )</label>
				<input
					type="radio"
					{{$loan->salutation=='ms'?'checked':'disabled'}} 
					class="ml-3"
				/>
				<label for="ms">Ms. ( सुश्री )</label>
			</div>
			<div class="row mt-2">
				<div class="col-md-4">
					<div class="form-group">
						<label>Full Name (पुरा नाम)* : </label>
						<input
							type="text"
							class="form-control"
							value ="{{ $loan->fullName}}"
              disabled
						/>
						<small class="text-muted">in BLOCK letters</small>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Father's Name (बाबुको नाम )* :</label>
						<input
							type="text"
							class="form-control"
							value ="{{ $loan->fatherName}}"
              disabled
						/>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Mother's Name (आमाको नाम )* : </label>
						<input
							type="text"
							class="form-control"
							value ="{{ $loan->motherName}}"
              disabled
						/>
					
					</div>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-md-4">
					<div class="form-group">
						<label>Grandfather's Name (बाजेको नाम)* : </label>
						<input
							type="text"
							class="form-control"
						  value ="{{ $loan->grandfatherName}}"
              disabled
						/>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Husband/Wife's Name (श्रीमान/श्रीमतीको नाम ) </label>
						<input
							type="text"
							class="form-control"
							value ="{{ $loan->spouseName}}"
              disabled
						/>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Membership Number (सदस्यता नं.) * </label>
						<input
							type="text"
							class="form-control"
							value ="{{ $loan->membershipNumber}}"
              disabled
						/>
					</div>
				</div>
			</div>
		</div>
		<div id="loan" class="mt-5 mb-3">
			<h3>२. कर्जाको बिवरण</h3>
			<hr />
			<div class="row mt-2">
				<div class="col-md-4">
					<div class="form-group">
						<label>Loan Amount (ऋण रकम)* : </label>
						<input
							type="number"
							class="form-control"
							value ="{{$loan->loanAmount}}"
              disabled
						/>
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label>Loan Amount In words (ऋण रकम अक्षयरमा)* : </label>
						<input
							type="text"
							class="form-control"
						  value ="{{ $loan->loanAmountWords}}"
              disabled
						/>
					</div>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-md-4">
					<div class="form-group">
							<label>Loan Type (कर्जाको किसिम) : </label>
              <input
							type="text"
							class="form-control"
						  value ="{{ $loan->loanType}}"
              disabled
						/>
						</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>भुक्तानी अवधि *: </label>
						<input
							type="text"
							class="form-control"
							value ="{{ $loan->loanAmountWords}}"
              disabled
						/>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection 

@section('scripts')
<script> 
	$(document).ready(function(){
		window.print();
	})
</script> 
@endsection