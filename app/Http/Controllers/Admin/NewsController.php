<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreateRequest $request
     * @return RedirectResponse
     */
    public function store(NewsCreateRequest $request): RedirectResponse
    {

        $data = $request->validated();
//        $data = $request->only('title', 'category_id','short_description','description','image');
        $data['category_id'] = (int) $data['category_id'];
        if (!$data['image']){
            unset($data['image']);
        }
        $create = News::create($data);

        if ($create){
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('errors', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(News $news)
    {
        if ($news){
            return view('news.news', compact('news'));
        }
        return back()->with('errors', 'Новости с таким ID не существует.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit',[
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsCreateRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(NewsCreateRequest $request, News $news): RedirectResponse
    {
        $data = $request->validated();
        $data['category_id'] = (int) $data['category_id'];
        if (!$data['image']){
            unset($data['image']);
        }
        $save = $news->fill($data)->save();
        if ($save){
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно обновилась');
        }
        return back()->with('errors', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(News $news)
    {
        $delete = $news->delete();

        if ($delete){
            return back()->with('success', 'Запись успешно удалена');
        }
        return back()->with('errors', 'Не удалось удалить запись');
    }
}
