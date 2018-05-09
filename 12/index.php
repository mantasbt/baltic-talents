<?php
    include_once "connection.php";
?>
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
    <!-- Dropdown data from DB -->
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>




<div class="container mt-2">
    <div class="row">


        <div class="col-md-4">
            <form action="store_data.php" method="POST">
                <fieldset>
                <legend style="text-align: center;">Naujas studentas</legend>

                <div class="form-group">
                    <label for="student_no">Student No.</label>
                    <input type="number" name="student_no" class="form-control" id="student_no" required></input>
                </div>

                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" class="form-control" id="surname" required></input>
                </div>

                <div class="form-group">
                    <label for="forename">Forename</label>
                    <input type="text" name="forename" class="form-control" id="forename" required></input>
                </div>

                <button type="submit" name="new_student" class="btn btn-primary">Įkelti</button>

                </fieldset>
            </form>
        </div>


        <div class="col-md-4">
            <form action="store_data.php" method="POST">
                <fieldset>
                <legend style="text-align: center;">Naujas modulis</legend>

                <div class="form-group">
                    <label for="module_code">Module code</label>
                    <input type="text" name="module_code" class="form-control" id="module_code" required></input>
                </div>

                <div class="form-group">
                    <label for="module_name">Module name</label>
                    <input type="text" name="module_name" class="form-control" id="module_name" required></input>
                </div>

                <button type="submit" name="new_module" class="btn btn-primary">Įkelti</button>

                </fieldset>
            </form>

        </div>


        <div class="col-md-4">

            <form action="store_data.php" method="POST">
                <fieldset>
                <legend style="text-align: center;">Pažymių įrašymas</legend>

                <div class="form-group">
                    <label for="student_no">Studentas</label>
                    <select class="custom-select d-block w-100" name="student_no" required>

                    <?php
                        $query = "SELECT * FROM students";
                        $results=mysqli_query($con, $query);
                        foreach ($results as $students){
                        echo "<option value=" .$students["student_no"]. ">" . $students["surname"]. "</option>";
                        }
                    ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="module_code">Modulis</label>
                    <select class="custom-select d-block w-100" name="module_code" required>

                    <?php
                        $query = "SELECT * FROM modules";
                        $results=mysqli_query($con, $query);
                        foreach ($results as $modules){
                        echo "<option value=" .$modules["module_code"]. ">" . $modules["module_name"]. "</option>";
                        }
                    ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="mark">Pažymys</label>
                    <input type="number" name="mark" class="form-control" required></input>
                </div>

                <button type="submit" name="new_mark" class="btn btn-primary">Įrašyti pažymį</button>
                </fieldset>
            </form>
        </div>
        
    

    </div>
</div>



  </body>
</html>
