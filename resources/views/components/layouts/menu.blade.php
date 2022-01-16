<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <h6 href="#" class="brand-link">
        <span class="brand-link font-weight-bolder">{{env("APP_NAME")}}</span>
    </h6>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <h6 href="#" class="brand-link">
            <span class="brand-link font-weight-normal ">{{auth()->user()->name}}</span>
        </h6>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!----------- THIS NAVE CREATED BY SULAIMAN QASIMI---------------->
                <x-layouts.menu.link name="dashboard" icon="tachometer-alt" route="dashboard"></x-layouts.menu.link>
                <x-layouts.menu.link name="department" icon="university" route="department"></x-layouts.menu.link>
                <x-layouts.menu.link name="subject" icon="book-open" route="subject"></x-layouts.menu.link>
                <x-layouts.menu.link name="all student" icon="user-friends" route="student.index"></x-layouts.menu.link>
                <x-layouts.menu.link name="create student" icon="user-circle" route="student.create"></x-layouts.menu.link>
                <x-layouts.menu.link name="all teacher" icon="users" route="teacher.index"></x-layouts.menu.link>
                <x-layouts.menu.link name="create teacher" icon="user-graduate" route="teacher.create"></x-layouts.menu.link>
                <x-layouts.menu.link name="Payment" icon="money-bill" route="bill"></x-layouts.menu.link>
                <x-layouts.menu.link name="all user" icon="user" route="user.index"></x-layouts.menu.link>
                <x-layouts.menu.link name="create user" icon="user-slash" route="user.create"></x-layouts.menu.link>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!------------------This element creates by sulaiman Qasimi------------------->