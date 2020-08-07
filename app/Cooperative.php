<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model{


   // $result = DB::Table('table_name')->select('column1','column2')->where('id',1)->get(); 
   //Table('table')->select('name','surname')->where('id',1)->get();
  /* <form method="post" enctype="multipart/form-data" action="upload.php">
   <p>
   <input type="file" name="fichier" size="30">
   <input type="submit" name="upload" value="Uploader">
   </p>
   </form>
   
   if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = 'upload/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

    echo "Le fichier a bien été uploadé";
}
   */
    
}