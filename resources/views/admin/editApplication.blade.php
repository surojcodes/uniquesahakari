@extends('admin.adminlayout')
@section('title')
  Unique Cooperative | Edit Application Details
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
<div class="container services mt-3 pb-5 mb-5 border shadow" id="toPrint">
	<div class="section-title">
	<div class="logo m-auto">
			<a href="/"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid" width="5%"></a>
	</div>
		<h2 class='mt-3'>खाता खोल्ने फारम</h2>
	</div>
	<form
		action="{{route('application-update',$application->application_id)}}"
		method="POST"
		enctype="multipart/form-data"
		class="px-3"
	>
		@csrf
		@method('PUT')
		<div id="policy" class='mt-4'>
			<h3>१. बचत योजना</h3>
			<hr />
			<div class="form-group">
				<label for="operation"
					><strong>Account Operation ( खाता संचालन ) :</strong>
				</label>
				<br />
				<input
					type="radio"
					name="operation"
					value="single"
					id="single"
					{{$application->operation=='single'?'checked':''}}
				/>
				<label for="single">Single ( एकल )</label>
				<input
					type="radio"
					name="operation"
					value="joint"
					id="joint"
					class="ml-3"
					{{$application->operation=='joint'?'checked':''}}
				/>
				<label for="joint">Joint ( संयुक्त )</label>
			</div>
			<small > <em> नोट : एक भन्दा बढी खातावाला भएमा छुट्टै बिवरण भरेर बुझाउनु पर्ने </em></small>
			<div class="row mt-4">
				<div class="col-md-4">
					<input
						type="radio"
						name="saving_scheme"
						id="saving-scheme1"
						value="regularSaving"
						{{$application->saving_scheme=='regularSaving'?'checked':''}}
					/>
					<label for="saving-scheme1"
						><strong> &nbsp; नियमित बचत </strong></label
					>
					<div id="regularSaving" class="border p-3 mt-2 {{$application->saving_scheme!='regularSaving'?'d-none':''}}">
						<div class="row">
							<div class="col-md-6">
								<input
									type="radio"
									name="regular_option"
									id="daily-child"
									value="daily-child"
									{{$application->regular_option=='daily-child'?'checked':''}}

								/>
								<label for="daily-child">दैनिक बाल बचत</label>
							</div>
							<div class="col-md-6">
								<input
									type="radio"
									name="regular_option"
									id="monthly-child"
									value="monthly-child"
                  {{$application->regular_option=='monthly-child'?'checked':''}}

								/>
								<label for="monthly-child">मासिक बाल बचत</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<input
									type="radio"
									name="regular_option"
									value="daily"
									id="daily"
                  {{$application->regular_option=='daily'?'checked':''}}
								/>
								<label for="daily">दैनिक बचत</label>
							</div>
							<div class="col-md-6">
								<input
									type="radio"
									name="regular_option"
									value="periodic"
									id="periodic"
                  {{$application->regular_option=='periodic'?'checked':''}}

								/>
								<label for="periodic">पेरियोडिक बचत</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<input
									type="radio"
									name="regular_option"
									value="pension"
									id="pension"
                  {{$application->regular_option=='pension'?'checked':''}}
								/>
								<label for="pension">पेन्सन बचत</label>
							</div>
							<div class="col-md-6">
								<input
									type="radio"
									name="regular_option"
									value="share"
									id="share"
                  {{$application->regular_option=='share'?'checked':''}}
								/>
								<label for="share">शेयर बचत</label>
							</div>
						</div>

						<hr />
						<div class="form-group mt-2">
							<label for="amount">दैनिक/मासिक बचत गर्न चाहने रकम * :</label>
							<input
								type="text"
								class="form-control @error('regular_amount') is-invalid @enderror"
								placeholder="दैनिक/मासिक बचत गर्न चाहने रकम"
								name="regular_amount"
								id="regular_amount"
								value="{{ $application->regular_amount }}"
							/>
							@error('regular_amount')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group mt-2">
							<label for="duration">बचत अवधि *:</label>
							<input
								type="text"
								class="form-control @error('regular_duration') is-invalid @enderror"
								placeholder="बचत अवधि"
								name="regular_duration"
								id="regular_duration"
								value="{{ $application->regular_duration }}"
							/>
							@error('regular_duration')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<input
						type="radio"
						name="saving_scheme"
						id="saving-scheme2"
						value="generalSaving"
						{{$application->saving_scheme=='generalSaving'?'checked':''}} 
					/>
					<label for="saving-scheme2"
						><strong> &nbsp; स्वेच्छिक बचत </strong></label
					>
					<div class="border p-3 mt-2 d-none {{$application->saving_scheme!='generalSaving'?'d-none':''}}" id="generalSaving">
						<small>General Saving (साधारण बचत) </small>
						<div class="row mt-2">
							<div class="col-md-6">
								<input
									type="radio"
									name="general_option"
									value="primary"
									id="general-primary"
                  {{$application->general_option=='primary'?'checked':''}} 

								/>
								<label for="general-primary">प्रारम्भिक बचत</label>
							</div>
							<div class="col-md-6">
								<input
									type="radio"
									name="general_option"
									value="progress"
									id="progress"
                  {{$application->general_option=='progress'?'checked':''}} 
								/>
								<label for="progress">उन्नति बचत</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<input
									type="radio"
									name="general_option"
									value="improvement"
									id="improvement"
                  {{$application->general_option=='improvement'?'checked':''}} 
								/>
								<label for="improvement">समुन्नति बचत</label>
							</div>
							<div class="col-md-6">
								<input
									type="radio"
									name="general_option"
									value="unique"
									id="unique"
                  {{$application->general_option=='unique'?'checked':''}} 
								/>
								<label for="unique">युनिक बचत</label>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-md-6">
								<input
									type="radio"
									name="general_option"
									value="child"
									id="child"
                  {{$application->general_option=='child'?'checked':''}} 

								/>
								<label for="child">बाल सुलभ बचत</label>
							</div>
							<div class="col-md-6">
								<input
									type="radio"
									name="general_option"
									value="periodic"
									id="periodic1"
                  {{$application->general_option=='periodic'?'checked':''}} 

								/>
								<label for="periodic1">पेरियोडिक बचत</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<input
									type="radio"
									name="general_option"
									value="laxmi"
									id="laxmi"
                  {{$application->general_option=='laxmi'?'checked':''}} 
								/>
								<label for="laxmi">गृहलक्ष्मी बचत</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<input
						type="radio"
						name="saving_scheme"
						id="saving-scheme3"
						value="fixedSaving"
            {{$application->saving_scheme=='fixedSaving'?'checked':''}}

					/>
					<label for="saving-scheme3"
						><strong> &nbsp; आवधिक बचत </strong></label
					>
					<div class="border p-3 mt-2 {{$application->saving_scheme!='fixedSaving'?'d-none':''}}"" id="fixedSaving">
						<div class="form-group">
							<label for="amount">बचत गर्न चाहेको रकम* :</label>
							<input
								type="number"
								placeholder="बचत गर्न चाहेको रकम"
								min="0"
								class="form-control @error('fixed_amount') is-invalid @enderror"
								name="fixed_amount"
								id="fixed_amount"
								value="{{ $application->fixed_amount }}"
							/>
							@error('fixed_amount')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="">अवधि: </label>
							</div>
							<div class="col-md-4">
								<input
									type="radio"
									name="fixed_duration"
									value="monthly"
									id="monthly"
                  {{$application->fixed_duration=='monthly'?'checked':''}} 

								/>
								<label for="monthly">महिना</label>
							</div>
							<div class="col-md-3">
								<input
									type="radio"
									name="fixed_duration"
									value="yearly"
									id="yearly"
                  {{$application->fixed_duration=='yearly'?'checked':''}} 

								/>
								<label for="yearly">वर्ष</label>
							</div>
						</div>
						<hr />
						<label for="">ब्याज भुक्तानी तरिका :</label>
						<div class="row">
							<div class="col-md-6">
								<input
									type="radio"
									name="fixed_payment"
									value="monthly"
									id="monthly1"
                  {{$application->fixed_payment=='monthly'?'checked':''}} 

								/>
								<label for="monthly1">मासिक</label>
							</div>
							<div class="col-md-6">
								<input
									type="radio"
									name="fixed_payment"
									value="trimester"
									id="trimester"
                  {{$application->fixed_payment=='trimester'?'checked':''}} 

								/>
								<label for="trimester">त्रैमासिक</label>
							</div>
							<div class="col-md-6">
								<input
									type="radio"
									name="fixed_payment"
									value="yearly"
									id="yearly1"
                  {{$application->fixed_payment=='yearly'?'checked':''}} 

								/>
								<label for="yearly1">बार्षिक</label>
							</div>
							<div class="col-md-6">
								<input
									type="radio"
									name="fixed_payment"
									value="whole"
									id="whole"
                  {{$application->fixed_payment=='whole'?'checked':''}} 
								/>
								<label for="whole">एकमुष्ट</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="applicant" class="mt-4">
			<div id="general">
				<h3>२. निवेदकको परिचय</h3>
				<hr />
				<div class="form-group">
					<label for="operation"><strong>Salutation: </strong></label> <br />
					<input type="radio" name="salutation" value="mr"
					 id="mr" 
					 {{$application->salutation=='mr'?'checked':''}} />
					<label for="mr">Mr. ( श्रीमान )</label>
					<input
						type="radio"
						name="salutation"
						value="mrs"
						id="mrs"
						class="ml-3"
						{{$application->salutation=='mrs'?'checked':''}}           
						
					/>
					<label for="mrs">Mrs. ( श्रीमती )</label>
					<input
						type="radio"
						name="salutation"
						value="ms"
						id="ms"
						class="ml-3"
						{{$application->salutation=='ms'?'checked':''}} 

					/>
					<label for="ms">Ms. ( सुश्री )</label>
					<input
						type="radio"
						name="salutation"
						value="minor"
						id="minor"
						class="ml-3"
						{{$application->salutation=='minor'?'checked':''}} 

					/>
					<label for="minor">Minor ( नाबालक )</label>
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
								value="{{ $application->fullName}}"
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
								value="{{ $application->fatherName }}"
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
								value="{{$application->motherName}}" 
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
								value="{{$application->grandfatherName }}"
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
								value="{{$application->spouseName}}"
								name="spouseName"
							/>
						</div>
					</div>
				</div>
			</div>
			<hr />

			<div id="permanent">
				<h4 class="mt-3">Permanent Address (ईस्थायी ठेगाना)</h4>
				<div class="row mt-3">
					<div class="col-md-4">
						<div class="form-group">
							<label>State (प्रदेश) </label>
							<select name="permanent_state"  class="form-control">
								<option value="bagmati" {{$application->permanent_state=='bagmati'?'selected':''}}>बागमती प्रदेश</option>
								<option value="gandaki"  {{$application->permanent_state=='gandaki'?'selected':''}}>गण्डकी प्रदेश</option>
								<option value="karnali"  {{$application->permanent_state=='karnali'?'selected':''}}>कर्णाली प्रदेश</option>
								<option value="p1"  {{$application->permanent_state=='p1'?'selected':''}}>प्रदेश १</option>
								<option value="p2"  {{$application->permanent_state=='p2'?'selected':''}}>प्रदेश २</option>
								<option value="p5"  {{$application->permanent_state=='p5'?'selected':''}}>प्रदेश ५</option>
								<option value="sudurpaschim"  {{$application->permanent_state=='sudurpaschim'?'selected':''}}>सुदुरपस्चिम प्रदेश</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>District (जिल्ला )* : </label>
							<input
								type="text"
								class="form-control"
								placeholder="जिल्ला"
								name="permanent_district"
								value="{{$application->permanent_district}}"
								required
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>RM/Municipality (नगरपालिका/गाउपालिका)* : </label>
							<input
								type="text"
								class="form-control"
								placeholder="नगरपालिका/गाउपालिका"
								name="permanent_municipality"
								value="{{$application->permanent_municipality}}"
								required
							/>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-4">
						<div class="form-group">
							<label>Ward No. (वडा नम्बर)* : </label>
							<input
								type="number"
								class="form-control"
								min="0"
								placeholder="वडा नम्बर"
								name="permanent_ward"
								value="{{$application->permanent_ward}}"
								required
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Tole (टोल) : </label>
							<input
								type="text"
								class="form-control"
								placeholder="टोल"
								name="permanent_tole"
								value="{{$application->permanent_tole}}"
							/>
						</div>
					</div>
				</div>
			</div>

			<hr />
			<div id="temp">
				<h4 class="mt-3">Temporary Address (अस्थाई ठेगाना )</h4>
				<div class="row mt-3">
					<div class="col-md-4">
						<div class="form-group">
							<label>State (प्रदेश) </label>
							<select name="temporary_state" class="form-control">
								<option value="bagmati" {{$application->temporary_state=='bagmati'?'selected':''}}>बागमती प्रदेश</option>
								<option value="gandaki" {{$application->temporary_state=='gandaki'?'selected':''}}>गण्डकी प्रदेश</option>
								<option value="karnali" {{$application->temporary_state=='karnali'?'selected':''}}>कर्णाली प्रदेश</option>
								<option value="p1" {{$application->temporary_state=='p1'?'selected':''}}>प्रदेश १</option>
								<option value="p2" {{$application->temporary_state=='p2'?'selected':''}}>प्रदेश २</option>
								<option value="p5" {{$application->temporary_state=='p5'?'selected':''}}>प्रदेश ५</option>
								<option value="sudurpaschim" {{$application->temporary_state=='sudurpaschim'?'selected':''}}>सुदुरपस्चिम प्रदेश</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>District (जिल्ला ) * </label>
							<input
								type="text"
								class="form-control"
								placeholder="जिल्ला"
								name="temporary_district"
								value="{{$application->temporary_district}}"
								required
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>RM/Municipality (नगरपालिका/गाउपालिका)* : </label>
							<input
								type="text"
								class="form-control"
								placeholder="नगरपालिका/गाउपालिका"
								name="temporary_municipality"
								value="{{$application->temporary_municipality}}"
								required
							/>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-4">
						<div class="form-group">
							<label>Ward No. (वडा नम्बर)* : </label>
							<input
								type="number"
								class="form-control"
								min="0"
								placeholder="वडा नम्बर"
								name="temporary_ward"
								value="{{$application->temporary_ward}}" 
								required
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Tole (टोल) </label>
							<input
								type="text"
								class="form-control"
								placeholder="टोल"
								name="temporary_tole"
								value="{{$application->temporary_tole}}"
							/>
						</div>
					</div>
				</div>
			</div>

			<div id="other">
				<div class="row mt-2">
					<div class="col-md-4">
						<label>Date of Birth (जन्म मिति)* : </label>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									@php $end = date('Y') + 57; @endphp
									<select name="dob_year" id="" class="form-control">
										@for($year=1990;$year<=$end;$year++)
										<option value="{{$year}}" {{$application->dob_year==$year?'selected':''}}>{{$year}}</option>
										@endfor
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<select name="dob_month" id="" class="form-control">
										<option value="1" {{$application->dob_month==1?'selected':''}}>बैसाख</option>
										<option value="2" {{$application->dob_month==2?'selected':''}}>जेठ</option>
										<option value="3" {{$application->dob_month==3?'selected':''}}>असार</option>
										<option value="4" {{$application->dob_month==4?'selected':''}}>श्रावन</option>
										<option value="5" {{$application->dob_month==5?'selected':''}}>भाद्र</option>
										<option value="6" {{$application->dob_month==6?'selected':''}}>असोज</option>
										<option value="7" {{$application->dob_month==7?'selected':''}}>कार्तिक</option>
										<option value="8" {{$application->dob_month==8?'selected':''}}>मंसिर</option>
										<option value="9" {{$application->dob_month==9?'selected':''}}>पुष</option>
										<option value="10" {{$application->dob_month==10?'selected':''}}>माघ</option>
										<option value="11" {{$application->dob_month==11?'selected':''}}>फाल्गुण</option>
										<option value="12" {{$application->dob_month==12?'selected':''}}>चैत्र</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<select name="dob_day" id="" class="form-control">
										@for($day=1;$day<=32;$day++)
										<option value="{{$day}}" {{$application->dob_day==$day?'selected':''}}>{{$day}}</option>
										@endfor
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Citizenship/PP No. (नागरिकता/राहदानी नम्बर)* : </label>
							<input
								type="text"
								class="form-control"
								placeholder="नागरिकता नम्बर/राहदानी नम्बर"
								name="citizen_passport"
								value="{{$application->citizen_passport}}"
								required
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Place of Issue (जारी गरेको ठाउँ)* : </label>
							<input
								type="text"
								class="form-control"
								placeholder="जारी गरेको ठाउँ"
								name="issued_place"
								value="{{$application->issued_place}}" 
								required
							/>
						</div>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-md-4">
						<div class="form-group">
							<label for="ms">Marital Status (बैबाहिक ईस्थिति )</label> <br />
							<input
								type="radio"
								name="marital_status"
								class="ml-2"
								value="married"
								id="married"
								{{$application->marital_status=='married'?'checked':''}} 

							/>
							<label for="married">Married (बिबाहित )</label>
							<br />
							<input
								type="radio"
								name="marital_status"
								class="ml-2"
								value="unmarried"
								id="unmarried"
                {{$application->marital_status=='unmarried'?'checked':''}} 

							/>
							<label for="unmarried">Unmarried (अबिबाहित )</label>
							<br />
							<input
								type="radio"
								name="marital_status"
								class="ml-2"
								value="others"
								id="others"
                {{$application->marital_status=='others'?'checked':''}} 

							/>
							<label for="others">Others (अन्य )</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="nationality">Nationality(राष्ट्रियता )</label>
							<input
								type="text"
								class="form-control"
								placeholder="राष्ट्रियता"
								name="nationality"
								value="{{$application->nationality}}"
							/>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="ms">Occupation (पेशा) </label> <br />
							<div class="row">
								<div class="col-md-6">
									<input
										type="radio"
										name="occupation"
										class="ml-2"
										value="service"
										id="service"
										{{$application->occupation=='service'?'checked':''}} 
									/>
									<label for="service">Service (नोकरी)</label>
									<br />
								</div>
								<div class="col-md-6">
									<input
										type="radio"
										name="occupation"
										class="ml-2"
										value="business"
										id="business"
										{{$application->occupation=='business'?'checked':''}} 

									/>
									<label for="business"> Business (ब्यापार)</label> <br />
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input
										type="radio"
										name="occupation"
										class="ml-2"
										value="student"
										id="student"
										{{$application->occupation=='student'?'checked':''}} 

									/>
									<label for="student">Student (विद्यार्थी)</label> <br />
								</div>
								<div class="col-md-6">
									<input
										type="radio"
										name="occupation"
										class="ml-2"
										value="agriculture"
										id="agriculture"
										{{$application->occupation=='agriculture'?'checked':''}} 

									/>
									<label for="agriculture"> Agriculture (कृषि)</label> <br />
								</div>
							</div>
							<input
								type="radio"
								name="occupation"
								class="ml-2"
								value="others"
								id="others-1"
								{{$application->occupation=='others'?'checked':''}} 

							/>
							<label for="others-1"> Others (अन्य)</label>
						</div>
					</div>
				</div>
				<hr />
				<label for="contact"><strong>Contact No. (सम्पर्क फोन)</strong> </label>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="mobile">Mobile No. (मोबाइल)* :</label>
							<input
								type="number"
								name="mobile"
								id=""
								class="form-control"
								placeholder="मोबाइल"
								value="{{$application->mobile}}"
								required
							/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="mobile">Office No.(कार्यालय):</label>
							<input
								type="number"
								name="office_number"
								id=""
								class="form-control"
								value="{{$application->office_number}}"
								placeholder="कार्यालय"
							/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="mobile">Residence No.(निवास):</label>
							<input
								type="number"
								name="residence_number"
								id=""
								class="form-control"
								placeholder="निवास"
								value="{{$application->residence_number}}"
							/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="mobile">Email (ईमेल):</label>
							<input
								type="email"
								name="email"
								id=""
								class="form-control"
								placeholder="ईमेल"
								value="{{$application->email}}"
							/>
						</div>
					</div>
				</div>
			</div>

			<div id="minor" class="mt-3">
				<h3>३. नाबालकको हकमा</h3>
				<hr />
				<div class="form-group">
					<label for="minor"><strong>Are you a minor ?</strong></label> <br />
					<input
						type="radio"
						name="minor"
						class="ml-3"
						value="no"
						id="Minor-No"
						{{$application->minor=='no'?'checked':''}} 

					/>
					<label for="Minor-No">No</label>
					<input
						type="radio"
						name="minor"
						class="ml-3"
						value="yes"
						id="Minor-Yes"
						{{$application->minor=='yes'?'checked':''}} 

					/>
					<label for="Minor-Yes">Yes</label>
				</div>
				<div class="{{$application->minor=='no'?'d-none':''}}" id="minor-rows">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Guardian's Name (संरक्क्षकको नाम)* : </label>
								<input
									type="text"
									class="form-control"
									placeholder="संरक्क्षकको नाम"
									name="guardian_name"
									id="guardian_name"
									value="{{$application->guardian_name}}"
								/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Relation (नाता)* : </label>
								<input
									type="text"
									class="form-control"
									placeholder="नाता"
									name="guardian_relation"
									id="guardian_relation"
									value="{{$application->guardian_relation}}"
								/>
							</div>
						</div>
						<div class="col-md-4">
							<label>Date of Birth (जन्म मिति)* : </label>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										@php $end = date('Y') + 57; @endphp
										<select name="guardian_year" id="" class="form-control">
											@for($year=1990;$year<=$end;$year++)
											<option value="{{$year}}" {{$application->guardian_year==$year?'selected':''}}>{{$year}}</option>
											@endfor
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select name="guardian_month" id="" class="form-control">
											<option value="1" {{$application->guardian_month==1?'selected':''}}>बैसाख</option>
											<option value="2" {{$application->guardian_month==2?'selected':''}}>जेठ</option>
											<option value="3" {{$application->guardian_month==3?'selected':''}}>असार</option>
											<option value="4" {{$application->guardian_month==4?'selected':''}}>श्रावन</option>
											<option value="5" {{$application->guardian_month==5?'selected':''}}>भाद्र</option>
											<option value="6" {{$application->guardian_month==6?'selected':''}}>असोज</option>
											<option value="7" {{$application->guardian_month==7?'selected':''}}>कार्तिक</option>
											<option value="8" {{$application->guardian_month==8?'selected':''}}>मंसिर</option>
											<option value="9" {{$application->guardian_month==9?'selected':''}}>पुष</option>
											<option value="10" {{$application->guardian_month==10?'selected':''}}>माघ</option>
											<option value="11" {{$application->guardian_month==11?'selected':''}}>फाल्गुण</option>
											<option value="12" {{$application->guardian_month==12?'selected':''}}>चैत्र</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select name="guardian_day" id="" class="form-control">
											@for($day=1;$day<=32;$day++)
											<option value="{{$day}}" {{$application->guardian_day==$day?'selected':''}}>{{$day}}</option>
											@endfor
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Citizenship/PP No. (नागरिकता/राहदानी नम्बर): </label>
								<input
									type="text"
									class="form-control"
									placeholder="नागरिकता नम्बर/राहदानी नम्बर"
									name="guardian_citizen_passport"
									value="{{$application->guardian_citizen_passport}}"
								/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="guardiansign"
									>Guardian's Signature (संरक्क्षकको दस्तखत )* :</label
								>
								<input
									type="file"
									name="guardian_signature"
									id="guardian_signature"
									id=""
									accept="image/*"
									class="form-control"
								/>
								<small class="text-muted"
									>(Re)upload guardian's signature.Leave if no need to change</small
								>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="facility" class="mt-3">
				<h3>४. अन्य सुभिधा</h3>
				<hr />
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="mobilebanking"
								>Mobile banking (मोबाइल बैंकिंग सुभिधा ):</label
							>
							<br />
							<input
								type="radio"
								name="mobile_banking"
								class="ml-3"
								value="yes"
								id="mobile-yes"
								{{$application->mobile_banking=='yes'?'checked':''}} 
							/>
							<label for="mobile-yes">लिने</label>
							<input
								type="radio"
								name="mobile_banking"
								class="ml-3"
								value="no"
								id="mobile-no"
								{{$application->mobile_banking=='no'?'checked':''}} 

							/><label for="mobile-no"> नलिने</label>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="smsbanking"
								>SMS banking (एस.एम.एस. बैंकिंग सुभिधा ):</label
							>
							<br />
							<input
								type="radio"
								name="sms_banking"
								class="ml-3"
								value="yes"
								id="sms-yes"
								{{$application->sms_banking=='yes'?'checked':''}} 

							/>
							<label for="sms-yes">लिने</label>
							<input
								type="radio"
								name="sms_banking"
								class="ml-3"
								value="no"
								id="sms-no"
								{{$application->sms_banking=='no'?'checked':''}} 

							/><label for="sms-no"> नलिने</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="method"><strong>बचत संकलनको व्यवास्था : </strong></label>
					<br />
					<input
						type="radio"
						name="collection_service"
						value="representer"
						id="representer1"
						{{$application->collection_service=='representer'?'checked':''}} 
					/>
					<label for="representer1"
						>संस्थाको बजार प्रतिनिधिद्वारा बचत संकलन गर्ने</label
					>
					<br />
					<div class="row mt-2 pl-5 {{$application->collection_service!='representer'?'d-none':''}}" id="representer">
						<div class="col-md-4">
							<label for="place">संकलन गर्ने स्थान* : </label>
							<input
								type="text"
								class="form-control"
								placeholder="संकलन गर्ने स्थान "
								name="collection_point"
								value="{{$application->collection_point}}"
							/>
						</div>
						<div class="col-md-4">
							<label for="place">संकलन गर्ने दिन (मासिक बचतको हकमा ) </label>
							<input
								type="text"
								class="form-control"
								placeholder="संकलन गर्ने दिन"
								name="collection_day"
								value="{{$application->collection_day}}"
							/>
						</div>
					</div>
					<input
						type="radio"
						name="collection_service"
						value="own"
						id="own"
						class="mt-2"
						{{$application->collection_service=='own'?'checked':''}} 

					/>
					<label for="own" class="mt-2"
						>बचतकर्ता स्वयम् कार्यालयमा आएर बचत गर्ने </label
					><br />
					<input
						type="radio"
						name="collection_service"
						value="bank"
						id="collect-bank"
						{{$application->collection_service=='bank'?'checked':''}} 

					/><label for="collect-bank">
						संस्थाको बैंक खाता मार्फत बचत गर्ने </label
					><br />
					<input
						type="radio"
						name="collection_service"
						value="mobile-collect"
						id="mobile-collect"
						{{$application->collection_service=='mobile-collect'?'checked':''}} 

					/>
					<label for="mobile-collect"
						>संस्थाको मोबाइल बैंकिंग सुभिधा मार्फत बचत गर्ने</label
					>
					<br />
				</div>
			</div>

			<div id="nominee" class="mt-4">
				<h3>५. इच्छाएको व्यक्ति</h3>
				<hr />
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Nominee's Name (इच्छाएको व्यक्तिको नाम) : </label>
							<input
								type="text"
								class="form-control"
								placeholder="इच्छाएको व्यक्तिको नाम"
								name="nominee_name"
								value="{{$application->nominee_name}}" 
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Relation (नाता) : </label>
							<input
								type="text"
								class="form-control"
								placeholder="नाता"
								name="nominee_relation"
								value="{{$application->nominee_relation}}"
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Citizenship/PP No. (नागरिकता/राहदानी नम्बर) : </label>
							<input
								type="text"
								class="form-control"
								placeholder="नागरिकता नम्बर/राहदानी नम्बर"
								name="nominee_citizen_passport"
								value="{{$application->nominee_citizen_passport}}"
							/>
						</div>
					</div>
				</div>
			</div>
			<div id="introducer" class="mt-3">
				<h3>६. परिचय गराउने</h3>
				<hr />
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Inroducer's Name (परिचय गराउनेको नाम): </label>
							<input
								type="text"
								class="form-control"
								placeholder="परिचय गराउनेको नाम"
								name="introducer_name"
								value="{{$application->introducer_name}}"
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Contact Number (परिचय गराउनेको फोन): </label>
							<input
								type="number"
								class="form-control"
								placeholder="परिचय गराउनेको फोन"
								name="introducer_phone"
								value="{{$application->introducer_phone}}"
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>A/c Number (परिचय गराउनेको खाता नं ): </label>
							<input
								type="text"
								class="form-control"
								placeholder="परिचय गराउनेको खाता नं"
								name="introducer_account"
								value="{{$application->introducer_account}}"
							/>
						</div>
					</div>
				</div>
			</div>
			<div id="introducer" class="my-3">
				<h3>७. खाता खोल्दा चाहिने कागजातहरु</h3>
				<hr />
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="citizenship">नागरिकता/राहदानीको प्रमाणपत्र* :</label>
							<input
								type="file"
								name="citizen_passport_upload"
								accept="image/*"
								id=""
								class="form-control"
							/>
							<small class="text-muted">(Re)Upload citizenship/passport.</small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="citizenship"
								>हालसालै खिचेको पस्स्पोर्ट साइजको फोटो* :
							</label>
							<input
								type="file"
								name="photo_upload"
								accept="image/*"
								id=""
								class="form-control"
							/>
							<small class="text-muted"
								>(Re)Upload recent passport size photo</small
							>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="citizenship">निवेदकको दस्तखत : </label>
							<input
								type="file"
								name="signature_upload"
								accept="image/*"
								id=""
								class="form-control"
							/>
							<small class="text-muted">(Re)Upload applicant's signature</small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="citizenship"
								>संयुक्त खाताको हकमा खातावालबीच भएको सम्झौता:
							</label>
							<input
								type="file"
								name="joint_upload"
								id=""
								accept="image/*"
								class="form-control"
							/>
							<small class="text-muted"
								>(Re)Upload Agreement of A/C holders in case of joint account</small
							>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="citizenship">दायाँ औठा छाप: </label>
							<input
								type="file"
								name="right_thumb_upload"
								id=""
								class="form-control"
								accept="image/*"
							/>
							<small class="text-muted">(Re)Upload Right thumb print</small>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="citizenship">बाँया औठा छाप: </label>
							<input
								type="file"
								name="left_thumb_upload"
								id=""
								class="form-control"
								accept="image/*"
							/>
							<small class="text-muted">(Re)Upload Left thumb print</small>
						</div>
					</div>
				</div>
				<em>
					<small>Leave uploads as it is if not need to be changed.</small> <br>
					<small>Note: All uploads must be jpg, jpeg or png</small>
				</em>
			</div>
		</div>
		<input type="submit" value="Submit" class="btn btn-primary btn" />
	</form>
