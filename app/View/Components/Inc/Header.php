<?php

namespace App\View\Components\Inc;

use App\Models\Category;
use Illuminate\Http\Request;

use Single;
use Illuminate\View\Component;

class Header extends Component
{
    public $fields;
    public $routeName;
    public $categories;

    public function __construct(){

        $s = new Single('Хедер', 10, 2);

        $this->fields = [
            'about'     => $s->field('Меню', 'О нас', 'text', true, 'About us'),
            'products'  => $s->field('Меню', 'Товары', 'text', true, 'Products'),
            'find'      => $s->field('Меню', 'Найти нас', 'text', true, 'Find us'),
        ];

        $about_menu = $s->field('Меню', 'О нас меню', 'repeat', true);
        $about_menu_items = [];
        foreach ($about_menu as $elm) {
            $about_menu_items[] = [
                $elm->field('Текст', 'text', ''),
                $elm->field('Ссылка', 'text', ''),
                $elm->field('Изображение', 'photo', ''),
            ];
        }
        $this->fields['about_menu'] = $about_menu_items;

        $find_menu = $s->field('Меню', 'Найти нас меню', 'repeat', true);
        $find_menu_items = [];
        foreach ($find_menu as $elm) {
            $find_menu_items[] = [
                $elm->field('Текст', 'text', ''),
                $elm->field('Ссылка', 'text', ''),
                $elm->field('Изображение', 'photo', ''),
            ];
        }
        $this->fields['find_menu'] = $find_menu_items;

        $this->categories = Category::get();

        $this->routeName = request()->route()->getName();
    }

    public function render(){
        return view('components.inc.header');
    }
}
