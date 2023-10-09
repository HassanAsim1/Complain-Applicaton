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
                                    <h2 class="content-header-title float-left mb-0">Complaints</h2>
                                    <div class="breadcrumb-wrapper">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">View Complaints</a>
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
                        <!-- Table Hover Animation start -->
                    <div class="row" id="table-hover-animation">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Complains</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover-animation">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            @foreach($data as $data)
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->email}}</td>
                                                <td><span class="badge badge-pill badge-light-primary mr-1">{{$data->role}}</span></td>
                                                @if($data->status == 'active')
                                                <td><span class="badge badge-pill badge-light-success mr-1">{{$data->status}}</span></td>
                                                @else
                                                <td><span class="badge badge-pill badge-light-danger mr-1">{{$data->status}}</span></td>
                                                @endif
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);">
                                                                <i data-feather="edit-2" class="mr-50"></i>
                                                                <span>Edit</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#" onclick="confirmDelete({{ $data->id }})">
                                                                    <i data-feather="trash" class="mr-50"></i>
                                                                    <span>Delete</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table head options end -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
    function confirmDelete(complainId) {
        var confirmation = confirm("Are you sure you want to delete this item?");
        if (confirmation) {
            // If the user confirms, redirect to the delete URL
            window.location.href = "{{ url('delete_user') }}/" + complainId;
        }
    }
    </script>
    <x-admin.footer />
</body>
<!-- END: Body-->

</html>