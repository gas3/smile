                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
										<div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="dripicons-dots-3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
											<button data-toggle="tooltip" type="button" href="{{ route('post', $post->slug) }}" class="dropdown-item copy_text" id="sa-close">Copy link</button>
												    <!-- Sweet Alerts js -->
        <script src="{{ assetTheme('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Sweet alert init js-->
        <script src="{{ assetTheme('assets/js/pages/sweet-alerts.init.js') }}"></script>
											<script>
										   function myAlertMsg() {
                                           alert("Whatever message you want");
                                           location.reload(); /*This prevents the browsers pop-up disabler*/
                                                                 }
                                           </script>
                                            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
                                            <!-- item-->
											@if (auth()->check() && $post->user_id == auth()->user()->id )
                                            <a href="{{ route('profile.edit_post', [$post->user->name, $post->id]) }}" class="dropdown-item">Edit Post</a>
                                            <!-- item-->
                                            <form class="" action="{{ route('posts.delete', $post->id) }}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="delete">
            <button class="dropdown-item" type="submit" title="">Delete</button>
        </form>
											@endif
                                            <!-- item-->
                                            <a href="#" class="dropdown-item modal-trigger" data-target=".modal-report-post">Report</a>
                                        </div>
                                    </div>@widget('share.after')	
                                        <h4 class="card-title"><a href="{{ route('post', $post->slug) }}" target="_blank">{{ $post->title }}</a></h4>
										<h6 class="card-subtitle text-muted"><a class="a3" href="{{ route('profile.overview', $post->user->name) }}"><img class="rounded-circle img-thumbnail-post avatar-sm" src="{{ avatar($post->user->avatar) }}"></a><a class="a3" href="{{ route('profile.overview', $post->user->name) }}">
                {{ $post->user->name }}&nbsp;<i class="fe-clock"></i>
			@if( $post->created_at->diffInHours(\Carbon\Carbon::now(), false ) > 168 )
                        {{$post->created_at->format('m/d/y') }}
                    @else
                        {{$post->created_at->diffForHumans(null, true, true)}}
                    @endif
            </a></h6><h6 class="card-subtitle text-muted">
	 @if( count($post->tags) > 0 )
        @foreach( $post->tags as $v )
                <a class="a2" href="/posts/hashtag/{{ str_replace('#','',$v->tag) }}"><button type="button" class="btn-tags btn-primary btn-rounded width-xs waves-effect waves-light">{{ $v->tag }}</button></a>
        @endforeach</h6>
@if ( ! $post->safe && ( ! auth()->check() || ! auth()->user()->nsfw))
    @include('site::partials.post.nsfw')
@else
    @include('site::partials.post.'.$post->type)
@endif
 <div class="post-meta">
<h6 class="card-subtitle text-muted"></h6>
                    <h6 style="text-transform: uppercase;" class="card-subtitle text-muted"><span class="smiles-number-{{ $post->id }}">{{ formatNumber($post->points) }}</span>
                    <span class="text-accent">{{ __choice('smiles', $post->points) }} {{ __choice('points', $post->points) }}&nbsp; &#183;&nbsp; {{ formatNumber($post->comments) }} {{ __choice('comments', $post->comments) }}</span></h6>
            </div>

            @if ($post->type == 'list')
                </article>

                @foreach ($post->items as $pos => $item)
                    <article>
							<h6 class="card-subtitle text-muted">{{ $pos + 1 }}</h6>
                            <h2 class="item-title">{{ $item->title }}</h2>
                        <div class="post-wrapper">
                            @if ( ! $post->safe && ( ! auth()->check() || ! auth()->user()->nsfw))
                                @include('site::partials.post.nsfw', ['post' => $item, 'isBig' => true])
                            @else
                                @include('site::partials.post.'.$item->type, ['post' => $item, 'isBig' => true])
                            @endif
                            <div class="post-description">
                                {!! parseDescription($item->description) !!}
                            </div>
                        </div>
                    </article>
                    @if ($pos + 1 < count($post->items))
                    @endif
                @endforeach
                <article>
            @endif
			<h6 class="card-subtitle text-muted">
            <div class="button-list">
                    {!! voteButton($post, 'like fa fa-arrow-up btn btn-primary waves-effect waves-light width-xs', auth()->user()) !!}
                    <div class="divider"></div>
                    {!! voteButton($post, 'dislike fa fa-arrow-down btn btn-primary waves-effect waves-light width-xs', auth()->user()) !!}
                <div class="spread">
                    @include('site::partials.share', ['post' => $post])
                   
                </div>
            </div></h6>
        </article>
<div class="fade bs-example-modal-center show">
		<div class="modal-content">
    <div class="modal modal-report-post">
        <button class="modal-close btn-xs btn-icon waves-effect waves-light btn-danger"> <i class="fas fa-times"></i> </button>
        <h2>Report Post</h2>
        <form action="{{ route('posts.report', $post->id) }}" method="post" id="report-post-form">
		<div class="checkbox checkbox-primary checkbox-circle">
          <input type="checkbox" id="singleCheckbox1" name="reason" value="Contains a trademark or copyright violation">
            <label style="user-select:none;" for="singleCheckbox1">Contains a trademark or copyright violation</label>
            </div>
		<div class="checkbox checkbox-primary checkbox-circle">
          <input type="checkbox" id="singleCheckbox2" name="reason" value="Spam, blatant advertising, or solicitation">
            <label style="user-select:none;" for="singleCheckbox2">Spam, blatant advertising, or solicitation</label>
            </div>
		<div class="checkbox checkbox-primary checkbox-circle">
          <input type="checkbox" id="singleCheckbox3" name="reason" value="Contains offensive materials/nudity">
            <label style="user-select:none;" for="singleCheckbox3">Contains offensive materials/nudity</label>
            </div>
		<div class="checkbox checkbox-primary checkbox-circle">
          <input type="checkbox" id="singleCheckbox4" name="reason" value="Repost of another post on DIS Humor">
            <label style="user-select:none;" for="singleCheckbox4">Repost of another post on DIS Humor</label>
            </div>
			<button type="button" data-redirect="{{ route('post', $post->slug) }}" class="btn btn-primary waves-effect waves-light width-xs submit-report">Report</button>
        </form>
    </div></div></div>  <!-- end of modal-report-post -->

@endif
