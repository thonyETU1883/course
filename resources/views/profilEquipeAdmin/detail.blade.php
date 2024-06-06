@extends($layout)

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Detail</h4>
              
                <div class="table-responsive">

                <table class="table table-striped">
                      <thead>
                        <tr>
                          
                          <th>
                            etape
                          </th>
                          <th>
                            point
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody>

                          @foreach($liste as $liste)
                            <tr>
                                <td>{{$liste->nometape}}</td>
                                <td>{{$liste->point}}</td>
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
