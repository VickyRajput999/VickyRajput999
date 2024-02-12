@extends('layout.component')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="py-4">
            <div class="row align-items-center">
                <div class="col-sm-5">
                    <h1 class="main_headings mb-0">Employee Profile</h1>
                </div>
                <div class="col-sm-2">
                    <div class="input-group">
                        <div class="form-outline" data-mdb-input-init>
                          {{-- <input type="text" name="search" id="search" class="form-control" placeholder="Search"/> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 text-right">
                    <button class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <g clip-path="url(#clip0_37_18)">
                                <path d="M13.6562 4.03125H13.2188V2.34375C13.2188 1.05141 12.1673 0 10.875 0H5.125C3.83266 0 2.78125 1.05141 2.78125 2.34375V4.03125H2.34375C1.05141 4.03125 0 5.08266 0 6.375V10.125C0 11.4173 1.05141 12.4688 2.34375 12.4688H2.78125V14.5938C2.78125 15.3692 3.41209 16 4.1875 16H11.8125C12.5879 16 13.2188 15.3692 13.2188 14.5938V12.4688H13.6562C14.9486 12.4688 16 11.4173 16 10.125V6.375C16 5.08266 14.9486 4.03125 13.6562 4.03125ZM3.71875 2.34375C3.71875 1.56834 4.34959 0.9375 5.125 0.9375H10.875C11.6504 0.9375 12.2812 1.56834 12.2812 2.34375V4.03125H3.71875V2.34375ZM12.2812 14.5938C12.2812 14.8522 12.071 15.0625 11.8125 15.0625H4.1875C3.92903 15.0625 3.71875 14.8522 3.71875 14.5938V9.96875H12.2812V14.5938ZM15.0625 10.125C15.0625 10.9004 14.4317 11.5312 13.6562 11.5312H13.2188V9.96875H13.5C13.7589 9.96875 13.9688 9.75887 13.9688 9.5C13.9688 9.24113 13.7589 9.03125 13.5 9.03125H2.5C2.24113 9.03125 2.03125 9.24113 2.03125 9.5C2.03125 9.75887 2.24113 9.96875 2.5 9.96875H2.78125V11.5312H2.34375C1.56834 11.5312 0.9375 10.9004 0.9375 10.125V6.375C0.9375 5.59959 1.56834 4.96875 2.34375 4.96875H13.6562C14.4317 4.96875 15.0625 5.59959 15.0625 6.375V10.125Z" fill="black"></path>
                                <path d="M9.25 11.0312H6.75C6.49112 11.0312 6.28125 11.2411 6.28125 11.5C6.28125 11.7589 6.49112 11.9688 6.75 11.9688H9.25C9.50887 11.9688 9.71875 11.7589 9.71875 11.5C9.71875 11.2411 9.50887 11.0312 9.25 11.0312Z" fill="black"></path>
                                <path d="M9.25 13.0312H6.75C6.49112 13.0312 6.28125 13.2411 6.28125 13.5C6.28125 13.7589 6.49112 13.9688 6.75 13.9688H9.25C9.50887 13.9688 9.71875 13.7589 9.71875 13.5C9.71875 13.2411 9.50887 13.0312 9.25 13.0312Z" fill="black"></path>
                                <path d="M4 6.03125H2.5C2.24112 6.03125 2.03125 6.24112 2.03125 6.5C2.03125 6.75888 2.24112 6.96875 2.5 6.96875H4C4.25887 6.96875 4.46875 6.75888 4.46875 6.5C4.46875 6.24112 4.25887 6.03125 4 6.03125Z" fill="black"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_37_18">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                        Print
                    </button>
                    <button class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <g clip-path="url(#clip0_37_46)">
                                <path d="M14.7848 5.37851C14.8347 5.11126 14.8599 4.84 14.8602 4.56814C14.8572 2.04321 12.8079 -0.00118215 10.283 0.00186497C8.36086 0.00417543 6.64549 1.20846 5.99039 3.01547C4.81745 2.54856 3.48807 3.12088 3.02112 4.29383C2.9807 4.39535 2.94762 4.49963 2.92214 4.60587C1.04926 4.88598 -0.241921 6.63131 0.0381808 8.50419C0.289385 10.1839 1.73238 11.4266 3.43074 11.4259H6.28811C6.60374 11.4259 6.85959 11.17 6.85959 10.8544C6.85959 10.5388 6.60374 10.2829 6.28811 10.2829H3.43074C2.16826 10.2829 1.14482 9.25947 1.14482 7.99699C1.14482 6.73451 2.16826 5.71108 3.43074 5.71108C3.74637 5.71108 4.00223 5.45522 4.00223 5.13959C4.00326 4.50837 4.51582 3.99749 5.14704 3.99852C5.44556 3.99903 5.73206 4.11629 5.94522 4.32524C6.17001 4.54677 6.53184 4.54413 6.75338 4.31934C6.83656 4.23493 6.89144 4.12677 6.91043 4.00978C7.22063 2.14356 8.98495 0.882184 10.8512 1.19239C12.7174 1.50259 13.9788 3.26691 13.6686 5.13313C13.6501 5.2444 13.6261 5.3547 13.5967 5.46359C13.531 5.70214 13.6263 5.95585 13.8327 6.0922C14.8847 6.7902 15.1716 8.20885 14.4736 9.26081C14.0511 9.89753 13.3385 10.281 12.5743 10.2828H10.8599C10.5443 10.2828 10.2884 10.5387 10.2884 10.8543C10.2884 11.17 10.5443 11.4258 10.8599 11.4258H12.5743C14.468 11.424 16.0017 9.88742 15.9999 7.99371C15.999 6.98578 15.5546 6.02928 14.7848 5.37851Z" fill="black"></path>
                                <path d="M11.8225 12.1648C11.601 11.951 11.2499 11.951 11.0285 12.1648L9.14544 14.0467V5.71114C9.14544 5.39551 8.88959 5.13965 8.57396 5.13965C8.25833 5.13965 8.00247 5.39551 8.00247 5.71114V14.0467L6.12058 12.1648C5.89356 11.9455 5.53179 11.9518 5.31253 12.1788C5.09862 12.4003 5.09862 12.7514 5.31253 12.9728L8.16989 15.8302C8.39277 16.0537 8.75464 16.0541 8.97809 15.8312C8.97842 15.8309 8.97876 15.8305 8.97913 15.8302L11.8365 12.9728C12.0558 12.7458 12.0495 12.3841 11.8225 12.1648Z" fill="black"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_37_46">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                        Download
                    </button>
                    <a href="{{ route('emp.create')}}" class="btn btn_primary" >Add Employee</a>
                    {{-- <button class="btn btn_primary" id="EmployeeForm">Add Employee</button> --}}
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 columnn">
                    <div class="employ_box">
                        <div class="table-responsive table_main">
                            <table class="table mb-0">
                                <thead class="attendance_thead">
                                    <tr>
                                        <th>Sr.No</th>
                                        {{-- <th></th> --}}
                                        <th>Name</th>
                                        <th>Emp.ID</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody class="attendance_table">
                                    @foreach($employees as $employee)
                                   <tr>
                                    {{-- {{ $count }} --}}
                                    {{-- <td>{{ $employee->$count++ }}</td> --}}
                                    <td>{{ $employee->id }}</td>
                                    {{-- <td><img src="{{ asset($employee->image) }}" style="border-radius: 50%;" width="50px" height="50px" alt=""></td> --}}
                                    <td>{{ $employee->firstName }}</td>
                                    <td>{{ $employee->employeeId }}</td>
                                    <td>{{ $employee->designation }}</td>
                                    <td>{{ $employee->salary }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>
                                        @if($employee->status == true)
                                            <div class="green led" ></div>
                                        @else
                                            <div class="red led"></div>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="view_btn">
                                            <a href="{{ route('emp.profile',[Crypt::encrypt($employee->employeeId)]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 32 32" width="512">
                                                    <g id="_44_Visibility" data-name="44 Visibility">
                                                        <path
                                                            d="m16 21c-6.6 0-6.6-10 0-10 6.525 0 6.807 10 0 10zm0-8c-4 0-4 6 0 6s4-6 0-6z" />
                                                        <path
                                                            d="m16 25c-4.949 0-9.688-2.629-13-7.214a3.043 3.043 0 0 1 0-3.572c3.312-4.585 8.051-7.214 13-7.214s9.688 2.629 13 7.214a3.043 3.043 0 0 1 0 3.572c-3.312 4.585-8.051 7.214-13 7.214zm-11.383-8.386c2.978 4.118 7.02 6.386 11.383 6.386s8.405-2.268 11.383-6.386a1.047 1.047 0 0 0 0-1.229c-2.978-4.117-7.02-6.385-11.383-6.385s-8.405 2.268-11.383 6.386a1.047 1.047 0 0 0 0 1.229z" />
                                                    </g>
                                                </svg>
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div>
                                {!! $employees->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
@section('customJs')
    <script>
        $(document).ready(function(){
            $(document).on("click", ".pagination a", function(e){
                e.preventDefault(); // Corrected typo in function name

                let page = $(this).attr('href').split('page=')[1];
                product(page);
            });

            function product(page){
                $.ajax({
                    url: "/pagination/page-data?page=" + page,
                    success: function(res){
                        $(".table_main").html(res);
                    }
                });
            }
        });


    </script>
@endsection
