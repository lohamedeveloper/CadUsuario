@extends('auth.layout')
@section('content')

<div class="container-xl">
   <div class="table-responsive">
      <div class="table-wrapper">
         <div class="table-title">
            <div class="row">
               <div class="col-sm-6">
                  <h2>Cadastro de <b>Usuários</b></h2>
               </div>
               <div class="col-sm-6">
                  <a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Novo Usuário</span></a>
               </div>
            </div>
         </div>
         <table class="table table-striped table-hover">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Ações</th>
               </tr>
            </thead>
            <tbody id="users_data">
            </tbody>
         </table>
         <p class="loading">Carregando Usuários</p>
      </div>
   </div>
</div>
<!-- Add Modal HTML -->
<div id="addUserModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Novo Usuário</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         </div>
         <div class="modal-body add_user">
            <div class="form-group">
               <label>Name</label>
               <input type="text" id="name_input" class="form-control" required>
            </div>
            <div class="form-group">
               <label>Email</label>
               <input type="email" id="email_input" class="form-control" required>
            </div>
            <div class="form-group">
               <label>Telefone</label>
               <input type="text" id="phone_input" class="form-control" required>
            </div>
         </div>
         <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-success" value="Cadastrar" onclick="addUser()">
         </div>
      </div>
   </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteUserModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Excluir Usuário</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         </div>
         <div class="modal-body">
            <p>Tem certeza de que deseja excluir esses registros ?</p>
            <p class="text-warning"><small>Essa ação não pode ser desfeita.</small></p>
         </div>
         <input type="hidden" id="delete_id">
         <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger" onclick="deleteUser()" value="Delete">
         </div>
      </div>
   </div>
</div>

<script>

$(document).ready(function() {
    usersList();

});

function usersList() {
    $.ajax({
        type: 'get',
        url: "users",
        success: function(response) {
            console.log(response);
            var tr = '';
            for (var i = 0; i < response.length; i++) {
                var id = response[i].id;
                var name = response[i].name;
                var email = response[i].email;
                var phone = response[i].phone;
                tr += '<tr>';
                tr += '<td>' + id + '</td>';
                tr += '<td>' + name + '</td>';
                tr += '<td>' + email + '</td>';
                tr += '<td>' + phone + '</td>';
                tr += '<td><div class="d-flex">';
                tr +=
                    '<a href="#deleteUserModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                    id +
                    '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                tr += '</div></td>';
                tr += '</tr>';
            }
            $('.loading').hide();
            $('#users_data').html(tr);
        }
    });
}

function addUser() {

    var name  = $('.add_user #name_input').val();
    var email = $('.add_user #email_input').val();
    var phone = $('.add_user #phone_input').val();

    $.ajax({
        type: 'post',
        data: {
            name:  name,
            email: email,
            phone: phone,

            _token: "{{ csrf_token() }}"
        },
        url: "usersAdd",
        success: function(response) {
            $('#addUserModal').modal('hide');
            usersList();
            alert(response.message);
        }
    })
}

function addTelefone(id = 2) {

   alert('Chegou aqui')
   $.ajax({
        type: 'post',
        data: {
            user_id: id,
            phone: phone_input,
            _token: "{{ csrf_token() }}"
        },
        url: "{{ url('phone-ad') }}",
        success: function(response) {
            console.log(response);
            // $('#NewTelefoneModal').modal('hide');
            usersList();
            alert(response.message);
        }
    })
}

function deleteUser() {
    var id = $('#delete_id').val();
    $('#deleteUserModal').modal('hide');
    $.ajax({
        type: 'get',
        data: {
            id: id,
        },
        url: "users-delete",
        success: function(response) {
            usersList();
            alert(response.message);
        }
    })
}



</script>
@endsection