<!doctype html>
<html lang="en">
  <head>
    <title>Metodų perrašimas (override), Interfeisai, abstrakčios klasės</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


<div class="container mt-2">
    <div class="row">
        <div class="col-md-4">

            <form action="store_data.php" method="POST">
                <div class="form-group">
                    <label for="student_no">Student No.</label>
                    <input type="text" name="student_no" class="form-control" id="student_no"></input>
                </div>

                <div class="form-group">
                    <label for="module_code">Module code</label>
                    <input type="text" name="module_code" class="form-control" id="module_code"></input>
                </div>

                <div class="form-group">
                    <label for="mark">Mark</label>
                    <input type="text" name="mark" class="form-control" id="mark"></input>
                </div>

                <button type="submit" class="btn btn-primary">Įkelti</button>
            </form>
        </div>

        <div class="col-md-8"></div>

    </div>
</div>



  </body>
</html>
