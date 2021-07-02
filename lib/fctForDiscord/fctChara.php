<?php

class fctChara extends structure {

    public function __construct()
    {
        $this->required = "fiche";
    }



    public function fiche($param){
        global $md,$bdd;
        $cb = new combat();

        $chara = $bdd->query("select * from perso p where p.idPerso='{$this->id}'")->fetch();
        $sqlt = [
            'Author' => $chara['prenom'],
            'Thumbnail' => $chara['avatar'],
            'Title' => "Classe : assassin\nNiveau : {$chara['niveau']}\n",
            "Description" => "> **__Informations générales__**\n\n**Experience** : {$chara['xp']}/1200\n**Race** : {$chara['race']}\n**Sexe** : {$chara['sexe']}\n\n>",
            "Color" => "0x00AE86"
        ];
        $this->message->channel->sendEmbed($md->createEmbed($sqlt));

    }

}