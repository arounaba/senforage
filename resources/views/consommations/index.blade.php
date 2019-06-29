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
                  <p class="card-category"> Consommations
                      <a href="{{route('consommations.create')}}"><div class="btn btn-warning">Nouvelle Consommation <i class="material-icons">add</i></div></a> 
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="table-consommations">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                            Nom
                        </th>
                        <th>
                          Prenom
                        </th>
                        <th>
                          Compteur
                        </th>
                        <th>
                          Valeur Consommation
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
<div class="modal fade" id="modal_delete_consommation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <form method="POST" id="form-delete-consommation">
    {{ csrf_field() }}
    @method('DELETE')
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Etes-vous sûr de vouloir supprimer</h5>
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
          $('#table-consommations').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('consommations.list')}}",
            columns: [
                    { data:  'id', name: 'id' },
                    { data:  'created_at', name: 'created_at' },
                    { data: 'compteur.abonnement.client.user.name', name: 'compteur.abonnement.user.name' },
                    { data: 'compteur.abonnement.client.user.firstname', name: 'compteur.abonnement.user.firstname' },
                    { data: 'compteur..numero_serie', name: 'compteur..numero_serie' },
                    { data: 'valeur', name: 'valeur' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('consommations.edit',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('consommations.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary " ><i class="material-icons">edit</i></a>'+
                        '<div class="btn btn-danger delete btn_delete_consommation" data-href='+url_d+'><i class="material-icons">delete</i></div>';
                        },
                        "targets": 6
                        },

                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('consommations.edit',':id')!!}".replace(':id', data.id);
                    //         return check_status(data,url);
                    //     },
                    //     "targets": 1
                    // }
                ],
              // commande qui permet de voir la copy ou csv ou pdf
              dom: 'lBfrtip',
           buttons: [
           'copy', 'csv', 'excel', {
               extend: 'pdfHtml5',
               exportOptions: {
                   columns: [ 0, 1, 2, 5]
                  }
           },, 'print','columnsToggle'
           ],
          });

          $("#table-consommations").off('click', '.btn_delete_consommation').on('click', '.btn_delete_consommation', 
          function(){
            var href=$(this).data('href')
            $("#form-delete-consommation").attr('action',href);

            $("#modal_delete_consommation").modal(); 
          });
      });
      </script>

          
      @endpush