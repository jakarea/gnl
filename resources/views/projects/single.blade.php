@extends('layouts.auth')

@section('title', 'Projects')
@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/project.css') }}" />
@endsection
@section('content')
    <section class="main-page-wrapper">
        <!-- page title -->
        <div class="page-title mb-4">
            <h1>Projects Details</h1>
            <!-- bttn -->
            <div class="common-bttn">
                <a href="{{ url('/projects') }}" class="add"><i class="fas fa-list"></i>
                    All Project</a>
            </div>
            <!-- bttn -->
        </div>
        <div class="project-details-root-wrap">
            <div class="row">
                <div class="col-lg-5">
                    <div class="project-details-txt">
                        <div class="header">
                            @if ($project->status == 'in_progress')
                                <span class="in_progress"><i class="fas fa-circle danger"></i> In Progress</span>
                            @else
                                <span><i class="fas fa-circle"></i> Completed</span>
                            @endif
                            <div class="actions">
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#staticBackdropProject"><img
                                        src="{{ url('assets/images/icons/pen.svg') }}" alt="a"
                                        class="img-fluid" /></a>
                                <form action="{{ url('projects/' . $project->project_id . '/destroy') }}" class="d-inline"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn"><img
                                            src="{{ url('assets/images/icons/bin.svg') }}" alt="a"
                                            class="img-fluid" /></button>
                                </form>
                            </div>
                        </div>
                        <div class="txt">
                            <h4>{{ $project->title }}</h4>
                            <p>
                                {{ $project->description }}
                            </p>
                        </div>
                        <div class="thumbnail">
                            @if ($project->thumbnail)
                                <img src="{{ asset($project->thumbnail) }}" alt="a" class="img-fluid">
                            @else
                                <img src="{{ asset('assets/projects/project-01.png') }}" alt="a" class="img-fluid">
                            @endif
                        </div>

                        @php
                            $startDate = new DateTime($project->start_date);
                            $endDate = new DateTime($project->end_date);
                            $currentDate = new DateTime();
                            $interval = $currentDate->diff($endDate);
                            $remainingDays = $interval->days;
                        @endphp

                        <div class="d-flex">
                            <p>
                                <img src="{{ asset('assets/images/icons/calendar.svg') }}" alt="a" class="img-fluid">
                                {{ $startDate->format('j M') }} - {{ $endDate->format('j M') }}
                                {{ $startDate->format('Y') }}
                            </p>
                            <p>
                                <img src="{{ asset('assets/images/icons/clock.svg') }}" alt="a" class="img-fluid">
                                {{ $remainingDays }} Days Remaining
                            </p>
                        </div>
                        <hr />
                        <div class="project-bottom">
                            @foreach ($project->customers->slice(0, 1) as $customer)
                                <div class="media">
                                    @if ($customer->avatar)
                                        <img src="{{ asset($customer->avatar) }}" alt="a" class="img-fluid avatar">
                                    @else
                                        <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="a"
                                            class="img-fluid avatar">
                                    @endif
                                    <div class="media-body">
                                        <h5>{{ $customer->name }}</h5>
                                        <p>{{ $customer->designation }}</p>
                                    </div>
                                </div>
                            @endforeach
                            <h4>€ {{ $project->amount }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 border-start">
                    <div class="project-details-txt project-details-comment">
                        <div class="txt">
                            <h4>Comments</h4>
                        </div>
                        <hr />


                        @if (count($project->comments) > 0)
                            @foreach ($project->comments as $comment)
                                <div class="project-single-comment mb-4">
                                    <div class="media">

                                        @if ($comment->user->avatar)
                                            <img src="{{ asset($comment->user->avatar) }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @else
                                            <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="default avatar"
                                                class="img-fluid avatar" />
                                        @endif
                                        <div class="media-body">
                                            <h5>{{ $comment->user->full_name }}</h5>
                                            <p>{{ $comment->created_at->diffForHumans() }} </p>
                                        </div>
                                    </div>
                                    <p class="comment-text">
                                        {{ $comment->comment }}
                                    </p>

                                    <ul>
                                        <li>
                                            <a href="javascript:;" class="active"
                                                onclick="likeComment('{{ $comment->comment_id }}')"><img
                                                    src="{{ url('/assets/images/icons/like.svg') }}" alt="a"
                                                    class="img-fluid" />
                                                <span
                                                    id="like-count-{{ $comment->comment_id }}">{{ $comment->like }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;"
                                                onclick="disLikeComment('{{ $comment->comment_id }}')"><img
                                                    src={{ url('/assets/images/icons/dislke.svg') }} alt="a"
                                                    class="img-fluid" />
                                                <span
                                                    id="dislike-count-{{ $comment->comment_id }}">{{ $comment->dislike }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="toggleReplyForm('{{ $comment->comment_id }}')">
                                                Reply </a>
                                        </li>

                                    </ul>
                                    <form style="display: none" id="reply-form-{{ $comment->comment_id }}" action="{{ route('comments.reply', ['comment' => $comment->comment_id]) }}" method="POST">
                                        <input type="hidden" name="project_id" value="{{ $project->project_id }}">
                                        @csrf
                                        <div class="commment-reply-box">
                                            <textarea name="reply_text" class="form-control" placeholder="Reply"></textarea>
                                            <button class="btn btn-submit" type="submit">
                                                <img src="{{ url('assets/images/icons/reply-icon.svg') }}" alt="a"
                                                    class="img-fluid">
                                            </button>
                                        </div>

                                    </form>

                                    @if (count($comment->replies) > 0)
                                        @foreach ($comment->replies as $reply)
                                            <div class="comment-reply-box">
                                                <div class="media">
                                                    @if ($reply->user->avatar)
                                                        <img src="{{ asset($reply->user->avatar) }}" alt="avatar"
                                                            class="img-fluid avatar" />
                                                    @else
                                                        <img src="{{ asset('uploads/users/avatar-9.png') }}"
                                                            alt="default avatar" class="img-fluid avatar" />
                                                    @endif
                                                    <div class="media-body">

                                                        <h5> {{ $reply->user->full_name }}</h5>
                                                        <p>{{ $reply->created_at->format('h:i A') }}</p>
                                                    </div>
                                                </div>

                                                <div class="commment-reply-box">
                                                    <p class="mb-2">{{ $reply->comment }}</p>
                                                </div>

                                            </div>

                                            <hr />
                                        @endforeach
                                    @endif

                                </div>
                            @endforeach
                        @endif



                        <!-- comment write box start -->
                        <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="project_id" value="{{ $project->project_id }}">
                            @csrf
                            <div class="main-comment-input-box">
                                <input name="comment" type="text" placeholder="Enter comment.."
                                    class="form-control" />
                                <button type="submit" class="btn btn-submit">
                                    Send
                                    <img src="{{ url('/assets/images/icons/Group-white.svg') }}" class="img-fluid"
                                        alt="a">
                                </button>
                            </div>
                        </form>

                        <!-- comment write box end -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- project edit modal start -->
    @include('projects/edit');
    <!-- project edit modal end -->

@endsection

@section('script')
    <script>
        const updateLikeDislikeCounts = (commentId, likes, dislikes) => {
            $('#like-count-' + commentId).text(likes);
            $('#dislike-count-' + commentId).text(dislikes);
        }
        const likeComment = (commentId) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: 'POST',
                url: "{{ route('comments.like') }}",
                data: {
                    commentId: commentId
                },
                success: function(response) {
                    updateLikeDislikeCounts(commentId, response.likes, response.dislikes);
                }
            });
        }

        const disLikeComment = (commentId) => {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: 'POST',
                data: {
                    commentId: commentId
                },
                url: "{{ route('comments.dislike') }}",
                success: function(response) {
                    updateLikeDislikeCounts(commentId, response.likes, response.dislikes);
                }
            });
        }

        const toggleReplyForm = (commentId) => {
            var replyForm = document.getElementById('reply-form-' + commentId);
            replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
        }

    </script>
@endsection
