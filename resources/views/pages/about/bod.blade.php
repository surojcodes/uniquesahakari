@extends('layouts.base')
@section('title')
Unique Cooperative | Board of Directors
@endsection
@section('content')
 <section id="team" class="team">
      <div class="container">
        <div class="section-title">
          <span>Board of Directors</span>
          <h2>Board of Directors</h2>
        </div>
        <div class="row">
      @forelse($members as $member)
          <div class="col-lg-4 col-md-6 col-sm-6 text-center">
            <div class="member d-flex align-items-center flex-column ">
              <div class="pic"><img src="/storage/bod/{{$member->image}}" class="img-fluid" alt="{{$member->name}}"></div>
              <div class="member-info mt-3">
                <h4>{{$member->name}}</h4>
                <span class="pb-0">{{$member->position}}</span>
                <hr>
                <p>{{$member->text}}</p>
              </div>
            </div>
          </div>
      @empty
        <h4 class="text-center">No members!</h4>
      @endforelse
        </div>
      </div>
    </section>
@endsection