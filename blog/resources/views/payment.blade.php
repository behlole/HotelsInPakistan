@extends('layout.master')

@section('content')
<div class="theme-page-section theme-page-section-xl theme-page-section-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="theme-payment-success">
              <div class="theme-payment-success-header">
                <i class="fa fa-check-circle theme-payment-success-header-icon"></i>
                <h1 class="theme-payment-success-title">Payment Successful</h1>
                <p class="theme-payment-success-subtitle">We have emailed you the receipt.</p>
              </div>
              <div class="theme-payment-success-box">
                <ul class="theme-payment-success-summary">
                  <li>Payment ID
                    <span>#7249874</span>
                  </li>
                  <li>Date
                    <span>9/25/2017 12:24pm</span>
                  </li>
                  <li>Customer
                    <span>John Doe</span>
                  </li>
                  <li>Paid to
                    <span>Bookify group inc.</span>
                  </li>
                  <li>Payment method
                    <span>Visa credit card</span>
                  </li>
                  <li>Subject
                    <span>Vacation Rental</span>
                  </li>
                  <li>Amount paid
                    <span>$753.85</span>
                  </li>
                </ul>
                <p class="theme-payment-success-check-order">You can check your order details in your
                  <a href="account-history.html">account page</a>.
                </p>
              </div>
              <ul class="theme-payment-success-actions">
                <li>
                  <a href="#">
                    <i class="fa fa-file-pdf-o"></i>
                    <p>PDF
                      <br/>receipt
                    </p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-print"></i>
                    <p>Print
                      <br/>receipt
                    </p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-envelope-o"></i>
                    <p>SMS
                      <br/>receipt
                    </p>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection