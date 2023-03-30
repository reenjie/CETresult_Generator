<div class="sidebar">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper" style="background-color: #DF2E38">
        <div class="logo">
            <a href="#" class="simple-text">
                <img src="https://th.bing.com/th/id/R.5513cd2957a47cc316b1c8696e0bd5d6?rik=%2fnP%2bYG1kfgFycw&riu=http%3a%2f%2f3.bp.blogspot.com%2f-a1cqTunmh4M%2fTgzKp3hFl5I%2fAAAAAAAAAig%2fyCYIlCoJmj0%2fs1600%2fSlide47.JPG&ehk=6xljpsfhRuyvgvPV97CD0lkREBTUKsQvY66MWl72jsg%3d&risl=&pid=ImgRaw&r=0" style="width: 80px" alt="">
            </a>
        </div>
        <ul class="nav">

            @if(Auth::user()->roles == 0)
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-dashboard"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'profiling') active @endif">
                <a class="nav-link" href="{{route('page.index', 'profiling')}}">
                    <i class="fas fa-edit"></i>
                    <p>{{ __("Profiling") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'users') active @endif">
                <a class="nav-link" href="{{route('page.index', 'users')}}">
                    <i class="fas fa-users"></i>
                    <p>{{ __("Users") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'residents') active @endif">
                <a class="nav-link" href="{{route('page.index', 'residents')}}">
                    <i class="fas fa-users"></i>
                    <p>{{ __("Users | Residents") }}</p>
                </a>
            </li>

            @endif

            @if(Auth::user()->roles == 1)
            <li class="nav-item @if($activePage == 'request') active @endif">
                <a class="nav-link" href="{{route('page.index', 'request')}}">
                    <i class="fas fa-sync"></i>
                    <p>{{ __("My Request") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'mydata') active @endif">
                <a class="nav-link" href="{{route('page.index', 'mydata')}}">
                    <i class="fas fa-user-cog"></i>
                    <p>{{ __("My Data") }}</p>
                </a>
            </li>
            @endif



        </ul>
    </div>
</div>