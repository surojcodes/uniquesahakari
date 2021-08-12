@extends('admin.adminMinlayout')
@section('title')
  Unique Cooperative | Application Details
@endsection 
@section('content') 
<div class="container services mt-3 pb-5 mb-5" id="toPrint">
	<div class="section-title">
	<div class="logo m-auto">
			<a href="/"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid" width="5%"></a>
	</div>
		<h2 class='mt-3'>खाता खोल्ने फारम</h2>
	</div>
	<form class="px-3">
		@csrf
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
          {{$application->operation=='single'?'checked':'disabled'}}
          
				/>
				<label for="single">Single ( एकल )</label>
				<input
					type="radio"
          {{$application->operation=='joint'?'checked':'disabled'}}
          
				/>
				<label for="joint">Joint ( संयुक्त )</label>
			</div>
			<div class="row mt-4">
				<div class="col-sm-4 {{$application->saving_scheme!='regularSaving'?'d-none':''}}">
					<input
						type="radio"
            {{$application->saving_scheme=='regularSaving'?'checked':'disabled'}}
					/>
					<label for="saving-scheme1"
						><strong> &nbsp; नियमित बचत </strong></label
					>
					<div id="regularSaving" class="border p-3 mt-2 {{$application->saving_scheme!='regularSaving'?'d-none':''}}">
						<div class="row">
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->regular_option=='daily-child'?'checked':''}}
								/>
								<label for="daily-child">दैनिक बाल बचत</label>
							</div>
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->regular_option=='monthly-child'?'checked':''}}
								/>
								<label for="monthly-child">मासिक बाल बचत</label>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->regular_option=='daily'?'checked':''}}

								/>
								<label for="daily">दैनिक बचत</label>
							</div>
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->regular_option=='periodic'?'checked':''}}
								/>
								<label for="periodic">पेरियोडिक बचत</label>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->regular_option=='pension'?'checked':''}}
								/>
								<label for="pension">पेन्सन बचत</label>
							</div>
							<div class="col-sm-6">
								<input
									type="radio"
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
								class="form-control"
								value="{{ $application->regular_amount }}"
								disabled
							/>
						</div>
						<div class="form-group mt-2">
							<label for="duration">बचत अवधि *:</label>
							<input
								type="text"
								class="form-control"
								value="{{ $application->regular_duration }}"
								disabled
							/>
						</div>
					</div>
				</div>
				<div class="col-sm-4 {{$application->saving_scheme!='generalSaving'?'d-none':''}}">
					<input
						type="radio"
            {{$application->saving_scheme=='generalSaving'?'checked':'disabled'}} 
					/>
					<label for="saving-scheme2"
						><strong> &nbsp; स्वेच्छिक बचत </strong></label
					>
					<div class="border p-3 mt-2 {{$application->saving_scheme!='generalSaving'?'d-none':''}}" id="generalSaving">
						<small>General Saving (साधारण बचत) </small>
						<div class="row mt-2">
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->general_option=='primary'?'checked':'disabled'}} 
								/>
								<label for="general-primary">प्रारम्भिक बचत</label>
							</div>
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->general_option=='progress'?'checked':'disabled'}} 
								/>
								<label for="progress">उन्नति बचत</label>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->general_option=='improvement'?'checked':'disabled'}} 
								/>
								<label for="improvement">समुन्नति बचत</label>
							</div>
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->general_option=='unique'?'checked':'disabled'}} 
								/>
								<label for="unique">युनिक बचत</label>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->general_option=='child'?'checked':'disabled'}} 
								/>
								<label for="child">बाल सुलभ बचत</label>
							</div>
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->general_option=='periodic'?'checked':'disabled'}} 
								/>
								<label for="periodic1">पेरियोडिक बचत</label>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->general_option=='laxmi'?'checked':'disabled'}} 
								/>
								<label for="laxmi">गृहलक्ष्मी बचत</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4 {{$application->saving_scheme!='fixedSaving'?'d-none':''}}">
					<input
						type="radio"
            {{$application->saving_scheme=='fixedSaving'?'checked':'disabled'}}
					/>
					<label for="saving-scheme3"
						><strong> &nbsp; आवधिक बचत </strong></label
					>
					<div class="border p-3 mt-2 {{$application->saving_scheme!='fixedSaving'?'d-none':''}}" id="fixedSaving">
						<div class="form-group">
							<label for="amount">बचत गर्न चाहेको रकम* :</label>
							<input
								type="number"
								class="form-control"
								value="{{ $application->fixed_amount }}" disabled
							/>
						</div>
						<div class="row">
							<div class="col-sm-2">
								<label for="">अवधि: </label>
							</div>
							<div class="col-sm-4">
								<input
									type="radio"
                  {{$application->fixed_duration=='monthly'?'checked':'disabled'}} 
								/>
								<label for="monthly">महिना</label>
							</div>
							<div class="col-sm-3">
								<input
									type="radio"
                  {{$application->fixed_duration=='yearly'?'checked':'disabled'}} 
								/>
								<label for="yearly">वर्ष</label>
							</div>
						</div>
						<hr />
						<label for="">ब्याज भुक्तानी तरिका :</label>
						<div class="row">
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->fixed_payment=='monthly'?'checked':'disabled'}} 
								/>
								<label for="monthly1">मासिक</label>
							</div>
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->fixed_payment=='trimester'?'checked':'disabled'}} 
								/>
								<label for="trimester">त्रैमासिक</label>
							</div>
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->fixed_payment=='yearly'?'checked':'disabled'}} 
								/>
								<label for="yearly1">बार्षिक</label>
							</div>
							<div class="col-sm-6">
								<input
									type="radio"
                  {{$application->fixed_payment=='whole'?'checked':'disabled'}} 
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
					<input type="radio"  {{$application->salutation=='mr'?'checked':'disabled'}} />
					<label for="mr">Mr. ( श्रीमान )</label>
					<input
						type="radio"
						class="ml-3"
						{{$application->salutation=='mrs'?'checked':'disabled'}}           
					/>
					<label for="mrs">Mrs. ( श्रीमती )</label>
					<input
						type="radio"
						class="ml-3"
						{{$application->salutation=='ms'?'checked':'disabled'}} 
					/>
					<label for="ms">Ms. ( सुश्री )</label>
					<input
						type="radio"
						class="ml-3"
						{{$application->salutation=='minor'?'checked':'disabled'}} 
					/>
					<label for="minor">Minor ( नाबालक )</label>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Full Name (पुरा नाम)* : </label>
							<input
								type="text"
								class="form-control"
								value="{{ $application->fullName}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Father's Name (बाबुको नाम )* :</label>
							<input
								type="text"
								class="form-control "
								value="{{ $application->fatherName }}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Mother's Name (आमाको नाम )* : </label>
							<input
								type="text"
								class="form-control "
								value="{{$application->motherName}}" disabled
							/>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Grandfather's Name (बाजेको नाम)* : </label>
							<input
								type="text"
								class="form-control "
								value="{{$application->grandfatherName }}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Husband/Wife's Name (श्रीमान/श्रीमतीको नाम ) </label>
							<input
								type="text"
								class="form-control"
								value="{{$application->spouseName}}" disabled
							/>
						</div>
					</div>
				</div>
			</div>
			<hr />

      <div id="permanent">
	<h4 class="mt-3">Permanent Address (ईस्थायी ठेगाना)</h4>
	<div class="row mt-3">
		<div class="col-sm-3">
			<div class="form-group">
				<label>State (प्रदेश) </label>
				<input
					type="text"
					class="form-control"
					value="{{$application->permanent_state}}" disabled
				/>
			</div>
		</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>District (जिल्ला )* : </label>
					<input
						type="text"
						class="form-control"
						value="{{$application->permanent_district}}" disabled
					/>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="form-group">
					<label>RM/Municipality (नगरपालिका/गाउपालिका)* : </label>
					<input
						type="text"
						class="form-control"
						value="{{$application->permanent_municipality}}" disabled
					/>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-sm-4">
				<div class="form-group">
					<label>Ward No. (वडा नम्बर)* : </label>
					<input
						type="number"
						class="form-control"
						value="{{$application->permanent_ward}}" disabled
					/>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>Tole (टोल) : </label>
					<input
						type="text"
						class="form-control"
						value="{{$application->permanent_tole}}" disabled
					/>
				</div>
			</div>
		</div>
	</div>
