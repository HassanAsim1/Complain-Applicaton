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
                                    <h2 class="content-header-title float-left mb-0">Ticket</h2>
                                    <div class="breadcrumb-wrapper">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">View Ticket</a>
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
                                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <x-alert />

                    <div class="content-body">
                        <!-- Table Hover Animation start -->
                    <div class="row" id="table-hover-animation">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ticket</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover-animation">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>categories</th>
                                                <th>Developer</th>
                                                <!-- <th>status</th> -->
                                                <th>file</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            @foreach($members as $complain)
                                                <td>{{$complain->id}}</td>
                                                <td>{{$complain->title}}</td>
                                                <td>
                                                    <?php
                                                    $description = $complain->description;
                                                    $words = explode(' ', $description);
                                                    $firstTwoWords = implode(' ', array_slice($words, 0, 2));
                                                    $remainingWords = implode(' ', array_slice($words, 2));
                                                    ?>
                                                    {{ $firstTwoWords }}
                                                    @if (strlen($remainingWords) > 0)
                                                        <a class="outline-primary" data-toggle="tooltip" data-original-title="{{ $description }}" href="">more info</a>
                                                    @endif
                                                </td>
                                                <td><span class="badge badge-pill badge-light-info mr-1">{{$complain->type}}</span></td>
                                                <td><span class="badge badge-pill badge-light-primary mr-1">{{$complain->categories}}</span></td>
                                                <td>{{getname($complain->developer_id)}}</td>
                                               {{-- <td>
                                                    @if($complain->status == 'Open')
                                                    <span class="badge badge-pill badge-light-primary mr-1">{{$complain->status}}</span>
                                                    @elseif($complain->status == 'In progress')
                                                    <span class="badge badge-pill badge-light-info mr-1">{{$complain->status}}</span>
                                                    @else
                                                    <span class="badge badge-pill badge-light-success mr-1">{{$complain->status}}</span>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <div class="avatar-group">
                                                        <a href="{{ asset('storage/' . $complain->image) }}" target="_blank" data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0">
                                                            <img src="{{ asset('storage/' . $complain->image) }}" alt="Avatar" height="26" width="26" download />
                                                        </a>
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
            window.location.href = "{{ url('delete') }}/" + complainId;
        }
    }
    </script>
    <x-admin.footer />
</body>
<!-- END: Body-->

</html>