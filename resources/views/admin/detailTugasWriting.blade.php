@extends('topnav.topnavAdmin')
@section('content')

@include('master.detailTugasWriting')


@endsection
@section('script')
<script>
         $(function () {
             $("#example1")
                 .DataTable({
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
                     
                 })
                 .buttons()
                 .container()
                 .appendTo("#example1_wrapper .col-md-6:eq(0)");
             $("#example2").DataTable({
                 paging: true,
                 lengthChange: false,
                 searching: false,
                 ordering: true,
                 info: true,
                 autoWidth: false,
                 responsive: true,
             });
         });
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
