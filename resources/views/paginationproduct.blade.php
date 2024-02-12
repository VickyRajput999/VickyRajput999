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


