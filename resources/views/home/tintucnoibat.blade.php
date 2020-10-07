@extends('layout.index') @section('title',"Tin tức nổi bật")
@section('content')

<!-- Page Content -->

<div style="padding-top: 110px;">
     @include('layout.menu')

<div class="container">

   <!-- Page Content -->

      <a class="mt-4" style=" font-size: 30px; " ><svg class="bi bi-bookmark-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4.5 2a.5.5 0 00-.5.5v11.066l4-2.667 4 2.667V8.5a.5.5 0 011 0v6.934l-5-3.333-5 3.333V2.5A1.5 1.5 0 014.5 1h4a.5.5 0 010 1h-4zm9-1a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V1.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M13 3.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd"/>
</svg> TIN TỨC <i class="fa fa-angle-right" aria-hidden="true"></i> HOT</a>
      <div class="row mt-2 ">
         @foreach($tintucnb1 as $ttnb1)
         <div class="col">
            <div class="card mb-3" style="width: 730px; height:600px;">
               <a href="tintuc/{{$ttnb1['id']}}/{{$ttnb1['TieuDeKhongDau']}}.html"><img src="public/upload/tintuc/{{$ttnb1['Hinh']}}" class="card-img-top" style="max-height:460px;width: 728px;"alt="..."></a>
               <div class="card-body">
                  <h5 class="card-title" id="main-card-title" style="font-size: 18px"><a href="tintuc/{{$ttnb1['id']}}/{{$ttnb1['TieuDeKhongDau']}}.html">{!!Str::limit($ttnb1['TieuDe'],100)!!}</a></h5>
                  <a class="card-text" id="main-card-tomtat"style="font-size: 16px">{!!Str::limit($ttnb1['TomTat'],300)!!}</a>
                  <a class="card-text card-bottom" style="font-size: 14px;">Đăng vào lúc: {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ttnb1['created_at'])->format('H:i d/m/Y') }}</a>

               </div>
            </div>
         </div>
         @endforeach
  <div class="col">
            @foreach($tintucnb2 as $ttnb2)
            <div class="row mb-">
               <div class="card ml-4" style="width: 340px; height: 300px;">
                  <a href="tintuc/{{$ttnb2['id']}}/{{$ttnb2['TieuDeKhongDau']}}.html"><img src="public/upload/tintuc/{{$ttnb2['Hinh']}}" class="card-img-top" style="width: 338px; height: 250px;" alt="..."></a>
                  <a href="/tintuc/tieude/{{$ttnb2['TieuDeKhongDau']}}">
                  <a href="tintuc/{{$ttnb2['id']}}/{{$ttnb2['TieuDeKhongDau']}}.html">
                     <div class="card-body">
                        <h5 class="card-title" style="font-size: 14px;">{{Str::limit($ttnb2['TieuDe'],100)}}</h5>
                     </div>
                  </a>
                  </a>
               </div>
            </div>
            @endforeach
         </div>
      </div>
      <div class="row mt-4">
         @foreach($tintucnb3 as $ttnb3)
         <div class="col">
            <div class="card" style="width: 340px;">
               <a href="tintuc/{{$ttnb3['id']}}/{{$ttnb3['TieuDeKhongDau']}}.html"><img src="public/upload/tintuc/{{$ttnb3['Hinh']}}" class="card-img-top" style="width: 338px; height: 249px;" alt="..."></a>
               <a href="tintuc/{{$ttnb3['id']}}/{{$ttnb3['TieuDeKhongDau']}}.html">
                  <div class="card-body">
                     <h5 class="card-title"style="font-size: 14px;">{{Str::limit($ttnb3['TieuDe'],100)}}</h5>
                  </div>
               </a>
            </div>
         </div>
         @endforeach
         </div>

    <div class="space20" style="height: 10px;"></div>

         <div class="card mb-3"style="width: 1100px;"">
         @foreach($tintucnb4 as $tt)
         <div class="row no-gutters">
            <div class="col-md-4">
               <a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html"><img src="public/upload/tintuc/{{$tt['Hinh']}}" class="card-img-top" style="height:150px;" alt="..."></a>
            </div>
            <div class="col-md-8">
               <div class="card-body">
                  <a href="tintuc/{{$tt['id']}}/{{$tt['TieuDeKhongDau']}}.html">
                     <h5 class="card-title" style="font-size: 20px;">{{Str::limit($tt['TieuDe'],100)}}</h5>
                  </a>
                  <h5 class="card-text" style="font-size: 16px;">{!!Str::limit($tt['TomTat'],300)!!}</h5>
                  <a class="card-text card-bottom" style="font-size: 14px;">Đăng vào lúc: {{$tt['created_at']}}</p>
               </div>
            </div>
            <div class="break"></div>
            <div class="space20" style="height: 10px;"></div>
         </div>
         @endforeach
      </div>
   </div>-->
</div>
@endsection
