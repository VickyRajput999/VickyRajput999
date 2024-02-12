@extends('layout.component')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="main_headings pb-4"> Holidays List</h1>
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
                        <div class="employ_box pb-4">
                            <form class="pt-3" id="holidays" name="holidays">
                                <div class="row ml-2">
                                    <div class="col-md-3 ">
                                        <label for="startdate">Start Date</label>
                                        <input class="form-control" type="date" id="startdate" name="startdate" value="{{ now()->format('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="enddate">End Date</label>
                                        <input class="form-control" type="date" id="enddate" name="enddate" value="{{ now()->format('Y-m-d') }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="holidayname">Holiday Name</label>
                                        <input class="form-control" type="text" id="holidayname" name="holidayname" placeholder="Holiday Name">
                                    </div>
                                    <div class="col-md-3" style="padding-top: 30px;">
                                        <button class="btn btn-primary">
                                                save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.card -->

                <div class="employ_box mt-5">
                    <div class="table-responsive table_main" id="refreshtable">
                        <table class="table mb-0" >
                            <thead class="attendance_thead">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Holiday Name</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody class="attendance_table" id="trrr">
                               @foreach ($holidays as $holiday)
                               <tr>
                                    <td>{{ $holiday->id }}</td>
                                    <td><span id="sdatesc">{{ \Carbon\Carbon::parse($holiday->startDate)->format('d-m-Y') }}</span></td>
                                    <td><span id="edates{{ $holiday->id }}">{{ \Carbon\Carbon::parse($holiday->endDate)->format('d-m-Y')  }}</span></td>
                                    <td><span id="name{{ $holiday->id }}">{{ $holiday->holiDayName }}</span></td>

                                    <td>
                                        <button data-id="{{ Crypt::encrypt($holiday->id) }}" class="ediholidays">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M3.1735 12.54C3.1735 12.54 3.22683 12.54 3.24683 12.54L5.20016 12.36C5.4735 12.3333 5.72683 12.2133 5.92016 12.02L13.2935 4.64668C13.6402 4.30001 13.8335 3.84001 13.8335 3.35335C13.8335 2.86668 13.6402 2.40668 13.2935 2.06001L12.8202 1.58668C12.1268 0.893348 10.9202 0.893348 10.2268 1.58668L9.28683 2.52668L2.86016 8.95335C2.66683 9.14668 2.54683 9.40001 2.52683 9.67335L2.34683 11.6267C2.32683 11.8733 2.4135 12.1133 2.58683 12.2933C2.74683 12.4533 2.9535 12.54 3.1735 12.54ZM11.5268 2.04668C11.7402 2.04668 11.9535 2.12668 12.1135 2.29335L12.5868 2.76668C12.7468 2.92668 12.8335 3.13335 12.8335 3.35335C12.8335 3.57335 12.7468 3.78668 12.5868 3.94001L12.0002 4.52668L10.3535 2.88001L10.9402 2.29335C11.1002 2.13335 11.3135 2.04668 11.5268 2.04668ZM3.52016 9.76668C3.52016 9.72668 3.54016 9.69335 3.56683 9.66668L9.64016 3.58668L11.2868 5.23335L5.2135 11.3067C5.2135 11.3067 5.14683 11.3533 5.1135 11.3533L3.36016 11.5133L3.52016 9.76001V9.76668ZM15.1668 14.6667C15.1668 14.94 14.9402 15.1667 14.6668 15.1667H1.3335C1.06016 15.1667 0.833496 14.94 0.833496 14.6667C0.833496 14.3933 1.06016 14.1667 1.3335 14.1667H14.6668C14.9402 14.1667 15.1668 14.3933 15.1668 14.6667Z"
                                                    fill="black" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $holidays->links() }}
                        </div>
                    </div>
                </div>


                <div class="modal" id="modifyModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Holidays</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form class="pt-3" id="modifyHolidays"  name="modifyHolidays">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="editstartdate">Start Date</label>
                                        <input class="form-control" type="date" id="editstartdate" name="editstartdate"  value="{{ now()->format('Y-m-d') }}">
                                        <input type="hidden" id="encryptid" name="encryptid">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="editenddate">End Date</label>
                                        <input class="form-control" type="date" id="editenddate" name="editenddate"  value="{{ now()->format('Y-m-d') }}" >
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="holidays">Holidays Name</label>
                                        <input class="form-control" type="text" id="editholidaysname" name="editholidaysname">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="saveChanges">Save changes</button>
                                      </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('customJs')
    <script>
        $(document).ready(function(){
            $(document).on("submit","#holidays",function(e){
                e.preventDefault();

                $("button[type=submit]").prop('disabled',true);

                let holidays = $(this).serializeArray();

                $.ajax({
                    url:"{{ route('holiday.store') }}",
                    type:'post',
                    data:holidays,
                    dataType:'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(res){
                        $("button[type=submit]").prop('disabled',false);
                        if(res.status == true){
                            window.location.href="{{ route('holiday.index') }}";
                        }
                    }
                });
            });


            //Edit Holidays
            $(document).on("click",".ediholidays",function(e){
                e.preventDefault();
                var id = $(this).attr("data-id");
                $.ajax({
                    url:"{{ route('holiday.edit') }}",
                    type:'post',
                    data:{id:id},
                    dataType:'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(res){
                        if(res.status == 'success'){
                            $("#encryptid").val(res.encyptid);
                            $("#editstartdate").val(res.holidays.startDate);
                            $("#editenddate").val(res.holidays.endDate);
                            $("#editholidaysname").val(res.holidays.holiDayName);
                            $("#modifyModal").modal('show');
                        }
                    }
                });
            });

            //Holidays update
            $(document).on("submit","#modifyHolidays",function(e){
                e.preventDefault();
                var formdata = $(this).serializeArray();
                $("button[type=submit]").prop("disabled", true);

                $.ajax({
                    url:"{{ route('holiday.update') }}",
                    type:'post',
                    data:formdata,
                    dataType:'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(res){
                        $("button[type=submit]").prop("disabled", false);
                        if(res.status == 'success'){
                            $("#name"+res.id).text(res.eholiDay);
                            $("#sdates"+res.id).text(res.estartDate);
                            $("#edates"+res.id).text(res.eendDate);
                            $("#modifyModal").modal('hide');
                            $("#refreshtable").DataTable().api().ajax.reload();
                            // $("#modifyModal").modal('hide');
                            //window.location.reload();
                        }
                    }
                });
            });

            //Ajax Pagination
            $(document).on("click", ".pagination a", function(e){
                e.preventDefault();

                let page = $(this).attr('href').split('page=')[1];
                product(page);
            });

            function product(page){
                $.ajax({
                    url: "/holidayspagination/page-data?page=" + page,
                    success: function(res){
                        $(".table_main").html(res);
                    }
                });
            }

        });
    </script>
@endsection
