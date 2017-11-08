<style>
  .ko{
    background-color: white;
    padding-top: 50px;
    padding-bottom: 50px;
}
.imga{

        width: 150px;
        height: 150px;
}
.int{
  
    padding-bottom: 20px;
}
.mou{
    padding-bottom: 20px;
    /* border-bottom: 1px solid #ccc; */
    padding-top: 18px;

}
.pp{
    padding-top: 14px;
}
.ive{
padding: 39px;
}
</style>
    <section id="content">
        <div class="container custom-container">
            
            <div class="ko"> 
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 ive">
                            <div class="int">
                                    <img src="{{ url('/') }}/public/img/logo.png" title="leguichet">
                                    <p class="pp">Merci, voici vos billets! Lorsque vous participez, indiquez le code dans ce courrier électronique ou utilisez le fichier .pdf ci-joint</p>
                                    <hr class="separate" style="text-align: center;width: 100%;">
                            </div>
                            <div class="int">
                                <h2>Mes évènements</h2>
								@foreach($tic as $ticket)
								@php
									$event = $ticket->events[0];
								@endphp
                                 <strong>{{$event->title}}</strong> le {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}
                                <p>Localisation: {{$event->localisation_nom}}
                        {{$event->localisation_adresse}}</p>
                            </div>
                            <hr class="separate" style="text-align: center;width: 100%;">
                            <div>
                                <div class="row mou">
                        @foreach($tap as $tapakila)
                            <div class="col-lg-4">
                                <p style="text-align: center; margin: 5px 0; ">{{$ticket->type}}</p>
                                <p style="text-align: center">
                                    <img src="{{url('/public/qr_code/'.$tapakila->qr_code)}}" class="qt">
                                </p>
                            </div>
                        @endforeach
                        @endforeach
                    </div>
                            </div>
                            <hr class="separate" style="text-align: center;width: 100%;">
                    </div>
                </div>
           
            </div>
        </div>
    </section>