@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <a href="/change-password">
            <button type="button" class="btn btn-info">Change password</button>
            </a>
            <a href="/register" style="color:white">
                <button type="button" class="btn btn-primary" style="float: right">Add new admin</button>
            </a>
            <br><br><br>
            <div class="card">
                <div class="card-header text-center">{{ __('Welcome!, you are logged in as an Administrator.') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- FEATURES COUNT --}}
                    <div class="row">
                        <div class="col-md-12">
                            <a href = "/users">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">
                                        Registered Users
                                        <h2 class="text-white">{{ $users }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    News
                                    <h2 class="text-white">{{ $newscount }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Announcement
                                    <h2 class="text-white">{{ $announcementcount }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Event
                                    <h2 class="text-white">{{ $eventcount }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Project
                                    <h2 class="text-white">{{ $projectcount }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Complaints (Ongoing)
                                    <h2 class="text-white">{{ $complaintcount }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Complaints (Solved)
                                    <h2 class="text-white">{{ $solvedcomplaintcount }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Document Requests
                                    <h2 class="text-white">{{ $totaldocumentcount }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Document Processed
                                    <h2 class="text-white">{{ $totaldocumentcount1 }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Business Promotions
                                    <h2 class="text-white">{{ $business }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Establishment Promotions
                                    <h2 class="text-white">{{ $establishment }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">
                                    Barangay Achievement
                                    <h2 class="text-white">{{ $achievement }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
