<div class="side-navbar-wrap">
    <ul class="side-nav">
        <li class="side-item">
            <a href="{{ url('dashboard') }}"
                class="{{ Request::is('dashboard') ? 'active' : '' }} side-link">
                <img src="{{ url('assets/images/icons/sidebar/dashboard.svg') }}" alt="I"
                    class="img-fluid">
                Dashboard
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
                class="{{ Request::is('customers*') ? 'active' : '' }} side-link"><img
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
            <a href="{{ url('projects') }}" class="{{ Request::is('projects*') ? 'active' : '' }} side-link"><img
                    src="{{ url('assets/images/icons/sidebar/project.svg') }}" alt="I" class="img-fluid" />
                Projects</a>
        </li>
        <li class="side-item side-subitem">
            <a class="side-link {{ Request::is('hosting-leads') || Request::is('marketing-leads') || Request::is('project-leads') || Request::is('website-leads') || Request::is('lost-leads') || Request::is('leads/all') ? 'active' : '' }}" data-bs-toggle="collapse" href="#collapseExample" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                <img src="{{ url('assets/images/icons/sidebar/leads.svg') }}" alt="I" class="img-fluid" />
                Leads
                <i class="fas fa-angle-down"></i>
            </a>
            <div class="collapse {{ Request::is('hosting-leads') || Request::is('marketing-leads') || Request::is('project-leads') || Request::is('website-leads') || Request::is('lost-leads') || Request::is('leads/all') ? 'show' : '' }}" id="collapseExample">
                <ul class="sub-nav">
                    <li><a href="{{ url("hosting-leads") }}" class="sub-link {{ Request::is('hosting-leads') ? 'active' : '' }}">Hosting Leads</a></li>
                    <li><a href="{{ url("marketing-leads") }}" class="sub-link {{ Request::is('marketing-leads') ? 'active' : '' }}">Marketing Leads</a></li>
                    <li><a href="{{ url("project-leads") }}" class="sub-link {{ Request::is('project-leads') ? 'active' : '' }}">Project Leads</a></li>
                    <li><a href="{{ url("website-leads") }}" class="sub-link {{ Request::is('website-leads') ? 'active' : '' }}">Website Leads</a></li>
                    <li><a href="{{ url("lost-leads") }}" class="sub-link {{ Request::is('lost-leads') ? 'active' : '' }}">Lost Leads</a></li>
                </ul>
            </div>
        </li>
        <li class="side-item side-subitem">
            <a class="side-link {{ Request::is('total-earnings') || Request::is('hosting-earnings') || Request::is('marketing-earnings') || Request::is('website-earnings') || Request::is('project-earnings')? 'active' : '' }}" data-bs-toggle="collapse" href="#collapseExample2" role="button"
                aria-expanded="false" aria-controls="collapseExample2">
                <img src="{{ url('assets/images/icons/sidebar/earnings.svg') }}" alt="I" class="img-fluid" />
                Earning
                <i class="fas fa-angle-down"></i>
            </a>
            <div class="collapse {{ Request::is('total-earnings') || Request::is('hosting-earnings') || Request::is('marketing-earnings') || Request::is('website-earnings') || Request::is('project-earnings')? 'show' : '' }}" id="collapseExample2">
                <ul class="sub-nav">
                    <li><a href="{{ url("total-earnings") }}" class="sub-link {{ Request::is('total-earnings') ? 'active' : '' }}">Total</a></li>
                    <li><a href="{{ url("hosting-earnings") }}" class="sub-link {{ Request::is('hosting-earnings') ? 'active' : '' }}">Hosting</a></li>
                    <li><a href="{{ url("marketing-earnings") }}" class="sub-link {{ Request::is('marketing-earnings') ? 'active' : '' }}">Marketing</a></li>
                    <li><a href="{{ url("website-earnings") }}" class="sub-link {{ Request::is('website-earnings') ? 'active' : '' }}">Website</a></li>
                    <li><a href="{{ url("project-earnings") }}" class="sub-link {{ Request::is('project-earnings') ? 'active' : '' }}">Project</a></li>
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
