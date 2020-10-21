<div class="col-md-2-5 ">
    <div class="theme-account-sidebar">
        <div class="theme-account-avatar">
            <img class="theme-account-avatar-img" src="./img/70x70.png" alt="Image Alternative text" title="Image Title"/>
            <p class="theme-account-avatar-name">Welcome,
                {{Auth::user()->name}}
            </p>
            <br>
        </div>
        <nav class="theme-account-nav">
            <ul class="theme-account-nav-list">




                <li class="active">
                    <a href="/my_booking">
                        <i class="fa fa-history"></i>History
                    </a>
                </li>
                <li class="active">
                    <a href="/my_profile">
                        <i class="fa fa-user"></i>Profile
                    </a>
                </li>
                <li class="active">
                    <a href="/my_profile">
                        <i class="fa fa-user"></i>Change Password
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="fa fa-bookmark"></i>logout
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
