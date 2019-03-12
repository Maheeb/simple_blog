<!DOCTYPE html>
<html lang="en">
@include('seo.head')


<body class=" ">

<div class="content-wrapper">

  @include('seo.header')


    <div class="header-spacer"></div>

    @yield('content')




    <!-- Subscribe Form -->



    <!-- End Subscribe Form -->
</div>



<!-- Footer -->

@include('seo.footer')

<!-- End Footer -->



<!-- Overlay Search -->

@include('seo.fd')

<!-- End Overlay Search -->

<!-- JS Script -->

@include('seo.script')


<!-- ...end JS Script -->

</body>
</html>
