<?php

namespace App\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class ProductForm extends Form
{
    public function __construct($name = 'product', array $options = [])
    {
        parent::__construct($name, $options);


        $this->add([
            'name' => 'id',
            'type' => Element\Hidden::class
        ]);

        $this->add([
            'name' => 'name',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Nome'
            ],
            'attributes' => [
                'id' => 'name'
            ]
        ]);

        $this->add([
            'name' => 'value_sale',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Valor de Venda'
            ],
            'attributes' => [
                'id' => 'value_sale'
            ]
        ]);

        $this->add([
            'name' => 'value_cost',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Valor de Custo'
            ],
            'attributes' => [
                'id' => 'value_cost'/*,
                'disabled' => 'disabled'*/
            ]
        ]);

        $this->add([
            'name' => 'quantity',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Quantidade'
            ],
            'attributes' => [
                'id' => 'quantity'/*,
                'disabled' => 'disabled'*/
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Element\Button::class,
            'attributes' => [
                'type' => 'submit'
            ]
        ]);
    }

}