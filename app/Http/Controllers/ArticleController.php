<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
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

        $path = public_path('uploads/');

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
                    'title' => $input['title'],
                    'description' => $input['description'],
                    'category_id' => $input['category_id'],
                    'image' => $imageData['image'],
                ]);
                return redirect('home')->with('success', __('Article successfully created.'));
            }
        } else {
            return back()->with('error', __('An error while image uploading.'))->withInput();;
        }
    }


    /**
     * Get article details by article id
     *
     * @param Article $article
     * @return void
     */
    public function editArticle(Article $article)
    {
        $categories = Category::all();
        return view('edit-article', compact(['article', 'categories']));
    }

    /**
     * Update an Article details by id
     *
     * @param Article $article
     * @param UpdateArticleRequest $request
     * @return void
     */
    public function updateArticle(Article $article, UpdateArticleRequest $request)
    {
        if (!$article) {
            return view('home')->with('error', __('Article details not found!'));
        }

        $input = $request->all();
        if ($request->file('image')) {
            $imageData = $this->imageUpload($request->file('image'));
            if (isset($imageData['success'])) {
                $input['imagePath'] = $imageData['image'];
            }
        }

        $article->title = $input['title'];
        $article->description = $input['description'];
        $article->category_id = $input['category_id'];
        $article->image = $input['imagePath'] ?? $article->image;
        $article->save();
        return redirect('home')->with('success', __('Article successfully saved.'));
    }
}
