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
		class="px-3"
	>
	@csrf
		<div id="general">
			<h3>१. निवेदकको परिचय</h3>
			<hr />
			<div class="form-group">
				<label for="operation"><strong>Salutation: </strong></label> <br />
				<input type="radio" name="salutation" value="mr" id="mr" checked />
				<label for="mr">Mr. ( श्रीमान )</label>
				<input
					type="radio"
					name="salutation"
					value="mrs"
					id="mrs"
					class="ml-3"
				/>
				<label for="mrs">Mrs. ( श्रीमती )</label>
				<input
					type="radio"
					name="salutation"
					value="ms"
					id="ms"
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
							class="form-control @error('fullName') is-invalid @enderror"
							placeholder="पुरा नाम"
							name="fullName"
							value="{{ old('fullName') }}"
							required
						/>
						@error('fullName')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						<small class="text-muted">in BLOCK letters</small>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Father's Name (बाबुको नाम )* :</label>
						<input
							type="text"
							class="form-control @error('fatherName') is-invalid @enderror"
							placeholder="बाबुको नाम"
							name="fatherName"
							value="{{ old('fatherName') }}"
							required
						/>
						@error('fatherName')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Mother's Name (आमाको नाम )* : </label>
						<input
							type="text"
							class="form-control @error('motherName') is-invalid @enderror"
							placeholder="आमाको नाम"
							name="motherName"
							value="{{ old('motherName') }}"
							required
						/>
						@error('motherName')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-md-4">
					<div class="form-group">
						<label>Grandfather's Name (बाजेको नाम)* : </label>
						<input
							type="text"
							class="form-control @error('grandfatherName') is-invalid @enderror"
							placeholder="बाजेको  नाम"
							name="grandfatherName"
							value="{{ old('grandfatherName') }}"
							required
						/>
						@error('grandfatherName')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Husband/Wife's Name (श्रीमान/श्रीमतीको नाम ) </label>
						<input
							type="text"
							class="form-control @error('spouseName') is-invalid @enderror"
							placeholder="श्रीमान/श्रीमतीको नाम"
							value="{{ old('spouseName') }}"
							name="spouseName"
						/>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Membership Number (सदस्यता नं.) * </label>
						<input
							type="text"
							class="form-control @error('membershipNumber') is-invalid @enderror"
							placeholder="सदस्यता नं."
							value="{{ old('membershipNumber') }}"
							name="membershipNumber"
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
							class="form-control @error('loanAmount') is-invalid @enderror"
							placeholder="ऋण रकम (अंकमा)"
							name="loanAmount"
							value="{{ old('loanAmount') }}"
							required
						/>
						@error('loanAmount')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<label>Loan Amount In words (ऋण रकम अक्षयरमा)* : </label>
						<input
							type="text"
							class="form-control @error('loanAmountWords') is-invalid @enderror"
							placeholder="ऋण रकम (अक्षयरमा)"
							name="loanAmountWords"
							value="{{ old('loanAmountWords') }}"
							required
						/>
						@error('loanAmountWords')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-md-4">
					<div class="form-group">
							<label>Loan Type (कर्जाको किसिम) : </label>
							<select name="loanType" class="form-control">
								<option value="business" selected>Business Loan</option>
								<option value="higher">Higher Purchase Loan</option>
								<option value="share">Share Membeship Loan</option>
								<option value="landHouse">Land/House Purchase Loan</option>
								<option value="project">Project Loan</option>
								<option value="foreign">Foreign Employment and Study Loan</option>
								<option value="agriculture">Agriculture and Livestock Loan</option>
								<option value="fixed">Fixed Deposit Receipt Loan</option>
								<option value="medical">Medical Treatment Loan</option>
								<option value="relief">Member Relief Loan</option>
								<option value="other">Other Loan</option>
							</select>
						</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>भुक्तानी अवधि *: </label>
						<input
							type="text"
							class="form-control @error('repayTime') is-invalid @enderror"
							placeholder="भुक्तानी अवधि"
							value="{{ old('repayTime') }}"
							name="repayTime"
						/>
					</div>
				</div>
			</div>
		</div>
		<input type="submit" value="Apply Loan" class="btn btn-success" />
	</form>
</div>
@endsection 

