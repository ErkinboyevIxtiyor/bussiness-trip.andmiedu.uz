<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
     <div class="container">
      <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card col-md-8">
          <div class="card-body">
            <div>
              <form action="/register/save" class="" method="POST">
                @csrf
                <div class="mb-3"><input type="text" class="form-control" placeholder="ISM" name="first_name"></div>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Familiya" name="second_name"></div>
                <div class="mb-3"><input type="text" class="form-control" placeholder="Otasining ismi" name="third_name"></div>
                <div class="mb-3"><input type="email" class="form-control" placeholder="Email " name="email"></div>
                <div class="mb-3"><input type="password" class="form-control" placeholder="Parol" name="password"></div>
                <button type="submit" class="btn btn-danger">Saqlash</button>
              </form>
            </div>
          </div>
        </div>
      </div>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>