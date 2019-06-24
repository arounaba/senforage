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
                  <p class="card-category"> Abonnements
                      <a href="{{route('abonnements.selectclient')}}"><div class="btn btn-warning">Nouvel Abonnement <i class="material-icons">add</i></div></a> 
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
                          Date
                        </th>
                        <th>
                          Prenom Client
                        </th>
                        <th>
                          Nom Client
                        </th>
                        <th>
                            abonnement
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
      
         <div class="modal fade" id="modal_delete_abonnement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <form method="POST" id="form-delete-abonnement">
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
           @if(Session::has('message'))
           {{ Session::get('message') }}
           </div>
         </div>
        </div>
         </div>
          @endsection                        
             
                 @push('scripts')
                 <script type="text/javascript">
                   $(document).ready(function () {
                    $("#error-modal").modal({
                    'show':true,
                                    })
                                });
                                </script>  
                                @endpush
                                @endif
                  
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
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
            "ajax": "{{route('abonnements.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'client.user.name', name: 'client.user.name' },
                    { data: 'client.user.firstname', name: 'client.user.firstname' },
                    { data: 'abonnement.numero_serie', name: 'abonnement.numero_serie' },
                    { data: null ,orderable: false, searchable: false}
                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('abonnements.show',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary " ><i class="material-icons">edit</i></a>';
                        },
                        "targets": 5
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
          $("#table-abonnements").off('click', '.btn_delete_abonnement').on('click', '.btn_delete_abonnement', 
           function(){
           var href=$(this).data('href')
           $("#form-delete-abonnement").attr('action',href);
          $("#modal_delete_abonnement").modal(); 
          });
      });
      </script>

          
      @endpush