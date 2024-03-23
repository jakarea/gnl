@if (count($notifications) > 0)
    <div class="notify-list-box custom-scroll-bar" id="notifyList">
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

                        if( $notification->status ){
                            $route = route('notification.markAsUnread', ['id' => $notification->id]);
                        }else{
                            $route = route('notification.markAsRead', ['id' => $notification->id]);
                        }

                    @endphp


                    <form action="{{ $route }}" method="POST">

                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-link"><img
                                src="{{ asset('assets/images/icons/' . $icon . '.svg') }}" alt="I"
                                class="fluid"></button>
                    </form>

                    <div class="media-body">
                        <h5>{{ $notification->title }}</h5>
                        <div class="d_flex">
                            {{-- <a href="{{ route($routeName, $routeParams) }}"></a> --}}
                            <p>{{ $notification->message }}</p>
                            <span>{{ $createdAt }}</span>
                        </div>
                    </div>
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
