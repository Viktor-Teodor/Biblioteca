<!-- Modal -->
<div class="modal fade" id="add_elev" tabindex="-1" role="dialog" aria-labelledby="add_elevLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_elevLabel">Adauga un elev</h4>
      </div>
      <div class="modal-body">
                    <form method="post">
                      <input type="hidden" name="type" value="adduser" id="adduser">
                        <input class="form-control" type="text" name="nume" placeholder="Nume" required>
                        <input class="form-control" type="text" name="prenume" placeholder="Prenume" required>
                        <br>
                        <input class="form-control" type="text" name="nr_matricol" placeholder="Numar matricol" required>
                        <input class="form-control" type="text" name="clasa" placeholder="Clasa" required>
                        <br>
                        <input class="form-control" type="text" name="telefon" placeholder="Telefon" required>
                        <input class="form-control" type="text" name="email" placeholder="Email" required>
                        <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn-primary" name="adduser" value="Adauga">
      </form>
      </div>
    </div>
  </div>
</div>


<?php

if(isset($_POST['type']) && $_POST["type"]=="adduser")
  {
    $sql = "INSERT INTO elev (nr_matricol, nume, prenume, clasa, telefon, email)
            VALUES ('$_POST[nr_matricol]', '$_POST[nume]', '$_POST[prenume]','$_POST[clasa]', '$_POST[telefon]', '$_POST[email]')";

if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
  }

 ?>
