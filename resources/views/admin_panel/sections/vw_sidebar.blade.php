  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- <div class="user-panel">
              <div class="pull-left image">
                  <img src="{{asset('backend_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                  <p>Alexander Pierce</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div> -->
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>
              @if(request()->session()->get('POST')=='1' || request()->session()->get('CAT')=='1' ||
              request()->session()->get('TAG')=='1' )
              <li class="treeview {{ request()->is('admin') ? 'active' : '' }}">
                  <a href="#">
                      <i class="fa fa-dashboard"></i> <span>Blog</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      @if(request()->session()->get('POST')=='1')
                      <li class="{{ request()->is('admin/post') ? 'active' : '' }}"><a href="{{url('admin/post')}}"><i
                                  class="fa fa-circle-o"></i>Post</a></li>
                      @endif
                      @if(request()->session()->get('CAT')=='1')
                      <li class="{{ request()->is('admin/category') ? 'active' : '' }}"><a
                              href="{{url('admin/category')}}"><i class="fa fa-circle-o"></i>Categories</a>
                      </li>
                      @endif
                      @if(request()->session()->get('TAG')=='1')
                      <li class="{{ request()->is('admin/tag') ? 'active' : '' }}"><a href="{{url('admin/tag')}}"><i
                                  class="fa fa-circle-o"></i>Tags</a></li>
                      @endif

                  </ul>
              </li>
              @endif
              @if(request()->session()->get('USERS')=='1')
              <li class="{{ request()->is('admin/users') ? 'active' : '' }}">
                  <a href="{{url('admin/users')}}">
                      <i class="fa fa-users"></i> <span>Users</span>
                  </a>
              </li>

              @endif

              <li class="{{ request()->is('admin/send/email') ? 'active' : '' }}">
                  <a href="{{url('admin/send/email')}}">
                      <i class="fa fa-envelope"></i> <span>Email Send With Attachment</span>
                  </a>
              </li>
              <li class="{{ request()->is('admin/excel') ? 'active' : '' }}">
                  <a href="{{url('admin/excel')}}">
                      <i class="fa fa-file-excel-o"></i> <span>Excel Import and Export</span>
                  </a>
              </li>
              <li class="{{ request()->is('admin/pdfview') ? 'active' : '' }}">
                  <a href="{{url('admin/pdfview')}}">
                      <i class="fa fa-file-pdf-o"></i> <span>Generate Pdf</span>
                  </a>
              </li>





          </ul>
      </section>
      <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">