@extends('layoutAdmin')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Liste étape</h4>
              
                <div class="table-responsive">

                <a href="{{route('penalite.versAjoutPenalite')}}" type="button" class="btn btn-primary">Ajout Pénalité</a>

                <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Etape
                          </th>
                          <th>
                            Equipe
                          </th>
                          <th>
                            Temps de pénalité
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody>

                          <?php $i = 0; ?>
                          @foreach($listePenalite as $penalite)
                            <tr>
                              <td>{{$penalite->nometape}}</td>
                              <td>{{$penalite->nomequipe}}</td>
                              <td>{{$penalite->penalite}}</td>
                              <td>
                                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{'#exampleModal'.$i}}">Supprimer</button>
                              </td>
                            </tr>

                            <div class="modal fade" id="{{'exampleModal'.$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Ete vous-sure de vouloir supprimer cette pénalité ? 
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('penalite.supprimerPenalite')}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="idPenalite" value="{{$penalite->id}}">
                                      <button type="submit" class="btn btn-primary">Supprimer</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php $i++; ?>
                          @endforeach

                      </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Ete vous-sure de vouloir supprimer cette pénalité ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Supprimer</button>
      </div>
    </div>
  </div>
</div>

@endsection
