<h3 class="left-cmnt"><span class="total-comments">{{ formatNumber($post->comments) }}</span> {{ __choice('comments', $post->comments) }}</h3>
<form action="{{ route('posts.comment', $post) }}" id="comment-form" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
		<div class="comment-form-center">
        @if ( ! auth()->check())
            <img class="rounded-circle img-thumbnail-comment avatar-sm" src="{{ assetTheme('assets/img/default.png') }}" class="user-avatar" alt="User Avatar">
        @else
            <img class="rounded-circle img-thumbnail-comment avatar-sm" src="{{ avatar(Auth::user()->avatar) }}" class="user-avatar" alt="User Avatar">
        @endif
        <label for="comment" class="sr-only">Type in your comment</label>
        <textarea name="message" id="comment" class="ql-editor" placeholder="{{ __('Write your comment here') }}"></textarea>
		@if (auth()->check())
            <button type="submit" class="btn btn-light width-xs waves-effect comment-btn">Post</button>
        @else
            <button type="submit" class="btn btn-light width-xs waves-effect comment-btn">Post</button>
        @endif
	</div>
	</div>
</form>          
<div class="comments" data-post="{{ $post->id }}" data-url="{{ route('comments.load', $post->id) }}">
    <div style="text-align:center;padding-bottom:25px;" class="loading-comments" data-post="{{ $post->id }}">
        <img style="height:30px;" src="{{ assetTheme('assets/img/loading-black.gif') }}" alt="Comments are loading">
        <span>{{ __('Loading...') }}</span>
    </div> <!-- end of loading comments -->
</div>