<div class="featured-posts top_tag">
    @if( count($tags) > 0 )
        <div class="hashtag-wrap">
        @foreach( $tags as $v )
                <a href="/posts/hashtag/{{ str_replace('#','',$v->tag) }}"><button type="button" class="btn-tags btn-primary btn-rounded width-xs waves-effect waves-light">{{ $v->tag }}</button></a>
        @endforeach
        </div>
    @endif
</div> <!-- end of tagged posts -->