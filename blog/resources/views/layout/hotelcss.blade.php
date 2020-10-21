<style type="text/css">
.form-control-feedback {
    top: 11px;
}
body{
  background-color: #e6e6e6;
  background-image:url('{{ URL::asset('img/hotelback.jpg') }}');
    background-size: cover;
    background-position: center;
}
b, strong {
  font-weight: bold;
  font-size: 12px;
}
.help-block{
  color: red;
}
/*#booking {
  font-family: 'Cabin', sans-serif;

  }*/

  .booking-form {
    border-top-left-radius: 16px;
    position: relative;
    max-width: 98%;
    width: 100%;
    margin:auto;
    background: #fff;
    -webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.3);
    box-shadow: 0 0 20px #000 rgba(0, 0, 0, 0.3);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   


  }
  .booking-form .form-control {
  -webkit-box-shadow: inset 0 1px 4px rgba(181, 193, 204, 0.3);
  box-shadow: inset 0 1px 4px rgba(181, 193, 204, 0.3);

  }


  .booking-form .form-control::-webkit-input-placeholder {
    color: #646769;
  }

  .booking-form .form-control:-ms-input-placeholder {
    color: #646769;
  }

  .booking-form .form-control::placeholder {
    color: #dde3e8;
  }

  .booking-form .form-control:focus {
    -webkit-box-shadow: inset 0 1px 4px rgba(181, 193, 204, 0.3);
    box-shadow: inset 0 1px 4px rgba(181, 193, 204, 0.3);
  }

  .booking-form input[type="number"].form-control:invalid {
    color: red;
  }

  .booking-form select.form-control {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  }

  .booking-form select.form-control+.select-arrow {
    position: absolute;
    right: 0px;
    bottom: 4px;
    width: 32px;
    line-height: 32px;
    height: 32px;
    text-align: center;
    pointer-events: none;
  }

  .booking-form select.form-control+.select-arrow:after {
    content: '\279C';
    display: block;
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
    color: #dddee9;
    font-size: 14px;
  }

  .booking-form .form-label {
    color: #76818b;
    font-weight: 700;
    -webkit-transition: 0.2s;
    transition: 0.2s;

    line-height: 28px;
    height: 24px;
    font-size: 14px;
    z-index: 1;
  }

  .booking-form .form-btn {
    margin-top: 10px;
  }

  .booking-form .submit-btn {
    color: #fff;
    background-color: #6499ff;
    font-weight: 700;
    padding: 13px 35px;
    font-size: 16px;
    border: none;
    width: 100%;
  }
   .wizard{
 /* margin: 25px auto;*/
   background: #fff;
 }

 .wizard .nav-tabs {
  position: relative;
  /* margin: 50px auto;*/
  margin: -40px auto;
  margin-bottom: 0;
  border-bottom-color: #e0e0e0;
}

.wizard > div.wizard-inner {
  position: relative;
}



.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
  color: #ff6c2d;
  cursor: default;
  border: 0;
  border-bottom-color: transparent;
}

span.round-tab {
  width: 40px;
  height: 40px;
  line-height: 37px;
  display: inline-block;
  border-radius: 25px;
  background: #fff;
  border: 1px solid #e0e0e0;
  z-index: 0;
  position: absolute;
  left: 0;
  text-align: center;
  font-size: 22px;
}
span.round-tab i{
  color:#555555;
}
.wizard li.active span.round-tab {
  background: #fff;
  border: 2px solid #ff6c2d;

}
.wizard li.active span.round-tab i{
  color: #ff6c2d;
}

span.round-tab:hover {
  color: #ff6c2d;
  border: 2px solid #ff6c2d;
}

.wizard .nav-tabs > li {
  width: 16%;
}

.wizard li:after {
  content: " ";
  position: absolute;
  left: 46%;
  opacity: 0;
  margin: 0 auto;
  bottom: 0px;
  border: 5px solid transparent;
  border-bottom-color: #ff6c2d;
  transition: 0.1s ease-in-out;
}

.wizard li.active:after {
  content: " ";
  position: absolute;
  left: 48%;
  opacity: 1;
  margin: 0 auto;
  bottom: 0px;
  border: 10px solid transparent;
  border-bottom-color: grey;
}

.wizard .nav-tabs > li a {
  width: 23px;
  height: 23px;

  margin: 30px auto;
  border-radius: 80%;
  padding: 0;
}

.wizard .nav-tabs > li a:hover {
  background: transparent;
}

.wizard .tab-pane {
  position: relative;
  padding-top: 20px;
}
.next-step{
  background-color: #ff6c2d;
  border-color: #ff6c2d;
  color: #fff;
}
.next-step:active:hover {
  color: #fff;
  background-color: #f8520b !important;
  border-color: #f8520b !important;
}
.next-step:hover {
  color: #fff;
  background-color: #f8520b !important;
  border-color: #f8520b !important;
}
.wizard h3 {
  margin-top: 0;
}
.tab-content{
  padding: 20px;
}
@media( max-width : 585px ) {

  .wizard {
    width: 90%;
    height: auto !important;
  }

  span.round-tab {
    font-size: 16px;
    width: 50px;
    height: 50px;
    line-height: 50px;
  }

  .wizard .nav-tabs > li a {
    width: 50px;
    height: 50px;
    line-height: 50px;
  }

  .wizard li.active:after {
    content: " ";
    position: absolute;
    left: 25%;
  }


}
 .select2-container--default .select2-selection--single {


    display: block !important;
    width: 100% !important;
    height: 34px !important;
    padding: 6px 12px !important;
    font-size: 14px !important;
    line-height: 1.42857143 !important;
    color: #555 !important;
    background-color: #fff !important;
    background-image: none !important;
    border: 1px solid #ccc !important;
    border-radius: 4px !important;;

  }
  .select2-selection__rendered {
    text-transform: lowercase;
  }
  .select2-selection__rendered::first-letter {

    text-transform: uppercase;
  }
  .dropzone{
        border-radius:25px;
        border:2px dashed #48a0dc;
      }
input[type="radio"] {
    -ms-transform: scale(1.25); /* IE 9 */
    -webkit-transform: scale(1.25); /* Chrome, Safari, Opera */
    transform: scale(1.25);
}
input[type="checkbox"] {
    -ms-transform: scale(1.25); /* IE 9 */
    -webkit-transform: scale(1.25); /* Chrome, Safari, Opera */
    transform: scale(1.25);
}
</style>