<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url({{asset('org/assets/')}}/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{asset('org/assets/')}}/images/users/profile.png"  alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe</a>
                <div class="dropdown-menu animated flipInY">
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div> <a href="{{route ('admin.logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav active">
            <ul id="sidebarnav" class="in">
                <li class="nav-small-cap">后台管理</li>
                {{--@if(auth('admin')->user()->hasAnyPermission(['Admin-category', 'Admin-good']))--}}
                <li class="active">
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="true"><i class="mdi mdi-gauge"></i><span class="hide-menu">商城系统 </span></a>
                    <ul aria-expanded="true" class="collapse">
                        {{--@if(auth('admin')->user()->hasPermissionTo('Admin-category') || auth('admin')->user()->hasRole('category'))--}}
                        <li><a href="{{route ('admin.category.index')}}">栏目管理</a></li>
                        {{--@endif--}}
                        {{--@if(auth('admin')->user()->hasPermissionTo('Admin-good') || auth('admin')->user()->hasRole('good'))--}}
                        <li><a href="{{route ('admin.good.index')}}">商品管理</a></li>
                         {{--@endif--}}
                        <li><a href="{{route ('admin.settlement.index')}}">订单管理</a></li>
                    </ul>
                </li>
                {{--@endif--}}
                {{--@if(auth('admin')->user()->hasAnyPermission(['Admin-config-website', 'Admin-config-upload','Admin-config-email','Admin-config-search']))--}}
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-laptop-windows"></i><span class="hide-menu">后台配置</span></a>
                    <ul aria-expanded="false" class="collapse">
                        {{--@if(auth('admin')->user()->hasPermissionTo('Admin-config-website'))--}}
                        <li><a href="{{route ('admin.config.edit',['name'=>'base'])}}">基本配置</a></li>
                        {{--@endif--}}
                        {{--@if(auth('admin')->user()->hasPermissionTo('Admin-config-upload'))--}}
                        <li><a href="{{route ('admin.config.edit',['name'=>'upload'])}}">上传配置</a></li>
                            {{--@endif--}}
                            {{--@if(auth('admin')->user()->hasPermissionTo('Admin-config-email'))--}}
                        <li><a href="{{route ('admin.config.edit',['name'=>'mail'])}}">邮件配置</a></li>
                            {{--@endif--}}
                            {{--@if(auth('admin')->user()->hasPermissionTo('Admin-config-search'))--}}
                        <li><a href="{{route ('admin.config.edit',['name'=>'search'])}}">搜索配置</a></li>
                            {{--@endif--}}
                            {{--@if(auth('admin')->user()->hasPermissionTo('Admin-config-wechat'))--}}
                        <li><a href="{{route ('admin.config.edit',['name'=>'wechat'])}}">微信配置</a></li>
                            {{--@endif--}}
                        <li><a href="{{route ('admin.config.edit',['name'=>'code'])}}">验证码配置</a></li>
                    </ul>
                </li>
                {{--@endif--}}

                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">轮播图管理</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route ('shower.figure.index')}}">轮播图配置</a></li>
                    </ul>
                </li>
                {{--@if(auth('admin')->user()->hasAnyPermission(['Admin-admin', 'Admin-role','Admin-permission']))--}}
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">权限设置管理</span></a>
                    <ul aria-expanded="false" class="collapse">
                        {{--@if(auth('admin')->user()->hasPermissionTo('Admin-admin'))--}}
                        <li><a href="{{route('admin.admin.index')}}">用户管理</a></li>
                        {{--@endif--}}
                        {{--@if(auth('admin')->user()->hasPermissionTo('Admin-role'))--}}
                        <li><a href="{{route('admin.role.index')}}">角色管理</a></li>
                            {{--@endif--}}
                            {{--@if(auth('admin')->user()->hasPermissionTo('Admin-permission'))--}}
                        <li><a href="{{route ('admin.permission')}}">权限管理</a></li>
                            {{--@endif--}}
                    </ul>
                </li>
                {{--@endif--}}
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Ui Elements</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="ui-cards.html">Cards</a></li>
                        <li><a href="ui-user-card.html">User Cards</a></li>
                        <li><a href="ui-buttons.html">Buttons</a></li>
                        <li><a href="ui-modals.html">Modals</a></li>
                        <li><a href="ui-tab.html">Tab</a></li>
                        <li><a href="ui-tooltip-popover.html">Tooltip &amp; Popover</a></li>
                        <li><a href="ui-tooltip-stylish.html">Tooltip stylish</a></li>
                        <li><a href="ui-sweetalert.html">Sweet Alert</a></li>
                        <li><a href="ui-notification.html">Notification</a></li>
                        <li><a href="ui-progressbar.html">Progressbar</a></li>
                        <li><a href="ui-nestable.html">Nestable</a></li>
                        <li><a href="ui-range-slider.html">Range slider</a></li>
                        <li><a href="ui-timeline.html">Timeline</a></li>
                        <li><a href="ui-typography.html">Typography</a></li>
                        <li><a href="ui-horizontal-timeline.html">Horizontal Timeline</a></li>
                        <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                        <li><a href="ui-session-ideal-timeout.html">Session Ideal Timeout</a></li>
                        <li><a href="ui-bootstrap.html">Bootstrap Ui</a></li>
                        <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                        <li><a href="ui-bootstrap-switch.html">Bootstrap Switch</a></li>
                        <li><a href="ui-list-media.html">List Media</a></li>
                        <li><a href="ui-ribbons.html">Ribbons</a></li>
                        <li><a href="ui-grid.html">Grid</a></li>
                        <li><a href="ui-carousel.html">Carousel</a></li>
                        <li><a href="ui-date-paginator.html">Date-paginator</a></li>
                        <li><a href="ui-dragable-portlet.html">Dragable Portlet</a></li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">FORMS, TABLE &amp; WIDGETS</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Forms</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="form-basic.html">Basic Forms</a></li>
                        <li><a href="form-layout.html">Form Layouts</a></li>
                        <li><a href="form-addons.html">Form Addons</a></li>
                        <li><a href="form-material.html">Form Material</a></li>
                        <li><a href="form-float-input.html">Floating Lable</a></li>
                        <li><a href="form-pickers.html">Form Pickers</a></li>
                        <li><a href="form-upload.html">File Upload</a></li>
                        <li><a href="form-mask.html">Form Mask</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-dropzone.html">File Dropzone</a></li>
                        <li><a href="form-icheck.html">Icheck control</a></li>
                        <li><a href="form-img-cropper.html">Image Cropper</a></li>
                        <li><a href="form-bootstrapwysihtml5.html">HTML5 Editor</a></li>
                        <li><a href="form-typehead.html">Form Typehead</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-xeditable.html">Xeditable Editor</a></li>
                        <li><a href="form-summernote.html">Summernote Editor</a></li>
                        <li><a href="form-tinymce.html">Tinymce Editor</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Tables</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="table-basic.html">Basic Tables</a></li>
                        <li><a href="table-layout.html">Table Layouts</a></li>
                        <li><a href="table-data-table.html">Data Tables</a></li>
                        <li><a href="table-footable.html">Footable</a></li>
                        <li><a href="table-jsgrid.html">Js Grid Table</a></li>
                        <li><a href="table-responsive.html">Responsive Table</a></li>
                        <li><a href="table-bootstrap.html">Bootstrap Tables</a></li>
                        <li><a href="table-editable-table.html">Editable Table</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Widgets</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="widget-apps.html">Widget Apps</a></li>
                        <li><a href="widget-data.html">Widget Data</a></li>
                        <li><a href="widget-charts.html">Widget Charts</a></li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">EXTRA COMPONENTS</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Page Layout</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="layout-single-column.html">1 Column</a></li>
                        <li><a href="layout-fix-header.html">Fix header</a></li>
                        <li><a href="layout-fix-sidebar.html">Fix sidebar</a></li>
                        <li><a href="layout-fix-header-sidebar.html">Fixe header &amp; Sidebar</a></li>
                        <li><a href="layout-boxed.html">Boxed Layout</a></li>
                        <li><a href="layout-logo-center.html">Logo in Center</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Sample Pages</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="starter-kit.html">Starter Kit</a></li>
                        <li><a href="pages-blank.html">Blank page</a></li>
                        <li><a href="#" class="has-arrow">Authentication <span class="label label-rounded label-success">6</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="pages-login.html">Login 1</a></li>
                                <li><a href="pages-login-2.html">Login 2</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-register2.html">Register 2</a></li>
                                <li><a href="pages-lockscreen.html">Lockscreen</a></li>
                                <li><a href="pages-recover-password.html">Recover password</a></li>
                            </ul>
                        </li>
                        <li><a href="pages-profile.html">Profile page</a></li>
                        <li><a href="pages-animation.html">Animation</a></li>
                        <li><a href="pages-fix-innersidebar.html">Sticky Left sidebar</a></li>
                        <li><a href="pages-fix-inner-right-sidebar.html">Sticky Right sidebar</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-treeview.html">Treeview</a></li>
                        <li><a href="pages-utility-classes.html">Helper Classes</a></li>
                        <li><a href="pages-search-result.html">Search result</a></li>
                        <li><a href="pages-scroll.html">Scrollbar</a></li>
                        <li><a href="pages-pricing.html">Pricing</a></li>
                        <li><a href="pages-lightbox-popup.html">Lighbox popup</a></li>
                        <li><a href="pages-gallery.html">Gallery</a></li>
                        <li><a href="pages-faq.html">Faqs</a></li>
                        <li><a href="#" class="has-arrow">Error Pages</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="pages-error-400.html">400</a></li>
                                <li><a href="pages-error-403.html">403</a></li>
                                <li><a href="pages-error-404.html">404</a></li>
                                <li><a href="pages-error-500.html">500</a></li>
                                <li><a href="pages-error-503.html">503</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file-chart"></i><span class="hide-menu">Charts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="chart-morris.html">Morris Chart</a></li>
                        <li><a href="chart-chartist.html">Chartis Chart</a></li>
                        <li><a href="chart-echart.html">Echarts</a></li>
                        <li><a href="chart-flot.html">Flot Chart</a></li>
                        <li><a href="chart-knob.html">Knob Chart</a></li>
                        <li><a href="chart-chart-js.html">Chartjs</a></li>
                        <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                        <li><a href="chart-extra-chart.html">Extra chart</a></li>
                        <li><a href="chart-peity.html">Peity Charts</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-brush"></i><span class="hide-menu">Icons</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="icon-material.html">Material Icons</a></li>
                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                        <li><a href="icon-themify.html">Themify Icons</a></li>
                        <li><a href="icon-linea.html">Linea Icons</a></li>
                        <li><a href="icon-weather.html">Weather Icons</a></li>
                        <li><a href="icon-simple-lineicon.html">Simple Lineicons</a></li>
                        <li><a href="icon-flag.html">Flag Icons</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Maps</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="map-google.html">Google Maps</a></li>
                        <li><a href="map-vector.html">Vector Maps</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">item 1.1</a></li>
                        <li><a href="#">item 1.2</a></li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">item 1.3.1</a></li>
                                <li><a href="#">item 1.3.2</a></li>
                                <li><a href="#">item 1.3.3</a></li>
                                <li><a href="#">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="{{route ('admin.logout')}}" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
