<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return view('backend.categories.categories')->with('categories', $categories);
    }
    public function getCategoryAdd()
    {
        $categories = Category::all();
        return view('backend.categories.category-add')->with('categories', $categories);
    }

    public function postCategoryAdd(Request $request, Category $categoryData)
    {
        try {
            if (empty($request->trUrl)) {
                $trSlug = Str::slug($request->trTitle, '-');
                $request->merge(['trUrl' => $trSlug]);
            }

            if (empty($request->enUrl)) {
                $enSlug = Str::slug($request->enTitle, '-');
                $request->merge(['enUrl' => $enSlug]);
            }

            if (empty($request->deUrl)) {
                $deSlug = Str::slug($request->deTitle, '-');
                $request->merge(['deUrl' => $deSlug]);
            }

            $categoryData = [
                'order' => $request->order,
                'status' => $request->status,
                'parent_id' => $request->category_id,
                'tr' => ['slug' => $request->trUrl, 'title' => $request->trTitle, 'page_title' => $request->trPageTitle, 'keywords' => $request->trKeywords, 'description' => $request->trDescription, 'content' => $request->trContent],
                'en' => ['slug' => $request->enUrl, 'title' => $request->enTitle, 'page_title' => $request->enPageTitle, 'keywords' => $request->enKeywords, 'description' => $request->enDescription, 'content' => $request->enContent],
                'de' => ['slug' => $request->deUrl, 'title' => $request->deTitle, 'page_title' => $request->dePageTitle, 'keywords' => $request->deKeywords, 'description' => $request->deDescription, 'content' => $request->deContent],
            ];

            Category::create($categoryData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Kategori Eklendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Kategori Eklenemedi ' . $e]);
        }
    }

    public function getCategoryEdit($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $categoryTr = $category->translate('tr');
        $categoryEn = $category->translate('en');
        $categoryDe = $category->translate('de');
        return view('backend.categories.category-edit')->with('category', $category)->with('categoryTr', $categoryTr)->with('categoryEn', $categoryEn)->with('categoryDe', $categoryDe)->with('categories', $categories);
    }

    public function postCategoryEdit(Request $request, Category $categoryData, $id)
    {
        try {
            $category = Category::findOrFail($id);
            if (empty($request->trUrl)) {
                $trSlug = Str::slug($request->trTitle, '-');
                $request->merge(['trUrl' => $trSlug]);
            }

            if (empty($request->enUrl)) {
                $enSlug = Str::slug($request->enTitle, '-');
                $request->merge(['enUrl' => $enSlug]);
            }

            if (empty($request->deUrl)) {
                $deSlug = Str::slug($request->deTitle, '-');
                $request->merge(['deUrl' => $deSlug]);
            }

            $categoryData = [
                'order' => $request->order,
                'status' => $request->status,
                'parent_id' => $request->category_id,
                'tr' => ['slug' => $request->trUrl, 'title' => $request->trTitle, 'page_title' => $request->trPageTitle, 'keywords' => $request->trKeywords, 'description' => $request->trDescription,'content' => $request->trContent],
                'en' => ['slug' => $request->enUrl, 'title' => $request->enTitle, 'page_title' => $request->enPageTitle, 'keywords' => $request->enKeywords, 'description' => $request->enDescription,'content' => $request->enContent],
                'de' => ['slug' => $request->deUrl, 'title' => $request->deTitle, 'page_title' => $request->dePageTitle, 'keywords' => $request->deKeywords, 'description' => $request->deDescription,'content' => $request->deContent],
            ];

            $category->update($categoryData);
            return response(['status' => 'success', 'title' => 'Başarılı', 'content' => 'Kategori Güncellendi']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'title' => 'Başarısız', 'content' => 'Kategori Güncellenemedi ' . $e]);
        }
    }
}
