<?php

function errors($string){

  echo'<div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="fa fa-info-circle"></i>
      <strong>
      '.$string.'
      </strong>
  </div>';
}
?>
