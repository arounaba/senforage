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
                  <p class="card-category"> Factures
                      <a href="{{route('factures.create')}}"><div class="btn btn-warning">Nouvelle Facture <i class="material-icons">add</i></div></a> 
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="table-factures">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Date  Limite
                        </th>
                        <th>
                        Valeur Total Consommée
                        </th>
                        <th>
                          Montant
                        </th>
                        <th>
                          Debut Consommation
                          </th>
                          <th>
                          Fin Conommation
                          </th>
                          <th>
                          Action
                        </th>
                        <th>
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
<div class="modal fade" id="modal_delete_facture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <form method="POST" id="form-delete-facture">
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
          $('#table-factures').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('factures.list')}}",
            columns: [
                    { data:  'id', name: 'id' },
                    { data: 'date_limite', name: 'date_limite' },
                    { data: 'valeur_total_consommée', name: 'valeur_total_consommée' },
                    { data: 'montant', name: 'montant' },
                    { data: 'debut_consommation', name: 'debut_consommation' },
                    { data: 'fin_consommation', name: 'fin_consommation' },
                    { data: null ,orderable: false, searchable: false}
                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('factures.show',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('reglements.create',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary " title="Afficher Facture" >Afficher<i class="material-icons"></i></a>'+
                        '<a class="btn btn-success delete" href='+url_d+'>Effectuer<i class="material-icons"></i></a>';
                        },
                        "targets": 6
                        },

                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('factures.edit',':id')!!}".replace(':id', data.id);
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
          //  commande qui permet de rendre actif les flechecad veut voir que 10 ou 25
           "lengthMenu": [ [10, 25, 50,1000, -1], [10, 25, 50, 1000, "All"] ]
          });

          $("#table-factures").off('click', '.btn_delete_facture').on('click', '.btn_delete_facture', 
          function(){
            var href=$(this).data('href')
            $("#form-delete-facture").attr('action',href);

            $("#modal_delete_facture").modal(); 
          });
      });
      </script>

          
      @endpush