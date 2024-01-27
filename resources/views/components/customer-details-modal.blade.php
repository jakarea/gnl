<!-- payment from company user start -->
<div class="payment-from-copany-user payment-from-offcanvas">
    <!--customer profile header start-->
    <div class="customer-details-title">
        <h3>Customer Detail</h3>
        <button type="button" class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
            <i class="fas fa-close"></i>
        </button>
    </div>
    <div class="profile-header profile-header-address">
        @if ($customer->avatar)
            <img src="{{ asset('storage/' . $customer->avatar) }}" alt="avatar" class="img-fluid" />
        @else
            <img src="{{ asset('uploads/users/avatar-1.png') }}" alt="default avatar" class="img-fluid" />
        @endif
        <div class="profile-box profile-box-address">
            <div class="profile-text profile-text-address">
                <div class="profile-text-box">
                    <h3>{{ $customer->name }}</h3>
                    <p>{{ $customer->designation }}</p>
                </div>
                <span href="#" class="active inactive">Active</span>
            </div>
            <div class="profile-edit-box profile-edit-details-box">
                <img class="img-fluid pen-tools" src="./assets/images/icons/edit-1.svg" alt="pen-images"
                    onclick="editCustomerModal('{{ $customer->customer_id }}')" />
                <img class="img-fluid trash-tools" src="./assets/images/icons/trash-1.svg" alt="trash-images" onclick="deleteCustomer('{{ route('customers.destroy', $customer->customer_id ) }}')"/>
            </div>
        </div>
    </div>
    <!--customer profile header end-->
    <!--address info start-->
    <div class="address-info">
        @if ($customer->email)
            <div class="adress-info-text">
                <p>Email</p>
                <a href="mailto:{{ $customer->email }}">
                    <img src="./assets/images/icons/envelope.svg" alt="envelope icon" />{{ $customer->email }}
                </a>
            </div>
        @endif

        @if ($customer->phone)
            <div class="adress-info-text">
                <p>Phone</p>
                <a href="tel:{{ $customer->phone }}">
                    <img src="./assets/images/icons/call.svg" alt="call icon" />{{ $customer->phone }}
                </a>
            </div>
        @endif

        @if ($customer->location)
            <div class="adress-info-text">
                <p>Location</p>
                <a href="{{ $customer->location }}">
                    <img src="./assets/images/icons/location.svg" alt="location icon" />{{ $customer->location }}
                </a>
            </div>
        @endif

    </div>
    <!--address info end-->
    <!--service part start-->
    <div class="service-profile service-profile-details">
        @if ($customer->service)
            <div class="service-text service-text-details">

                <p>Service:</p>
                <span>{{ $customer->service ?? 'N/A' }}</span>

            </div>
        @endif

        @if ($customer->company)
            <div class="service-text service-text-details">
                <p>Company:</p>
                <span>{{ $customer->company ?? 'N/A' }}</span>
            </div>
        @endif

    </div>
    <div class="service-profile service-profile-details">
        @isset($customer->website)
            <div class="service-text service-text-details">
                <p>Website:</p>
                <span>{{ $customer->website }}</span>
            </div>
        @endisset

        @isset($customer->kvk)
            <div class="service-text service-text-details">
                <p>KVK:</p>
                <span>{{ $customer->kvk }}</span>
            </div>
        @endisset

    </div>
    <!--service part end-->
    <!--details page start-->
    <div class="details details-two">
        <h3>Details</h3>
        <p>
            Ut qui vel libero labore quidem aut veniam. Distinctio et
            doloremque velit iusto amet aut. Qui praesentium consequatur
            sint atque. Aut iure aut possimus libero nisi molestias in
            et consequatur. Cumque soluta beatae dolor enim nostrum est.
            Rem minus dicta et quia. Ut delectus minima commodi. Neque
            veritatis sunt quaerat quasi quo maiores impedit. Dolor
            sequi fuga rerum delectus in necessitatibus non quam.
            Doloribus molestiae qui esse.
        </p>
    </div>
    <!--details page end-->
    <div class="header header-details">
        <h3>Customer History</h3>
    </div>
    <div class="user-payment-table">
        <table>
            <tr>
                <th width="3%">No</th>
                <th class="d-flex justify-content-between">
                    <span>Service</span>
                    <div class="filter-sort-box">
                        <div class="dropdown">
                            <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                id="dropdownBttn"></button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item filterItem" href="#" data-value="asc">In
                                        order A-Z</a>
                                </li>
                                <li>
                                    <a class="dropdown-item filterItem" href="#" data-value="desc">In
                                        order Z-A</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </th>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
            <!-- payment single item start -->
            <tr>
                <td>1</td>
                <td>
                    <div class="media">
                        <div class="media-body">
                            <h5>Dashboard Design</h5>
                        </div>
                    </div>
                </td>
                <td>
                    <p>09 Oct, 2023</p>
                </td>
                <td>
                    <p>$1,290</p>
                </td>
                <td>
                    <ul>
                        <li>
                            <a href="#" class="btn-pending">Pending</a>
                        </li>
                    </ul>
                </td>
            </tr>
            <!-- payment single item end -->
            <!-- payment single item start -->
            <tr>
                <td>2</td>
                <td>
                    <div class="media">
                        <div class="media-body">
                            <h5>App Design</h5>
                        </div>
                    </div>
                </td>
                <td>
                    <p>09 Oct, 2023</p>
                </td>
                <td>
                    <p>$2,640</p>
                </td>
                <td>
                    <ul>
                        <li>
                            <a href="#" class="btn-view btn-export">Paid</a>
                        </li>
                    </ul>
                </td>
            </tr>
            <!-- payment single item end -->
            <!-- payment single item start -->
            <tr>
                <td>3</td>
                <td>
                    <div class="media">
                        <div class="media-body">
                            <h5>Landing Page Design</h5>
                        </div>
                    </div>
                </td>
                <td>
                    <p>09 Oct, 2023</p>
                </td>
                <td>
                    <p>$1,290</p>
                </td>
                <td>
                    <ul>
                        <li>
                            <a href="#" class="btn-view btn-export">Paid</a>
                        </li>
                    </ul>
                </td>
            </tr>
            <!-- payment single item end -->
            <!-- payment single item start -->
            <tr>
                <td>4</td>
                <td>
                    <div class="media">
                        <div class="media-body">
                            <h5>Logo Design</h5>
                        </div>
                    </div>
                </td>
                <td>
                    <p>09 Oct, 2023</p>
                </td>
                <td>
                    <p>$2,609</p>
                </td>
                <td>
                    <ul>
                        <li>
                            <a href="#" class="btn-view btn-export">Paid</a>
                        </li>
                    </ul>
                </td>
            </tr>
            <!-- payment single item end -->
            <!-- payment single item start -->
            <tr>
                <td>5</td>
                <td>
                    <div class="media">
                        <div class="media-body">
                            <h5>Dashboard Design</h5>
                        </div>
                    </div>
                </td>
                <td>
                    <p>09 Oct, 2023</p>
                </td>
                <td>
                    <p>$2,608</p>
                </td>
                <td>
                    <ul>
                        <li>
                            <a href="#" class="btn-view btn-export">Paid</a>
                        </li>
                    </ul>
                </td>
            </tr>
            <!-- payment single item end -->
        </table>
    </div>


</div>
