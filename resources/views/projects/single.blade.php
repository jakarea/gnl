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
        <a href="#" class="add" data-bs-toggle="modal" data-bs-target="#staticBackdropProject"><i class="fas fa-plus"></i>
            Add Project</a>
    </div>
      <!-- bttn -->
    </div>
    <div class="project-details-root-wrap">
      <div class="row">
        <div class="col-lg-5">
          <div class="project-details-txt">
            <div class="header">
              <span class="in_progress"> In Progress</span>
              <div class="actions">
                <a href="#"
                  ><img
                    src="{{ url('assets/images/icons/pen.svg') }}"
                    alt="a"
                    class="img-fluid"
                /></a>
                <a href="#"
                  ><img
                    src="{{ url('/assets/images/icons/bin.svg') }}"
                    alt="a"
                    class="img-fluid"
                /></a>
              </div>
            </div>
            <div class="txt">
              <h4>Dashboard Design</h4>
              <p>
                Qui dicta quae quo non et facere maxime minus. Sint dolorem
                perferendis laboriosam sunt quam vel et veniam. Odit sed et
                quibusdam enim quia. Consequuntur ut maxime in eos commodi
                explicabo qui nobis. Id porro sunt dolorum qui et neque.
                Eligendi et magni veniam vero repudiandae quia nihil. Iusto
                et voluptatem nemo et corrupti quas quia. Distinctio aut
                consequatur maxime fuga quasi optio. Aut sint incidunt minus
                numquam asperiores iure molestias excepturi quia. Eaque
                nulla et quis id.
              </p>
            </div>
            <div class="thumbnail">
              <img
                src="{{ url('uploads/projects/project-02.png')}}"
                alt="a"
                class="img-fluid"
              />
            </div>
            <div class="d-flex">
              <p>
                <img
                  src="{{ url('assets/images/icons/calendar.svg')}}"
                  alt="a"
                  class="img-fluid"
                />
                20 Oct - 30 Oct 2023
              </p>
              <p>
                <img
                  src="{{ url('assets/images/icons/clock.svg')}}"
                  alt="a"
                  class="img-fluid"
                />
                4 Days Remaining
              </p>
            </div>
            <hr />
            <div class="project-bottom">
              <div class="media">
                <img
                  src="{{ url('uploads/users/avatar-18.png')}}"
                  alt="a"
                  class="img-fluid avatar"
                />
                <div class="media-body">
                  <h5>Louise Schuppe</h5>
                  <p>Strategist</p>
                </div>
              </div>
              <h4>$460</h4>
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
                <img
                  src="{{ url('uploads/users/avatar-18.png')}}"
                  alt="a"
                  class="img-fluid avatar"
                />
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
                  <a href="#"
                    ><img
                      src="{{ url('assets/images/icons/like.svg')}}"
                      alt="a"
                      class="img-fluid"
                    />
                    <span>948</span>
                  </a>
                </li>
                <li>
                  <a href="#"
                    ><img
                      src="{{ url('assets/images/icons/dislke.svg')}}"
                      alt="a"
                      class="img-fluid"
                    />
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
                <img
                  src="{{ url('/uploads/users/avatar-9.png')}}"
                  alt="a"
                  class="img-fluid avatar"
                />
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
                  <a href="#" class="active"><img
                      src="{{ url('/assets/images/icons/like.svg') }}"
                      alt="a"
                      class="img-fluid"
                    />
                    <span>948</span>
                  </a>
                </li>
                <li>
                  <a href="#"
                    ><img
                      src={{ url('/assets/images/icons/dislke.svg') }}
                      alt="a"
                      class="img-fluid"
                    />
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
                  <img
                    src="{{ url('/uploads/users/avatar-12.png')}}"
                    alt="a"
                    class="img-fluid avatar"
                  />
                  <div class="media-body">
                    <h5>Louise Schuppe</h5>
                    <p>04:30 PM</p>
                  </div>
                </div>
                <!-- reply box start -->
                <div class="commment-reply-box">
                  <p class="mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate veniam odio eligendi delectus iste consequuntur eveniet. Dicta consequuntur quam illo.</p>
                  <textarea class="form-control" placeholder="Reply"></textarea>
                  <button class="btn btn-submit" type="button"><img src="{{ url('assets/images/icons/reply-icon.svg') }}" alt="a" class="img-fluid"></button>

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
                <img
                  src="{{ url('/uploads/users/avatar-4.png')}}"
                  alt="a"
                  class="img-fluid avatar"
                />
                <div class="media-body">
                  <h5>Maggie Grady</h5>
                  <p>1 days ago</p>
                </div>
              </div>
              <p class="comment-text">
                Eveniet facilis et ab ut eos deserunt rerum. Mollitia provident necessitatibus non. Et sed ipsam et non omnis aut.
              </p>
              <!-- comment action start -->
              <ul>
                <li>
                  <a href="#" class="active"><img
                      src="{{ url('/assets/images/icons/like.svg') }}"
                      alt="a"
                      class="img-fluid"
                    />
                    <span>948</span>
                  </a>
                </li>
                <li>
                  <a href="#"
                    ><img
                      src="{{ url('/assets/images/icons/dislke.svg') }}"
                      alt="a"
                      class="img-fluid"
                    />
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
                  <img
                    src="{{ url('/uploads/users/avatar-12.png')}}"
                    alt="a"
                    class="img-fluid avatar"
                  />
                  <div class="media-body">
                    <h5>Bryan Schroeder</h5>
                    <p>04:30 PM</p>
                  </div>
                </div>
                <!-- reply box start -->
                <div class="commment-reply-box">
                 <p><p>Doloremque et iure quas quidem ut quaerat voluptatum molestiae cum. Eaque quod necessitatibus rem quasi dolorum quam.</p></p>
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
                <img
                  src="{{ url('/assets/images/icons/Group-white.svg') }}"
                  class="img-fluid"
                  alt="a">
              </button>
            </div>
            <!-- comment write box end -->
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- project add modal start -->
    <div class="custom-modal">
        <div class="modal fade" id="staticBackdropProject" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-header-two">
                        <h1 class="modal-title" id="staticBackdropLabel">Add New Project</h1>
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="fas fa-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" class="common-form another-form">
                            <div class="add-customer-form">
                                <div class="row">

                                    <div class="col-xl-12">
                                        <div class="row">
                                            <!--modal left part start-->
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="form-group mt-0">
                                                            <div class="customer-modal-title">
                                                                <h3>Project Information</h3>
                                                            </div>
                                                            <hr>
                                                            <input type="file" name="thumbnail" id="thumbnail"
                                                                class="d-none">
                                                            <!-- upload avatar -->
                                                            <div class="project-thumbnail-upload">
                                                                <h3>Project Thumbnail</h4>
                                                                    <div class="d-flex">
                                                                        <div class="thumbnail-preview">
                                                                            <img src="{{ url('/uploads/projects/project-01.png') }}"
                                                                                alt="a" class="img-fluid">
                                                                        </div>
                                                                        <label for="thumbnail"
                                                                            class="thumbnail-upload-icon">
                                                                            <img src="{{ url('/assets/images/icons/anchor.svg') }}"
                                                                                alt="Upload" class="img-fluid">
                                                                            <p> Upload </p>
                                                                        </label>
                                                                    </div>
                                                            </div>
                                                            <!-- upload avatar -->
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-12">
                                                        <div class="form-group form-error">
                                                            <label for="name">Project Name</label>
                                                            <input type="text" placeholder="Enter Name" id="title"
                                                                name="name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group form-error">
                                                            <label for="email">Amount</label>
                                                            <input type="amount" placeholder="$0000" id="amount"
                                                                name="amount" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group form-error">
                                                            <label for="phone">Tax</label>
                                                            <input type="tax" placeholder="$0000" id="tax"
                                                                name="tax" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group form-error">
                                                            <label for="start_date">Start Date</label>
                                                            <input type="date" placeholder="dd-mm-yyyy"
                                                                id="start_date" name="start_date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group form-error">
                                                            <label for="end_date">End Date</label>
                                                            <input type="date" placeholder="dd-mm-yyyy" id="end_date"
                                                                name="end_date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group form-error">
                                                            <label for="note">Note</label>
                                                            <input type="note" placeholder="Write note" id="note"
                                                                name="note" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group form-error">
                                                            <label for="website">Priority</label>
                                                            <div class="common-dropdown common-dropdown-two">
                                                                <div class="dropdown dropdown-two">
                                                                    <button class="btn" type="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Select Priority<i class="fas fa-angle-down"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu dropdown-menu-two">
                                                                        <li><a class="text-primary dropdown-item dropdown-item-two"
                                                                                href="#">Basic<i
                                                                                    class="fas fa-check"></i></a></li>
                                                                        <li><a class="text-warning dropdown-item dropdown-item-two"
                                                                                href="#">Important</a>
                                                                        </li>
                                                                        <li><a class="text-danger dropdown-item dropdown-item-two"
                                                                                href="#">Priority</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group form-error">
                                                            <label for="description">Description</label>
                                                            <textarea name="description" id="description" rows="7" class="form-control" placeholder="Enter details"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--modal left part end-->
                                            <div class="col-lg-6">
                                                <div class="customer-modal-title">
                                                    <h3>Customer Information</h3>
                                                </div>
                                                <hr>
                                                <div class="col-xl-12">
                                                    <div class="select-title">
                                                        <h3>Select Customer</h3>
                                                    </div>
                                                    <!-- customer search form start -->
                                                    <div class="form-group search-by-name">
                                                        <div class="search-item">
                                                            <img src="{{ url('assets/images/icons/search-ic.svg') }}" alt="a"
                                                                class="img-fluid">
                                                            <input type="text" placeholder="Search by name"
                                                                name="search" class="form-control">
                                                        </div>
                                                        <div class="avatar-btn">
                                                            <a data-bs-toggle="collapse" href="#collapseTwo"
                                                                role="button" aria-expanded="false"
                                                                aria-controls="collapseTwo" type="button">
                                                                <img src="{{ url('/assets/images/icons/user-add-two.svg') }}"
                                                                    alt="a" class="img-fluid">Add Manually</a>
                                                        </div>
                                                    </div>
                                                    <!-- customer search form end -->

                                                    <!-- selected customer start  -->
                                                    <div class="row">
                                                        <!-- person -->
                                                        <div class="col-lg-6">
                                                            <div class="selected-profile-box">
                                                                <div class="media">
                                                                    <img src="{{ url('uploads/users/avatar-19.png')}}"
                                                                        class="img-fluid avatar" alt="avatar">
                                                                    <div class="media-body">
                                                                        <h3>Glenda Miller</h3>
                                                                        <p>Manager</p>
                                                                    </div>
                                                                    <a href="#">
                                                                        <img src="{{ url('/assets/images/icons/close-2.svg') }}"
                                                                            alt="a" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- person -->
                                                        <!-- person -->
                                                        <div class="col-lg-6">
                                                            <div class="selected-profile-box">
                                                                <div class="media">
                                                                    <img src="{{ url('uploads/users/avatar-12.png') }}"
                                                                        class="img-fluid avatar" alt="avatar">
                                                                    <div class="media-body">
                                                                        <h3>Glenda Miller</h3>
                                                                        <p>CEO</p>
                                                                    </div>
                                                                    <a href="#">
                                                                        <img src="{{ url('/assets/images/icons/close-2.svg') }}"
                                                                            alt="a" class="img-fluid">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- person -->
                                                    </div>
                                                    <!-- selected customer end  -->

                                                    <!--collapse part start-->
                                                    <div class="collapse" id="collapseTwo">
                                                        <div class="card-body">
                                                            <div class="modal-body">
                                                                <form action="" class="common-form">
                                                                    <div class="add-customer-form">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <hr>
                                                                                <div class="form-group">
                                                                                    <label for="avatar">Profile
                                                                                        Image</label>
                                                                                    <input type="file" name="avatar"
                                                                                        id="avatar" class="d-none">
                                                                                    <!-- upload avatar -->
                                                                                    <div class="d-flex">
                                                                                        <label for="avatar"
                                                                                            class="avatar">
                                                                                            <img src="{{ url('/uploads/users/avatar-9.png') }}"
                                                                                                alt="avatar"
                                                                                                class="img-fluid">
                                                                                            <span class="avatar-ol">
                                                                                                <img src="{{ url('/assets/images/icons/camera.svg') }}"
                                                                                                    alt="camera"
                                                                                                    class="img-fluid">
                                                                                            </span>
                                                                                        </label>
                                                                                        <label for="avatar">
                                                                                            <p><img src="{{ url('/assets/images/icons/anchor.svg') }}"
                                                                                                    alt="anchor"
                                                                                                    class="img-fluid">
                                                                                                Upload</p>
                                                                                        </label>
                                                                                    </div>
                                                                                    <!-- upload avatar -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="name">Name</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter Name"
                                                                                        id="name" name="name"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label
                                                                                        for="designation">Designation</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter Designation"
                                                                                        id="designation"
                                                                                        name="designation"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="email">E-mail</label>
                                                                                    <input type="email"
                                                                                        placeholder="Enter email address"
                                                                                        id="email" name="email"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="phone">Phone</label>
                                                                                    <input type="number"
                                                                                        placeholder="Enter phone number"
                                                                                        id="phone" name="phone"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="location">Location</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter location"
                                                                                        id="location" name="location"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="website">Active
                                                                                        Status</label>
                                                                                    <div
                                                                                        class="common-dropdown common-dropdown-two common-dropdown-three">
                                                                                        <div
                                                                                            class="dropdown dropdown-two dropdown-three">
                                                                                            <button class="btn"
                                                                                                type="button"
                                                                                                data-bs-toggle="dropdown"
                                                                                                aria-expanded="false">
                                                                                                Active<i
                                                                                                    class="fas fa-angle-down"></i>
                                                                                            </button>
                                                                                            <ul
                                                                                                class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                                                                <li><a class="dropdown-item dropdown-item-two"
                                                                                                        href="#">Active<i
                                                                                                            class="fas fa-check"></i></a>
                                                                                                </li>
                                                                                                <li><a class="dropdown-item dropdown-item-two"
                                                                                                        href="#">Inactive</a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="company">KVK</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter kvk number"
                                                                                        id="kvk" name="kvk"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="service">Service</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter service"
                                                                                        id="service" name="service"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="company">Company</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter company name"
                                                                                        id="company" name="company"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="website">Website</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter website"
                                                                                        id="website" name="website"
                                                                                        class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group form-error">
                                                                                    <label for="details">Details</label>
                                                                                    <textarea name="details" id="details" rows="7" class="form-control" placeholder="Enter details"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--collapse part end-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--modal button start-->
                                    <div class="col-xl-6">
                                        <div class="form-bttn">
                                            <button type="button" class="btn btn-cancel">Cancel</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-bttn">
                                            <button type="submit" class="btn btn-submit">Submit</button>
                                        </div>
                                    </div>
                                    <!--modal button end-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- project add modal end -->

@endsection
{{-- add custmer form end --}}
