@extends($layout)

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Classement général par équipe</h4>
              
                <div class="table-responsive">
                  <?php $i=0; ?>
                @foreach($listeCategorie as $categorie)
                  <h2>Catégorie {{$categorie->nomcategorie}}</h2>
                  <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              Rang
                            </th>
                            <th>
                              Equipe
                            </th>
                            <th>
                              Durée
                            </th>
                            <th>
                              Point
                            </th>
                          </tr>
                        </thead>
                        
                        <tbody>

                            @foreach($classement as $c)
                              @if($c->categorie == $categorie->id)
                                <tr class="<?php echo $c->couleur; ?>">
                                  <td>{{$c->rang}}</td>
                                  <td>{{$c->nomequipe}}</td>
                                  <td>{{gmdate("H:i:s", $c->duree);}}</td>
                                  <td>{{$c->point}}</td>
                                </tr>
                              @endif
                            @endforeach

                        </tbody>
                      </table>

                      <div class="graph" style="width: 30rem; margin: 20px auto;"><canvas id="{{'camembert-chart'.$i}}"></canvas></div>

                            <?php 
                              if(count($label)>0){  ?>

                             
                            <script>
                                var ctx = document.getElementById(<?php echo "'"."camembert-chart".$i."'"; ?>).getContext('2d');

                                var data = {
                                    labels: <?php echo json_encode($label[$i]); ?>,
                                    datasets: [{
                                        data: <?php echo json_encode($data[$i]); ?>,
                                        borderWidth: 1
                                    }]
                                };

                                var options = {
                                    title: {
                                        display: true,
                                        text: 'Exemple de Camembert avec Chart.js'
                                    }
                                };

                                var myPieChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: data,
                                    options: options
                                });
                            </script>
                  <?php }
                             $i++; ?>
                  @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
