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
            <td><span id="sdates{{ $holiday->id }}">{{ \Carbon\Carbon::parse($holiday->startDate)->format('d-m-Y') }}</span></td>
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
