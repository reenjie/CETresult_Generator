<div class="sidebar">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper" style="background-color: #DF2E38">
        <div class="logo d-flex">
            <a href="#" class="simple-text">
                <img src="https://th.bing.com/th/id/R.5513cd2957a47cc316b1c8696e0bd5d6?rik=%2fnP%2bYG1kfgFycw&riu=http%3a%2f%2f3.bp.blogspot.com%2f-a1cqTunmh4M%2fTgzKp3hFl5I%2fAAAAAAAAAig%2fyCYIlCoJmj0%2fs1600%2fSlide47.JPG&ehk=6xljpsfhRuyvgvPV97CD0lkREBTUKsQvY66MWl72jsg%3d&risl=&pid=ImgRaw&r=0" style="width: 80px" alt="">
            </a>
            <h6 style="margin-left:10px">
                <br>
                WMSU CET Result Generator System
                <br><br>
                <span style="font-weight:normal">Hi, {{Auth::user()->fname}}!</span>
            </h6>
        </div>
        <ul class="nav">

            @if(Auth::user()->roles == 0)
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-dashboard" style="font-size: 20px;"></i>
                    <p style="text-transform:capitalize">{{ __("Dashboard") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'listofpasser') active @endif">
                <a class="nav-link" href="{{route('page.index', 'listofpasser')}}">
                    <i class="fas fa-check-circle" style="font-size: 20px;"></i>
                    <p style="text-transform:capitalize">{{ __("List of Passer") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'webusers') active @endif">
                <a class="nav-link" href="{{route('page.index', 'webusers')}}">
                    <i class="fas fa-users" style="font-size: 20px;"></i>
                    <p style="text-transform:capitalize">{{ __("Web Users") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'usermanagement') active @endif">
                <a class="nav-link" href="{{route('page.index', 'usermanagement')}}">
                    <i class="fas fa-users-cog" style="font-size: 20px;"></i>
                    <p style="text-transform:capitalize">{{ __("User Management") }}</p>
                </a>
            </li>


            @endif

            @if(Auth::user()->roles == 1)
            <li class="nav-item @if($activePage == 'profiling') active @endif">
                <a class="nav-link" href="{{route('page.index', 'profiling')}}">
                    <i class="fas fa-sync" style="font-size: 20px;"></i>
                    <p style="text-transform:capitalize">{{ __("My Request") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'profiling') active @endif">
                <a class="nav-link" href="{{route('page.index', 'profiling')}}">
                    <i class="fas fa-list" style="font-size: 20px;"></i>
                    <p style="text-transform:capitalize">{{ __("My Result") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'mydata') active @endif">
                <a class="nav-link" href="{{route('page.index', 'mydata')}}">
                    <i class="fas fa-user-circle" style="font-size: 20px;"></i>
                    <p style="text-transform:capitalize">{{ __("Profile Information") }}</p>
                </a>
            </li>
            @endif



        </ul>
    </div>
</div>