@extends('layouts.app')

@section('content')
    <div class="text-center">
        <br><br>
        {{--  --}}
        @if (count($alldocus) > 0)
        <div class="card">
            <div class="card-header">
                Document Requests
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    
                    <thead>
                    <tr>
                        <th>Document type</th>
                        <th>Requested by</th>
                        <th>Request Status</th>
                        <th>Date Issued</th>
                        <th></th>

                    </tr>
                    </thead>
                    @foreach ($alldocus as $docus)
                    <tbody>
                    <tr>
                        <td>{{ $docus->id }}</td>
                        @if($docus->suffix == 0)
                        <td>{{ $docus->lastname }}</td>
                        @else
                        <td>{{ $docus->lastname }}</td>
                        @endif
                        <td>
                            @if ( $docus->done  == 'false')
                            Pending
                            @else
                            Approved
                            @endif
                        </td>
                        <td>{{ $docus->created_at->format('F') }} {{ $docus->created_at->format('d') }}, {{ $docus->created_at->format('Y') }}</td>
                        <td>             
                            <a href="businesses/{{$docus->id}}">
                                <button class="btn btn-outline-success" type="button" title="View this promotion">
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
@endsection
