@extends('layoutAdmin')

@section('content')
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajout pénalité</h4>
                  
                  <form class="forms-sample" action="{{route('penalite.ajoutPenalite')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Etape</label>
                            <select id="" class="form-control" name="etape">
                                @foreach($listeEtape as $etape)  
                                  <option value="{{$etape->id}}">{{$etape->nom}}-{{$etape->longueur}} km</option>
                                @endforeach
                            </select>
                            @error("etape")
                              {{$message}}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Equipe</label>
                            <select id="" class="form-control" name="equipe">
                              @foreach($listeEquipe as $equipe)
                                <option value="{{$equipe->id}}">{{$equipe->nomequipe}}</option>
                              @endforeach
                            </select>
                            @error("equipe")
                              {{$message}}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputUsername1">Penalite</label>
                            <input type="time" class="form-control" id="exampleInputUsername1" name="penalite" step="1">
                            @error("penalite")
                              {{$message}}
                            @enderror
                          </div>

                        <button type="submit" class="btn btn-primary me-2">Ajout</button>
                        <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection
