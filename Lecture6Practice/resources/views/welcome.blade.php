@foreach($ocene as $ucenikovaOcena)
    <p>{{$ucenikovaOcena->subject}} {{$ucenikovaOcena->professor}}: {{$ucenikovaOcena->grade}}</p>
@endforeach
