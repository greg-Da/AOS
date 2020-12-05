@extends('layouts.app')

@section('content')

            

        <div class="content">
            <div className="container">
                <div id="home" class="m-b-md"></div>
                @guest
                <div id="homeGuest" class="-b-md"></div>
                @else
                <div id="homeAuth" class="m-b-md"></div>
                @endguest
                <div id="homeCards" class="m-b-md"></div>
            </div>
        </div>

           <script type="text/javascript" src="js/app.js"></script>
@endsection

