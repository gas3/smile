@extends('site::app')

@section('title')
    {{ isset($category) ? $category->title.' - ' : '' }} @parent
@stop

@section('content')
    <div class="posts" data-url="{{ URL::current() }}">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <article>
                    @include('site::partials.post', ['post' => $post])
                </article>
                <div class="divider"></div>
            @endforeach
        @else
            <article class="db-message">
                <p>{{ __('Sorry, no content is available for the moment, please smile later!') }}</p>
            </article>
        @endif
    </div>

    <script type="text/javascript">
    (function($) {
        'use strict';
        $.farazscroll = {
            defaults: {
                autoTrigger: true,
                autoTriggerUntil: false,
                loadingHtml: '<small>Loading...</small>',
                loadingFunction: false,
                padding: 0,
                nextSelector: 'a:last',
                contentSelector: '',
                pagingSelector: '',
                callback: false
            }
        };

        var farazscroll = function($e, options) {

            var _data = $e.data('farazscroll'),
                _userOptions = (typeof options === 'function') ? { callback: options } : options,
                _options = $.extend({}, $.farazscroll.defaults, _userOptions, _data || {}),
                _isWindow = ($e.css('overflow-y') === 'visible'),
                _$next = $e.find(_options.nextSelector).first(),
                _$window = $(window),
                _$body = $('body'),
                _$scroll = _isWindow ? _$window : $e,
                _nextHref = $.trim(_$next.prop('href') + ' ' + _options.contentSelector),

                _preloadImage = function() {
                    var src = $(_options.loadingHtml).filter('img').attr('src');
                    if (src) {
                        var image = new Image();
                        image.src = src;
                    }
                },

                _wrapInnerContent = function() {
                    if (!$e.find('.farazscroll-inner').length) {
                        $e.contents().wrapAll('<div class="farazscroll-inner" />');
                    }
                },

                _nextWrap = function($next) {
                    var $parent;
                    if (_options.pagingSelector) {
                        $next.closest(_options.pagingSelector).hide();
                    } else {
                        $parent = $next.parent().not('.farazscroll-inner,.farazscroll-added').addClass('farazscroll-next-parent').hide();
                        if (!$parent.length) {
                            $next.wrap('<div class="farazscroll-next-parent" />').parent().hide();
                        }
                    }
                },

                _destroy = function() {
                    return _$scroll.unbind('.farazscroll')
                        .removeData('farazscroll')
                        .find('.farazscroll-inner').children().unwrap()
                        .filter('.farazscroll-added').children().unwrap();
                },

                _observe = function() {
                    if ($e.is(':visible')) {
                        _wrapInnerContent();
                        var $inner = $e.find('div.farazscroll-inner').first(),
                            data = $e.data('farazscroll'),
                            borderTopWidth = parseInt($e.css('borderTopWidth'), 10),
                            borderTopWidthInt = isNaN(borderTopWidth) ? 0 : borderTopWidth,
                            iContainerTop = parseInt($e.css('paddingTop'), 10) + borderTopWidthInt,
                            iTopHeight = _isWindow ? _$scroll.scrollTop() : $e.offset().top,
                            innerTop = $inner.length ? $inner.offset().top : 0,
                            iTotalHeight = Math.ceil(iTopHeight - innerTop + _$scroll.height() + iContainerTop);

                        if (!data.waiting && iTotalHeight + _options.padding >= $inner.outerHeight()) {
                            return _load();
                        }
                    }
                },

                _checkNextHref = function(data) {
                    data = data || $e.data('farazscroll');
                    if (!data || !data.nextHref) {
                        _destroy();
                        return false;
                    } else {
                        _setBindings();
                        return true;
                    }
                },

                _setBindings = function() {
                    var $next = $e.find(_options.nextSelector).first();
                    if (!$next.length) {
                        return;
                    }
                    if (_options.autoTrigger && (_options.autoTriggerUntil === false || _options.autoTriggerUntil > 0)) {
                        _nextWrap($next);
                        var scrollingBodyHeight = _$body.height() - $e.offset().top,
                            scrollingHeight = ($e.height() < scrollingBodyHeight) ? $e.height() : scrollingBodyHeight,
                            windowHeight = ($e.offset().top - _$window.scrollTop() > 0) ? _$window.height() - ($e.offset().top - $(window).scrollTop()) : _$window.height();
                        if (scrollingHeight <= windowHeight) {
                            _observe();
                        }
                        _$scroll.unbind('.farazscroll').bind('scroll.farazscroll', function() {
                            return _observe();
                        });
                        if (_options.autoTriggerUntil > 0) {
                            _options.autoTriggerUntil--;
                        }
                    } else {
                        _$scroll.unbind('.farazscroll');
                        $next.bind('click.farazscroll', function() {
                            _nextWrap($next);
                            _load();
                            return false;
                        });
                    }
                },

                _load = function() {
                    var $inner = $e.find('div.farazscroll-inner').first(),
                        data = $e.data('farazscroll');

                    data.waiting = true;
                    $inner.append('<div class="farazscroll-added" />')
                        .children('.farazscroll-added').last()
                        .html('<div class="farazscroll-loading" id="farazscroll-loading">' + _options.loadingHtml + '</div>')
                        .promise()
                        .done(function() {
                            if (_options.loadingFunction) {
                                _options.loadingFunction();
                            }
                        });

                    return $e.animate({scrollTop: $inner.outerHeight()}, 0, function() {
                        var nextHref = data.nextHref;
                        $inner.find('div.farazscroll-added').last().load(nextHref, function(r, status) {
                            if (status === 'error') {
                                return _destroy();
                            }
                            var $next = $(this).find(_options.nextSelector).first();
                            data.waiting = false;
                            data.nextHref = $next.prop('href') ? $.trim($next.prop('href') + ' ' + _options.contentSelector) : false;
                            $('.farazscroll-next-parent', $e).remove(); // Remove the previous next link now that we have a new one
                            _checkNextHref();
                            if (_options.callback) {
                                _options.callback.call(this, nextHref);
                            }
                        });
                    });
                };

            $e.data('farazscroll', $.extend({}, _data, {initialized: true, waiting: false, nextHref: _nextHref}));
            _wrapInnerContent();
            _preloadImage();
            _setBindings();

            $.extend($e.farazscroll, {
                destroy: _destroy
            });
            return $e;
        };

        $.fn.farazscroll = function(m) {
            return this.each(function() {
                var $this = $(this),
                    data = $this.data('farazscroll');
                if (data && data.initialized) {
                    return;
                }
                farazscroll($this, m);
            });
        };

    })(jQuery);

    jQuery(document).ready(function($) {
        $('ul.pagination').hide();
        $(function() {
            $('.posts').farazscroll({
                autoTrigger: true,
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.posts',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    });
    </script>
@stop