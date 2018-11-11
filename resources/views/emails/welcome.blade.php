@component('mail::message')
# Witaj w Spokoloko, {{ $name }}

Mamy dobre wieści! Twoje konto w Spokoloko jest już aktywne.

Wejdź na stronę [spokoloko.club](https://spokoloko.club), by znaleźć idealny lokal na każde wydarzenie!
Zarezerwuj jeden z nich i rozkręcaj imprezę.

Pamiętaj, że rezerwacja lokalu przez Spokoloko jest całkowicie darmowa.

@component('mail::button', ['url' => 'https://spokoloko.club', 'color' => 'spokoloko'])
    Sprawdź
@endcomponent

Dziękujemy że jesteś z nami,<br>
Zespół Spokoloko
@endcomponent
