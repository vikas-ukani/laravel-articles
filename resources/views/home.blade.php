@extends('main')


@section('content')
@include('success-error-messages')



    @foreach ($articles as $article)
        <div class="card">
            <div class="card-header row">
                <span class="col-10">
                    {{ $article->title ?? '-' }}
                </span>
                <span class="col-2">
                    <a href={{ route('edit-article', ['article' => $article]) }}>Edit</a>
                </span>
            </div>

            <div class="card-body">
                <small>
                    Category: {{ $article->category->name ?? '-' }}
                </small>
                <br /><br />

                <p>
                    {{ $article->description ?? '-' }}
                </p>
            </div>
        </div>
    @endforeach


@endsection
