<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <img src="{{url('/public/qr_code/'.$image.'.png')}}">
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <img src="{{url('/')}}/public/img/{{$event->image}}" width="200px" height="100px"><br/>
            <p>{{ucfirst(strtolower($event->title))}}</p>
            <p>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}</p>
            <p>{{$event->localisation_nom }} {{$event->localisation_adresse}}</p>
        </td>
    </tr>
</table>
