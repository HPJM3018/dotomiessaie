@extends('user.template')

@section('title', 'Accueil')

@section('home', 'active')

@section('style')
<style>
	.cercle_sec1{
		height:75px;
	}
	.grid3{
		padding:10px; 
		border:1px solid transparent; 
		border-radius:20px; 
		box-shadow:0px 0px 20px #8c389475 ;
		margin-bottom: 50px;
	}
	@media (max-width: 767px) {
		.carousel-inner .carousel-item > div {
			display: none;
		}
		.carousel-inner .carousel-item > div:first-child {
			display: block;
		}
	}

	.carousel-inner .carousel-item.active,
	.carousel-inner .carousel-item-next,
	.carousel-inner .carousel-item-prev {
		display: flex;
	}

	/* medium and up screens */
	@media (min-width: 768px) {

		.carousel-inner .carousel-item-end.active,
		.carousel-inner .carousel-item-next {
			transform: translateX(25%);
		}

		.carousel-inner .carousel-item-start.active, 
		.carousel-inner .carousel-item-prev {
			transform: translateX(-25%);
		}
	}

	.carousel-inner .carousel-item-end,
	.carousel-inner .carousel-item-start { 
		transform: translateX(0);
	}
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/rating.css')}}">
@endsection

@section('content')

	<!-- Slider -->
	<section class="section">
	    <div class="container">
	    	<div class="row" style="padding:50px">
				<div class="col-md-6 d-flex flex-column justify-content-center align-items-start">
					<h1 class="text-white h1"> Bienvenue sur DOTOMI</h1>
					<p  class="text-white mt-2"> Tchater en toute confidentialités et en toute sécurité pour une meilleure epanouissement sexuelle</p>
				</div>
				<div class="col-md-6 d-flex flex-column justify-content-center align-items-start">
					<img src="image/slide-img.png" alt="" class="img-fluid">
				</div>
        	</div>
	    </div>
   </section>
   <!-- Consultation VIP -->
   <section class="section1">
   		<h1 style="text-align: center; font-size: 2em; padding-top:20px; color: #8D3894;">Dotomi c'est quoi?</h1>
   		<p class="section1p" >DOTOMI est une plateforme numérique qui résous les problèmes que rencontrent les jeunes en matière de Santé Sexuelle et Reproductive en un clic sans quitter votre domicile.</p>
   		<div class="container">
				<div class="row" style="margin-top:50px;margin-bottom:50px">
					<div class="col-sm-4">
						<div class="grid3 text-center p-2 shadow">
							<div>
								<img class="" height="75" src="{{asset('image/message1.png')}}" alt="">
							</div>
							<br>
							<div >
								<h2 class="" style ="color: #8D3894">Messagerie</h2>
								<p>Sur Dotomi, vous pouvez écris des messages directement avec nos expert sur la page Discuter a moindre couts. </p>
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="grid3 text-center mb-sm-2">
							<div >
								<img class="" height="75" src="{{asset('image/tel.png')}}" alt="">
							</div>
							<br>
							<div style="">
								<h2 class="" style ="color: #8D3894">Appel</h2>
								<p>Avec votre crédit ou forfait appel, vous pouvez appeler nos expert afin de leurs poser vos préoccupations. </p>
							</div>
			
						</div>
					</div>

					<div class="col-sm-4">
						<div class="grid3 text-center mb-sm-2">
							<div >
								<img height="75" src="{{asset('image/actu.png')}}" alt="">
							</div>
							<br>
							<div style="">
								<h2 class="" style ="color: #8D3894">Actualités</h2>
								<p>Vous pouvez lire des articles sur l'education sexuelle et reproductive proposé par des experts du domaine</p>
							</div>
						</div>
					</div>
					
				</div>
			</div>
   </section>
   <!--  -->
   <!-- Testimonial -->
   <section class="section3">
   		<h1 style="text-align: center; font-size: 2em; padding-top: 20px; color: white;">Avis des Utilisateurs</h1>
		<a href="" class="btn btn-light btn-lg" style="color: #8D3894;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Donner votre avis</a>

		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header  text-white"  style="background:#8D3894;">
						<h5 class="modal-title" id="staticBackdropLabel">Avis des Utilisateurs</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" style="background:#8c38942f;">
						<form  id="formphone" action="" method ="POST">
							@csrf
							<div class="row mb-3">
								<div class="col-12 mb-3">
									<label for="inputEmail3">Pseudo</label>
									<div class="col-sm-12">
										<input type="text" class="form-control" style="opacity:0.5" id="inputEmail3" name="name" placeholder=" Votre Pseudo" required>
									</div>
								</div>
								<div class="col-12 mb-3">
									<label class="rating-label"><strong>Note</strong>
									</label>
										<input class="rating" max="5" min="1" value="1" style="background:transparent"
											oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)" type="range" name="star" required>
								</div>
								<div class="col-12 mb-3">
									<label for="inputEmail3">Contenu</label>
									<div class="col-sm-12">
										<textarea class="form-control" style="opacity:0.5"  id="inputEmail3" name="content" placeholder="Mettre du contenu"  rows="6" required></textarea>
									</div>
								</div>
							</div>

							<div class="d-flex justify-content-center align-items-center">
								<button class="btn bg-intimate text-white btn-lg" type="submit" id="btninscription" >Valider</button>
							</div><br>
						</form>
					</div>
				</div>
			</div>
		</div>
   		<br>

		<div class="container text-center my-3">
			<div class="row mx-auto my-auto justify-content-center">
				<div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner" role="listbox">
							<div class="carousel-item active ">
								<div class="col-md-3" style="padding:10px">
									<figure class="testim">
										<figcaption class="pad15" >
											<blockquote>
											<div style="height:130px">
												<p>Je suis vraiment satisfait du service. Merci beaucoup</p>
											</div>
											<img width="30px" src="image/images/star-icon.svg">
											<img width="30px" src="image/images/star-icon.svg">
											<img width="30px" src="image/images/star-icon.svg">
											<img width="30px" src="image/images/star-icon.svg">
											<img width="30px" src="image/images/star-icon.svg">
											</blockquote>
											<h3>Emilie</h3>
										</figcaption>
									</figure>
								</div>
							</div>
						@foreach($ratings as $rating)
							<div class="carousel-item">
								<div class="col-md-3" style="padding:10px">
								<figure class="testim">
											<figcaption class="pad15" >
												<blockquote>
												<div style="height:130px">
													<p>{{$rating->content}}</p>
												</div>
													@for($i=0;$i<$rating->star;$i++)
														<img width="30px" src="{{asset('image/images/star-icon.svg')}}">
													@endfor
													@for($i=0;$i<(5-$rating->star);$i++)
														<img width="30px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Star_empty.svg/800px-Star_empty.svg.png">
													@endfor
												</blockquote>
												<h3>{{$rating->name}}</h3>
											</figcaption>
										</figure>
								</div>
							</div>
						@endforeach
					</div>
					<a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
						<span class="fa fa-chevron-left" aria-hidden="true"  style="color:#8D3894;font-size:1.5em"></span>
					</a>
					<a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
						<span class="fa fa-chevron-right" aria-hidden="true"  style="color:#8D3894;font-size:1.5em"></span>
					</a>
				</div>
			</div>		
		</div>
   </section>


@endsection

@section('script')
<script>
	let items = document.querySelectorAll('.carousel .carousel-item')

items.forEach((el) => {
	const minPerSlide = 4
	let next = el.nextElementSibling
	for (var i=1; i<minPerSlide; i++) {
		if (!next) {
	// wrap carousel by using first child
	next = items[0]
}
let cloneChild = next.cloneNode(true)
el.appendChild(cloneChild.children[0])
next = next.nextElementSibling
}
})
</script>
@endsection