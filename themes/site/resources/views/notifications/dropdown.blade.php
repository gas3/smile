<!-- notifications -->

<div class="notifications-dropdown dropdown">
    <ul class="notifications-list">
        @if ($notifications->count())
            @include('site::notifications.partials.loop')
        @else
            <p class="no-notifications">
                {{ __('You don\'t have any notifications yet.') }}
            </p>
        @endif
    </ul>
</div>
<!-- end of notifications -->