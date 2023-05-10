<?php
  $title="Beranda";
  $judul=$title;
?>
<br>
<div class="panel panel-default">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php  
$getSMP=$db->ObjectBuilder()->get('t_hotspot');
foreach ($getSMP as $row) {
  ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne<?=$row->id_smp ?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?=$row->id_smp ?>" aria-expanded="false" aria-controls="collapseOne<?=$row->id_smp ?>">
        <b> <?=$row->nm_smp ?> </b>
        </a>
      </h4>
    </div>
    <div id="collapseOne<?=$row->id_smp ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?=$row->id_smp ?>">
      <div class="panel-body">
       <b> Alamat </b> : <?=$row->alamat ?></br>
       <b> NPSN </b> : <?=$row->npsn ?></br>
       <b> Akreditasi </b> : <?=$row->akre ?></br>
      </div>
    </div>
  </div>
  <?php
}
?>
</div>
</div>