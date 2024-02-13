@extends('layout.component')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="main_headings">Add Employee</h1>
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
                            <h4 class="bg_primary p-4">Employee Details</h4>
                            <form id="EmployeeForm" name="EmployeeForm" class="p-4">
                                <h5 class="pb-2">Personal Profile</h5>
                                <div class="row pb-3">
                                    <div class="col-md-3 emp_inputs">
                                        <label for="fName">First Name</label>
                                        <input class="form-control" type="text" id="fName" name="fName">
                                    </div>
                                    <div class="col-md-3 emp_inputs">
                                        <label for="lName">Last Name</label>
                                        <input class="form-control" type="text" id="lName" name="lName" required>
                                    </div>
                                    <div class="col-md-3 emp_inputs">
                                        <label for="Gender">Gender</label>
                                        <select name="Gender" id="Gender" class="form-control" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 emp_inputs">
                                        <label for="Designation">Designation</label>
                                        <input class="form-control" type="text" id="Designation" name="Designation"
                                            required>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="date">DoB</label>
                                        <input class="form-control" type="date" id="date" name="date"  required>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" id="email" name="email" required>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="Phone">Phone</label>
                                        <input class="form-control" type="tel" id="Phone" name="Phone" required>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="parents">Parents</label>
                                        <select name="parents" id="parents" class="form-control" required>
                                            <option value="selectname">Select Name</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="parentsName">Parents Name</label>
                                        <input class="form-control" type="text" id="parentsName" name="parentsName" required>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="altPhone">Emergency No</label>
                                        <input class="form-control" type="number" id="altPhone" name="altPhone" required>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="Salary">Salary</label>
                                        <input class="form-control" type="number" id="Salary" name="Salary" required>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="AddharNo">Addhar No</label>
                                        <textarea class="form-control" name="AddharNo" id="AddharNo" rows="1" required></textarea>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="bloodgroup">Blood Group</label>
                                        <input class="form-control" type="text" id="bloodgroup" name="bloodgroup" required>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="panno">Pan No</label>
                                        <textarea class="form-control" name="panno" id="panno" rows="1" required></textarea>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="Address">Address</label>
                                        <textarea class="form-control" name="Address" id="Address" rows="1" required></textarea>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="Country">Country</label>
                                        <select name="Country" id="Country" class="form-control" required>
                                            @if (!empty($countries))
                                                <option value="country">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="State">State</label>
                                        <select name="State" id="State" class="form-control" required>
                                            <option value="state">Select State</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="City">City</label>
                                        <select name="City" id="City" class="form-control" required>
                                            <option value="city">Select City</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="Pcode">Pin Code</label>
                                        <input class="form-control" type="number" id="Pcode" name="Pcode"
                                            required>
                                    </div>
                                    <div class="col-md-3 pt-4 emp_inputs">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="status">Select Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <hr>
                                <h5 class="pb-2">Bank Details</h5>
                                <div class="row pb-3">
                                    <div class="col-md-3 emp_inputs">
                                        <label for="Holdername">Account Holder's Name</label>
                                        <input class="form-control" type="text" id="Holdername" name="Holdername"
                                            required>
                                    </div>
                                    <div class="col-md-3 emp_inputs">
                                        <label for="Account">Account Number</label>
                                        <input class="form-control" type="number" id="Account" name="Account"
                                            required>
                                    </div>
                                    <div class="col-md-3 emp_inputs">
                                        <label for="Bank">Bank Name</label>
                                        <input class="form-control" type="text" id="Bank" name="Bank"
                                            required>
                                    </div>
                                    <div class="col-md-3 emp_inputs">
                                        <label for="IFSC">IFSC</label>
                                        <input class="form-control" type="text" id="IFSC" name="IFSC"
                                            required>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="pb-2">Upload Documents</h5>
                                <div class="row">
                                    <div class="col-md-3 pt-4">
                                        <div class="photo_upload text-center">
                                            <div class="photo_upload_inner">
                                                <div class="text-left">
                                                    <label for="photo">Photo</label>
                                                </div>
                                                <img src="http://placehold.it/180" id="blah" alt="Image"
                                                    class="upload">
                                                <label for="photo" class="custom-file-upload">Upload</label>
                                                <button class="close_btn" type="button" onclick="removeImg()">Remove
                                                </button>
                                            </div>
                                            <input class="inputFile" type="file" id="photo" name="image"
                                                onchange="readUrl(this)" value="{{ old('photo') }}"
                                                style="display: none;">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pt-4">
                                        <div class="file_upload text-center">
                                            <div class="file_upload_inner">
                                                <div class="text-left">
                                                    <label for="resume">Resume</label>
                                                </div>
                                                <div class="preview-container">
                                                    <img src="http://placehold.it/180" id="resumePreview" alt="Resume Preview" class="upload">
                                                    <embed id="resumePdfPreview" type="application/pdf" width="100%" height="150" style="display:none; border-radius: 10px;">
                                                </div>
                                                <label for="resumeFile" class="custom-file-upload">Upload</label>
                                                <button class="close_btn" type="button" onclick="removeResume()">Remove</button>
                                            </div>
                                            <input class="inputFile" type="file" id="resumeFile" name="resume" onchange="readResume(this)"
                                                value="{{ old('resume') }}" style="display: none;">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pt-4">
                                        <div class="photo_upload text-center">
                                            <div class="photo_upload_inner">
                                                <div class="text-left">
                                                    <label for="photo">Adhar Card</label>
                                                </div>
                                                <img src="http://placehold.it/180" id="upload3" alt="Image" class="upload">
                                                <label for="photo3" class="custom-file-upload">Upload</label>
                                                <button class="close_btn" type="button" onclick="removeImg3()">Remove
                                                </button>
                                            </div>
                                            <input class="inputFile" type="file" id="photo3" name="addharimage"
                                                onchange="readUrl3(this)" value="{{ old('photo') }}"
                                                style="display: none;">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pt-4">
                                        <div class="photo_upload text-center">
                                            <div class="photo_upload_inner">
                                                <div class="text-left">
                                                    <label for="photo">Pan Card</label>
                                                </div>
                                                <img src="http://placehold.it/180" id="upload4" alt="Image" class="upload4">
                                                <label for="photo4" class="custom-file-upload">Upload</label>
                                                <button class="close_btn" type="button"
                                                    onclick="removeImg4()">Remove</button>
                                            </div>
                                            <input class="inputFile" type="file" id="photo4" name="panimage"
                                                onchange="readUrl4(this)" value="{{ old('photo4') }}"
                                                style="display: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4 text-right">
                                    <button type="submit" class="btn btn_primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </section>
    @endsection


    @section('customJs')
        <script>

             //-----Save Employees Details------//
           $(document).ready(function(){
                $(document).on("submit", "#EmployeeForm", function(e) {
                    e.preventDefault();

                    var formData = new FormData($(this)[0]);

                    $("button[type=submit]").prop('disabled', true);

                    $.ajax({
                        url: "{{ route('emp.store') }}",
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            $("button[type=submit]").prop('disabled', false);

                            if (res.status == true) {
                                window.location.href = "{{ route('emp.index') }}";
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
           });

            //-------Fetch States------------//
            $(document).ready(function() {
                $('#Country').change(function() {
                    var country_id = $(this).val();
                    $.ajax({
                        url: "{{ url('/fetchstates/') }}/" + country_id,
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        success: function(res) {
                            $('#State').find('option:not(:first)').remove();
                            $('#City').find('option:not(:first)').remove();

                            if (res['states'].length > 0) {
                                $.each(res['states'], function(key, value) {
                                    $('#State').append("<option value='" + value['id'] +
                                        "'>" + value['name'] + "</option>")
                                });
                            }
                        },
                    });
                });
            });


            //-------Fetch Cities----//
            $('#State').change(function() {
                var state_id = $(this).val();
                $.ajax({
                    url: "{{ url('/fetchcities/') }}/" + state_id,
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#City').find('option:not(:first)').remove();

                        if (res['cities'].length > 0) {
                            $.each(res['cities'], function(key, value) {
                                $('#City').append("<option value='" + value['id'] + "'>" + value[
                                    'name'] + "</option>")
                            });
                        }
                    },
                });
            });


        </script>
    @endsection
