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
                            <h2 class="content-header-title float-left mb-0">Edit Complaint</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/complain')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit Complaint
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
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{url('/')}}"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
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
                                    <h4 class="card-title">Add Complaint</h4>
                                </div>
                                <div class="card-body">
                                <form class="form" action="{{ url('admin/edit-complain') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="complainId" value="{{$complain->id}}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title*</label>
                                            <input type="text" id="title" class="form-control" placeholder="Title" name="title" value="{{$complain->title}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="description">Description*</label>
                                            <input type="text" id="description" class="form-control" placeholder="Description" value="{{$complain->description}}" name="description" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="categories">Categories</label>
                                            <select id="categories" class="form-control" name="categories" required>
                                                <option value="{{$complain->categories}}">{{$complain->categories}}</option>
                                                <option value="critical">Critical</option>
                                                <option value="major">Major</option>
                                                <option value="minor">Minor</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="categories">Status</label>
                                            <select id="categories" class="form-control" name="status" required>
                                                <option value="{{$complain->status}}">{{$complain->status}}</option>
                                                <option value="Open">Open</option>
                                                <option value="In progress">In progress</option>
                                                <option value="Resolved">Resolved</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="categories">Type</label>
                                            <select id="categories" class="form-control" name="type" required>
                                                <option value="{{$complain->type}}">{{$complain->type}}</option>
                                                <option value="bug">Bug</option>
                                                <option value="enhancement">Enhancement</option>
                                                <option value="feature request">Feature Request</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="file">Upload Supportive Document</label>
                                            <input type="file" id="file" class="form-control" name="image" placeholder="File">
                                        </div>
                                    </div>
                                    @if(auth()->user()->role == 'admin')
                                    <div class="col-md-6 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="categories">Assign Developer</label>
                                            <select id="categories" class="form-control" name="id" required>
                                                <option value="{{$complain->developer_id}}">{{getname($complain->developer_id)}}</option>
                                                @foreach($developer as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-12 mt-2">
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