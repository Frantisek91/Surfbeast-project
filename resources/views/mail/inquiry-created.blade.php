@component('mail::message')
# Poptávka pro: 

{{$inquiry->f_name}} {{$inquiry->l_name}}

#Uvedený kontakt: 
{{$inquiry->phone}}

#Zpráva: 

{{$inquiry->message}}

#Vaše poptávku jsme zaevidovali. Budete kontaktováni bla bla bla. 

{{-- @component('mail::button', ['url' => url('/inquiry/show/'.$inquiry->id)])

Zobrazit poptávku

@endcomponent --}}

#Děkujeme za Vaši přízeň,<br>

#kamzasurfem
{{-- {{ config('#kamzasurfem') }} --}}
@endcomponent
