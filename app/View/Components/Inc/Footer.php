<?php

namespace App\View\Components\Inc;

use Illuminate\View\Component;
use Single;

class Footer extends Component
{
    public $fields;

    public function __construct(){

        $s = new Single('Футер', 10, 2);
        $this->fields = [];

        $this->fields['col1_title'] = $s->field('Колонка 1', 'Заголовок', 'text', true, 'ALL ABOUT BUCURIA');
        $col1 = $s->field('Колонка 1', 'Колонка 1', 'repeat', true);
        $col1_items = [];
        foreach ($col1 as $elm) {
            $col1_items[] = [
                $elm->field('Текст', 'text', ''),
                $elm->field('Ссылка', 'text', ''),
            ];
        }
        $this->fields['col1'] = $col1_items;

        $this->fields['col2_title'] = $s->field('Колонка 2', 'Заголовок', 'text', true, 'INFORMATION');
        $col2 = $s->field('Колонка 2', 'Колонка 2', 'repeat', true);
        $col2_items = [];
        foreach ($col2 as $elm) {
            $col2_items[] = [
                $elm->field('Текст', 'text', ''),
                $elm->field('Ссылка', 'text', ''),
            ];
        }
        $this->fields['col2'] = $col2_items;

        $this->fields['col3_title'] = $s->field('Колонка 3', 'Заголовок', 'text', true, 'CONTACTS');
        $this->fields['phone'] = $s->field('Колонка 3', 'Номер телефона', 'text', false, '+373 (22) 895600');
        $this->fields['email'] = $s->field('Колонка 3', 'E-mail', 'text', false, 'office@bucuria.md');
        $this->fields['address'] = $s->field('Колонка 3', 'Адрес', 'text', false, 'J.S.C."Bucuria" MD-2004, or. Chisinau, str. Columna, 162');
        $social = $s->field('Колонка 3', 'Соц сети', 'repeat', false);
        $social_items = [];
        foreach ($social as $elm) {
            $social_items[] = [
                $elm->field('Изображение', 'photo', ''),
                $elm->field('Ссылка', 'text', ''),
            ];
        }
        $this->fields['social'] = $social_items;
    }

    public function render(){
        return view('components.inc.footer');
    }
}
