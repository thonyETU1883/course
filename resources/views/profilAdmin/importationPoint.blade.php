@extends('layoutAdmin')

@section('content')
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Importation Points</h4>
                  
                  <form class="forms-sample" action="{{route('pointtemporaire.importationpoint')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="exampleInputUsername1">Points : </label>
                            <input type="file" class="form-control" id="exampleInputUsername1" name="filepoint">
                            @error("etapefile")
                              {{$message}}
                            @enderror
                        </div>

                        
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection
