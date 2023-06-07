@php
    use App\Helpers\CheckPermissionHelpers;
@endphp

<div id="sidebar-disable" class="sidebar-disable hidden"></div>

<div id="sidebar" class="sidebar-menu transform -translate-x-full ease-in">
    <div class="flex items-center justify-center mt-4">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">{{ trans('panel.site_title') }}</span>
        </div>
    </div>
    <nav class="mt-4">
        <a class="nav-link{{ request()->is('admin') ? ' active' : '' }}" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="mx-4">Dashboard</span>
        </a>
       
        @php
            $permissionHelper = new CheckPermissionHelpers();
        @endphp

        <div class="nav-dropdown">
            <a class="nav-link" href="#">
                <i class="fa-fw fas fa-users"></i>
                <span class="mx-4">{{ trans('cruds.userManagement.title') }}</span>
                <i class="fa fa-caret-down ml-auto" aria-hidden="true"></i>
            </a>
            <div class="dropdown-items mb-1 hidden">
                @if ($permissionHelper->customAccess('user') || $permissionHelper->customAll('user'))
                    <a class="nav-link{{ request()->is('admin/users*') ? ' active' : '' }}" href="{{ route('admin.users.index') }}">
                        <i class="fa-fw fas fa-user"></i>
                        <span class="mx-4">{{ trans('cruds.user.title') }}</span>
                    </a>
                @endif  
                @if ($permissionHelper->customAccess('role') || $permissionHelper->customAll('role'))
                    <a class="nav-link{{ request()->is('admin/roles*') ? ' active' : '' }}" href="{{ route('admin.roles.index') }}">
                        <i class="fa-fw fas fa-briefcase"></i>
                        <span class="mx-4">{{ trans('cruds.role.title') }}</span>
                    </a>
                @endif
                @if ($permissionHelper->customAccess('product') || $permissionHelper->customAll('product'))
                    <a class="nav-link" href="#">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="mx-4">{{ trans('cruds.product.title') }}</span>
                    </a>
                @endif
                @if ($permissionHelper->customAccess('customer') || $permissionHelper->customAll('customer'))
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i>
                        <span class="mx-4">{{ trans('cruds.customer.title') }}</span>
                    </a>
                @endif
                @if ($permissionHelper->customAccess('sale') || $permissionHelper->customAll('sale'))
                    <a class="nav-link" href="#">
                        <i class="fas fa-bullhorn"></i>
                        <span class="mx-4">{{ trans('cruds.sale.title') }}</span>
                    </a>
                @endif
            </div>
        </div>

        
        
        <a class="nav-link{{ request()->is('profile/password') ? ' active' : '' }}" href="{{ route('profile.password.edit') }}">
            <i class="fa-fw fas fa-key"></i>
            <span class="mx-4">{{ trans('global.change_password') }}</span>
        </a>
        
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="fa-fw fas fa-sign-out-alt"></i>
            <span class="mx-4">{{ trans('global.logout') }}</span>
        </a>
    </nav>
</div>
