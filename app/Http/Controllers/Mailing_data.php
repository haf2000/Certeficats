<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\envoyer_certeficats;
use Illuminate\Support\Facades\Mail;
use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Support\Facades\Storage;

class Mailing_data extends Controller
{
    public function index()
     {
     
     	$personne  = array('nom' =>'','email' =>'','path'=>'','workshop' => '');
    
        // Lire le fichier csv
        $csv = Reader::createFromPath(storage_path('..\..\Certeficats\storage\app\public\Certificats\Participants.csv'));
        $csv->setHeaderOffset(0);
 
        // Boucler sur les données du fichier csv
        $lignes = (new Statement())->process($csv);
        foreach ($lignes->getRecords() as $ligne) {

          $ligne_string = implode($ligne);
          $arr = explode(";", $ligne_string);
          // on recupère nos champs : nom et email
          $personne['nom'] = $arr[0];
           $personne['email'] = $arr[1];
           // on crée les trois paths
         $path1 = storage_path("../../Certeficats/storage/app/public/Certificats/Github/".$personne['nom'].".pdf");
         $path2 = storage_path("../../Certeficats/storage/app/public/Certificats/Python/".$personne['nom'].".pdf");
         $path3 = storage_path("../../Certeficats/storage/app/public/Certificats/UE/".$personne['nom'].".pdf");
          // on vérifie pour chaque path et on envoie l'email dans le cas ou le fichir existe
              $personne['path'] ="";   
               $personne['workshop'] = "";       
           if( Storage::disk('public')->exists("Certificats/Github/".$personne['nom'].".pdf")) {
                   $personne['workshop'] = "Github";
           	       $personne['path'] =  $path1;
          	         Mail::to($personne['email'])->send(new envoyer_certeficats($personne));           	
          }
          //----------------------------------
           if( Storage::disk('public')->exists("Certificats/Python/".$personne['nom'].".pdf")) {
                    $personne['workshop'] = "Python";
           	       $personne['path'] =  $path2;
          	         Mail::to($personne['email'])->send(new envoyer_certeficats($personne));           	
          }
          //---------------------------------
         if( Storage::disk('public')->exists("Certificats/UE/".$personne['nom'].".pdf")) {
                   $personne['workshop'] = "UE";
           	       $personne['path'] =  $path3;
          	         Mail::to($personne['email'])->send(new envoyer_certeficats($personne));           	
          }
        
        }  
   
       /******************Message pour indiquer l'envoi avec success c'est tout ********************/
          $sent="Vos certificats ont bien été envoyées !";      
       return view('welcome')->with('sent',$sent);
       /****************************************************************************************/
     }
}
