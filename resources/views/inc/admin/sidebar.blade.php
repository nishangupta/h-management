<aside class="main-sidebar sidebar-dark-info elevation-4" >
  {{-- style="background-color:#1E1E1E;" --}}
  <a href="{{route('admin.index')}}" class="brand-link" >
    <img src="{{asset($LOGO->value??'img/AdminLTELogo.png')}}"
    alt="" class="brand-image img-circle elevation-3"
      style="opacity: 1">
    <span class="brand-text font-weight-light">{{$NAME->value??'Inventory'}}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://ui-avatars.com/api?name={{auth()->user()->name}}"
          class="img-circle elevation-2" alt="">
      </div>
      <div class="info">
        <a href="{{route('account.index')}}" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>
    
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-flat flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('admin.index')}}" class="nav-link {{request()->segment(2) == ''?'active':''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview {{request()->segment(2) == 'product'?'menu-open':''}}">
          <a href="#" class="nav-link {{request()->segment(2) == 'product'?'active':''}}">
            <i class="nav-icon far fas fa-cubes"></i>
            <p>
              Products
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{route('product-category.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product category</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('product.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('product.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview {{request()->segment(2) == 'sale'?'menu-open':''}}">
          <a href="#" class="nav-link {{request()->segment(2) == 'sale'?'active':''}}">
            <i class="nav-icon far fas fa-donate"></i>
            <p>
              Sales
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('sale.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('sale.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview {{request()->segment(2) == 'expense'?'menu-open':''}}">
          <a href="#" class="nav-link {{request()->segment(2) == 'expense'?'active':''}}">
            <i class="nav-icon far fas fa-credit-card"></i>
            <p>
              Expenses
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('category.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Expense category</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('expense.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('expense.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview {{request()->segment(2) == 'purchase'?'menu-open':''}}">
          <a href="#" class="nav-link {{request()->segment(2) == 'purchase'?'active':''}}">
            <i class="nav-icon far fas fa-shopping-cart"></i>
            <p>
              Purchase
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('purchase.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('purchase.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item has-treeview {{request()->segment(2) == 'income'?'menu-open':''}}">
          <a href="#" class="nav-link {{request()->segment(2) == 'income'?'active':''}}">
            <i class="nav-icon far fas fa-cash-register"></i>
            <p>
              Income
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('income.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('income.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview {{request()->segment(2) == 'customer'?'menu-open':''}}">
          <a href="#" class="nav-link {{request()->segment(2) == 'customer'?'active':''}}">
            <i class="nav-icon far fas fa-user-friends"></i>
            <p>
              Customers
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('customer.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('customer.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview {{request()->segment(2) == 'supplier'?'menu-open':''}}">
          <a href="#" class="nav-link {{request()->segment(2) == 'supplier'?'active':''}}">
            <i class="nav-icon far fas fa-shipping-fast"></i>
            <p>
              Suppliers
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('supplier.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('supplier.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview {{request()->segment(2) == 'quotation'?'menu-open':''}}">
          <a href="#" class="nav-link {{request()->segment(2) == 'quotation'?'active':''}}">
            <i class="nav-icon far fas fa-envelope"></i>
            <p>
              Quotations
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('quotation.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('quotation.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item has-treeview {{request()->segment(2) == 'setting'?'menu-open':''}}">
          <a href="#" class="nav-link {{request()->segment(2) == 'setting'?'active':''}}">
            <i class="nav-icon far fas fa-cog"></i>
            <p>
              Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('setting.create')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('setting.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Setting</p>
              </a>
            </li>
          </ul>
        </li> 

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fas fa-user-shield"></i>
            <p>
              Account Information
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @role('admin')
            <li class="nav-item">
              <a href="{{route('usermanagement.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Management</p>
              </a>
            </li>
            @endrole
            <li class="nav-item">
              <a href="{{route('admin-password.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>