<div class="col-lg-6">
    <div class="selected-profile-box">
        <div class="media">
            @if ($project->avatar)
            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="avatar" class="img-fluid avatar" />
        @else
            <img src="{{ asset('uploads/projects/project-01.png') }}" alt="a" class="img-fluid avatar">
        @endif
            <div class="media-body">
                <h3>{{ $project->title }}</h3>
            </div>
            <a href="javascript:;" onclick="removeProjectById('{{ $project->project_id }}')">
                <img src="./assets/images/icons/close-2.svg" alt="a" class="img-fluid">
            </a>
        </div>
    </div>
</div>


