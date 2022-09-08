<style>
    .c-logo {
        font-family: 'Montserrat', sans-serif;
    }

    .btn-text:hover {
        color: rgb(255, 255, 255);
        background-color: #2079ffdc;
        border-color: #557abee5;
        /*set the color you want here*/
    }

    a:hover {
        color: rgb(56, 137, 230) !important;

        border-color: #557abee5;
        /*set the color you want here*/
    }
</style>
<!-- Sidenav -->

<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white print-only" id="side-nav">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class=" pr-4">
            <a class="navbar-brand ml-0 pl-3" href="{{ url('home') }}">
                <img src="{{ asset('img/brand/favicon.png') }}" class="navbar-brand-img" alt=""> <span
                    class="c-logo h1 text-muted text-center text-link">{{ __('Complaint') }}</span>
            </a>
        </div>
        <hr class="my-3">
        <div class="navbar-inner">
            <!-- Collapse -->

            <!-- Nav items -->
            <ul class="navbar-nav ">
                <div class="ml-1">
                    <li class="nav-item">
                        <a {{ Request::is('home*') ? 'active' : '' }}" href="{{ url('home') }}"> <button
                                class="btn btn-text col-md-12  text-left ">
                                <i class="fa fa-tv "></i>
                                <span
                                    style="font-size: 15px;   font-family: 'Open Sans';  font-weight: normal; text-transform: uppercase"
                                    class="nav-link-text">{{ __('log.dashboard') }}</span>
                            </button></a>
                    </li>
                </div>

                @if (Auth::user()->hasRole('admin'))

                <hr class="my-1">

                <div class="ml-1">
                    <li class="nav-item">
                        <a {{ Request::is('office*') ? 'active' : '' }}" href="{{ url('office') }}"> <button
                                class="btn btn-text col-md-12  text-left ">
                                <i class="fa fa-copy"></i>
                                <span
                                    style="font-size: 15px;   font-family: 'Open Sans';  font-weight: normal; text-transform: uppercase"
                                    class="nav-link-text">{{ __('Offices') }}</span>
                            </button></a>
                    </li>
                </div>

                <div class="ml-1">
                    <li class="nav-item">
                        <a {{ Request::is('staff*') ? 'active' : '' }}" href="{{ url('staff') }}"> <button
                                class="btn btn-text col-md-12  text-left ">
                                <i class="fa fa-copy"></i>
                                <span
                                    style="font-size: 15px;   font-family: 'Open Sans';  font-weight: normal; text-transform: uppercase"
                                    class="nav-link-text">{{ __('Staffs') }}</span>
                            </button></a>
                    </li>
                </div>

                <div class="ml-1">
                    <li class="nav-item">
                        <a {{ Request::is('complaint*') ? 'active' : '' }}" href="{{ url('complaint') }}"> <button
                                class="btn btn-text col-md-12  text-left ">
                                <i class="fa fa-copy"></i>
                                <span
                                    style="font-size: 15px;   font-family: 'Open Sans';  font-weight: normal; text-transform: uppercase"
                                    class="nav-link-text">{{ __('Complaints') }}</span>
                            </button></a>
                    </li>
                </div>

                <div class="ml-1">
                    <li class="nav-item">
                        <a {{ Request::is('definedComplaint*') ? 'active' : '' }}" href="{{ url('definedComplaint') }}">
                            <button class="btn btn-text col-md-12  text-left ">
                                <i class="ni ni-chat-round"></i>
                                <span
                                    style="font-size: 15px;   font-family: 'Open Sans';  font-weight: normal; text-transform: uppercase"
                                    class="nav-link-text">{{ __('Defined Complaints') }}</span>
                            </button></a>
                    </li>
                </div>

                <div class="ml-4" id="accordionExample">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button class="btn btn-text col-md-12 text-left " data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="ni ni-pin-3 "></i>
                                <span
                                    style="font-size: 15px;   font-family: 'Open Sans';  font-weight: normal; text-transform: uppercase">{{
                                    __('log.address') }}</span>
                                <i class="fa fa-caret-down"></i>
                            </button>
                        </li>
                    </ul>
                    <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                        <a class="nav-link {{ Request::is('region*') ? 'active' : '' }}"
                            style="font-size: 14px;   font-family: 'Open Sans';  font-weight: normal;"
                            href="{{ url('region') }}">{{ __('Region ') }}</a>
                    </div>
                </div>

                <div class="ml-1">
                    <li class="nav-item">
                        <a {{ Request::is('survey*') ? 'active' : '' }} href="{{ route('survey.index') }}"> <button
                                class="btn btn-text col-md-12  text-left ">
                                <i class="fa fa-copy"></i>
                                <span
                                    style="font-size: 15px;   font-family: 'Open Sans';  font-weight: normal; text-transform: uppercase"
                                    class="nav-link-text">{{ __('Survey') }}</span>
                            </button></a>
                    </li>
                </div>

                <div class="ml-4" id="accordionExample">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button class="btn btn-text col-md-12 text-left " data-toggle="collapse"
                                data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
                                <i class="ni ni-pin-3 "></i>
                                <span
                                    style="font-size: 15px;   font-family: 'Open Sans';  font-weight: normal; text-transform: uppercase">
                                    {{__('log.m_user') }}</span>
                                <i class="fa fa-caret-down"></i>
                            </button>
                        </li>
                    </ul>
                    <div id="collapseUser" class="collapse" data-parent="#accordionExample">
                        <a class="nav-link {{ Request::is('role*') ? 'active' : '' }}"
                            style="font-size: 16px;   font-family: 'Open Sans';  font-weight: normal;"
                            href="{{ url('role') }}">{{ __('Role') }}</a>
                        <a class="nav-link {{ Request::is('accounts*') ? 'active' : '' }}"
                            style="font-size: 16px;   font-family: 'Open Sans';  font-weight: normal;"
                            href="{{ url('accounts') }}">{{ __('Accounts') }}</a>
                    </div>
                </div>
                @endif

                @if (Auth::user()->hasRole('admin'))

                <hr class="my-1">
            </ul>
            <hr class="my-2">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('configuration*') ? 'active' : '' }}"
                        style="font-size: 16px;   font-family: 'Open Sans';  font-weight: normal;"
                        href="{{ url('configuration') }}">
                        <i class="ni ni-single-02 text-warning"></i>
                        <span style="font-size: 15px;  font-family: 'Open Sans';">
                            Configuration</span>
                    </a>
                </li>
            </ul>
            @endif
            <hr class="my-2">

            <ul class="navbar-nav px-3 ">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('logout') ? 'active' : '' }}"
                        style="font-size: 16px;   font-family: 'Open Sans';  font-weight: normal;"
                        href="{{ url('logout') }}">
                        <i class="ni ni-button-power text-warning"></i>
                        <span style="font-size: 15px;  font-family: 'Open Sans';">{{ __('log.logout') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>