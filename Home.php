<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function registrarForm(): string
    {
        return view('registrarForm');
    }
    public function recebaDados(): string
    {
        $data = array(
            'nome' => $this->request->getVar('nome_input'),
            'laboratorio' => $this->request->getVar('laboratorio_input'),
            'preco' => $this->request->getVar('preco_input'),
            'quantidade' => $this->request->getVar('quantidade_input')
        );
        

        return view('welcome_message',$data);
    }
}
