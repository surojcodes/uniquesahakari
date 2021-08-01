@extends('layouts.base')
@section('title')
Unique Cooperative | Board of Directors
@endsection
@section('content')
<div class="container my-3">
 <div class="section-title">
    <span>Board of Directors</span>
    <h2>Board of Directors</h2>
    <hr style='width:40%'>
    <div class="row justify-content-center align-items-center">
      @forelse($members as $member)
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow-sm mb-4">
          <img src="/storage/bod/{{$member->image}}" class="card-img-top" alt="{{$member->name}}">
          <div class="card-body">
            <div class="text-center">
              <h4><strong>{{$member->name}}</strong></h4>
              <h5> <em>{{$member->position}}</em></h5>
            <p class="card-text">{{$member->text}}</p>
            </div>
          </div>
        </div>
      </div>
      @empty
        <h4 class="text-center">No members!</h4>
      @endforelse
    </div>
  </div>
</div>
@endsection