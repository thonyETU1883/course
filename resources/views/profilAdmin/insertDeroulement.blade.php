@extends('layoutAdmin')

@section('content')
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Affectation temps au coureurs</h4>
                  
                  <form class="forms-sample" action="{{route('deroulement.insertionDeroulement')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Coureurs</label>
                            <select id="" class="form-control" name="coureur">
                                @foreach($listeCoureur as $c)
                                  <option value="{{$c->coureur}}">{{$c->nomcoureur}}</option>
                                @endforeach
                            </select>
                            @error("coureur")
                              {{$message}}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">Arrivé</label>
                            <input type="datetime-local" class="form-control" id="exampleInputUsername1" name="arrive" step="1">
                            @error("arrive")
                              {{$message}}
                            @enderror
                          </div>

                          <input type="hidden" name="etape" value="{{$etape}}">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection
