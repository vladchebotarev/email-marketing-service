@component('mail::message')
# Cześć, {{ $name }}

<b>{{ $venue_name }}</b> dostał Twoje pytanie i w krótce na nie odpowie!
@auth
Odpowiedź znajdziesz u siebie w panelu, w zakładce „Wiadomości”, również dostaniesz ją na podany przez Ciebie adres e-mail.

@else
Odpowiedź dostaniesz na podany przez Ciebie adres e-mail.

Aby mieć wszystkie wiadomości i upodobane przez Ciebie lokale w jednym miejscu, zarejestruj się pod linkiem:
https://spokoloko.club/register
@endauth

<br>
Pamiętaj, że możesz zlecić wyszukiwanie wymarzonego lokalu nam, całkowicie
ZA DARMO, przejdź i spróbuj https://spokoloko.club/event-expert
<br>

Dziękujemy że jesteś z nami i życzymy udanych wydarzeń!

Pozdrawiamy serdecznie,<br>
Zespół Spokoloko
@endcomponent
