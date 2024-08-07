<?php

namespace App\Controllers;
use App\Models\FarmaciaModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    public function registraForm(): string
    {
        return view('registraForm');
    }

    public function recebaDados()
    {
        $data = array(
            'nome' => $this->request->getVar('nome_input'),
            'laboratorio' => $this->request->getVar('laboratorio_input'),
            'preco' => $this->request->getVar('preco_input'),
            'quantidade' => $this->request->getVar('quantidade_input')
        );

        $farmacia_model = new FarmaciaModel;        
        $farmacia_model->insert($data);
        $this->session->setFlashdata('success','Dados inseridos com sucesso');
        return redirect()->to('/registraForm');
    }

    public function listarDados(): string
    {
        $farmacia_model = new FarmaciaModel;
        
        $data['dados'] = $farmacia_model->findAll();

        return view('listarDados',$data);
    }

    public function removerDados()
    {
        $id = $this->request->getVar('id_removed');
        $farmacia_model = new FarmaciaModel;
        $farmacia_model->delete($id);
        $this->session->setFlashdata('remove','Dados removidos com sucesso');

        return redirect()->to('/listarDados');
    }

    public function editarDados($id_param): string
    {
        $farmacia_model = new FarmaciaModel;
        $data['dados'] = $farmacia_model->find($id_param);

        return view('/editarForm', $data);
    }

    public function atualizaDados()
    {
        $id_for_updating = $this->request->getVar('id_up');

        $data = array(
            'nome' => $this->request->getVar('nome_input'),
            'laboratorio' => $this->request->getVar('laboratorio_input'),
            'preco' => $this->request->getVar('preco_input'),
            'quantidade' => $this->request->getVar('quantidade_input')
        );


        $farmacia_model = new FarmaciaModel;
        $farmacia_model->update($id_for_updating, $data);
        $this->session->setFlashdata('edit','Dados atualizados com sucesso');

        return redirect()->to('/listarDados');
    }

    public function pesquisa() : string
    {
        $db = \Config\Database::connect();
        $builder = $db->table('remedios');
        $param = $this->request->getVar('pesquisa');
        $builder->like('nome', $param);
        $builder->orLike('laboratorio', $param);
        $result = $builder->get()->getResult('array');
        $data['dados'] = $result;

        return view('/listarDados', $data);
    }

    public function filtrar() : string
    {
        $db = \Config\Database::connect();
        $builder = $db->table('remedios');
        $preco = $this->request->getVar('preco_filtro');
        $quantidade = $this->request->getVar('quantidade_filtro');
        if(!empty($preco)) {
            $builder->orderBy('preco', 'DESC');
        } else if(!empty($quantidade)) {
            $builder->orderBy('quantidade', 'DESC');
        }
        
        $result = $builder->get()->getResult('array');
        $data['dados'] = $result;

        return view('/listarDados', $data);
    }

}