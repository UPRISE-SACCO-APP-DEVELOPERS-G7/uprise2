
<div class="sidebar" data-color= "blue" data-image="{{asset('light-bootstrap/img/money.jpg')}}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
            <img src="{{asset('light-bootstrap/img/log.png')}}" alt="" 
             style="width:100px; height: 100; margin-left: 5px">
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
           
            <li class="nav-item">
               
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{route('profile.edit')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("User Profile") }}</p>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </li>

            <li class="nav-item @if($activePage == 'members') active @endif">
                <a class="nav-link" href="{{route('all_members')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __("Members") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'Deposits') active @endif">
               
                <a class="nav-link" href="{{ URL('/typography')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Deposits") }}</p>
                </a>
            </li>
           
               <li class="nav-item @if($activePage == 'loans') active @endif" > 
               
                <a class="nav-link" href="{{ route('all_loans') }}">
                <i class="nc-icon nc-money-coins"></i>
                Loans</a>
            </li>

             <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="{{URL('/maps')}}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __("Claims") }}</p>
                </a>
            </li>
             <li class="nav-item @if($activePage == 'notifications') active @endif">

                <a class="nav-link" href="{{URL('/notifications')}}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>{{ __("Reports") }}</p>
                </a>

            </li> 
           
        </ul>
    </div>
</div>
