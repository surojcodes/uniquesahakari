@extends('layouts.base')
@section('title')
Unique Cooperative | Board of Directors
@endsection
@section('content')
 <section class="team" style="margin-top: 0.6rem; padding-top:0">
      <div class="container">
        <div class="section-title">
          <span>Board of Directors</span>
          <h2>Board of Directors</h2>
          <hr style='width:40%'>
        </div>
        @if($top_member)
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 col-sm-6 text-center">
            <div class="member d-flex align-items-center flex-column ">
              <div class="pic"><img src="/storage/bod/{{$top_member->image}}" class="img-fluid" alt="{{$top_member->name}}"></div>
              <div class="member-info mt-3 text-center mx-0 px-0">
                <h4>{{$top_member->name}}</h4>
                <span class="pb-0">{{$top_member->position}}</span>
                <hr>
                <p>{{$top_member->text}}</p>
              </div>
            </div>
          </div>
        </div>
        @endif
        <div class="row">
      @forelse($members as $member)
          <div class="col-lg-4 col-md-6 col-sm-6 text-center">
            <div class="member d-flex align-items-center flex-column ">
              <div class="pic"><img src="/storage/bod/{{$member->image}}" class="img-fluid" alt="{{$member->name}}"></div>
              <div class="member-info mt-3 text-center mx-0 px-0">
                <h4>{{$member->name}}</h4>
                <span class="pb-0">{{$member->position}}</span>
                <hr>
                <p>{{$member->text}}</p>
              </div>
            </div>
          </div>
      @empty
        
      @endforelse
        </div>
      </div>
    </section>
@endsection