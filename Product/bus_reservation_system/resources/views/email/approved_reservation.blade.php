@component('mail::message')
# Bus Reservation.

You have successful reserved bus, The relevent details attach in below.<br>
Bus Name: {{ $data['bus_name'] }}<br>
Time/Date: {{ $data['date_time'] }}<br>
Number of seats: {{ $data['no_of_seats'] }}<br>
Seat No(s): @foreach($data['seats_no'] as $seat){{ $seat }}, @endforeach<br>
Total Price: {{ $data['total_price'] }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
