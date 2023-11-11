@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>Complaint Report Logs</h2>
            <ol>
              <li><a href="/">Home</a></li>
              <li>Complaints</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs Section -->
      <br>
      <section class="inner-page pt-4">
        <div class="container">
            <div class="text-center">
                <div class="mx-auto pull-right" style="float: right;">
                    <div class="">
                            <div class="input-group">
                                <a href="{{ route('complaints.create') }}">
                                    <button class="btn btn-info btn-lg" type="button" title="Create a complaint">
                                        File complaint
                                    </button>
                                </a>
                            </div>
                    </div>
                </div>
                <div class="mx-auto pull-right" style="float: left;">
                    <div class="">
                        <form action="{{ route('complaints.index') }}" method="GET" role="search">
                            <div class="input-group">
                                <a href="{{ route('complaints.index') }}">
                                    <button class="btn btn-dark" type="button" title="Refresh page">
                                        Refresh
                                    </button>
                                </a>&emsp;
                                <div class="col-xs-1">
                                <input type="text" class="form-control" name="term" placeholder="Search Name" id="term">
                                </div>&emsp;
                                <button class="btn btn-secondary" type="submit" title="Search Name">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br><br>
                {{--  --}}
                @if (count($complaint) > 0)
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            
                            <thead>
                            <tr>
                                <th>Complaint No.</th>
                                <th>Name of Complainant</th>
                                <th>Notified</th>
                                <th>Case Status</th>
                                <th>Date Issued</th>
                                <th></th>
        
                            </tr>
                            </thead>
                            @foreach ($complaint as $complaint1)
                            <tbody>
                            <tr>
                                <td>{{ $complaint1->id }}</td>
                                <td>{{ $complaint1->nagrereklamo }}</td>
                                <td>
                                    @if ( $complaint1->notified  == 'true')
                                    True
                                    @else
                                    False
                                    @endif
                                </td>
                                <td>
                                    @if ( $complaint1->solved  == 'true')
                                    Solved
                                    @else
                                    Ongoing
                                    @endif
                                </td>
                                <td>{{ $complaint1->created_at->format('F') }} {{ $complaint1->created_at->format('d') }}, {{ $complaint1->created_at->format('Y') }}</td>
                                <td>             
                                    <a href="complaints/{{$complaint1->id}}">
                                        <button class="btn btn-outline-success" type="button" title="View this complaint">
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
                {{ $complaint->links()}}
                </div>
            </div>
        </div>
      </section>
@endsection