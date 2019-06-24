@extends('layout.default')
@section('content')
  
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
               @if (session('message'))
                   <div class="alert alert-success">
                       {{ session('message') }}
                   </div>
                    @endif

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">SENFORAGE</h4>
                  <p class="card-category"> Clients
                      <a href="{{route('clients.selectvillage')}}"><div class="btn btn-warning">Nouveau Client <i class="material-icons">add</i></div></a> 
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="table-clients">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Nom
                        </th>
                        <th>
                            Prenom
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Action
                          </th>
                      </thead>
                      <tbody>
                          
                      </tbody>
                     
                    </table>
                
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              
            </div>
          </div>
        </div>
      </div>
      <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="modal_delete_client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <form method="POST" id="form-delete-client">
   {{ csrf_field() }}
  @method('DELETE')
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Etes-vous sûr de vouloir supprimé</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        cliquez sur fermer pour annuler
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
    </div>
  </div>
</div>
      @endsection

      @push('scripts')
      <script type="text/javascript">
      $(document).ready(function () {
          $('#table-clients').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('clients.list')}}",
            columns: [
                    { data:  'id', name: 'id' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.firstname', name: 'user.firstname' },
                    { data: 'user.email', name: 'user.email' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('clients.edit',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('clients.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary " ><i class="material-icons">edit</i></a>'+
                        '<div class="btn btn-danger delete btn_delete_client" data-href='+url_d+'><i class="material-icons">delete</i></div>';
                        
                        },
                        "targets": 4
                        },
                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('clients.edit',':id')!!}".replace(':id', data.id);
                    //         return check_status(data,url);
                    //     },
                    //     "targets": 1
                    // }
                ],
              
          });
          $("#table-clients").off('click','.btn_delete_client').on('click', '.btn_delete_client', 
          function(){
            var href=$(this).data('href');
            $("#form-delete-client").attr('action',href);
            $("#modal_delete_client").modal(); 
          });
          
      });
      </script>

          
      @endpush