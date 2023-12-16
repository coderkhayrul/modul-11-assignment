@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-3 my-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa-3x fa-solid fa-money-bills text-primary"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">৳{{ $todaySell }}</h5>
                                    <p class="card-text">Today Sell</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 my-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa-3x fa-solid fa-money-bills text-primary"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">৳{{ $yesterdaySell }}</h5>
                                    <p class="card-text">Yesterday Sell</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 my-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa-3x fa-solid fa-money-bills text-primary"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">৳{{ $last7DaysSell }}</h5>
                                    <p class="card-text">Last 7 Days</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 my-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa-3x fa-solid fa-money-bills text-primary"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">৳{{ $last30DaysSell }}</h5>
                                    <p class="card-text">Last 30 Days</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 my-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa-3x fa-solid fa-money-bills text-primary"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">৳{{ $thisMonthSell }}</h5>
                                    <p class="card-text">This Month Sell</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 my-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa-3x fa-solid fa-money-bills text-primary"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">৳{{ $lastMonthSell }}</h5>
                                    <p class="card-text">Last Month Sell</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 my-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa-3x fa-solid fa-money-bills text-primary"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">৳{{ $thisYearSell }}</h5>
                                    <p class="card-text">This Year Sell</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 my-2">
                            <div class="card">
                                <div class="card-img-top text-center mt-3">
                                    <i class="fa-3x fa-solid fa-money-bill-trend-up text-danger"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">৳{{ $allTimeSell }}</h5>
                                    <p class="card-text fs-5">All Time Sell</p>
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
