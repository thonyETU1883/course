@extends('layoutAdmin')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Liste des erreurs</h4>
              
                <div class="table-responsive">

                <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            
                          </th>
                          <th>
                            Erreur
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody>
                            <?php $i=1; ?>
                          @foreach($errorResultat as $error)
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{$error}}</td>
                            </tr>
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

@endsection
