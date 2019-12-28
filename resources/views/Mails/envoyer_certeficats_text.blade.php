 @extends('Mails.layouts.default') 
@section('title') 
<div style="margin:30px 20px 40px 20px;">
          <p class="title">
          <img src="https://zupimages.net/up/19/52/l1sx.png" />
              </p>
            </div>
            <h2 class="display">Voici votre certificat !</h2>
@endsection
@section('desc') 
 Bonjour cher participant  {{$data['nom']}} , l'équipe CSE vous remercie pour votre honorable présence près d'elle pendant l'un de ses meilleures événements qui la tenait à cœur. Votre rencontre était un grand encouragement et une véritable récompense, aujourd'hui et grâce à vous; une nouvelle édition est accomplie avec succès. Pour cela, nous vous remettons votre certificat de participation à notre workshop {{$data['workshop']}} , rien que preuve de votre motivation appréciée.<br>
  "Nous existons pour vous et grâce à vous"
<br><hr style="color: red;">
@endsection
 
