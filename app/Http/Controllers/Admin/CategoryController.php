<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index(Category $category)
    {
        //$categories=Category::all ();
        //dd ($categories);
        //获得树形栏目结构
         $categories=$category->getTreeDate (Category::all ()->toArray ());
         //dd ($categories);
        return view ('admin.category.index',compact ('categories'));
    }


    public function create(Category $category)
    {
        //获得树形栏目结构 用于页面上的循环栏目列表
        $categories=$category->getTreeDate (Category::all ()->toArray ());
        return view ('admin.category.create',compact ('categories'));
    }

    //提交表单 写入数据
    public function store(CategoryRequest $request,Category $category)
    {
        //dd ($request->toArray ());
        $category->name = $request->name;
        $category->pid = $request->pid;
        $category->save ();
       //return view ('admin.category.store',compact ('category'));
        return redirect ()->route ('admin.category.index')->with ('success','添加成功');
    }


    public function edit(Request $request,Category $category)
    {
          $categories=$category->getEditCategory ($category['id']);
        return view ('admin.category.edit',compact ('category','categories'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->pid = $request->pid;
        $category->save ();

        return redirect ()->route ('admin.category.index')->with ('success','编辑成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
           if (Category::where('pid',$category['id'])->first()){

               return redirect ()->back ()->with ('danger','请先删除子集');
           }
           $category->delete ();
           return redirect ()->route ('admin.category.index')->with ('success','删除成功');


    }
}
