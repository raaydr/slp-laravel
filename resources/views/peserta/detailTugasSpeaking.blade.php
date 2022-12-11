@extends('topnav.topnavPeserta')
@section('content')

@include('master.detailTugasSpeaking')


@endsection
@section('script')
<script>
          $(function () {
                $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
                });

                $('.filter-container').filterizr({gutterPixels: 3});
                $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
                });
            })
         
         function goBack() {
        window.history.back();
        }
      </script>
@endsection
