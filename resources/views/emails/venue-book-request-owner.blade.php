@component('mail::message')
# Cześć, {{ $name }}

Dostałeś pytanie odnośnie <b>{{ $venue_name }}</b>

Szczegóły znajdziesz po linkiem
https://spokoloko.club/user/messages-inbox/{{ $booking_number }}
<br>
Odpowiedź na niego jak najszybciej i zrób pozytywne pierwsze wrażenie na kliencie.
<br>

Dziękujemy za zaufanie i życzymy duuużo rezerwacji!

Pozdrawiamy serdecznie,<br>
Zespół Spokoloko
@endcomponent
