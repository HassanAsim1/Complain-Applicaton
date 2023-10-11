<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<x-admin.head />

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <x-admin.header />

    <x-admin.sidebar />
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Add User</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a>
                                    </li>
                                    <li class="breadcrumb-item active">Add User
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alert />

            <div class="content-body">
            <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add User</h4>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Name*</label>
                                            <input type="text" id="title" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="description">Email*</label>
                                            <input type="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}"  name="email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="description">Password*</label>
                                            <input type="password" id="password" class="form-control" placeholder="password" name="password" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="description">Confirm Passowrd*</label>
                                            <input type="password" id="Confrim Password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="Role">Role</label>
                                            <select id="role" class="form-control" name="role" required>
                                                <option value="developer">Developer</option>
                                                <option value="client">Client</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="Role">Status</label>
                                            <select id="role" class="form-control" name="status" required>
                                                <option value="active">Active</option>
                                                <option value="disable">Disable</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
                                </div>
                            </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <x-admin.footer />
</body>
<!-- END: Body-->

</html>