@extends('main')


@section('content')
    <form action={{ route('updateArticle', ['article' => $article]) }} method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('success-error-messages')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Article title"
                value={{ $article->title ?? '' }}>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                {{-- <option value=''>Select any category.</option> --}}
                @foreach ($categories as $category)
                    <option value={{ $category->id }} @if ($article->category_id == $category->id)
                        selected
                @endif >{{ $category->name ?? '-' }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for=image" class="form-label">Image</label>
            <img src="" alt="" srcset="">
            <br>
            <input type="file" id="image" name="image" accept=".png,.jpg,.jpeg,.img" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description"
                rows="3">{{ $article->description ?? '' }}</textarea>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Update</button>
            <a href={{ route('home') }} class="btn btn-dark mb-3">Back to Articles</a>
        </div>

    </form>
@endsection
