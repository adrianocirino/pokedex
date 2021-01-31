<?php

    namespace App\Controllers;
    use MF\Controller\Action;

    class IndexController extends Action {
         
        public function index() {
            $this->id = 1;
            $this->getPokemon($this->id);
            $this->render('index', 'layout1');            
        }

        public function getPokemon($id) {

            $this->pokemons_length = 50;

            $apiUrl = "https://pokeapi.co/api/v2/pokemon/";

            $ch = curl_init($apiUrl.$id.'/');

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $this->data = json_decode(curl_exec($ch));
            
            $this->imagem = $this->data->sprites->front_default;
            $this->numero = $this->data->id;
            $this->nome = $this->data->name;
        }
    }

?>