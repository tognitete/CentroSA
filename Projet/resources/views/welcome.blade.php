@extends('Layout.default')

@section('content')

@include('Layout.partials._nav')
<div id="myCarousel" class="carousel slide" data-ride="carousel" class="slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="/images/1.jpg" alt="Los Angeles" style="width:100%;height:600px">
      </div>

      <div class="item">
        <img src="/images/2.jpg" alt="Chicago" style="width:100%;height:600px">
      </div>
    
      <div class="item">
        <img src="/images/3.jpg" alt="New york" style="width:100%;height:600px">
      </div>
      <div class="item">
        <img src="/images/4.jpg" alt="New york" style="width:100%;height:600px">
      </div>
      <div class="item">
        <img src="/images/5.jpg" alt="New york" style="width:100%;height:600px">
      </div>
      <div class="item">
        <img src="/images/6.jpg" alt="New york" style="width:100%;height:600px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<div style="height:60px;background-color:rgb(213,92,4)">

</div>
@stop
