@extends('layouts.app')

@section('content')
    <div class="text-center">
        <br><br>
        {{--  --}}
        @if (count($establishment) > 0)
        <div class="card">
            <div class="card-header">
                Establishment Promotions
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    
                    <thead>
                    <tr>
                        <th>Establishment No.</th>
                        <th>Establishment Owner</th>
                        <th>Promotion Status</th>
                        <th>Date Issued</th>
                        <th></th>

                    </tr>
                    </thead>
                    @foreach ($establishment as $establishment1)
                    <tbody>
                    <tr>
                        <td>{{ $establishment1->id }}</td>
                        @if($establishment1->suffix == 0)
                        <td>{{ $establishment1->fullName }}</td>
                        @else
                        <td>{{ $establishment1->fullNameWithSuffix }}</td>
                        @endif
                        <td>
                            @if ( $establishment1->pending  == 'true')
                            Pending
                            @else
                            Approved
                            @endif
                        </td>
                        <td>{{ $establishment1->created_at->format('F') }} {{ $establishment1->created_at->format('d') }}, {{ $establishment1->created_at->format('Y') }}</td>
                        <td>             
                            <a href="establishments/{{$establishment1->id}}">
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
