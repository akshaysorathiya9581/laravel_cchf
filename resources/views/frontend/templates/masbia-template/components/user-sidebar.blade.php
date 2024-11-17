
    <div class="user__sidebar">
        <div class="user__sidebar-header">
            <img src="{{ asset('assets/frontend/templates/masbia/images/avatar.svg') }}" alt="">
            <p>Hi, {{ $user->name }}</p>
        </div>
        <ul class="user__sidebar-menu">
            <li>
                <a href="{{ route('profile.edit') }}" class="active">User Profile</a>
            </li>
            <li>
                <a href="#">Billing</a>
            </li>
            <li>
                <a href="{{ route('notification.edit') }}">Notifications</a>
            </li>
        </ul>
        <a href="{{ route('logout') }}" type="button" class="btn btn-logout">Logout</a>
    </div>