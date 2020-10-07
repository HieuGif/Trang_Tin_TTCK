<div class="container">
<div class="row carousel-holder">
    <div class="col-lg-12" style="padding-left: 5px; padding-right: 5px">
  
     
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
     <?php $i = 0; ?>
    @foreach($slide as $sl)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" 
        @if($i==0) 
        class="active" 
        @endif></li>
    <?php $i++; ?>
    @endforeach
  </ol>


  <div class="carousel-inner">
    <?php $i = 0; ?>
    @foreach($slide as $sl)
    <div 
    @if($i == 1) 
      class="carousel-item active" 
    @else 
      class="carousel-item" 
    @endif>

    <?php $i++; ?>          
    <a href="{{$sl->Link}}" target="_blank"  ><!--motagmoikhinhapquangcao--> <img class="d-block w-100" src="public/upload/slide/{{$sl->Hinh}}" alt="{{$sl->NoiDung}}"></a>
    </div>
@endforeach
</div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
</div>

