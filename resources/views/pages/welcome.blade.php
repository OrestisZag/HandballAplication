@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-12 row">
            <div class="text-center">

                <div class="slideshow">
                    {{ Html::image('img\handball3.jpg',null,['class'=>'placeHolder','width:'=>'500','height'=>'450']) }}
                    <div class="layer1"></div>
                    <div class="layer2"></div>
                    <div class="layer3"></div>
                    <div class="slideOverlay">{{ Html::image('img\logo1.jpg') }}</div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('script')
 <script>

 </script>

@endsection


