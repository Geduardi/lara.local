<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isEmpty;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.news.categories.index',[
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        return view('admin.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryCreateRequest $request
     * @return Response|RedirectResponse
     */
    public function store(CategoryCreateRequest $request)
    {


//        $data = $request->only('title', 'description','image');
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
//        dd($data);
        if (!$data['image']){
            unset($data['image']);
        }
        $create = Category::create($data);
        if ($create){
            return redirect()->route('admin.category.index')->with('success', 'Запись успешно добавлена');
        }
        return back()->with('errors', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function show(Category $category)
    {

        $news = News::all()->where('category_id',$category->id);

//        dd($news);
//        $news = array_filter($objNews->getNews(), function ($item) use ($categoryId) {
//            return $item['categoryId'] == $categoryId;
//        });

        return view('admin.news.category_news', compact('news', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(Category $category)
    {
        return view('admin.news.categories.edit',[
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryEditRequest $request
     * @param Category $category
     * @return Response|RedirectResponse
     */
    public function update(CategoryEditRequest $request, Category $category)
    {

//        $data = $request->only('title', 'description');
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
//        $category->title = "New Data";
//        $category->description = "data description";
//        $category->save();
        $save = $category->fill($data)->save();
        if ($save){
            return redirect()->route('admin.category.index')->with('success', __('messages.admin.categories.success'));
        }
        return back()->with('errors', __('messages.admin.categories.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return void
     */
    public function destroy(Category $category)
    {
        $hasNews = News::all()->where('category_id', $category->id);
        if ($hasNews->isEmpty()){
            $delete = $category->delete();
        } else {
            return back()->with('errors', 'У категории есть новости');
        }


        if ($delete){
            return redirect()->route('admin.category.index')->with('success', 'Запись успешно удалена');
        }
        return back()->with('errors', 'Не удалось удалить запись');
    }
}
