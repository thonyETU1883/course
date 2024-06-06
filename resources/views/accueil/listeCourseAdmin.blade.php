@extends($layout)

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title"> Equipe {{session()->get('name')}} </h4>
              
                <div class="table-responsive">

                @foreach($data as $key => $value)
                  <?php $idEtape = $key; ?>
                  <div>{{$data[$key]["nometape"]}} : {{$data[$key]["longueur"]}} km</div>
                  <div>Reste Coureur : {{$data[$key]["reste"]}} </div>
                  <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              Nom
                            </th>
                            <th>
                              Temps Chrono
                            </th>
                          </tr>
                        </thead>
                        
                        <tbody>

                          @foreach($value["donnee"] as $chrono)
                            <?php 
                              $chrono = json_decode($chrono,true); 
                              $vg = $chrono["etape"];
                              if($vg!=0){
                            ?>
                            <tr>
                              <td>{{$chrono["nomcoureur"]}}</td>
                              <td>{{gmdate("H:i:s",$chrono["duree"]);}}</td>
                            </tr>
                          <?php } ?>
                          @endforeach
                        </tbody>
                      </table>
                      <div style="padding: 20px;">
                            <a href="{{route('equipe.versAffectationCoureur',$idEtape)}}" type="button" class="btn btn-outline-primary btn-fw">Ajouté coureur</a>
                      </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
