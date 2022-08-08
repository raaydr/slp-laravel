@extends('topnav.topnavFasil')
@section('content')
@include('master.validasiTugas')
@endsection
@section('script')
      <script>
         $(function () {
            $("#example1")
                 .DataTable({
                     processing:true,
                     serverSide:true,
                     ajax : {
                        url : "{{route('fasil.tabelTugasWriting')}}",
                        type : 'GET'
                     },
                     columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data:'nama',name:'nama',searchable: true},
                        {data: 'Grup', name: 'Grup', orderable: true, searchable: true},
                        {data: 'target_tugas', name: 'target_tugas', orderable: true, searchable: true},
                        {data: 'judul', name: 'judul', orderable: true, searchable: true},
                        {data: 'Status', name: 'Status', orderable: true, searchable: true},
                        {data: 'action', name: 'action'},
                        
                        
                     ],
                     order:[[0,'asc']],
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
                     buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                     initComplete: function () {
                           // Apply the search
                           this.api()
                              .columns()
                              .every(function () {
                                 var that = this;
               
                                 $('input', this.footer()).on('keyup change clear', function () {
                                       if (that.search() !== this.value) {
                                          that.search(this.value).draw();
                                       }
                                 });
                              });
                     },
                 })
                 .buttons()
                 .container()
                 .appendTo("#example1_wrapper .col-md-6:eq(0)");
         });
         $(function () {
            $("#example2")
                 .DataTable({
                     processing:true,
                     serverSide:true,
                     ajax : {
                        url : "{{route('fasil.tabelTugasSpeaking')}}",
                        type : 'GET'
                     },
                     columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data:'nama',name:'nama',searchable: true},
                        {data: 'Grup', name: 'Grup', orderable: true, searchable: true},
                        {data: 'target_tugas', name: 'target_tugas', orderable: true, searchable: true},
                        {data: 'judul', name: 'judul', orderable: true, searchable: true},
                        {data: 'Status', name: 'Status', orderable: true, searchable: true},
                        {data: 'action', name: 'action'},
                        
                        
                     ],
                     order:[[0,'asc']],
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
                     buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                     initComplete: function () {
                           // Apply the search
                           this.api()
                              .columns()
                              .every(function () {
                                 var that = this;
               
                                 $('input', this.footer()).on('keyup change clear', function () {
                                       if (that.search() !== this.value) {
                                          that.search(this.value).draw();
                                       }
                                 });
                              });
                     },
                 })
                 .buttons()
                 .container()
                 .appendTo("#example1_wrapper .col-md-6:eq(0)");
         });
         $(function () {
            $("#example3")
                 .DataTable({
                     processing:true,
                     serverSide:true,
                     ajax : {
                        url : "{{route('fasil.tabelTugasEntrepreneur')}}",
                        type : 'GET'
                     },
                     columns:[
                        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data:'nama',name:'nama',searchable: true},
                        {data: 'Grup', name: 'Grup', orderable: true, searchable: true},
                        {data: 'target_tugas', name: 'target_tugas', orderable: true, searchable: true},
                        {data: 'judul', name: 'judul', orderable: true, searchable: true},
                        {data: 'Status', name: 'Status', orderable: true, searchable: true},
                        {data: 'action', name: 'action'},
                        
                        
                     ],
                     order:[[0,'asc']],
                     responsive: true,
                     lengthChange: false,
                     autoWidth: false,
                     buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                     initComplete: function () {
                           // Apply the search
                           this.api()
                              .columns()
                              .every(function () {
                                 var that = this;
               
                                 $('input', this.footer()).on('keyup change clear', function () {
                                       if (that.search() !== this.value) {
                                          that.search(this.value).draw();
                                       }
                                 });
                              });
                     },
                 })
                 .buttons()
                 .container()
                 .appendTo("#example1_wrapper .col-md-6:eq(0)");
         });
         
      </script>
@endsection
