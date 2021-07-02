<?php
class fctAdmin extends structure {

    public function __construct()
    {
        $this->required = "admin";
    }

    public function repeat($param){
        $this->message->channel->sendMessage($param);
    }

    public function stop($param){
        $_SESSION['continue']=false;
        $this->message->channel->sendMessage("Bonne nuit <3");
        sleep(1);
        $this->md->get('discord')->close();
    }

   

    public function version($param){
        global $bdd;
        $version = $bdd->query("select value from botExtra where label='version'")->fetch()['value'];
        $this->message->channel->sendMessage("La version du bot est $version");
    }

    

    public function event($param){
        global $cb;
        $cb->beginEvent();
        $this->message->channel->sendMessage("Tous joueurs avec le rôle event à était ajouter à l'evenement");
    }

    public function degat($param){
        global $cb;
        $param = explode(" ",$param);
        $msg = "";
        if(count($param) != 2){
            $msg ="nécessite deux paramètres";
        }else{
            $result = $cb->degat($param[1],$param[0]);
            if(false===$result){
                $msg="Action impossible car {$param[0]} est hors-combat";
            }elseif($result===0){
                $msg="{$param[0]} est maintenant K.O";
            }elseif($result=="error"){
                $msg="une erreur à était rencontré.";
            }else{
                $msg="Il reste $result points de vie à {$param[0]}";
            }
        }
        $this->message->channel->sendMessage($msg);

    }

    // Pour Zhen
   
 
}