<div class="company-about-box">
    <div class="avatar-wrap" id="avatar-container">
        @if ($user->avatar)
            <img src="{{ asset($user->avatar) }}" alt="avatar" class="img-fluid main-avatar" id="avatar-preview" />
        @else
            <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="default avatar" class="img-fluid avatar" />
        @endif

        @if (!request()->is('account/profile', 'settings/address'))
            <label class="update-photo" for="avatar">
                <img src="/assets/images/icons/photos.svg" alt="photo" class="img-fluid">
                <p>Update Photo</p>
            </label>
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

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var avatarContainer = document.getElementById('avatar-container');
            var avatarPreview = document.getElementById('avatar-preview');
            document.getElementById('avatar').addEventListener('change', function(e) {
                var input = e.target;
                var file = input.files[0];

                if (file) {
                    if (!avatarPreview) {
                        avatarPreview = document.createElement('img');
                        avatarPreview.id = 'avatar-preview';
                        avatarPreview.className = 'img-fluid main-avatar';
                        avatarContainer.innerHTML = '';
                        avatarContainer.appendChild(avatarPreview);
                    }

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        avatarPreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
