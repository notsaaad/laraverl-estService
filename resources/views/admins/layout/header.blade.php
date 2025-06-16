            <header>
                <div class="logo-container">
                    <a href="{{ route('admin.index') }}"><img src="{{ URL::asset('public/admin/images/gloabal/logo.png') }}" alt="logo" class="logo"></a>
                </div>

                <a class="btn btn-primary" href="{{ route('HomePage') }}">الموقع</a>
                <div class="profile-container">
                    <div class="btn-group">
                    <button type="button" class="profile_avatar" data-bs-toggle="dropdown" aria-expanded="false">
                        <img width="80" src="{{ auth()->user() && auth()->user()->image ? URL::asset(UsersImagePath() . auth()->user()->image) : default_image() }}" alt="Profile">

                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.users.edit', auth()->user()->id) }}" class="dropdown-item" type="button"><i class="fa-regular fa-user  text-primary"></i> My Account</a></li>
                        <li><a href="{{ route('Logout') }}" class="dropdown-item" type="button"><i class="fa-solid fa-right-from-bracket text-danger"></i> Log out</a></li>
                    </ul>
                    </div>
                </div>
            </header>
