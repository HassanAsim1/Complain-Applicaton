<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

 <x-admin.head />
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <x-admin.header />    
    <!-- END: Header-->

    <x-admin.sidebar />
    
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">DataTables</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Datatable</a>
                                    </li>
                                    <li class="breadcrumb-item active">Advanced
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{url('/')}}"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="content-body">
               

                <!-- Add complain -->
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Add complain</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-column-search table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>status</th>
                                                <th>categories</th>
                                                <th>file</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $complain)
                                                    <tr>
                                                        <td>{{$complain->title}}</td>
                                                        <td>{{$complain->description}}</td>
                                                        <td>{{$complain->status}}</td>
                                                        <td>{{$complain->categories}}</td>
                                                        <td><img src="{{ asset('storage/' . $complain->image) }}" alt="Complaint Image" height="50px" width=""></td>
                                                        <td><button><a href="{{url('delete/'.$complain->id)}}">Delete</a></button></td>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>status</th>
                                                <th>categories</th>
                                                <th>file</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Add complain -->

                

            </div>
        </div>
    </div>
   <x-admin.footer/>
</body>
<!-- END: Body-->

</html>