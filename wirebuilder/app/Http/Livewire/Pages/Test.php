<?php

namespace App\Http\Livewire\Pages;

use Coffeemosele\Wirebuilder\Components\Form;
use Coffeemosele\Wirebuilder\Facades\Crafter;
use Livewire\Component;

class Test extends Component
{
    public function render()
    {
        return Crafter::render($this->form());
    }

    public function form()
    {
        $form = new Form();

        $form->text('first_name', 'Primeiro Nome')->placeholder('Digite seu nome');
        $form->text('last_name', 'Sobrenome')->placeholder('Digite seu sobrenome');
        $form->password('password', 'Senha');
        $form->password('password_confirm', 'Confirme sua senha');
        $form->email('email', 'E-mail');
        $form->select('country', 'Cidade')->options([
            'Concórdia'
        ]);

        return $form;
    }
}
