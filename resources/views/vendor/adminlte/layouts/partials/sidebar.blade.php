<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
{{--         <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
        <!--    <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li> -->
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Gestion de Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <li><a href="{{ route('users.create')}}"><i class='fa fa-user-plus'></i> <span>Crear Usuarios</span></a></li>
                <li><a href="{{ route('users.index')}}"><i class='fa fa-eye'></i> <span>Ver Usuarios</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-file-text-o'></i> <span>Orden de trabajo</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <li><a href="{{ route('ots.create')}}"><i class='fa fa-sticky-note-o'></i> <span>Crear OT</span></a></li>
                <li><a href="{{ route('ots.index')}}"><i class='fa fa-eye'></i> <span>Ver OTs</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-file-text'></i> <span>Orden de compra</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <li><a href="#{{-- {{ route('ots.create')}} --}}"><i class='fa fa-sticky-note-o'></i> <span>Crear OC</span></a></li>
                <li><a href="#{{-- {{ route('ots.create')}} --}}"><i class='fa fa-eye'></i> <span>Ver OCs</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-file-powerpoint-o'></i> <span>Presupuesto</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <li><a href="#{{-- {{ route('ots.create')}} --}}"><i class='fa fa-sticky-note-o'></i> <span>Crear presupuesto</span></a></li>
                <li><a href="#{{-- {{ route('ots.create')}} --}}"><i class='fa fa-eye'></i> <span>Ver presupuestos</span></a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
