<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    //
    public function add()
    {
        return view('admin.news.create');
    }
    
    public function create(Request $request)
    {
       
        $validatedData = $request->validate([
           'title' => 'required',
           'body' => 'required',
           'image' => 'image'
           ]);
           
       $news = new News();
       $news->title = $validatedData['title'];
       $news->body = $validatedData['body'];
       $form = $request->all();
       
       if (isset($form['image'])){
           $path = $request->file('image')->store('public/image');
           $news->image_path = basename($path);
       } else {
           $news->image_path = null;
       }
       
       unset($form['_token']);
       unset($form['image']);
       
       $news->fill($form);
       $news->save();
       //admin/news/createにリダイレクトする
        return redirect('admin/news/create');
        
    }
}
