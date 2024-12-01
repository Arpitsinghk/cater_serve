@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Bookings</h1>

    @if ($bookings->isEmpty())
    <div class="alert alert-warning">No bookings found.</div>
    @else
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Country</th>
                <th>City</th>
                <th>Place</th>
                <th>Date</th>
                <th>Event Type</th>
                <th>No. of Palace</th>
                <th>Diet</th>
                <th>Request</th> <!-- Changed from Status to Request -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->contact_no }}</td>
                <td>{{ $booking->country }}</td>
                <td>{{ $booking->city }}</td>
                <td>{{ $booking->place }}</td>
                <td>{{ $booking->date }}</td>
                <td>{{ $booking->event_type }}</td>
                <td>{{ $booking->no_of_palace }}</td>
                <td>{{ $booking->diet }}</td>
                <td>
                    @if ($booking->request == 'Confirmed')
                    <span class="badge bg-success">Accepted</span>
                    @elseif ($booking->request == 'Rejected')
                    <span class="badge bg-danger">Rejected</span>
                    @else
                    <span class="badge bg-warning">Pending</span>

                    @endif
                </td>

                <td>

                    <form action="{{ route('bookings.accept', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Accept</button>
                    </form>
                    <form action="{{ route('bookings.reject', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                    </form>

                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection