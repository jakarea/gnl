@if (count($notifications) > 0)
    <div class="notify-list-box custom-scroll-bar" id="notifyList" style="cursor: auto">
        <!-- item -->

            @foreach ($notifications as $notification)
                <div class="media">
                    @php
                        $iconMap = [
                            'customers.show' => 'primary',
                            'task.show' => 'secondary',
                            'projects.single' => 'secondary',
                            // 'account.single' => 'danger',
                        ];

                        $icon = $iconMap[$notification->action_link] ?? 'default';
                        $routeName = $notification->action_link;
                        $routeParams = ['id' => $notification->action_id];
                        $createdAt = $notification->created_at->format('d M, Y');
                    @endphp


                    <form action="{{ route('notification.markAsReadUnread', $notification->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-link">
                            @if ($notification->status)
                                <img src="{{ asset('assets/images/icons/primary.svg') }}" alt="I" class="fluid">
                            @else
                                <img src="{{ asset('assets/images/icons/secondary.svg') }}" alt="I" class="fluid">
                            @endif
                            {{-- <img src="{{ asset('assets/images/icons/' . $icon . '.svg') }}" alt="I" class="fluid"> --}}
                        </button>
                    </form>


                    <a href="{{ route($notification->action_link, $notification->action_id) }}?notificationId={{ $notification->id }}" class="media-body">

                        <h5>{{ $notification->title }} {{ $notification->id }}</h5>
                        <div class="d_flex">
                            <p>{{ $notification->message }}</p>
                            <span>{{ $createdAt }}</span>
                        </div>
                    </a>

                </div>
            @endforeach






        <!-- item -->
        <!-- item -->
        {{-- <div class="media">
            <img src="{{ asset('assets/images/icons/primary.svg') }}" alt="I" class="fluid">
            <div class="media-body">
                <h5>Marketing Service Added</h5>
                <div class="d_flex">
                    <p>New marketing service added</p>
                    <span>11 Oct, 2023</span>
                </div>

            </div>
        </div>
        <!-- item -->
        <!-- item -->
        <div class="media">
            <img src="{{ asset('assets/images/icons/secondary.svg') }}" alt="I" class="fluid">
            <div class="media-body">
                <h5>New Task Added</h5>
                <div class="d_flex">
                    <p>XYZ Tech posted new job for ui ux designer</p>
                    <span>11 Oct, 2023</span>
                </div>

            </div>
        </div>
        <!-- item -->
        <!-- item -->
        <div class="media">
            <img src="{{ asset('assets/images/icons/danger.svg') }}" alt="I" class="fluid">
            <div class="media-body">
                <h5>New Job Alert</h5>
                <div class="d_flex">
                    <p>New task added successfully</p>
                    <span>11 Oct, 2023</span>
                </div>

            </div>
        </div>
        <!-- item -->
        <!-- item -->
        <div class="media">
            <img src="{{ asset('assets/images/icons/danger.svg') }}" alt="I" class="fluid">
            <div class="media-body">
                <h5>New Job Alert</h5>
                <div class="d_flex">
                    <p>Marketing Service Updated</p>
                    <span>11 Oct, 2023</span>
                </div>

            </div>
        </div>
        <!-- item -->
        <!-- item -->
        <div class="media">
            <img src="{{ asset('assets/images/icons/secondary.svg') }}" alt="I" class="fluid">
            <div class="media-body">
                <h5>New Project Added</h5>
                <div class="d_flex">
                    <p>New project added successfully</p>
                    <span>11 Oct, 2023</span>
                </div>

            </div>
        </div>
        <!-- item -->
        <!-- item -->
        <div class="media">
            <img src="{{ asset('assets/images/icons/danger.svg') }}" alt="I" class="fluid">
            <div class="media-body">
                <h5>New Job Alert</h5>
                <div class="d_flex">
                    <p>Marketing Service Updated</p>
                    <span>11 Oct, 2023</span>
                </div>

            </div>
        </div>
        <!-- item -->
        <!-- item -->
        <div class="media">
            <img src="{{ asset('assets/images/icons/secondary.svg') }}" alt="I" class="fluid">
            <div class="media-body">
                <h5>New Project Added</h5>
                <div class="d_flex">
                    <p>New project added successfully</p>
                    <span>11 Oct, 2023</span>
                </div>

            </div>
        </div> --}}
        <!-- item -->
    </div>
@endif
