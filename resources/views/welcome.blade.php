@extends('template')




@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container">
            <ul class="clearfix">
                <li><a href="#">TOUS</a></li>
                @foreach($menus as $menu)
                    <li><a href="#">{{$menu->title}}</a></li>
                @endforeach

            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories</strong></a>
        </div>
    </section>

    <section id="sectionevenement" role="navigation">
        <div class="container">
            <ul>
                @foreach($sousmenus as $sousmenu)
                    <li><a href="#">{{$sousmenu->title}}</a></li>
                @endforeach

            </ul>
        </div>
    </section>

@endsection


