<!DOCTYPE html>
<html lang="en">

@include('admin.partials.head')
<link href="{{ url('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('admin.partials.preloader')

        @include('admin.partials.topbar')

        <!-- Main Sidebar Container -->
        @include('admin.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Users</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right">
                            <a href="{{ url('users/add') }}" class="btn btn-primary btn-flat btn-sm ">Add User</a>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row mb-8">
                        @include('admin.partials.alerts')
                    </div>


                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Search Options</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>

                        <div class="card-body" style="display: block;">
                            <form id="search-form">
                                <div class="card-body">

                                    <div class="row search form-group mb-0">
                                        <div class="col-md-4">
                                            <input type="text" id="s_id" name="s_id" placeholder="ID"
                                                class="form-control" title="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="s_email" name="s_email" placeholder="Email"
                                                class="form-control" title="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" id="s_name" name="s_name" placeholder="Name"
                                                class="form-control" title="">
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" name="search" id="search" value="yes" />
                                            <button type="submit" id="kt_ecommerce_add_category_submit"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Search</span>

                                            </button>
                                            <button type="reset" id="kt_ecommerce_add_category_reset"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Reset</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                    <div class="card card-flush shadow-sm">
                        <!--begin::Card header-->
                        {{-- <div class="card-header align-items-center py-5 gap-2 gap-md-5">

                        </div> --}}
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body">


                            <table id="example2"
                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                style="width:100%">
                                <thead>

                                    <tr>
                                        <th class="fw-bold text-gray-600" style="width: 5%">ID</th>
                                        <th class="fw-bold text-gray-600" style="width: 25%">NAME
                                        </th>
                                        <th class="fw-bold text-gray-600" style="width: 20%">EMAIL
                                        </th>
                                        <th class="fw-bold text-gray-600" style="width: 20%">PHONE
                                        </th>
                                        <th class="fw-bold text-gray-600" style="width: 10%">STATUS
                                        </th>
                                        <th class="fw-bold text-gray-600 text-end" style="width: 15%">
                                            ACTIONS</th>

                                    </tr>
                                </thead>


                            </table>



                            <!--begin::Table-->
                            <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    @foreach ($notes as $user)
                                        <div class="modal fade" tabindex="-1"
                                            id="kt_modal_scrollable_{{ $user->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">View User
                                                            Details</h5>
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                            data-bs-dismiss="modal">
                                                            <span class="svg-icon svg-icon-2x"></span>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>

                                                    <div class="modal-body">


                                                        <div class="tab-pane fade show active"
                                                            id="kt_contact_view_general" role="tabpanel">
                                                            <!--begin::Additional details-->
                                                            <div class="d-flex flex-column gap-5 mt-7">

                                                                <!--begin::City-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Name</div>
                                                                    <div class="fw-bold fs-5">
                                                                        {{ $user->name }}</div>
                                                                </div>
                                                                <!--end::City-->

                                                                <!--begin::Notes-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Email</div>
                                                                    {{ $user->email }}
                                                                </div>
                                                                <!--begin::Notes-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Phone</div>
                                                                    {{ $user->phone }}
                                                                </div>
                                                                <!--begin::Notes-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Email</div>
                                                                    {{ $user->email }}
                                                                </div>
                                                                <!--begin::Notes-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Nick Name</div>
                                                                    {{ $user->nick_name }}
                                                                </div>
                                                                <!--begin::Notes-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        User Name</div>
                                                                    {{ $user->user_name }}
                                                                </div>
                                                                <!--end::Notes-->
                                                                <!--begin::Notes-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Address</div>
                                                                    {{ $user->address }}
                                                                </div>
                                                                <!--end::Notes-->
                                                                <!--begin::Notes-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Access Level</div>
                                                                    {{ $user->access_level }}
                                                                </div>
                                                                <!--end::Notes-->
                                                                <!--begin::Notes-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Commission upto 1000</div>
                                                                    {{ $user->commission_upto_1000 }}
                                                                </div>
                                                                <!--end::Notes-->
                                                                <!--begin::Notes-->
                                                                <div class="d-flex flex-column gap-1">
                                                                    <div class="fw-bold text-muted">
                                                                        Commission Above 1000</div>
                                                                    {{ $user->commission_above_1000 }}
                                                                </div>
                                                                <!--end::Notes-->
                                                            </div>
                                                            <!--end::Additional details-->
                                                        </div>



                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>


                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        @include('admin.partials.footer')
    </div>
    <!-- ./wrapper -->

    @include('admin.partials.scripts')
    <script src="{{ url('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        function del(id, e) {

            var ans = Swal.fire({
                html: `Are your sure you want to <strong>DELETE</strong> this item?`,
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: 'Nope, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location = '{{ url('users/delete') }}/' + id;
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });
            console.log(ans);
            return false;
        }

        $(document).ready(function() {



            @php
                $canEdit = Auth::user()->can('edit users');
                $canDel = Auth::user()->can('delete users');
                $canView = Auth::user()->can('view users');
            @endphp

            var canEdit = "{{ $canEdit ? 'yes' : 'no' }}";
            var canDel = "{{ $canDel ? 'yes' : 'no' }}";
            var canView = "{{ $canView ? 'yes' : 'no' }}";
            var s_title = $('#s_title');
            var s_content = $('#s_content');
            var table = $('#example2').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('users/datatable') }}',
                    type: 'GET'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'is_active',

                    },
                    {
                        data: null,
                        sortable: false,
                        render: function(data, type, row) {
                            var ret = '<div class="text-end">';


                            if (canView == "yes") {
                                ret += '<a href="{{ url('/users/profile') }}/' + data.id +
                                    '" class="px-2"><i class="fa-solid fas fa-eye text-success"></i></a>';
                            }
                            if (canEdit == "yes") {
                                ret += '<a href="{{ url('/users/edit') }}/' + data.id +
                                    '" class="px-2"><i class="fa-solid fas fa-pen text-warning"></i></a>';
                            }
                            if (canDel == "yes") {
                                ret += '<a href="#" onclick="del(' + data.id +
                                    ', this)"  class="px-2"><i class="fa-solid fas fa-trash text-danger"></i></a>';
                            }

                            ret += '</div>';


                            return ret;


                        }
                    }

                ],
                order: [0, 'desc']

            });

            $('#search-form').on('submit', function(e) {
                e.preventDefault();
                $('#search').val('yes');
                var formData = $('#search-form').serializeArray();
                var searchData = {};
                for (var i = 0; i < formData.length; i++) {
                    searchData[formData[i].name] = formData[i].value;
                }
                table.search(JSON.stringify(searchData)).draw();
            });
            $('#search-form').on('reset', function(e) {
                //e.preventDefault();
                $('#search').val('');
                var formData = $('#search-form').serializeArray();
                var searchData = {};
                for (var i = 0; i < formData.length; i++) {
                    searchData[formData[i].name] = formData[i].value;
                }
                table.search(JSON.stringify(searchData)).draw();
            });
        });
    </script>
</body>

</html>
