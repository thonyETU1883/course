@extends('welcome')

@section('content')
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  @error("erreur")
                    <div class="alert alert-danger" role="alert">
                          {{$message}}
                    </div>
                  @enderror
                  <h4 class="card-title">Affectation coureur</h4>
                 
                  <form class="forms-sample" action="{{route('equipe.insertionEtapeCoureur')}}" method="POST">
                   @csrf
                    @foreach($listeCoureur as $coureur)
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="coureurs[]"  value="{{$coureur->id}}">
                                {{$coureur->nom}}
                            </label>
                        </div>
                    @endforeach
                    <input type="hidden" name="etape" value="{{$etape}}">

                    <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
