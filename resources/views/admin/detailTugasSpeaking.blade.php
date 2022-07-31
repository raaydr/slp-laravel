@extends('topnav.topnavAdmin')
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
         $('#modal-note').on('show.bs.modal', function (event) {
             
             var button = $(event.relatedTarget) // Button that triggered the modal
             var tugas_id = button.data('tugas_id')
             var target_id = button.data('target_id')
         
             console.log('modal kebuka');
          
             var modal = $(this)
             modal.find('.modal-body #tugas_id').val(tugas_id)
             modal.find('.modal-body #target_id').val(target_id)
           
         });
         function goBack() {
        window.history.back();
        }
      </script>
@endsection
