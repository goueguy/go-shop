<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
        <a href="#" class="site_title text-center"><span>WareHouse</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{asset('assets/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Bienvenue,</span>
            <h2>{{Auth::user()->role->name}}</h2>
        </div>
        </div>
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <ul class="nav side-menu">
                <li>
                    <a href="{{route('admin.dashboard')}}"> <i class="fa fa-home"></i>Tableau de Bord
                    </a>
                </li>
            <!-- Module Utilisateurs-->
                @can('manage-users')
                    <li><a><i class="fa fa-user"></i>Utilisateurs<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.users.index')}}">Liste Utilisateurs</a></li>
                            <li><a href="{{route('admin.users.create')}}">Ajouter Utilisateurs</a></li>
                            @can('manage-roles')
                                <!-- Module Role-->
                                <li><a><i class="fa fa-user"></i>Roles <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('admin.users.roles.index')}}">Liste Roles</a></li>
                                        <li><a href="{{route('admin.users.roles.create')}}">Ajouter Roles</a></li>
                                    </ul>
                                </li>
                            @endcan
                            @can('manage-permissions')
                                <li><a><i class="fa fa-lock"></i>Permissions<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('admin.users.permissions.index')}}">Liste Permissions</a></li>
                                        <li><a href="{{route('admin.users.permissions.create')}}">Ajouter Permissions</a></li>
                                    </ul>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('manage-orders')
                    <!-- Module Commandes-->
                    <li><a><i class="fa fa-cart-arrow-down"></i>Commandes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.commandes.index')}}">Liste Commandes</a></li>
                        </ul>
                    </li>
                @endcan
                @can('manage-articles')
                    <!-- Module Articles-->
                    <li><a><i class="fa fa-shopping-bag"></i>Articles<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.articles.index')}}">Liste Articles</a></li>
                            <li><a href="{{route('admin.articles.create')}}">Ajouter Articles</a></li>

                            <!-- Module Images Articles-->
                            <li><a>
                                <i class="fa fa-image"></i>Images Articles<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.articles.images.index')}}">Liste Images</a></li>
                                    <li><a href="{{route('admin.articles.images.create')}}">Ajouter Images</a></li>
                                </ul>
                            </li>

                            <!-- Module Categories Articles-->
                            <li><a><i class=""></i>Categories<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.articles.categories.index')}}">Liste Categories</a></li>
                                    <li><a href="{{route('admin.articles.categories.create')}}">Ajouter Categories</a></li>
                                </ul>
                            <!-- Module Sous Categories Articles-->
                                <li><a><i class=""></i>Sous Categories<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{route('admin.articles.subcategories.index')}}">Liste Sous Categories</a></li>
                                        <li><a href="{{route('admin.articles.subcategories.create')}}">Ajouter Sous Categories</a></li>
                                    </ul>
                                </li>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('manage-menus')
                <!-- Module Menu-->
                    <li><a><i class="fa fa-bars"></i>Menu<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.menus.index')}}">Liste Menu</a></li>
                            <li><a href="{{route('admin.menus.create')}}">Ajouter Menu</a></li>
                            <li><a><i class="fa fa-bars"></i>Sous Menus <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('admin.menus.index')}}">Liste Sous Menus</a></li>
                                    <li><a href="{{route('admin.menus.create')}}">Ajouter Sous Menus</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endcan
                @can('manage-providers')
                <!-- Module Utilisateurs-->
                    <li><a><i class="fa fa-users"></i>Vendeurs<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.vendeurs.index')}}">Liste Vendeurs</a></li>
                            <li><a href="{{route('admin.vendeurs.create')}}">Ajouter Vendeurs</a></li>
                        </ul>
                    </li>
                @endcan
                @can('manage-customers')
                    <!-- Module clients-->
                    <li><a>
                        <i class="fa fa-group"></i>Clients<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.clients.index')}}">Liste Clients</a></li>
                        </ul>
                    </li>
                @endcan
                @can('manage-payments')
                    <li><a><i class="fa fa-money"></i>Paiement<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.paiements.index')}}">Liste Paiement</a></li>
                        </ul>
                    </li>
                @endcan

                <li><a><i class="fa fa-cogs"></i>Paramètres<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('admin.users.parametres')}}">Information Profile</a></li>
                        <li><a href="{{route('admin.users.parametres.password')}}">Changer mot de passe </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        </div>
        <!-- /sidebar menu -->

    </div>
</div>
