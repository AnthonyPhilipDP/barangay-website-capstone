@extends('layouts.app')

@section('content')
    <div class="text-center">
        <br><br>
        {{--  --}}
        @if (count($business) > 0)
        <div class="card">
            <div class="card-header">
                Business Promotions
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    
                    <thead>
                    <tr>
                        <th>Business No.</th>
                        <th>Business Owner</th>
                        <th>Promotion Status</th>
                        <th>Date Issued</th>
                        <th></th>

                    </tr>
                    </thead>
                    @foreach ($business as $business1)
                    <tbody>
                    <tr>
                        <td>{{ $business1->id }}</td>
                        @if($business1->suffix == 0)
                        <td>{{ $business1->fullName }}</td>
                        @else
                        <td>{{ $business1->fullNameWithSuffix }}</td>
                        @endif
                        <td>
                            @if ( $business1->pending  == 'true')
                            Pending
                            @else
                            Approved
                            @endif
                        </td>
                        <td>{{ $business1->created_at->format('F') }} {{ $business1->created_at->format('d') }}, {{ $business1->created_at->format('Y') }}</td>
                        <td>             
                            <a href="businesses/{{$business1->id}}">
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
        @else
            <p>Nothing here.</p>
        @endif    
        <br>
        <div class="pagination justify-content-center">
        {{-- {{ $business->links()}} --}}
        </div>
    </div>        

@endsection
