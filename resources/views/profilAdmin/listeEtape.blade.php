@extends('layoutAdmin')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Liste étape</h4>
              
                <div class="table-responsive">
                
                <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nom
                          </th>
                          <th>
                            Nombre coureur
                          </th>
                          <th>
                            Longueur
                          </th>
                          <th>
                            Rang
                          </th>
                          <th>
                            Départ
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody>

                          @foreach($listeEtape as $etape)
                            <tr>
                              <td>{{$etape->nom}}</td>
                              <td>{{$etape->nbcoureur}}</td>
                              <td>{{$etape->longueur}}</td>
                              <td>{{$etape->rang}}</td>
                              <td>{{$etape->depart}}</td>
                              <td>  
                                  <a href="{{route('equipe.versinsertionderoulement',$etape->id)}}" type="button" class="btn btn-outline-primary btn-fw">Affecter temps</a>
                              </td>
                            </tr>
                          @endforeach
                        
                      </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