</div>
@endsection @section('scripts')
<script>
	const policyCheck = () => {
		const policy = $("input[name='saving_scheme']:checked").val();
		if (policy == 'generalSaving') {
			document.getElementById('regularSaving').classList.add('d-none');
			document.getElementById('fixedSaving').classList.add('d-none');
			document.getElementById('generalSaving').classList.remove('d-none');

			$('#regular_amount').attr('required', false);
			$('#regular_duration').attr('required', false);
			$('#fixed_amount').attr('required', false);

			$('input[name="regular_option"]').attr('checked', false);
			$('input[name="fixed_duration"]').attr('checked', false);
			$('input[name="fixed_payment"]').attr('checked', false);

			$('#general-primary').attr('checked', true);
		} else if (policy == 'fixedSaving') {
			document.getElementById('regularSaving').classList.add('d-none');
			document.getElementById('fixedSaving').classList.remove('d-none');
			document.getElementById('generalSaving').classList.add('d-none');

			$('#regular_amount').attr('required', false);
			$('#regular_duration').attr('required', false);
			$('#fixed_amount').attr('required', true);

			$('input[name="regular_option"]').attr('checked', false);
			$('input[name="general_option"]').attr('checked', false);

			$('#monthly').attr('checked', true);
			$('#monthly1').attr('checked', true);
		} else {
			document.getElementById('regularSaving').classList.remove('d-none');
			document.getElementById('fixedSaving').classList.add('d-none');
			document.getElementById('generalSaving').classList.add('d-none');

			$('#regular_amount').attr('required', true);
			$('#regular_duration').attr('required', true);
			$('#fixed_amount').attr('required', false);

			$('input[name="general_option"]').attr('checked', false);
			$('input[name="fixed_duration"]').attr('checked', false);
			$('input[name="fixed_payment"]').attr('checked', false);

			$('#daily-child').attr('checked', true);
		}
	};
	const minorCheck = () => {
		const minor = $("input[name='minor']:checked").val();
		if (minor == 'yes') {
			document.getElementById('minor-rows').classList.remove('d-none');
			$('#guardian_name').attr('required', true);
			$('#guardian_relation').attr('required', true);
			$('#guardian_signature').attr('required', true);
		} else {
			document.getElementById('minor-rows').classList.add('d-none');
			$('#guardian_name').attr('required', false);
			$('#guardian_relation').attr('required', false);
			$('#guardian_signature').attr('required', false);
			$('#guardian_year').val(null);
			$('#guardian_month').val(null);
			$('#guardian_day').val(null);
		}
	};
	const representerCheck = () => {
		const representer = $("input[name='collection_service']:checked").val();
		if (representer == 'representer') {
			document.getElementById('representer').classList.remove('d-none');
			$('#collection_point').attr('required', true);
			$('#collection_day').attr('required', true);
		} else {
			document.getElementById('representer').classList.add('d-none');
			$('#collection_point').attr('required', true);
			$('#collection_day').attr('required', true);
		}
	};
	$("input[name='saving_scheme']").change(policyCheck);
	$("input[name='minor']").change(minorCheck);
	$("input[name='collection_service']").change(representerCheck);
</script>
@endsection
