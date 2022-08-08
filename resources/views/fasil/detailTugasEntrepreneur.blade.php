@extends('topnav.topnavFasil')
@section('content')

@include('master.detailTugasEntrepreneur')


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
        function rupiah(){
               var bilangan = {{$penjualan}};
               var	number_string = bilangan.toString(),
               sisa 	= number_string.length % 3,
               rupiah 	= number_string.substr(0, sisa),
               ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
               
               if (ribuan) {
                  separator = sisa ? '.' : '';
                  rupiah += separator + ribuan.join('.');
               }
               
               // Cetak hasil
               
                  
               
               $("omset").text("Rp "+rupiah)
         
         //the function body is the same as you have defined sue the textbox object to set the value
         }
         rupiah();
      </script>
@endsection
