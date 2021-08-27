<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home', [
            'articles' => Article::with(['category'])->get()
        ]);
    }

    public function createArticle()
    {
        return view('create-article', [
            'categories' => Category::all()
        ]);
    }


    /**
     * Image Uploading common function
     *
     * @param Image $file
     * @return array|null
     */
    public function imageUpload($file)
    {

        $fileName = time() . '.' . $file->getClientOriginalName();

        $path = public_path('uploads');

        /** Create an Directory if not exists */
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        try {
            $file->move($path, $fileName);
            return [
                'success' => true,
                'image' => $fileName
            ];
        } catch (\Exception $ex) {
            return null;
        }
    }

    /**
     * Creating Article Details
     *
     * @param CreateArticleRequest $request
     * @return view
     */
    function storeArticle(CreateArticleRequest $request)
    {
        $input = $request->all();

        if ($request->file('image')) {
            $imageData = $this->imageUpload($request->file('image'));
            if (isset($imageData['success'])) {
                Article::create([
                    'title' => $input['$input'],
                    'description' => $input['$description'],
                    'image' => $imageData['$image'],
                ]);
                return redirect('home');
            }
        } else {
            return view('create-article')->with('error', __('An error while image uploading.'));
        }
    }
}
