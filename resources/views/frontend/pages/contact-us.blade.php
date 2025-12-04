@extends('layouts.frontend.app')
@section('content')
    <x-breadcrumb title="Contact Us" :links="[['name' => 'Home', 'url' => route('home')], ['name' => 'Contact Us', 'url' => '#']]" />


    <div class="ltn__contact-message-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                @if ($contact)
                    <div class="col-lg-5">
                        <div class="col-lg-12">
                            <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                                <div class="row">
                                    <div class="col-lg-4 ltn__contact-address-icon">
                                        <img src="{{ asset('frontend/assets/img/others/call.png') }}" alt="Call Image">
                                    </div>
                                    <div class="col-lg-8 ltn__contact-address-text">
                                        <h3>Phone Number</h3>
                                        <a href="tel:{{ $contact->phone_number }}">{{ $contact->phone_number }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                                <div class="row">
                                    <div class="col-lg-4 ltn__contact-address-icon">
                                        <img src="{{ asset('frontend/assets/img/others/email.png') }}" alt="Email Image">
                                    </div>
                                    <div class="col-lg-8 ltn__contact-address-text">
                                        <h3>Email Address</h3>
                                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                                <div class="row">
                                    <div class="col-lg-4 ltn__contact-address-icon">
                                        <img src="{{ asset('frontend/assets/img/others/location.png') }}"
                                            alt="Address Image">
                                    </div>
                                    <div class="col-lg-8 ltn__contact-address-text">
                                        <h3>Office Address</h3>
                                        <a>{{ $contact->address }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-7">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">Get A Quote</h4>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="text" name="phone" placeholder="Enter phone number" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" placeholder="Enter email address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="message" placeholder="Enter message"></textarea>
                            </div>
                            <div class="btn-wrapper mt-0">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="google-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.228104323546!2d78.38460247390746!3d17.448793101035722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9962cf100025%3A0x3be7318a7ecb9da9!2sSunseaz%20Technologies!5e0!3m2!1sen!2sin!4v1764158482927!5m2!1sen!2sin"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
