<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="{{ route('dashboard') }}">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img src="{{ asset('public/images/logo.png') }}" alt="">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <span class="icon-holder">
                        <i class="c-blue-500 fas fa-tachometer-alt"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="c-blue-500 fas fa-box"></i>
                    </span>
                    <span class="title">Productos</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ route('todos.index') }}">
                            <span>Todos</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('productos.index') }}">
                            <span>Individuales</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('paquetes.index') }}">
                            <span>Paquetes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{ route('ventas.create') }}">
                    <span class="icon-holder">
                        <i class="c-blue-500 fas fa-barcode"></i>
                    </span>
                    <span class="title">Ventas</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="c-blue-500 fas fa-cog"></i>
                    </span>
                    <span class="title">Configuraci&oacute;n</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ route('settings.index') }}">
                            <span>Pagos</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>