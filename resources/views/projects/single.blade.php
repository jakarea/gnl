@extends('layouts.auth')

@section('title', 'Projects')
@section('style')
<link rel="stylesheet" href="{{  url('assets/css/project.css') }}" />
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
              <a href="{{ url('project/'.$project->project_id.'/edit') }}"><img
                  src="{{ url('assets/images/icons/pen.svg') }}" alt="a" class="img-fluid" /></a>
              <form action="{{ url('project/'.$project->project_id.'/destroy') }}" class="d-inline" method="POST">
                @csrf
                <button type="submit" class="btn"><img src="{{ url('/assets/images/icons/bin.svg') }}" alt="a"
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
            <img src="{{ asset('storage/'.$project->thumbnail) }}" alt="a" class="img-fluid">
            @else
            <img src="{{ asset('uploads/projects/project-01.png') }}" alt="a" class="img-fluid">
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
              {{ $startDate->format('j M') }} - {{ $endDate->format('j M') }} {{ $startDate->format('Y')
              }}
            </p>
            <p>
              <img src="{{ asset('assets/images/icons/clock.svg') }}" alt="a" class="img-fluid">
              {{ $remainingDays }} Days Remaining
            </p>
          </div>
          <hr />
          <div class="project-bottom">
            @foreach ($project->customers->slice(0,1) as $customer)
            <div class="media">
              @if ($customer->avatar)
              <img src="{{ asset('storage/'.$customer->avatar) }}" alt="a" class="img-fluid avatar">
              @else
              <img src="{{ asset('uploads/users/avatar-18.png') }}" alt="a" class="img-fluid avatar">
              @endif
              <div class="media-body">
                <h5>{{ $customer->name }}</h5>
                <p>{{ $customer->designation }}</p>
              </div>
            </div>
            @endforeach
            <h4>€ {{ $project->amount}}</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-7 border-start">
        <div class="project-details-txt project-details-comment">
          <div class="txt">
            <h4>Comments</h4>
          </div>
          <hr />
          <!-- comment item start -->
          <div class="project-single-comment mb-4">
            <div class="media">
              <img src="{{ url('uploads/users/avatar-18.png')}}" alt="a" class="img-fluid avatar" />
              <div class="media-body">
                <h5>Louise Schuppe</h5>
                <p>1 days ago</p>
              </div>
            </div>
            <p class="comment-text">
              Qui sapiente natus. Et deserunt temporibus. Sit corrupti aut
              itaque aliquid nemo rerum adipisci.
            </p>
            <!-- comment action start -->
            <ul>
              <li>
                <a href="#"><img src="{{ url('assets/images/icons/like.svg')}}" alt="a" class="img-fluid" />
                  <span>948</span>
                </a>
              </li>
              <li>
                <a href="#"><img src="{{ url('assets/images/icons/dislke.svg')}}" alt="a" class="img-fluid" />
                  <span>182</span>
                </a>
              </li>
              <li>
                <a href="#" class="reply"> Reply </a>
              </li>
            </ul>
            <!-- comment action end -->
            <hr />

          </div>
          <!-- comment item end -->
          <!-- comment item start -->
          <div class="project-single-comment mb-4">
            <div class="media">
              <img src="{{ url('/uploads/users/avatar-9.png')}}" alt="a" class="img-fluid avatar" />
              <div class="media-body">
                <h5>Melinda Rodriguez</h5>
                <p>1 days ago</p>
              </div>
            </div>
            <p class="comment-text">
              Enim veritatis et neque sit voluptas ipsa perferendis. Voluptas accusamus dolorem dolore sit incidunt.
            </p>
            <!-- comment action start -->
            <ul>
              <li>
                <a href="#" class="active"><img src="{{ url('/assets/images/icons/like.svg') }}" alt="a"
                    class="img-fluid" />
                  <span>948</span>
                </a>
              </li>
              <li>
                <a href="#"><img src={{ url('/assets/images/icons/dislke.svg') }} alt="a" class="img-fluid" />
                  <span>182</span>
                </a>
              </li>
              <li>
                <a href="#" class="reply"> Reply </a>
              </li>
            </ul>
            <!-- comment action end -->

            <!-- comment reply start -->
            <div class="comment-reply-box">
              <div class="media">
                <img src="{{ url('/uploads/users/avatar-12.png')}}" alt="a" class="img-fluid avatar" />
                <div class="media-body">
                  <h5>Louise Schuppe</h5>
                  <p>04:30 PM</p>
                </div>
              </div>
              <!-- reply box start -->
              <div class="commment-reply-box">
                <p class="mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate veniam odio
                  eligendi delectus iste consequuntur eveniet. Dicta consequuntur quam illo.</p>
                <textarea class="form-control" placeholder="Reply"></textarea>
                <button class="btn btn-submit" type="button"><img src="{{ url('assets/images/icons/reply-icon.svg') }}"
                    alt="a" class="img-fluid"></button>

              </div>
              <!-- reply box end -->
            </div>
            <!-- comment reply end -->
            <hr />

          </div>
          <!-- comment item end -->

          <!-- comment item start -->
          <div class="project-single-comment mb-4">
            <div class="media">
              <img src="{{ url('/uploads/users/avatar-4.png')}}" alt="a" class="img-fluid avatar" />
              <div class="media-body">
                <h5>Maggie Grady</h5>
                <p>1 days ago</p>
              </div>
            </div>
            <p class="comment-text">
              Eveniet facilis et ab ut eos deserunt rerum. Mollitia provident necessitatibus non. Et sed ipsam et non
              omnis aut.
            </p>
            <!-- comment action start -->
            <ul>
              <li>
                <a href="#" class="active"><img src="{{ url('/assets/images/icons/like.svg') }}" alt="a"
                    class="img-fluid" />
                  <span>948</span>
                </a>
              </li>
              <li>
                <a href="#"><img src="{{ url('/assets/images/icons/dislke.svg') }}" alt="a" class="img-fluid" />
                  <span>182</span>
                </a>
              </li>
              <li>
                <a href="#" class="reply"> Reply </a>
              </li>
            </ul>
            <!-- comment action end -->

            <!-- comment reply start -->
            <div class="comment-reply-box">
              <div class="media">
                <img src="{{ url('/uploads/users/avatar-12.png')}}" alt="a" class="img-fluid avatar" />
                <div class="media-body">
                  <h5>Bryan Schroeder</h5>
                  <p>04:30 PM</p>
                </div>
              </div>
              <!-- reply box start -->
              <div class="commment-reply-box">
                <p>
                <p>Doloremque et iure quas quidem ut quaerat voluptatum molestiae cum. Eaque quod necessitatibus rem
                  quasi dolorum quam.</p>
                </p>
              </div>
              <!-- reply box end -->
            </div>
            <!-- comment reply end -->
            <hr />
          </div>
          <!-- comment item end -->

          <!-- comment write box start -->
          <div class="main-comment-input-box">
            <input type="text" placeholder="Enter comment.." class="form-control" />
            <button type="button" class="btn btn-submit">
              Send
              <img src="{{ url('/assets/images/icons/Group-white.svg') }}" class="img-fluid" alt="a">
            </button>
          </div>
          <!-- comment write box end -->
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
{{-- add custmer form end --}}