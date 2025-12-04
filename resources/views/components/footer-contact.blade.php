@if ($contact)
    <ul>
        <li>
            <div class="footer-address-icon">
                <i class="icon-call"></i>
            </div>
            <div class="footer-address-info">
                <p><a href="tel:{{ $contact->phone_number }}">{{ $contact->phone_number }}</a></p>
            </div>
        </li>
        <li>
            <div class="footer-address-icon">
                <i class="icon-mail"></i>
            </div>
            <div class="footer-address-info">
                <p><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                </p>
            </div>
        </li>
        <li>
            <div class="footer-address-icon">
                <i class="icon-placeholder"></i>
            </div>
            <div class="footer-address-info">
                <p>{{ $contact->address }}</p>
            </div>
        </li>
    </ul>
@endif
