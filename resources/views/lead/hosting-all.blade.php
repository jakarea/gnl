@extends('layouts.auth')

@section('title', 'Hosting Leads')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/leads.css') }}" />
@endsection

@section('content')
    <section class="main-page-wrapper">
        <div class="page-title">
            <h1>Hosting Leads</h1>
            <!-- filter -->
            <div class="page-filter d-flex">
                <div class="dropdown">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        All Leads<i class="fas fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">All Leads<i class="fas fa-check"></i></a></li>
                        <li><a class="dropdown-item" href="#">New Leads</a></li>
                        <li><a class="dropdown-item" href="#">In Progress</a></li>
                        <li><a class="dropdown-item" href="#">No Answer Yet</a></li>
                    </ul>
                </div>
                <div class="dropdown dropdown-category">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-plus"></i>Add Leads
                    </button>
                </div>
            </div>
        </div>
        <div class="all-customer-box payment-from-copany-user">
            <div class="user-payment-table">
                <table>
                    <tbody>
                        <tr>
                            <th width="3%">No</th>
                            <th class="d-flex justify-content-between">
                                <span>Name</span>
                            </th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Website</th>
                            <th>Code</th>
                            <th>Status</th>
                        </tr>
                        <!-- payment single item start -->
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                <div class="media">
                                    <img src="{{ url('uploads/users/avatar-1.png') }}" alt="A" class="img-fluid">
                                    <div class="media-body">
                                        <h5>Lela Mraz</h5>
                                        <span>zlincoln@unpixel.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>575-491-3111</p>
                            </td>
                            <td>
                                <p>Farrell LLC</p>
                            </td>
                            <td>
                                <p>www.breanna.net</p>
                            </td>
                            <td>
                                <p>99824254</p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="#" class="btn-view">New</a>
                                    </li>
                                    <li>
                                        <a href="#" class="lead-dots"><img
                                                src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- payment single item end -->
                        <!-- payment single item start -->
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                <div class="media">
                                    <img src="{{ url('uploads/users/avatar-2.png') }}" alt="A" class="img-fluid">
                                    <div class="media-body">
                                        <h5>Cecil Sporer</h5>
                                        <span>lincoln@unpixel.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>989-769-2178</p>
                            </td>
                            <td>
                                <p>White - Weber</p>
                            </td>
                            <td>
                                <p>www.melba.com</p>
                            </td>
                            <td>
                                <p>99824254</p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="#" class="btn-view">New</a>
                                    </li>
                                    <li>
                                        <a href="#" class="lead-dots"><img
                                                src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- payment single item end -->
                        <!-- payment single item start -->
                        <tr>
                            <td>
                                3
                            </td>
                            <td>
                                <div class="media">
                                    <img src="{{ url('uploads/users/avatar-3.png') }}" alt="A" class="img-fluid">
                                    <div class="media-body">
                                        <h5>Leah Skiles</h5>
                                        <span>lincoln@unpixel.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>506-881-3208</p>
                            </td>
                            <td>
                                <p>Lockman and Lemke</p>
                            </td>
                            <td>
                                <p>www.evalyn.net</p>
                            </td>
                            <td>
                                <p>96406470</p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="#" class="btn-view btn-completed">Completed</a>
                                    </li>
                                    <li>
                                        <a href="#" class="lead-dots"><img
                                                src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- payment single item end -->
                        <!-- payment single item start -->
                        <tr>
                            <td>
                                4
                            </td>
                            <td>
                                <div class="media">
                                    <img src="{{ url('uploads/users/avatar-4.png') }}" alt="A" class="img-fluid">
                                    <div class="media-body">
                                        <h5>Bradley Heathcote</h5>
                                        <span>lincoln@unpixel.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>774-699-3689</p>
                            </td>
                            <td>
                                <p>Hackett - Considine</p>
                            </td>
                            <td>
                                <p>www.willie.org</p>
                            </td>
                            <td>
                                <p>83622377</p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="#" class="btn-view btn-progress">In Progress</a>
                                    </li>
                                    <li>
                                        <a href="#" class="lead-dots"><img
                                                src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- payment single item end -->
                        <!-- payment single item start -->
                        <tr>
                            <td>
                                5
                            </td>
                            <td>
                                <div class="media">
                                    <img src="{{ url('uploads/users/avatar-5.png') }}" alt="A" class="img-fluid">
                                    <div class="media-body">
                                        <h5>Claire Turcotte</h5>
                                        <span>lincoln@unpixel.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>434-984-0055</p>
                            </td>
                            <td>
                                <p>Walter Group</p>
                            </td>
                            <td>
                                <p>www.edgar.biz</p>
                            </td>
                            <td>
                                <p>50380514</p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="#" class="btn-view btn-completed">Completed</a>
                                    </li>
                                    <li>
                                        <a href="#" class="lead-dots"><img
                                                src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- payment single item end -->
                        <!-- payment single item start -->
                        <tr>
                            <td>
                                6
                            </td>
                            <td>
                                <div class="media">
                                    <img src="{{ url('uploads/users/avatar-6.png') }}" alt="A" class="img-fluid">
                                    <div class="media-body">
                                        <h5>Rita Kovacek</h5>
                                        <span>lincoln@unpixel.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>614-594-2629</p>
                            </td>
                            <td>
                                <p>Klocko - McGlynn</p>
                            </td>
                            <td>
                                <p>www.jamaal.net</p>
                            </td>
                            <td>
                                <p>55393669</p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="#" class="btn-view no-ans-btn">No ans yet</a>
                                    </li>
                                    <li>
                                        <a href="#" class="lead-dots"><img
                                                src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- payment single item end -->
                        <!-- payment single item start -->
                        <tr>
                            <td>
                                7
                            </td>
                            <td>
                                <div class="media">
                                    <img src="{{ url('uploads/users/avatar-7.png') }}" alt="A" class="img-fluid">
                                    <div class="media-body">
                                        <h5>Mr. Roy Cole</h5>
                                        <span>lincoln@unpixel.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>611-805-5505</p>
                            </td>
                            <td>
                                <p>Dickens and Wehner</p>
                            </td>
                            <td>
                                <p>www.ben.name</p>
                            </td>
                            <td>
                                <p>38137645</p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="#" class="btn-view">New</a>
                                    </li>
                                    <li>
                                        <a href="#" class="lead-dots"><img
                                                src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- payment single item end -->
                        <!-- payment single item start -->
                        <tr>
                            <td>
                                8
                            </td>
                            <td>
                                <div class="media">
                                    <img src="{{ url('uploads/users/avatar-8.png') }}" alt="A" class="img-fluid">
                                    <div class="media-body">
                                        <h5>Cecilia Fisher</h5>
                                        <span>lincoln@unpixel.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p>534-492-2869</p>
                            </td>
                            <td>
                                <p>Littel and Rolfson</p>
                            </td>
                            <td>
                                <p>www.rickey.org</p>
                            </td>
                            <td>
                                <p>33225105</p>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="#" class="btn-view no-ans-btn">No ans yet</a>
                                    </li>
                                    <li>
                                        <a href="#" class="lead-dots"><img
                                                src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid"
                                                alt=""></a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <!-- payment single item end -->
                    </tbody>
                </table>
            </div>
            <!--pagination started-->
            <div class="pagination-section">
                <nav class="mt-4" aria-label="...">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link page-link-left"><i class="fa-solid fa-angle-left"></i></a>
                        </li>
                        <li class="page-item" aria-current="page"><a class="page-link" href="#">1</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">10</a></li>
                        <li class="page-item">
                            <a class="page-link page-link-right" href="#"><i
                                    class="fa-solid fa-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
                <div class="pagination-text">
                    <p>Showing 1 to 8 of 80 entries</p>
                </div>
            </div>
            <!--pagination end-->
        </div>
    </section>

@endsection

@section('script')

@endsection
