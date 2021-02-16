@extends('site::app')

@section('title')
    Upload Post
@endsection

@section('content')
<div class="make-list form-wrapper">
<h2 class="modal-heading">Add Meme</h2>
    <p class="modal-subheading">{{ __('formats accepted:') }} GIF, JPG, PNG </p>

    <form action="{{ route('posts.store.file') }}" method="post" id="file-upload-form" enctype="multipart/form-data">
        <div class="form-group media">
            <label for="media" class="sr-only">{{ __('Choose File') }}</label>
            <input type="file" name="media" id="media">
        </div>
        <br>
        <div class="form-group title">
            <label for="file--title" class="sr-only">{{ __('Title') }}</label>
            <textarea name="title" class="post-title" id="file-title" placeholder="{{ __('Title') }}"></textarea>
        </div>
        <div class="form-group dropdown-checkboxes-wrapper categories">
            <div class="dropdown-checkboxes">
                <span class="categories-selected">{{ __('Select a category') }} ({{ __('max') }} {{ setting('maximum-categories', 2) }})</span>
                <span class="categories-selected-text hide">{{ __('Select a category') }} ({{ __('max') }} {{ setting('maximum-categories', 2) }})</span>
                <span class="caret"></span>
            </div>
            <ul class="checkboxes-list" data-max-cat="{{ setting('maximum-categories', 2) }}">
                @foreach ($categories as $category)
                    @if ( ! $category->template || $category->template == 'nsfw' || $category->template == 'meme')
                        <li>
                            <label>{{ $category->title }}
                                <input type="checkbox" name="categories[{{ $category->slug }}]" value="{{ $category->slug }}">
                                <span class="checkbox-custom circular"></span>
                            </label>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <br>

        <div class="form-group tag">
            <label for="file-tag" class="sr-only">{{ __('Hashtag') }}</label>
            <input type="text" name="tag" class="post-tag" id="file-tag" placeholder="#use,#comma,#to,#separate,#hashtag" />
        </div>
        <br>

        <div class="form-group post-description description">
            <label for="file-description" class="sr-only">{{ __('Description') .' ('. __('optional') .')' }}</label>
            <textarea name="description" id="file-description" placeholder="{{ __('Description') .' ('. __('optional') .')' }}"></textarea>
        </div>
        <br>

        <div class="upload-footer">
            <!-- <label>
                <input type="checkbox" class="description-checkbox" name="originalCreator">
                {{ __('Add description') }}
            </label> -->
            <button type="submit" class="btn btn-uploads">
                <span>{{ __('Upload') }}</span>
            </button>
        </div>
    </form></div>
@stop