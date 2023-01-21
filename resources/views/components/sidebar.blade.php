<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/dashboard">Foodies APP</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/dashboard">FA</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}"><a href="{{ route('dashboard.index') }}"
          class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Administrator</li>
      <li class="{{ request()->routeIs('dashboard.category.*') ? 'active' : '' }}"><a
          href="{{ route('dashboard.category.index') }}" class="nav-link"><i class="far fa-user"></i><span>Data
            Category</span></a>
      </li>
      <li class="{{ request()->routeIs('dashboard.food.*') ? 'active' : '' }}"><a
          href="{{ route('dashboard.food.index') }}" class="nav-link"><i class="fas fa-book"></i><span>Data
            Makanan</span></a>
      </li>
    </ul>
  </aside>
</div>