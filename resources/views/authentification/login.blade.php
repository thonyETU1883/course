<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/log/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/log/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/log/css/bootstrap.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/log/css/style.css') }}">
    <title>Login #9</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                  <div class="mb-4">
                  <h3>Log In </h3>
                </div>
                <form action="{{route('equipe.login')}}" method="post">
                @error("errorLogin")
                      {{$message}}
                    @enderror
                  @csrf
                  <div class="form-group first">
                    <label for="username">Nom</label>
                    <input type="text" class="form-control" id="username" name="login" value="admin">
                    @error("login")
                      {{$message}}
                    @enderror
                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="pwd" value="0000">
                    @error("pwd")
                      {{$message}}
                    @enderror
                  </div>
                  
                  <input type="submit" value="Log In" class="btn btn-pill text-white btn-block btn-primary">

                  <span class="d-block text-center my-4 text-muted"> or sign in with</span>
                  
                </form>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
  <script src="{{ asset('assets/log/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/log/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/log/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/log/js/main.js') }}"></script>
  </body>
</html>