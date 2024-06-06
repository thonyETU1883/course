@extends($layout)

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Classement coureur</h4>
              
                <div class="table-responsive">

                <table class="table table-striped">
                      <thead>
                        <tr>
                          
                          <th>
                            Coureur
                          </th>
                          <th>
                            genre
                          </th>
                          <th>
                            Chrono
                          </th>
                          <th>
                            Pénalité
                          </th>
                          <th>
                            Temps final
                          </th>
                          <th>
                            Rang
                          </th>
                          <th>
                            Point
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody>

                          @foreach($classement as $classement)
                            <tr>
                                <td>{{$classement->nomcoureur}}</td>
                                <td>{{$classement->nomgenre}}</td>
                                <td>{{gmdate("H:i:s",$classement->duree); }}</td>
                                <td>{{gmdate("H:i:s",$classement->penaliteseconde); }}</td>
                                <td>{{gmdate("H:i:s",$classement->dureetotal); }}</td>
                                <td>{{$classement->rang}}</td>
                                <td>{{$classement->point}}</td>
                            </tr>
                          @endforeach
                        
                      </tbody>penaliteseconde
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
