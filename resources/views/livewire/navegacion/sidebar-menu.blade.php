<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    @role('admin')  
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('adminDashboard') ? 'active' : 'collapsed' }}" href="{{ route('adminDashboard') }}" >
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('adminEventdata') ? 'active' : 'collapsed'}} {{request()->routeIs('adminStopevent') ? 'active' : ''}}" data-bs-target="#forms-nav" data-bs-toggle="collapse" aria-expanded="{{request()->routeIs('adminEventdata') ? 'true' : ''}} {{request()->routeIs('adminStopevent') ? 'true' : ''}}" href="#">
          <i class="bi bi-journal-text"></i><span>Events</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse {{request()->routeIs('adminEventdata') ? 'show' : ''}} {{request()->routeIs('adminStopevent') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('adminEventdata') }}" class="{{request()->routeIs('adminEventdata') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Events data</span>
            </a>
            <a href="{{ route('adminStopevent') }}" class="{{request()->routeIs('adminStopevent') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Stop event</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('adminGeneraltable') ? 'active' : 'collapsed'}} {{request()->routeIs('adminPartnertable') ? 'active' : ''}}" data-bs-target="#tables-nav" data-bs-toggle="collapse" aria-expanded="{{request()->routeIs('adminGeneraltable') ? 'true' : ''}} {{request()->routeIs('adminPartnertable') ? 'true' : ''}}" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Administrators data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse {{request()->routeIs('adminGeneraltable') ? 'show' : ''}} {{request()->routeIs('adminPartnertable') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('adminGeneraltable') }}" class="{{request()->routeIs('adminGeneraltable') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>General Table</span>
            </a>
          </li>
          <li>
            <a href="{{ route('adminPartnertable') }}" class="{{request()->routeIs('adminPartnertable') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Partner Table</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

    @endrole
    @role('org')
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : 'collapsed' }}" href="{{ route('dashboard') }}" >
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('editevent') ? 'active' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" aria-expanded="{{request()->routeIs('editevent') ? 'true' : ''}}" href="#">
            <i class="bi bi-journal-text"></i><span>Event</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse {{request()->routeIs('editevent') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('editevent') }}" class="{{ request()->routeIs('editevent') ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>Event Edit</span>
              </a>
            </li>
          </ul>
        </li><!-- End Forms Nav -->


        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('generaltable') ? 'active' : 'collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" aria-expanded="{{request()->routeIs('generaltable') ? 'true' : ''}}" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Your Points</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse {{request()->routeIs('generaltable') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('generaltable') }}" class="{{ request()->routeIs('generaltable') ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>General Table</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->


        <li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('profile.show') ? 'active' : 'collapsed' }}" href="{{ route('profile.show') }}">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('faq') ? 'active' : 'collapsed' }}" href="{{ route('faq') }}">
            <i class="bi bi-question-circle"></i>
            <span>F.A.Q CB Fundraising</span>
          </a>
        </li><!-- End F.A.Q Page Nav -->
    @endrole
    </ul>

</aside><!-- End Sidebar-->