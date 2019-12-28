 @extends('Mails.layouts.default') 
@section('title') 
<h4>Get your certeficate {{$data['nom']}} !</h4>
<div style="margin:30px 20px 40px 20px;">
          <p class="title">
          <img src="{{ storage_path('C:\xampp\htdocs\Certeficats\storage\app\public\Certificats')}}" width="150" />
              </p>
            </div>
@endsection
 
@section('desc') 
 
Hello We warmly thank you for your participation at Local Hack Day Build  ! 
cordially
<br><hr style="color: red;">

@endsection
 
