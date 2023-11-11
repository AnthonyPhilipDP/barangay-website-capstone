@extends('layouts.app')

@section('content')

    <hr>
    <h1 class="text-center">Documents Requests</h1>
    <hr>
    
    <div class="text-center">
        <button class="btn btn-primary" type="button" title="Show Clearance Request/s">
            <a id="clearances" href="#" style="color: white"
            onclick="$('.clearances').slideToggle(function(){$('#clearances').html($('.clearances').is(':visible')?
            'Hide Clearance':'Show Clearance');});">
            Show Clearance</a>
        </button>&emsp;
        <button class="btn btn-primary" type="button" title="Show Certification Request/s">
            <a id="indigencies" href="#" style="color: white"
            onclick="$('.indigencies').slideToggle(function(){$('#indigencies').html($('.indigencies').is(':visible')?
            'Hide Indigency':'Show Indigency');});">
            Show Indigency</a>
        </button>&emsp;
        <button class="btn btn-primary" type="button" title="Show Business Clearance Request/s">
            <a id="businessclearances" href="#" style="color: white"
            onclick="$('.businessclearances').slideToggle(function(){$('#businessclearances').html($('.businessclearances').is(':visible')?
            'Hide Business Clearance':'Show Business Clearance');});">
            Show Business Clearance</a>
        </button>&emsp;
        <button class="btn btn-primary" type="button" title="Show Barangay Residency Request/s">
            <a id="residencies" href="#" style="color: white"
            onclick="$('.residencies').slideToggle(function(){$('#residencies').html($('.residencies').is(':visible')?
            'Hide Residency':'Show Residency');});">
            Show Residency</a>
        </button>
    </div>
    <br>
    <div class="clearances text-center" style="display:none">
        @if (count($clearance) > 0)
        <div class="card">
            <div class="card-header">
                Clearance Report Logs
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Clearance Request No.</th>
                        <th>Name of Requestor</th>
                        <th>Notified</th>
                        <th>Status</th>
                        <th>Date Issued</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach ($clearance as $clearance1)
                    <tbody>
                    <tr>
                        <td>{{ $clearance1->id }}</td>
                        <td style="text-transform: capitalize">{{ $clearance1->name }}</td>
                        <td>
                            @if ( $clearance1->notified  == 'false')
                            No
                            @else
                            Yes
                            @endif
                        </td>
                        <td>
                            @if ( $clearance1->done  == 'false')
                            Pending
                            @else
                            Claimed
                            @endif
                        </td>
                        <td>{{ $clearance1->created_at->format('F') }} {{ $clearance1->created_at->format('d') }}, {{ $clearance1->created_at->format('Y') }}</td>
                        <td>             
                            <a href="clearance/{{$clearance1->id}}">
                                <button class="btn btn-outline-success" type="button" title="View this request">
                                    View
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            No Barangay Clearance requests yet.
        @endif
    </div>
    <div class="indigencies text-center" style="display:none">
        @if (count($indigency) > 0)
        <div class="card">
            <div class="card-header">
                Indigency Report Logs
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Certification Request No.</th>
                        <th>Name of Requestor</th>
                        <th>Notified</th>
                        <th>Status</th>
                        <th>Date Issued</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach ($indigency as $certification)
                    <tbody>
                    <tr>
                        <td>{{ $certification->id }}</td>
                        <td style="text-transform: capitalize">{{ $certification->name }}</td>
                        <td>
                            @if ( $certification->notified  == 'false')
                            No
                            @else
                            Yes
                            @endif
                        </td>
                        <td>
                            @if ( $certification->done  == 'false')
                            Pending
                            @else
                            Claimed
                            @endif
                        </td>
                        <td>{{ $certification->created_at->format('F') }} {{ $certification->created_at->format('d') }}, {{ $certification->created_at->format('Y') }}</td>
                        <td>             
                            <a href="indigency/{{$certification->id}}">
                                <button class="btn btn-outline-success" type="button" title="View this request">
                                    View
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        No Barangay Certification (Indigency) requests yet.
        @endif
    </div>
    <div class="businessclearances text-center" style="display:none">
        @if (count($businessclearance) > 0)
        <div class="card">
            <div class="card-header">
                Business Clearance Report Logs
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Business Clearance Request No.</th>
                        <th>Name of Requestor</th>
                        <th>Notified</th>
                        <th>Status</th>
                        <th>Date Issued</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach ($businessclearance as $businessclearance1)
                    <tbody>
                    <tr>
                        <td>{{ $businessclearance1->id }}</td>
                        <td style="text-transform: capitalize">{{ $businessclearance1->name }}</td>
                        <td>
                            @if ( $businessclearance1->notified  == 'false')
                            No
                            @else
                            Yes
                            @endif
                        </td>
                        <td>
                            @if ( $businessclearance1->done  == 'false')
                            Pending
                            @else
                            Claimed
                            @endif
                        </td>
                        <td>{{ $businessclearance1->created_at->format('F') }} {{ $businessclearance1->created_at->format('d') }}, {{ $businessclearance1->created_at->format('Y') }}</td>
                        <td>             
                            <a href="businessclearance/{{$businessclearance1->id}}">
                                <button class="btn btn-outline-success" type="button" title="View this request">
                                    View
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        No Barangay Business Clearance requests yet.
        @endif
    </div>
    <div class="residencies text-center" style="display:none">
        @if (count($residency) > 0)
        <div class="card">
            <div class="card-header">
                Certificate of Residency Report Logs
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Residency Request No.</th>
                        <th>Name of Requestor</th>
                        <th>Notified</th>
                        <th>Status</th>
                        <th>Date Issued</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach ($residency as $residency1)
                    <tbody>
                    <tr>
                        <td>{{ $residency1->id }}</td>
                        <td style="text-transform: capitalize">{{ $residency1->name }}</td>
                        <td>
                            @if ( $residency1->notified  == 'false')
                            No
                            @else
                            Yes
                            @endif
                        </td>
                        <td>
                            @if ( $residency1->done  == 'false')
                            Pending
                            @else
                            Claimed
                            @endif
                        </td>
                        <td>{{ $residency1->created_at->format('F') }} {{ $residency1->created_at->format('d') }}, {{ $residency1->created_at->format('Y') }}</td>
                        <td>             
                            <a href="residency/{{$residency1->id}}">
                                <button class="btn btn-outline-success" type="button" title="View this request">
                                    View
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        No Barangay Residency requests yet.
        @endif
    </div>
@endsection