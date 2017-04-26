<!-- Modal -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="add_elevLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_elevLabel">Adauga un user</h4>
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


<div class="modal fade" id="cauta_user" tabindex="-1" role="dialog" aria-labelledby="add_elevLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_elevLabel">Cauta un user</h4>
      </div>
      <div class="modal-body">
                <form method="post" action="profile.php?type=search">
                  <?php $_POST['nr_matricol']=0;?>
                      <div class="form-group">
                          <input name="nr_matricol" class="form-control" placeholder="Numar matricol">
                      </div>
                      <div class="alert alert-info">
                          <strong><u>Sau !</u></strong> Puteti completa campurile de mai jos lasand numarul matricol liber
                      </div>
                      <div class="form-group">
                        <input name="nume" class="form-control" placeholder="Nume">
                      </div>
                      <div class="form-group">
                        <input name="prenume" class="form-control" placeholder="Prenume">
                      </div>
                      <div class="form-group">
                        <input type="text" name="clasa" class="form-control" placeholder="Clasa">
                      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn-primary" name="search" value="Cauta">
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="add_elevLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_elevLabel">Cauta un user</h4>
      </div>
      <div class="modal-body">
                <form method="post" action="profile.php?type=edit">
                  <?php $_POST['nr_matricol']=0;?>
                      <div class="form-group">
                          <input name="nr_matricol" class="form-control" placeholder="Numar matricol">
                      </div>
                      <div class="alert alert-info">
                          <strong><u>Sau !</u></strong> Puteti completa campurile de mai jos lasand numarul matricol liber
                      </div>
                      <div class="form-group">
                        <input name="nume" class="form-control" placeholder="Nume">
                      </div>
                      <div class="form-group">
                        <input name="prenume" class="form-control" placeholder="Prenume">
                      </div>
                      <div class="form-group">
                        <input type="text" name="clasa" class="form-control" placeholder="Clasa">
                      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn-primary" name="search" value="Cauta">
      </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="add_elevLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_elevLabel">Sterge un user</h4>
      </div>
      <div class="modal-body">
                <form method="post" action="profile.php?type=delete">
                  <?php $_POST['nr_matricol']=0;?>
                      <div class="form-group">
                          <input name="nr_matricol" class="form-control" placeholder="Numar matricol">
                      </div>
                      <div class="alert alert-info">
                          <strong><u>Sau !</u></strong> Puteti completa campurile de mai jos lasand numarul matricol liber
                      </div>
                      <div class="form-group">
                        <input name="nume" class="form-control" placeholder="Nume">
                      </div>
                      <div class="form-group">
                        <input name="prenume" class="form-control" placeholder="Prenume">
                      </div>
                      <div class="form-group">
                        <input type="text" name="clasa" class="form-control" placeholder="Clasa">
                      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn-primary" name="search" value="Cauta">
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
