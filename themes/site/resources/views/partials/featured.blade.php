<div class="featured-posts">
    <h3>{{ __('Featured') }}</h3>
    @foreach ($featured as $post)
        <article>
            <div class="post-wrapper">
                <a href="{{ route('post', $post->slug) }}">
                    <img src="{{ media($post->featured) }}" alt="Post Image">
                    <div class="shadow"></div>
                    <span>{{ formatNumber($post->points) }} {{ __choice('smiles', $post->points) }} {{ __choice('points generated', $post->points) }}</span>
                </a>
            </div>
            <h4>
                <a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
            </h4>
        </article>
    @endforeach
	<h3>Follow Us</h3>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=238359550101852&autoLogAppEvents=1" nonce="weoOZtsm"></script>
<div class="fb-like" data-href="https://facebook.com/DISHumor" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
</div> <!-- end of featured posts -->

