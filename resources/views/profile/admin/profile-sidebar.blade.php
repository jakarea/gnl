<div class="company-about-box">
    <div class="avatar-wrap">
        @if ($user->avatar)
            <img src="{{ asset($user->avatar) }}" alt="avatar" class="img-fluid avatar" />
        @else
            <img src="{{ asset('uploads/users/avatar-1.png') }}" alt="default avatar"
                class="img-fluid avatar" />
        @endif
    </div>
    <div class="txt">
        <h1>{{ $user->full_name }}</h1>
        <p>{{ $user->designation }}</p>

        <hr>

        <ul>
            @if ($user->email)
                <li>
                    <p><img src="/assets/images/icons/envelope.svg" alt="I" class="img-fluid">
                        {{ $user->email }}</p>
                </li>
            @endif
            @if ($user->phone)
                <li>
                    <p><img src="/assets/images/icons/call.svg" alt="I" class="img-fluid">
                        {{ $user->phone }}
                    </p>
                </li>
            @endif

            @if ($user->country)
                <li>
                    <p><img src="/assets/images/icons/global.svg" alt="I" class="img-fluid">{{ $user->country }}
                    </p>
                </li>
            @endif

        </ul>
    </div>
</div>
