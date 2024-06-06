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
                            Rang
                          </th>
                          <th>
                            Equipe
                          </th>
                          <th>
                            Point
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody>

                          @foreach($classement as $classement)
                            <tr>
                                <td>{{$classement->rang}}</td>
                                <td>{{$classement->nomequipe}}</td>
                                <td>{{$classement->point}}</td>
                                <td>  
                                  <a href="{{route('equipe.detailPointEquipe',$classement->equipe)}}" type="button" class="btn btn-outline-primary btn-fw">Detail</a>
                                </td>
                            </tr>
                          @endforeach
                        
                      </tbody>
                    </table>

                </div>

                <div style="padding-top: 10px;">
                  <a href="{{route('equipe.genererPdfCertificat')}}" type="button" class="btn btn-success">Générer Pdf</a>
                </div>

                  <div class="graph" style="width: 30rem; margin: 20px auto;">
                        <canvas id="camembert-chart" style="display: block; margin: 0 auto;"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>



<script>
    var ctx = document.getElementById('camembert-chart').getContext('2d');

    var data = {
        labels: <?php echo json_encode($label); ?>,
        datasets: [{
            data: <?php echo json_encode($data); ?>,
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

@endsection
