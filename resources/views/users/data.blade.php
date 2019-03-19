<table class="table">
  <thead>
    <tr>
      <th class="text-center">NIP</th>
      <th class="text-center">Nama</th>
      <th class="text-center">Email</th>
      <th class="text-center">Telp/HP</th>
      <th class="text-center">Position</th>
      <th class="text-center" width="10%">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->nip}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->position}}</td>
      <td class="text-center">
        <form action="{{route('users.destroy', $user->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-default btn-xs" title="Reset Password"><i class="fa fa-refresh"></i></button>
          <button type="button" class="btn btn-warning btn-xs" title="Edit User" onclick="modalEdit('{{$user->id}}')"><i class="fa fa-edit"></i></button>
          <button type="submit" class="btn btn-danger btn-xs" title="Delete User"><i class="fa fa-trash"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<script>
  $(".table").dataTable();

  $("#formEdit").submit(function(e){
    e.preventDefault();
    
    var data = $("#formEdit").serialize();
    var url = $("#formEdit").attr('action');

    $.ajax({
      type: "POST",
      url: url,
      data: data,
      dataType: "JSON",
      success: function(data){
        if (data.status == 'errors') {
          $.each(data.errors, function(key, value){
            $('.alert-danger').show();
            $('.alert-danger').append('<p>'+value+'</p>');
          });
        } else {
          $("#modal").modal("hide");
          loadData();
        }
      }
    });
  });
</script>