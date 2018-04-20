    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('')}}admins/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            @php
              echo Session::get('nguoi_dung.ten_nd')
            @endphp
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Thống kê</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{route('thuongHieu')}}">
            <i class="fa fa-ioxhost"></i> <span>Thương Hiệu</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{route('loaiSanPham')}}">
            <i class="fa fa-optin-monster"></i> <span>Loại Sản Phẩm</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{route('sanPham')}}">
            <i class="fa fa-leanpub"></i> <span>Sản Phẩm</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{route('slide')}}">
            <i class="fa fa-sliders"></i> <span>Slide</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{route('quyen')}}">
            <i class="fa fa-odnoklassniki-square"></i> <span>Quyền</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{route('nguoiDung')}}">
            <i class="fa fa-user-md"></i> <span>Người Dùng</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-opencart"></i> <span>Hóa đơn bán</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="{{route('hoaDonBan')}}"><i class="fa fa-circle-o"></i> Hóa đơn đã duyệt</a></li>
            <li class="active"><a href="{{route('dsDuyetHoaDon')}}"><i class="fa fa-circle-o"></i> Hóa đơn chưa duyệt</a></li>
          </ul>
        </li>
        <li>
          <a href="{{route('hoaDonNhap')}}">
            <i class="fa fa-shopping-cart"></i> <span>Hóa Đơn Nhập</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{route('nhapHang')}}">
            <i class="fa  fa-cloud-download"></i> <span>Nhập Hàng</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li>
          <a href="{{route('loHang')}}">
            <i class="fa fa-calendar-times-o"></i> <span>Lô Hàng</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>

      </ul>
    </section>