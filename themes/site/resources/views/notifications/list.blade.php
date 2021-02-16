@extends('site::app')

@section('title')
    {{ __('Notifications') }} - @parent
@stop

@section('content')
    <div class="notifications small-wrapper">
        <div class="notifications-header">
            @if ($notifications->total())
                <form action="{{ route('notifications.deleteAll') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn-transparent btn-small">{{ __('Mark all as read') }}</button>
                </form>
            @endif
        </div>
        <div class="slimscroll noti-scroll">
                                <!-- item-->
                                    <p class="notify-details"><div class="slimscroll noti-scroll">
                              <a href="javascript:void(0);" class="dropdown-item notify-item">
                                   
                                    <ul data-url="{{ URL::current() }}">
            @if ($notifications->count() > 0)
                @include('site::notifications.partials.loop')
            @else
                <p class="no-notifications">
                    {{ __('You don\'t have any notifications yet.') }}
                </p>
            @endif
			</ul>
                  </a>
                  </div>
                     </p>
</div>

        </ul>
    </div>
@stop