</div>
			<hr />
			<div id="temp">
				<h4 class="mt-5">Temporary Address (अस्थाई ठेगाना )</h4>
				<div class="row mt-3">
					<div class="col-sm-3">
						<div class="form-group">
							<label>State (प्रदेश) </label>
              <input
								type="text"
								class="form-control"
                value="{{$application->temporary_state}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>District (जिल्ला ) * </label>
							<input
								type="text"
								class="form-control"
                value="{{$application->temporary_district}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>RM/Municipality (नगरपालिका/गाउपालिका)* : </label>
							<input
								type="text"
								class="form-control"
                value="{{$application->temporary_municipality}}" disabled
							/>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Ward No. (वडा नम्बर)* : </label>
							<input
								type="number"
								class="form-control"
                value="{{$application->temporary_ward}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Tole (टोल) </label>
							<input
								type="text"
								class="form-control"
                value="{{$application->temporary_tole}}" disabled
							/>
						</div>
					</div>
				</div>
			</div>

			<div id="other">
				<div class="row mt-2">
					<div class="col-sm-4">
						<label>Date of Birth (जन्म मिति)* : </label>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
                  <input
                  type="text"
                  class="form-control"
                  value="{{$application->dob_year}}" disabled
                  />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
								<input
                  type="text"
                  class="form-control"
                  value="{{$application->dob_month}}" disabled
                  />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  value="{{$application->dob_day}}" disabled
                  />
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Citizenship/PP No. (नागरिकता/राहदानी नम्बर)* : </label>
							<input
								type="text"
								class="form-control"
                value="{{$application->citizen_passport}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>जारी गरेको ठाउँ* : </label>
							<input
								type="text"
								class="form-control"
                value="{{$application->issued_place}}" disabled
							/>
						</div>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="ms">Marital Status (बैबाहिक ईस्थिति )</label> <br />
							<input
								type="radio"
								class="ml-2"
								{{$application->marital_status=='married'?'checked':'disabled'}} 
							/>
							<label for="married">Married (बिबाहित )</label>
							<br />
							<input
								type="radio"
								class="ml-2"
                {{$application->marital_status=='unmarried'?'checked':'disabled'}} 
							/>
							<label for="unmarried">Unmarried (अबिबाहित )</label>
							<br />
							<input
								type="radio"
								class="ml-2"
                {{$application->marital_status=='others'?'checked':'disabled'}} 
							/>
							<label for="others">Others (अन्य )</label>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="nationality">Nationality(राष्ट्रियता )</label>
							<input
								type="text"
								class="form-control"
                value="{{$application->nationality}}" disabled
							/>
						</div>
					</div>

					<div class="col-sm-5">
						<div class="form-group">
							<label for="ms">Occupation (पेशा) </label> <br />
							<div class="row">
								<div class="col-sm-6">
									<input
										type="radio"
										class="ml-2"
                   {{$application->occupation=='service'?'checked':'disabled'}} 
									/>
									<label for="service">Service (नोकरी)</label>
									<br />
								</div>
								<div class="col-sm-6">
									<input
										type="radio"
										class="ml-2"
                    {{$application->occupation=='business'?'checked':'disabled'}} 
									/>
									<label for="business"> Business (ब्यापार)</label> <br />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<input
										type="radio"
										class="ml-2"
                    {{$application->occupation=='student'?'checked':'disabled'}} 
									/>
									<label for="student">Student (विद्यार्थी)</label> <br />
								</div>
								<div class="col-sm-6">
									<input
										type="radio"
										class="ml-2"
                    {{$application->occupation=='agriculture'?'checked':'disabled'}} 
									/>
									<label for="agriculture"> Agriculture (कृषि)</label> <br />
								</div>
							</div>
							<input
								type="radio"
								class="ml-2"
                {{$application->occupation=='others'?'checked':'disabled'}} 
							/>
							<label for="others-1"> Others (अन्य)</label>
						</div>
					</div>
				</div>
				<hr />
				<label for="contact"><strong>Contact No. (सम्पर्क फोन)</strong> </label>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="mobile">Mobile No. (मोबाइल)* :</label>
							<input
								type="number"
								class="form-control"
                value="{{$application->mobile}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="mobile">Office No.(कार्यालय):</label>
							<input
								type="number"
								class="form-control"
                value="{{$application->office_number}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="mobile">Residence No.(निवास):</label>
							<input
								type="number"
								class="form-control"
                value="{{$application->residence_number}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="mobile">Email (ईमेल):</label>
							<input
								type="email"
								class="form-control"
                value="{{$application->email}}" disabled
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
						class="ml-3"
						{{$application->minor=='no'?'checked':'disabled'}} 
					/>
					<label for="Minor-No">No</label>
					<input
						type="radio"
						class="ml-3"
						{{$application->minor=='yes'?'checked':'disabled'}} 
					/>
					<label for="Minor-Yes">Yes</label>
				</div>
				<div class="{{$application->minor=='no'?'d-none':''}}" id="minor-rows">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Guardian's Name (संरक्क्षकको नाम)* : </label>
								<input
									type="text"
									class="form-control"
                  value="{{$application->guardian_name}}" disabled
								/>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Relation (नाता)* : </label>
								<input
									type="text"
									class="form-control"
                  value="{{$application->guardian_relation}}" disabled
								/> 
							</div>
						</div>
						<div class="col-sm-4">
							<label>Date of Birth (जन्म मिति)* : </label>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
                  <input
									type="text"
									class="form-control"
                  value="{{$application->guardian_year}}" disabled
								/>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
									<input
									type="text"
									class="form-control"
                  value="{{$application->guardian_month}}" disabled
								/>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
                    <input
                    type="text"
                    class="form-control"
                    value="{{$application->guardian_day}}" disabled
                  />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label>Citizenship/PP No. (नागरिकता/राहदानी नम्बर): </label>
								<input
									type="text"
									class="form-control"
                  value="{{$application->guardian_citizen_passport}}" disabled
								/>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group text-center">
								<label for="guardiansign"
									>Guardian's Signature (संरक्क्षकको दस्तखत )* :</label
								> <br>
								<img src="/storage/app/public/guardian_signatures/{{$application->guardian_signature}}" alt="Applicant image" width="120px">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="facility" class="mt-3">
				<h3>४. अन्य सुभिधा</h3>
				<hr />
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="mobilebanking"
								>Mobile banking (मोबाइल बैंकिंग सुभिधा ):</label
							>
							<br />
							<input
								type="radio"
								class="ml-3"
                {{$application->mobile_banking=='yes'?'checked':'disabled'}} 
							/>
							<label for="mobile-yes">लिने</label>
							<input
								type="radio"
								class="ml-3"
                {{$application->mobile_banking=='no'?'checked':'disabled'}} 
							/><label for="mobile-no"> नलिने</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="smsbanking"
								>SMS banking (एस.एम.एस. बैंकिंग सुभिधा ):</label
							>
							<br />
							<input
								type="radio"
								class="ml-3"
                {{$application->sms_banking=='yes'?'checked':'disabled'}} 
							/>
							<label for="sms-yes">लिने</label>
							<input
								type="radio"
								class="ml-3"
                {{$application->sms_banking=='no'?'checked':'disabled'}} 
							/><label for="sms-no"> नलिने</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="method"><strong>बचत संकलनको व्यवास्था : </strong></label>
					<br />
					<input
						type="radio"
            {{$application->collection_service=='representer'?'checked':'disabled'}} 
					/>
					<label for="representer"
						>संस्थाको बजार प्रतिनिधिद्वारा बचत संकलन गर्ने</label
					>
					<br />
					<div class="row mt-2 pl-5" id="representer">
						<div class="col-sm-4">
							<label for="place">संकलन गर्ने स्थान* : </label>
							<input
								type="text"
								class="form-control"
								value="{{$application->collection_point}}" disabled
							/>
						</div>
						<div class="col-sm-4">
							<label for="place">संकलन गर्ने दिन (मासिक बचतको हकमा ) </label>
							<input
								type="text"
								class="form-control"
								value="{{$application->collection_day}}" disabled
							/>
						</div>
					</div>
					<input
						type="radio"
						class="mt-2"
            {{$application->collection_service=='own'?'checked':'disabled'}} 
					/>
					<label for="own" class="mt-2"
						>बचतकर्ता स्वयम् कार्यालयमा आएर बचत गर्ने </label
					><br />
					<input
						type="radio"
            {{$application->collection_service=='bank'?'checked':'disabled'}} 
					/><label for="collect-bank">
						संस्थाको बैंक खाता मार्फत बचत गर्ने </label
					><br />
					<input
						type="radio"
            {{$application->collection_service=='mobile-collect'?'checked':'disabled'}} 
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
					<div class="col-sm-5">
						<div class="form-group">
							<label>Nominee's Name (इच्छाएको व्यक्तिको नाम) : </label>
							<input
								type="text"
								class="form-control"
								value="{{$application->nominee_name}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label>Relation (नाता) : </label>
							<input
								type="text"
								class="form-control"
								value="{{$application->nominee_relation}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Citizenship/PP No. (नागरिकता/राहदानी नम्बर) : </label>
							<input
								type="text"
								class="form-control"
								value="{{$application->nominee_citizen_passport}}" disabled
							/>
						</div>
					</div>
				</div>
			</div>
			<div id="introducer" class="mt-3">
				<h3>६. परिचय गराउने</h3>
				<hr />
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Inroducer's Name (परिचय गराउनेको नाम): </label>
							<input
								type="text"
								class="form-control"
								value="{{$application->introducer_name}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Contact Number (परिचय गराउनेको फोन): </label>
							<input
								type="number"
								class="form-control"
								value="{{$application->introducer_phone}}" disabled
							/>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>A/c Number (परिचय गराउनेको खाता नं ): </label>
							<input
								type="text"
								class="form-control"
								value="{{$application->introducer_account}}" disabled
							/>
						</div>
					</div>
				</div>
			</div>
			<div id="introducer" class="my-3">
				<h3>७. खाता खोल्दा चाहिने कागजातहरु</h3>
				<hr />
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group  text-center">
							<label for="citizenship">नागरिकता/राहदानीको प्रमाणपत्र* :</label> <br>
              <img src="/storage/app/public/citizenship_passport/{{$application->citizen_passport_upload}}" alt="Applicant image" width="120px">

						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group text-center">
							<label for="citizenship"
								>हालसालै खिचेको पस्स्पोर्ट साइजको फोटो* :
							</label> <br>
						<img src="/storage/app/public/applicant_photos/{{$application->photo_upload}}" alt="Applicant image" width="120px">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group  text-center">
							<label for="citizenship">निवेदकको दस्तखत : </label> <br>
              <img src="/storage/app/public/applicant_signatures/{{$application->signature_upload}}" alt="Applicant image" width="120px">
						</div>
					</div>
				</div>
				<div class="row">
          @if($application->joint_upload)
					<div class="col-sm-4">
						<div class="form-group text-center">
							<label for="citizenship"
								>संयुक्त खाताको हकमा खातावालबीच भएको सम्झौता:
							</label> <br> 
              <img src="/storage/app/public/joint_uploads/{{$application->joint_upload}}" alt="Applicant image" width="120px">
						</div>
          </div>
          @endif
          @if($application->right_thumb_upload)
					<div class="col-sm-4">
						<div class="form-group text-center">
							<label for="citizenship">दायाँ औठा छाप: </label> <br>
              <img src="/storage/app/public/right_thumbs/{{$application->right_thumb_upload}}" alt="Applicant image" width="120px">
						</div>
          </div>
          @endif
          @if($application->left_thumb_upload)
					<div class="col-sm-4">
						<div class="form-group text-center">
							<label for="citizenship">बाँया औठा छाप: </label> <br>
              <img src="/storage/app/public/left_thumbs/{{$application->left_thumb_upload}}" alt="Applicant image" width="120px">
						</div>
          </div>
          @endif
				</div>
      </div>
    </div>
	</form>
</div>
</div>
@endsection 
@section('scripts')
<script> 
	$(document).ready(function(){
		window.print();
	})
</script> 
@endsection
