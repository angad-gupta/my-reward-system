@inject('menuRoles', '\App\Modules\User\Services\CheckUserRoles')
@php
    $currentRoute = Request::route()->getName();
    $Route = explode('.',$currentRoute);
@endphp

<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md"  @if($setting != null)) style="background-color: {{$setting->secondary_navbar_color}};" @endif>

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center" >
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand" >
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                

             
                {{-- <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link @if($Route[0]=='dashboard') active @endif" data-popup="tooltip" data-original-title="Dashboard" data-placement="right"><i class="icon-home4"></i><span>Dashboard</span>
                    </a>
                </li> --}}
        
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Reward System Features
                    </div>
                    <i class="icon-menu" title="Advance Construction Features"></i>
                </li>

                @if($menuRoles->assignedRoles('currency.index'))
                <li class="nav-item">
                    <a href="{{route('currency.index')}}" class="nav-link @if($Route[0]=='currency') active @endif" data-popup="tooltip" data-original-title="Currency" data-placement="right"><i class="icon-coins"></i><span>Currency </span>
                    </a>
                </li>
                @endif

                @if($menuRoles->assignedRoles('customer.index'))
                <li class="nav-item">
                    <a href="{{route('customer.index')}}" class="nav-link @if($Route[0]=='customer') active @endif" data-popup="tooltip" data-original-title="Currency" data-placement="right"><i class="icon-reading"></i><span>Customer </span>
                    </a>
                </li>
                @endif

                @if($menuRoles->assignedRoles('order.index'))
                <li class="nav-item">
                    <a href="{{route('order.index')}}" class="nav-link @if($Route[0]=='order') active @endif" data-popup="tooltip" data-original-title="Currency" data-placement="right"><i class=" icon-cart2"></i><span>Order </span>
                    </a>
                </li>
                @endif
        
             
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>




