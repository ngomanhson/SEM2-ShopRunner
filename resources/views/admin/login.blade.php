<!doctype html>
<html lang="en">
  <head>
      <base href="/dashboard/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
      <link rel="stylesheet" href="css/simplebar.css">
      <!-- Fonts CSS -->
      <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <!-- Icons CSS -->
      <link rel="stylesheet" href="css/feather.css">
      <link rel="stylesheet" href="css/select2.css">
      <link rel="stylesheet" href="css/dropzone.css">
      <link rel="stylesheet" href="css/uppy.min.css">
      <link rel="stylesheet" href="css/jquery.steps.css">
      <link rel="stylesheet" href="css/jquery.timepicker.css">
      <link rel="stylesheet" href="css/quill.snow.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

      <!-- Date Range Picker CSS -->
      <link rel="stylesheet" href="css/daterangepicker.css">
      <!-- App CSS -->
      <link rel="stylesheet" href="css/login.css" id="lightTheme">
      <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
      <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
      <link rel="icon" type="image/x-icon" href="front/img/favicon.ico">
  </head>
  <body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="" method="post">
            @csrf
            <img src="../front/img/logo.png" class="mb-3" alt="Shop Runner">
            <h1 class="h6 mb-3">Sign in</h1>
            @include('admin.components.notification')
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email"  name="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" >
              @error("email")
              <p class="text-danger text-small"><i>{{$message}}</i></p>
              @enderror
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" >
              @error("password")
              <p class="text-danger text-small"><i>{{$message}}</i></p>
              @enderror
          </div>
          <div class="checkbox mb-3">
              <label class="input-check">
                  Stay logged in <input type="checkbox" value="remember-me"  />
                  <span class="checkmark"></span>
              </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>
</body>
</html>
