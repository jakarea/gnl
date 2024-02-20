@if (count($projects) > 0)
    @foreach ($projects as $project)
        <a href="javascript:;" class="select-customer select-project" onclick="getProjectId('{{ $project->project_id }}')">
            <div class="selected-profile-box mt-0 bg-white border-0 p-0">
                <div class="media">
                    @if ($project->thumbnail)
                        <img src="{{ asset($project->thumbnail) }}" alt="avatar" class="img-fluid avatar" />
                    @else
                        <img src="{{ asset('assets/projects/project-01.png') }}" alt="a" class="img-fluid avatar">
                    @endif

                    <div class="media-body">
                        <h3>{{ $project->title }}</h3>
                        <p>Cupiditate</p>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endif
