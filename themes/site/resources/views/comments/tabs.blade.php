<div class="comments-tab-content">
    @if (setting('comments.local.on', true))
        <div class="tab1 active">
            @include('site::comments.providers.local')
        </div>
    @endif
    @if (setting('comments.facebook.on'))
        <div class="tab2">
            @include('site::comments.providers.facebook')
        </div>
    @endif
    @if (setting('comments.disqus.on'))
        <div class="tab3">
            @include('site::comments.providers.disqus')
        </div>
    @endif
</div>
