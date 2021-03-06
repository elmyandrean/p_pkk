@extends('layouts.app')

@section('title', 'Transactional')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" >Data Transactional</h3>
        @if(Auth::user()->type == 1 || Auth::user()->type == 4)
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary btn-sm pull-right" onclick="modalInsert()">
            New Data
          </button>
        </div>
        @endif
      </div>
      <div class="box-body" id="data-funding">
        
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
  <!-- DataTables -->
  <script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    loadData();
  });

  function loadData()
  {
    var url = '{{route('data.transactionals')}}';
    $('#data-funding').html(loadingHTML);
    $('#data-funding').load(url);

    return false;
  }

  function modalInsert()
  {
    var url = '{{route('transactionals.create')}}';

    $("#modal").modal("show");
    $('#modal-content').html(loadingHTML);
    $('#modal-content').load(url);

    return false;
  }

  function modalEdit(id)
  {
    var url = baseUrl+'/transactionals/'+id+'/edit';

    $("#modal").modal("show");
    $('#modal-content').html(loadingHTML);
    $('#modal-content').load(url);

    return false;
  }

  function deleteButton(id, elem){
    event.preventDefault();
    
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Transactional!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var data =  jQuery(elem).closest("form").serialize();
        var url =  jQuery(elem).closest("form").attr('action');

        $.ajax({
          type: "POST",
          url: url,
          data: data,
          dataType: "JSON",
          success: function(data){
            swal("Success", "Transactional has ben deleted!")
            // loadData();
            location.reload()
          }
        });
      }
    });
  };

  function approvedButton(id, elem){
    event.preventDefault();

    swal({
      title: "Are you sure?",
      text: "to Approve this Transactional!",
      icon: "warning",
      buttons: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        
        var data =  jQuery(elem).closest("form").serialize();
        var url =  baseUrl+'/transactionals/'+id+'/approve';

        $.ajax({
          type: "PUT",
          url: url,
          data: data,
          dataType: "JSON",
          success: function(data){
            swal("Success", "Transactional has ben approved!")
            // loadData();
            location.reload()
          }
        });
      }
    });

    // $(this).closest("[_method]").value = 'PUT';
  };
</script>
@endsection