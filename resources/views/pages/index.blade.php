@extends('layouts.base')
@section('title')
Unique Cooperative | Home
@endsection
@section('content')
<!-- ======= Hero Section ======= -->
@if(count($sliders)>0)
<section id="hero" class='mb-5'>
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <?php $i=0;?>
          @foreach($sliders as $slider)
          <?php $image = asset('storage/slider_images/'.$slider->image)?>
          <div class="carousel-item <?php if(++$i==1) echo 'active';?>" style="background-image:  url('{{$image}}');">
            <div class="carousel-container">
              <!-- <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>MyBiz</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
              </div> -->
            </div>
          </div>
          @endforeach
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
</section><!-- End Hero -->
@endif
<!-- Nepali Calender -->
<div class="container">
  <div class="row mb-5">
    <div class="col-md-8">
    <h5 class='ml-4'>Preeti to Unicode Converter</h5>
    <iframe src="https://www.ashesh.com.np/preeti-unicode/linkapi.php?api=6901z9k416" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:400px;" allowtransparency="true"></iframe>
    </div>
    <div class="col-md-4">
      <h4>Convert Date</h4>
      <iframe src="https://www.hamropatro.com/widgets/dateconverter.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:350px; height:150px;" allowtransparency="true"></iframe>
      
      <h4 class='mt-4'>Currency Converter</h4>
      <script type="text/javascript" src="//www.exchangeratewidget.com/converter.php?l=en&f=USD&t=NPR&a=1&d=F0F0F0&n=FFFFFF&o=000000&v=1"></script>
        
        
    </div>
  </div>
</div>


@if($notice)
<div class="modal fade" id="frontNoticeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLongTitle">{{$notice->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{!!$notice->detail!!}</p>
        @if($notice->image !='no-image.png')
          <img src="storage/notice_images/{{$notice->image}}" alt="Notice Image" width="100%">
        @endif
      </div>
    </div>
  </div>
</div>
@endif
@endsection
@section('scripts')
<script>
  $(document).ready(()=>{
          $.get('/get-front-notice/', (data)=>{
              if(data!={}){
                $('#frontNoticeModal').modal('show');
              }
          })
  });

</script>
@endsection