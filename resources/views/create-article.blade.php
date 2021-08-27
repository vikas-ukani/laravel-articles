@extends('main')


@section('content')
    <form action={{ route('storeArticle') }} method="POST" enctype="multipart/form-data">
        @csrf

        @include('success-error-messages')


        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Article title"
                value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                <option selected>Select any category.</option>
                @foreach ($categories as $category)
                    <option value={{ $category->id }} @if (old('category_id') == $category->id)
                        selected
                @endif
                >{{ $category->name ?? '-' }}</option>

                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for=image" class="form-label">Image</label>
            <br>
            <input type="file" id="image" name="image" accept=".png,.jpg,.jpeg,.img" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Create</button>
            <a href={{ route('home') }} class="btn btn-dark mb-3">Back to Articles</a>
        </div>

    </form>
@endsection
