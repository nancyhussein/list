<?php


if (!defined('ABSPATH')){
    die;

}
class listPlugin{
    //methods
function activate(){
echo 'the plugin is activated';
}
function deactivate(){

}
}
if (class_exists('listPlugin')){
    $listPlugin= new listPlugin();
}
//activation
register_activation_hook(__FILE__,array($listPlugin,'activate'));
//deactivate
register_deactivation_hook(__FILE__,array($listPlugin,'deactivate'));



function listFolderFiles()
{
    $result = "<div>";
    //specifies the path to the directory, whose file contents we want to find
    if ($handle = opendir('C:\xampp\htdocs\wordpress\wp-content\uploads\quran')) {
        //Read entry from directory handle
        while (false !== ($entry = readdir($handle))) {

            if ($entry != "." && $entry != "..") {
                        //echo "$entry\n";
//                echo "<a href='?f=".$entry."'>".$entry."</a>";
                $result.= category_template($entry);
            }

        }

        closedir($handle);
   }
$result.="</div>";
    return $result;
}


add_shortcode('list','listFolderFiles');






function details()


{?>
    <div>





<?php
    $result="";
    $counter=1;
    if(isset($_GET['f'])){
        $path = 'C:\xampp\htdocs\wordpress\wp-content\uploads\quran\\'.$_GET["f"];
//    //specifies the path to the directory, whose file contents we want to find

        if ($handle = opendir($path)) {
//       // Read entry from directory handle

        while (false !== ($entry = readdir($handle))) {

            if ($entry != "."&& $entry != ".." ) {//&& $folder==$entry) {

//                echo "<a href='$entry'>" . $entry . "</a>";

                $result.= category_item_template($_GET['f'],$entry,$counter);            }
            $counter++;
        }
        closedir($handle);
    }
    }
    return $result;
    ?>
    </div>
        <?php
}
add_shortcode('det', 'details');






function category_template($entry){
    ob_start();

    require "category.php";

    return ob_get_clean();


}

function category_item_template($parentFolder,$entry,$counter){
    ob_start();

    require "category_item.php";

    return ob_get_clean();

}

function list_load_stylesheet(){
    wp_register_style('style123',plugin_dir_url(__FILE__) .'/css/style.css',array(), 1, 'all');
    wp_enqueue_style('style123');

}



add_action('wp_enqueue_scripts','list_load_stylesheet');













