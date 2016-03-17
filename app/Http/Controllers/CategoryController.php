<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Http\Requests\CategoryEditRequest;
use Mockery\CountValidator\Exception;

class CategoryController extends Controller
{
    public function getCreate()
    {
        return view('admin.cate_add');
    }

    public function postCreate(CategoryCreateRequest $request)
    {
        try {
            if (Category::createCategory($request)) {
                return redirect()->action('CategoryController@getList');
            }
        }
        catch (Exception $e) {
            $messagesFail = $e->getMessage();
            return redirect()->action('CategoryController@getCreate', ['messages' => $messagesFail]);
        }
    }

    public function getList()
    {
        $categoryAll = Category::all();
        return view('admin.cate_list', ['categoryList' => $categoryAll]);
    }

    public function getEdit($id)
    {
        $cateIdAll = Category::find($id);
        if (empty($cateIdAll)) {
            return redirect()->action('CategoryController@getList');
        }
        return view('admin.cate_edit', ['cateIdList' => $cateIdAll]);
    }

    public function postEdit($id, CategoryEditRequest $request)
    {
        if (Category::editCategory($id, $request)) {
            return redirect()->action('CategoryController@getList');
        }
        return redirect()->action('CategoryController@getCreate', ['messages' => trans('category/messages.edit_cate_failed')]);
    }

    public function getDelete($id)
    {
        if (Category::deleteCategory($id)) {
            return redirect()->action('CategoryController@getList');
        }
        return redirect()->action('CategoryController@getCreate', ['messages' => trans('category/messages.create_category_failed')]);
    }
}
