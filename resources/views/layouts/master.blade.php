@include('partials.header')
@yield('css')

<div id="loader" style="display: none;">
  <!-- Add your loader HTML or image here -->
  <img src="{{url('backend/loader.gif')}}">

</div>

<div class="content-wrapper main-container">



    
@yield('content')
   
</div>

@include('partials.footer')
@yield('js')
