<h2>Car Booking Confirmation</h2>

<p>Dear {{ $rent->user->name }},</p>

<p>Your booking for the car <strong>{{ $rent->car->brand }} {{ $rent->car->model }}</strong> has been confirmed.</p>

<ul>
    <li>Start Date: {{ $rent->start_date }}</li>
    <li>End Date: {{ $rent->end_date }}</li>
    <li>Daily Rent: BDT {{ $rent->total_cost }}</li>
</ul>

<p>Thank you for choosing our service.</p>

