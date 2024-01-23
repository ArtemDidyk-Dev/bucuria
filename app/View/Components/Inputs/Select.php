<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class Select extends Component
{
    public $items;
    public $current;
    public $action;
    public $name;
    public $isChecked;
    public $value;
    public $placeholder;
    public $required;
    public $label;
    public $icon;

    public function __construct($items = [], $current = '', $action = '', $name = '', $placeholder = '', $required = false, $label = '', $key = 'value', $icon = ''){

        $this->action = $action; 
        $this->icon = $icon;
        
        $collection_items = collect();
        $this->value = '';

        foreach ($items as $item){

            if ($item[$key] == $current){
                $this->current = $item['title'];
                $this->value = $item[$key];

                $item['active'] = true;
                
                if (!empty($current)){

                    $this->isChecked = true;
                }
                
            } else {

                $item['active'] = false;
            }
            
            $collection_items->push([
                'title'     => $item['title'],
                'value'     => $item[$key],
                'active'    => $item['active'],
            ]);
        }

        $this->items = $collection_items;
        $this->name = $name;
        
        if (empty($this->current)) {
            $this->current = $placeholder;
        }

        $this->required = $required;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.inputs.select');
    }
}
