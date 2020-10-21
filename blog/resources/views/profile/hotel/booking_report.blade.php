@extends('useradmin.master')



@section('userdash')
<div class="col-md-9">
    <div class="user-form-settings">
        <div class="breadcrumb-page-bar" aria-label="breadcrumb">
            <ul class="page-breadcrumb">
                <li class="">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class=" active">
                    Booking Report
                </li>
            </ul>
            <div class="bravo-more-menu-user">
                <i class="icofont-settings"></i>
            </div>
        </div>
        <h2 class="title-bar no-border-bottom">
            Booking Report
        </h2>
        <div class="booking-history-manager">
            <div class="tabbable">
                <ul class="nav nav-tabs ht-nav-tabs">
                    
                    @if (URL::current()==url('/').'/booking_report')
                    <li class=" active ">
                        <a href="/booking_report">All Booking</a>
                    </li>
                    @else
                    <li class="">
                        <a href="/booking_report">All Booking</a>
                    </li>
                    @endif
                    @if (URL::current()==url('/').'/booking_report/completed')

                    <li class="active">

                        <a href="/booking_report/completed">Completed</a>
                    </li>
                    @else
                    <li class="">

                        <a href="/booking_report/completed">Completed</a>
                    </li>

                    @endif
                    @if (URL::current()==url('/').'/booking_report/processing')
                    
                    <li class="active">
                        <a href="/booking_report/processing">Processing</a>
                    </li>
                    @else
                    <li class="">
                        <a href="/booking_report/processing">Processing</a>
                    </li>
                    @endif


                    @if (URL::current()==url('/').'/booking_report/confirmed')

                    <li class="active">
                        <a href="/booking_report/confirmed">Confirmed</a>
                    </li>
                    @else
                    <li class="">
                        <a href="/booking_report/confirmed">Confirmed</a>
                    </li>
                    @endif

                    @if(URL::current()==url('/').'/booking_report/cancelled')
                    <li class="active">
                        <a href="/booking_report/cancelled">Cancelled</a>
                    </li>
                    @else

                    <li class="">
                        <a href="/booking_report/cancelled">Cancelled</a>
                    </li>

                    @endif


                    @if(URL::current()==url('/').'/booking_report/paid')
                    
                    <li class="active">
                        <a href="/booking_report/paid">Paid</a>
                    </li>
                    @else

                    <li class="">
                        <a href="/booking_report/paid">Paid</a>
                    </li>
                    @endif
                    @if(URL::current()==url('/').'/booking_report/unpaid')

                    <li class="active">
                        <a href="/booking_report/unpaid">Unpaid</a>
                    </li>
                    @else
                    <li class="">
                        <a href="/booking_report/unpaid">Unpaid</a>
                    </li>
                    @endif

                    @if(URL::current()==url('/').'/booking_report/partial_payment')

                    <li class="active">
                        <a href="/booking_report/partial_payment">Partial Payment</a>
                    </li>
                    @else

                    <li class="">
                        <a href="/booking_report/partial_payment">Partial Payment</a>
                    </li>
                    @endif
                </ul>
                No Booking History
            </div>
        </div>
    </div>
</div>

@endsection
