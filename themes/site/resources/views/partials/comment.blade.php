@if ( ! isset($reply))
    <div class="comment" id="parent_{{ $comment->id }}">
@else
    <div class="comment reply-comment" id="comment-{{ $comment->id }}">
@endif
<div class="comments-nest">
                                            <ul class="list-unstyled chat-list slimscroll mb-0" style="max-height: 410px;">
                                                <li class="unactive">
                                                        <div class="media">
                                                            <div class="chat-user-img align-self-center mr-2">
                                                                <a target="_blank" href="{{ route('profile.overview', $comment->user->name) }}"><img src="{{ avatar($comment->user->avatar) }}" class="rounded-circle img-thumbnail-post avatar-sm" alt=""></a>
															<span class="smiles">
                <span style="font-size:12px" class=" smiles-number-{{ $comment->id }}">
                {{ formatNumber($comment->likes - $comment->dislikes) }}
                </span> <span style="font-size:12px">{{ __choice('points', $comment->likes - $comment->dislikes) }}</span>
            </span>
                                                            </div>
                                                            
                                                            <div class="media-body overflow-hidden">
                                                                 <a target="_blank" href="{{ route('profile.overview', $comment->user->name) }}"><h5 class="text-truncate font-14 mt-0 mb-1">{{ $comment->user->name }}&nbsp;&nbsp;&nbsp;<i class="dripicons-clock"></i><div class="font-11">05 min</div></h5></a>
                                                                <p class="text-truncate mb-0">{!! parseComment($comment->message) !!}</p>
																<p class="text-truncate mb-0">
                                        <button type="button" data-post="{{ $comment->post_id }}" data-parent="{{ $comment->parent_id ?: $comment->id }}" data-id="{{ $comment->id }}" data-name="{{ $comment->user->name }}" class="comments-reply btn btn-light width-xs">{{  __('Reply') }}</button>{!! voteButton($comment, 'comments-reply btn btn-light width-xs vote-comment like far fa-arrow-alt-circle-up', Auth::user()) !!}{!! voteButton($comment, 'comments-reply btn btn-light width-xs vote-comment dislike far fa-arrow-alt-circle-down', Auth::user()) !!}
            </p><a href="#" class="comments-reply dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="dripicons-dots-3"></i>
                                        </a><div class="more-btn-comment dropdown float-right">
                                            <div class="drop-more drop-comment-more dropdown-menu dropdown-menu-right">
                                            <!-- item-->
											@if (auth()->check())
											@if ($comment->user_id == auth()->user()->id)
                                <button type="button" @if ( ! isset($reply)) data-type="parent" @else data-type="child" @endif data-url="{{ route('comments.delete', $comment->id) }}" data-id="{{ $comment->id }}" class="more-comment dropdown-item">Delete</button>
                                            @endif
                                            <!-- item-->
											@if ($comment->user_id != auth()->user()->id)
								<button type="button" @if ( ! isset($reply)) data-type="parent" @else data-type="child" @endif data-url="{{ route('comments.report', $comment->id) }}" data-id="{{ $comment->id }}" class="more-comment dropdown-item">Report</button>
											@endif
											@endif
                                        </div>
                                    </div>
                                                            </div>
                                                            <div class="font-11">
															
															@if ($post->user_id == $comment->user_id)
                                                            <span class="text-success text-op">{{ __('OP') }}</span>
                                                            <div class="divider"></div>
                                                            @endif
															</div>
                                                        </div>
                                                </li>
                                            </ul>
                                        </div>
</div>