<?php

namespace App\Controller;

use App\Model\MailManager;
use App\Model\ModelManager;
use Exception;
use ZipArchive;

class HomeController
{

    public function addFile($files, $post){

        $sizeFiles = $this->checkFilesSize($files);

        if($sizeFiles>0 && $sizeFiles<2000000)
        {
           $zip = $this->makeZip($files);
        }
        else
        {
        throw new Exception( "Please choose a file");
        }

        $modelDb = new ModelManager();
        $mailService = new MailManager();

        $emailsender=htmlspecialchars($post['emailsender']);
        $password=htmlspecialchars($post['pass']);
        $emailreceiver=htmlspecialchars($post['emailreceiver']);
        $pass_hash=password_hash($password, PASSWORD_DEFAULT);
        $countFiles = count($files['filesend']['name']);

        $modelDb->postFile($emailsender, $pass_hash, $emailreceiver, $zip['name'], $zip['size'], $countFiles, $post['content']);
        $mailService->sendMailToReceiver($emailsender, $password, $emailreceiver, $zip['name']);

        //$mailService->sendMailToSender($emailsender, $password, $emailreceiver, $zipName);
    }


    private function checkFilesSize($files)
    {
        $countFiles = count($files['filesend']['name']);
        $sizeFiles =0;
        for($i=0;$i<$countFiles;$i++){
            $sizeFiles += $files['filesend']['size'][$i];
        }

        return $sizeFiles;
    }

    private function makeZip($files)
    {
        $zip =new ZipArchive;
        $name = bin2hex(random_bytes(5));
        $zipName = $name.'.zip';
        $path=  "./upload/";

        if($zip->open($zipName, ZipArchive::CREATE)=== TRUE){
            $countFiles = count($files['filesend']['name']);
            $filename = [];

            for($i=0;$i<$countFiles;$i++){

                $filename[$i]= $files['filesend']['name'][$i];
                $tmp_name= $files['filesend']['tmp_name'][$i];

                // Upload file
                move_uploaded_file($tmp_name, $path . $filename[$i]);
                $zip->addFile($path.$filename[$i], $filename[$i]);
            }

            $zip->close();

            for($i=0;$i<$countFiles;$i++){
                unlink($path.$filename[$i]);
            }

            rename($zipName , './upload/'.$zipName);
            $zipSize = filesize('./upload/'.$zipName);

            return [
                'size' => $zipSize,
                'name' => $zipName
            ];
        }
        else {
            throw new Exception( "Error on adding files");

        }
    }


    public function homePage(){

        require "src/View/uploadView.php";
    }



    public function getFile($zipName){
        $modelDb = new ModelManager();

        $getFile = $modelDb->fileSend($zipName);

        if($getFile === false ){
            throw new Exception('Fichier inexistant !');
        }else{
            require 'src/View/downloadView.php';
        }
        return  $getFile;
    }


    function checkFile($zipName){
        $modelDb = new ModelManager();
        $getFile = $modelDb->fileSend($zipName);

        return  $getFile;
    }


    public function downloadFile($zipName){
        $path= "upload/";
        $downloadFile = $path.$zipName;
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Location: '.$downloadFile);
        //header('Content-Disposition: attachment; filename="'.basename($zipName).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zipName));
        //readfile($zipName);
        //header('Location: '.$downloadFile);
    }


    public function finaleView($zipName){
        $modelDb = new ModelManager();
        $path= "upload/";
        $downloadFile = $path.$zipName;
        $status = true;
        $modelDb->fileStatus($zipName);
        require 'src/View/downloadView.php';

    }

    public function deleteOldFile(){
        $modelDb = new ModelManager();
        $path= "upload/";
        $listDeleteFile=$modelDb->fileDeleteByDate();

        for( $i=0 ; $i< count($listDeleteFile); $i++){
            unlink($_SERVER['DOCUMENT_ROOT']. $_SERVER['REQUEST_URI']. $path.$listDeleteFile[$i]);
        }

        $modelDb->filesDelete();
        return $listDeleteFile;
    }

}
