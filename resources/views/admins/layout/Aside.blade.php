  <div class="sidebar">
      <div class="title">
          <a href="{{ route('HomePage') }}" class="title"><h2>EstService</h2></a>
      </div>
      <hr>
      <ul class="menue">

          {{-- <li class="menue-item">
              <a href="#" class="active">
                  <i class="fas fa-chart-bar"></i>
                  Dashboard
                  <!-- <i class="arrow-dropdown fa-solid fa-sort-down"></i> -->
              </a>
              <ul class="submenu">
                  <li><a href="#">Sales Analytics</a></li>
                  <li><a href="#">Sellers List</a></li>
                  <li><a href="#">Sellers Table</a></li>
                  <li><a href="#">Sellers Grid</a></li>
                  <li><a href="#">Seller Profile</a></li>
                  <li><a href="#">Revenue by Period</a></li>
              </ul>
          </li> --}}
          <li><a href="{{ route('admin.index') }}"><i class="fa-solid fa-cart-shopping"></i>Dashboard</a></li>
          <li class="menue-item">

              <a href="#">
                  <i class="fa-solid fa-boxes-stacked"></i>
                  Service
                  <!-- <i class="arrow-dropdown fa-solid fa-sort-down"></i> -->
              </a>
              <ul class="submenu">
                  <li><a href="{{ route('admin.service.add') }}">Add</a></li>
                  <li><a href="{{ route('admin.service.view') }}">View</a></li>
                  <li><a href="{{ route('admin.service.AddCategory') }}">Add Category</a></li>
                  <li><a href="{{ route('admin.service.viewCategory') }}">View Categroies</a></li>
              </ul>
          </li>

          <li class="menue-item">

              <a href="#">
                  <i class="fa-solid fa-user"></i>
                  Users
                  <!-- <i class="arrow-dropdown fa-solid fa-sort-down"></i> -->
              </a>
              <ul class="submenu">
                  <li><a href="{{ route('admin.user.add') }}">Add</a></li>
                  <li><a href="{{ route('admin.users.view') }}">View</a></li>
              </ul>
          </li>

      </ul>
  </div>
