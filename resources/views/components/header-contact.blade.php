@if ($contact)
    <ul>
        <li><a href="tel:{{ $contact->phone_number }}"><i class="icon-call"></i> {{ $contact->phone_number }}</a></li>
        <li><a href="mailto:{{ $contact->email }}"><i class="icon-mail"></i> {{ $contact->email }}</a></li>
    </ul>
@endif
