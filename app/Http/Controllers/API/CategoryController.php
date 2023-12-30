<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->category = $categoryRepository ;
    }

    public function index(){

        $data =  $this->category->all();
        return CategoryResource::collection($data);
    }

    public function create(CategoryRequest $request){

        return  $this->category->create($request->validated());
    }

    public function find($id){
        $item = $this->category->find($id);
        return new CategoryResource($item);
    }

    public function update(CategoryRequest $request, $id){
        return  $this->category->update($request->validated(),$id);

    }

    public function destroy($id){
        return $this->category->destroy($id);
    }

}
