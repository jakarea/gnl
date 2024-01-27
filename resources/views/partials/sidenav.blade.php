<div class="side-navbar-wrap">
    <ul class="side-nav">
        <li class="side-item">
            <a href="{{ url('dashboard') }}"
                class="{{ Request::is('dashboard') ? 'active' : '' }} side-link">
                <img src="{{ url('assets/images/icons/sidebar/dashboard.svg') }}" alt="I"
                    class="img-fluid">
                dashboard
            </a>
        </li>

        <li class="side-item">
            <a href="{{ url('analytics') }}"
                class="{{ Request::is('analytics') ? 'active' : '' }} side-link"><img
                    src="{{ url('assets/images/icons/sidebar/analytics.svg') }}" alt="I" class="img-fluid" />
                Analytics
            </a>
        </li>
        <li class="side-item">
            <a href="{{ url('customers') }}"
                class="{{ Request::is('customers') ? 'active' : '' }} side-link"><img
                    src="{{ url('assets/images/icons/sidebar/customer.svg') }}" alt="I" class="img-fluid" />
                Customers</a>
        </li>
        <li class="side-item">
            <a href="{{ url('to-do-list') }}"
                class="{{ Request::is('to-do-list') ? 'active' : '' }} side-link">
                <img src="{{ url('assets/images/icons/sidebar/calendar.svg') }}" alt="I" class="img-fluid" />
                To Do List
            </a>
        </li>
        <li class="side-item">
            <a href="{{ url('projects') }}" class="{{ Request::is('projects') ? 'active' : '' }} side-link"><img
                    src="{{ url('assets/images/icons/sidebar/project.svg') }}" alt="I" class="img-fluid" />
                Projects</a>
        </li>
        <li class="side-item side-subitem">
            <a class="side-link" data-bs-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                <img src="{{ url('assets/images/icons/sidebar/leads.svg') }}" alt="I" class="img-fluid" />
                Leads
                <i class="fas fa-angle-down"></i>
            </a>
            <div class="collapse" id="collapseExample">
                <ul class="sub-nav">
                    <li><a href="#" class="sub-link active">Hosting Leads</a></li>
                    <li><a href="#" class="sub-link">Marketing Leads</a></li>
                    <li><a href="#" class="sub-link">Project Leads</a></li>
                    <li><a href="#" class="sub-link">Website Leads</a></li>
                    <li><a href="#" class="sub-link">Lost Leads</a></li>
                </ul>
            </div>
        </li>
        <li class="side-item side-subitem">
            <a class="side-link" data-bs-toggle="collapse" href="#collapseExample2" role="button"
                aria-expanded="false" aria-controls="collapseExample2">
                <img src="{{ url('assets/images/icons/sidebar/earnings.svg') }}" alt="I" class="img-fluid" />
                Earning
                <i class="fas fa-angle-down"></i>
            </a>
            <div class="collapse" id="collapseExample2">
                <ul class="sub-nav">
                    <li><a href="#" class="sub-link active">Total</a></li>
                    <li><a href="#" class="sub-link">Hosting</a></li>
                    <li><a href="#" class="sub-link">Marketing</a></li>
                    <li><a href="#" class="sub-link">Website</a></li>
                    <li><a href="#" class="sub-link">Project</a></li>
                </ul>
            </div>
        </li>
        <li class="side-item">
            <a href="{{ url('expenses') }}" class="side-link">
                <img src="{{ url('assets/images/icons/sidebar/expense.svg') }}" alt="I" class="img-fluid" />
                Expenses</a>
        </li>
        <li class="side-item">
            <a href="{{ url('/logout') }}" class="side-link">
                <i class="fas fa-sign-out me-3"></i>
                Logout
            </a>
        </li>
    </ul>
</div>
