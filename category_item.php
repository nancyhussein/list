<?php
$upload =  wp_get_upload_dir();
//var_dump($upload);

?>
<!---->
<!--<div >-->
<!--   <h2> <a class="titles"> --><?//=substr($entry,0,-4) ?><!-- </h2> </a>-->
<!---->
<!--</div>-->

<div>
    <a class="<?php
                  if($counter%2==0) {
                      echo 'even';
                  }  else{ echo 'odd'; } ?>"
       </a>
    <audio controls>
        <source src="<?=$upload["baseurl"]."/quran/".$parentFolder."/". $entry?>" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>


</div>
<div >
    <h2> <a class="titles"> <?=substr($entry,0,-4) ?> </h2> </a>

</div>




