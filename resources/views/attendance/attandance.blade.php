@extends('layout.component')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="main_headings">Attendance</h1>
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
                        <div>
                            <input type="date" id="attendaceDate" value="{{ now()->format('Y-m-d') }}">
                            <button class="btn btn-primary " onclick="openModall()">
                                Attendace
                            </button>
                            <button class="btn btn-primary" onclick="showAttendace()">show</button>

                        </div>
                        <!-- The Modal -->
                        <div id="modifyModal" class="modify_modal">
                            <div class="modal_main">
                                <div class="modify_modal_content">
                                    <span onclick="closeModall()" style="cursor: pointer;">&times;</span>
                                    <h4>Attendance</h4>
                                    <form class="pt-3" id="Emp-Attendance" name="Emp-Attendance">
                                        <div class="employ_box mt-5">
                                            <div class="table-responsive table_main">
                                                <table class="table mb-0">
                                                    <thead class="attendance_thead">
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Emp.Id</th>
                                                            <th>Name</th>
                                                            <th>Attendance</th>
                                                            <th scope="col">In Time</th>
                                                            <th scope="col">Out Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="attendance_table">
                                                        @foreach ($details as $detail)
                                                            @if ($detail->status == 'Active')
                                                                <tr>
                                                                    <td>
                                                                        <input style="border: none;" id="date"
                                                                            name="date[]" type="date"
                                                                            value="{{ now()->format('Y-m-d') }}">
                                                                    </td>
                                                                    <td>
                                                                        <input readonly
                                                                            style="border: none; text-align:center;"
                                                                            type="text" id="empid"
                                                                            value="{{ $detail->employeeId }}"
                                                                            name="empid[]">
                                                                    </td>
                                                                    <td>
                                                                        <input readonly
                                                                            style="border: none; text-align:center;"
                                                                            type="text" id="empname"
                                                                            value="{{ $detail->firstName }}"
                                                                            name="empname[]">
                                                                    </td>
                                                                    <td>
                                                                        <select name="attends[]"
                                                                            id="attends"style="border: none;">
                                                                            <option value="attends">Select Status</option>
                                                                            <option
                                                                                {{ $detail->status == 'present' ? 'selected' : '' }}
                                                                                value="present">Present</option>
                                                                            <option
                                                                                {{ $detail->status == 'absent' ? 'selected' : '' }}
                                                                                value="absent">Absent</option>
                                                                            <option
                                                                                {{ $detail->status == 'leave' ? 'selected' : '' }}
                                                                                value="leave">Leave</option>
                                                                        </select>
                                                                    </td>

                                                                    <td>
                                                                        <input type="time" name="checkin[]"
                                                                            id="checkin" placeholder="In Time"
                                                                            value="10:00">
                                                                    </td>
                                                                    <td>
                                                                        <input type="time" name="checkout[]"
                                                                            id="checkout" placeholder="Out Time"
                                                                            value="19:00">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div style="text-align: right;">
                                            <button class="btn btn-primary mt-4" type="submit"
                                                onclick="openModall()">submit
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M3.1735 12.54C3.1735 12.54 3.22683 12.54 3.24683 12.54L5.20016 12.36C5.4735 12.3333 5.72683 12.2133 5.92016 12.02L13.2935 4.64668C13.6402 4.30001 13.8335 3.84001 13.8335 3.35335C13.8335 2.86668 13.6402 2.40668 13.2935 2.06001L12.8202 1.58668C12.1268 0.893348 10.9202 0.893348 10.2268 1.58668L9.28683 2.52668L2.86016 8.95335C2.66683 9.14668 2.54683 9.40001 2.52683 9.67335L2.34683 11.6267C2.32683 11.8733 2.4135 12.1133 2.58683 12.2933C2.74683 12.4533 2.9535 12.54 3.1735 12.54ZM11.5268 2.04668C11.7402 2.04668 11.9535 2.12668 12.1135 2.29335L12.5868 2.76668C12.7468 2.92668 12.8335 3.13335 12.8335 3.35335C12.8335 3.57335 12.7468 3.78668 12.5868 3.94001L12.0002 4.52668L10.3535 2.88001L10.9402 2.29335C11.1002 2.13335 11.3135 2.04668 11.5268 2.04668ZM3.52016 9.76668C3.52016 9.72668 3.54016 9.69335 3.56683 9.66668L9.64016 3.58668L11.2868 5.23335L5.2135 11.3067C5.2135 11.3067 5.14683 11.3533 5.1135 11.3533L3.36016 11.5133L3.52016 9.76001V9.76668ZM15.1668 14.6667C15.1668 14.94 14.9402 15.1667 14.6668 15.1667H1.3335C1.06016 15.1667 0.833496 14.94 0.833496 14.6667C0.833496 14.3933 1.06016 14.1667 1.3335 14.1667H14.6668C14.9402 14.1667 15.1668 14.3933 15.1668 14.6667Z"
                                                    fill="black" />
                                            </svg> --}}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="employ_box mt-5" id="attendace">
                    <div class="table-responsive table_main">
                        <table class="table mb-0">
                            <thead class="attendance_thead">
                                <tr>
                                    <th>Date</th>
                                    <th>Emp.Id</th>
                                    <th>Name</th>
                                    <th>Attendance</th>
                                    <th scope="col">In Time</th>
                                    <th scope="col">Out Time</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody class="attendance_table" id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal" id="modifyAttend" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Attendace</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form class="pt-3" id="modifyAttendace"  name="modifyAttendace">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="editattdate">Date</label>
                                        <input class="form-control" type="date" id="editattdate" name="editattdate"  value="{{ now()->format('Y-m-d') }}">
                                        {{-- <input type="hidden" id="encryptid" name="encryptid"> --}}
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="empid">Emp.Id</label>
                                        <input class="form-control" type="text" id="editattempid" name="editattempid">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="empname">Emp. Name</label>
                                        <input class="form-control" type="text" id="editattname" name="editattname">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="att">Attendace</label>
                                        <input class="form-control" type="text" id="editAtt" name="editAtt">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editcheckin">Check In</label>
                                        <input class="form-control" type="text" id="editchkechintime" name="editchkechintime">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="editcheckout">Check Out</label>
                                        <input class="form-control" type="text" id="editcheckouttime" name="editcheckouttime">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" id="saveChanges">Update</button>
                                      </div>
                                </div>
                            </form>
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
        $(document).ready(function() {
            // Submit form using Ajax
            $(document).on("submit", "#Emp-Attendance", function(e) {
                e.preventDefault();

                let formData = $(this).serializeArray();
                $("button[type=submit]").prop('disabled', true);

                $.ajax({
                    url: "{{ route('attend.store') }}",
                    type: 'post',
                    data: formData,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        $("button[type=submit]").prop('disabled', false);

                        if (res.status == 'success') {
                            alert('Data inserted successfully!');
                            window.location.href = "{{ route('attend.index') }}";
                        } else {
                            alert('Error: ' + res.errors);
                        }
                    }
                });
            });

            // Fetch user details using Ajax
            $(document).on("click", ".Emp-Attendance", function(e) {
                e.preventDefault();

                var empid = $(this).attr("empid");
                $("button[type=submit]").prop('disabled', true);

                $.ajax({
                    url: "{{ route('attend.userDetails') }}",
                    type: 'get',
                    data: {
                        empid: empid
                    },
                    dataType: 'json',
                    success: function(res) {
                        $("button[type=submit]").prop('disabled', false);

                        if (res.statusss == 'success') {
                            $("#empid").val(res.empid);
                            $("#empname").val(res.details.firstName);
                        }
                    }
                });
            });
        });

        //Get Dates
        function showAttendace() {
            let date = $("#attendaceDate").val();

            $.ajax({
                url: "{{ route('attend.Attends', ['date' => '']) }}/" + date,
                type: 'get',
                data: {
                    date: date
                },
                dataType: 'json',
                success: function(res) {
                    if (res.status == 'success') {
                        let datarow = res.date;
                        let tablebody = $("#tbody");
                        tablebody.empty();

                        $.each(datarow, function(index, date) {
                            let row = "<tr>" +
                                "<td>" + date.date + "</td>" +
                                "<td>" + date.empid + "</td>" +
                                "<td>" + date.empName + "</td>" +
                                "<td>" + date.checkIn + "</td>" +
                                "<td>" + date.checkOut + "</td>" +
                                "<td>" + date.attendace + "</td>" +
                                "<td><button class='btn btn-primary mt-4 editAttendace' data-id='" + date.empid + "'>" +
                                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16' fill='none'>" +
                                "<path d='M3.1735 12.54C3.1735 12.54 3.22683 12.54 3.24683 12.54L5.20016 12.36C5.4735 12.3333 5.72683 12.2133 5.92016 12.02L13.2935 4.64668C13.6402 4.30001 13.8335 3.84001 13.8335 3.35335C13.8335 2.86668 13.6402 2.40668 13.2935 2.06001L12.8202 1.58668C12.1268 0.893348 10.9202 0.893348 10.2268 1.58668L9.28683 2.52668L2.86016 8.95335C2.66683 9.14668 2.54683 9.40001 2.52683 9.67335L2.34683 11.6267C2.32683 11.8733 2.4135 12.1133 2.58683 12.2933C2.74683 12.4533 2.9535 12.54 3.1735 12.54ZM11.5268 2.04668C11.7402 2.04668 11.9535 2.12668 12.1135 2.29335L12.5868 2.76668C12.7468 2.92668 12.8335 3.13335 12.8335 3.35335C12.8335 3.57335 12.7468 3.78668 12.5868 3.94001L12.0002 4.52668L10.3535 2.88001L10.9402 2.29335C11.1002 2.13335 11.3135 2.04668 11.5268 2.04668ZM3.52016 9.76668C3.52016 9.72668 3.54016 9.69335 3.56683 9.66668L9.64016 3.58668L11.2868 5.23335L5.2135 11.3067C5.2135 11.3067 5.14683 11.3533 5.1135 11.3533L3.36016 11.5133L3.52016 9.76001V9.76668ZM15.1668 14.6667C15.1668 14.94 14.9402 15.1667 14.6668 15.1667H1.3335C1.06016 15.1667 0.833496 14.94 0.833496 14.6667C0.833496 14.3933 1.06016 14.1667 1.3335 14.1667H14.6668C14.9402 14.1667 15.1668 14.3933 15.1668 14.6667Z' fill='black' />" +
                                "</svg>" +
                                "</button></td>" +
                                "</tr>";

                            tablebody.append(row);
                        });

                    }
                }
            });
        }

       $(document).ready(function(){
            $(document).on("click", ".editAttendace", function(e) {
                e.preventDefault();
                let empid = $(this).attr("data-id");


                $.ajax({
                    url: "{{ route('attend.edit') }}",
                    type: 'post',
                    data: { empid: empid },
                    dataType: 'json',
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {

                        if(res.status == 'success'){
                            $("#modifyAttend").modal('show');
                            $("#editattdate").val(res.attend.date);
                            $("#editattempid").val(res.empid);
                            $("#editattname").val(res.attend.empName);
                            $("#editAtt").val(res.attend.attendace);
                            $("#editchkechintime").val(res.attend.checkIn);
                            $("#editcheckouttime").val(res.attend.checkOut);
                        }
                    }
                });
            });


            //update Attendace
            $(document).on("submit","#modifyAttendace",function(e){
                e.preventDefault();

                let formData = $(this).serializeArray();
                formData.push({ name: 'empid', value: $('#editattempid').val() });

                $("button[type=submit]").prop('disabled',true);


                $.ajax({
                    url:"{{route('attend.update')}}",
                    type:"post",
                    data:formData,
                    dataType:'json',
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    success:function(res){
                        $("button[type=submit]").prop('disabled',false);

                        if(res.status == 'success'){

                           $("#editattdate"+res.empid).val(res.date);
                           $("#editattempid"+res.empid).val(res.empid);
                           $("#editattname"+res.empid).val(res.empName);
                           $("#editAtt"+res.empid).val(res.attendace);
                           $("#editchkechintime"+res.empid).val(res.checkIn);
                           $("#editcheckouttime"+res.empid).val(res.checkOut);

                           $("#modifyAttend").modal('hide');
                           $("#refreshtable").DataTable().api().ajax.reload();
                        }
                    }
                });
            });


       });




    </script>
@endsection
