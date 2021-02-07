<?php

use App\Core\Controller;

class Home extends Controller
{
    public function index($nome = '')
    {
        $note = $this->model('Note');
        $dados = $note->getAll();

        $this->view('home/index', $dados);
    }
}
