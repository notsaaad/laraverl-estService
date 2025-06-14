            <header>
                <div class="logo-container">
                    <a href="#"><img src="{{ URL::asset('public/admin/images/gloabal/logo.png') }}" alt="logo" class="logo"></a>
                </div>


                <div class="profile-container">
                    <div class="btn-group">
                    <button type="button" class="profile_avatar" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ auth()->user() && auth()->user()->image ? asset('public/admin/users/' . auth()->user()->image) : default_image() }}" alt="Profile">

                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item" type="button"><i class="fa-regular fa-user  text-primary"></i> My Account</a></li>
                        <li><a href="#" class="dropdown-item" type="button"><i class="fa-solid fa-right-from-bracket text-danger"></i> Log out</a></li>
                    </ul>
                    </div>
                </div>
            </header>
