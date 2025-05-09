
@extends('fronted.layout.app')

@section('title', 'Contect')

@section('content')

<!-- contact section -->
<section class="contact_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2 style="margin-top:80px">
          Contact
        </h2>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" placeholder="Full Name" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Phone Number" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="btn_box">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-5">
          <div class="img-box">
            <img src="{{('assets/images/new-cars-model/ncm1.png')}}" alt="contact image">
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
