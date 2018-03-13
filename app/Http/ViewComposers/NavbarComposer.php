<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

class NavbarComposer
{


    /**
     * 将数据绑定到视图。
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $navBar = [
            ['name' => '话题', 'url' => route('topics.index')]
        ];

        //获取分类数据
        $categories = Category::all()->each(function ($item, $key) use (&$navBar) {
            $navBar[] = [
                'name' => $item['name'], 
                'url' => route('categories.show', ['Category' => $item['id']])
            ];
        });
        
        $currentUrl = url()->current();

        foreach ($navBar as $key => $value) {

            $navBar[$key]['active'] = '';
            
            if ($currentUrl == $value['url']) {
                $navBar[$key]['active'] = 'active';
            }
            
        }
        //dd($navBar);
        $view->with('navBar', $navBar);
    }
}