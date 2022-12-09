@extends('user.template')

@section('title', 'A propos')

@section('about', 'active')

@section('content')
<section class="section" style="height:150px">
	    <div class="container h-100">
	    	<div class="row h-100">
                <div class="col-md-12 h-100 d-flex flex-column justify-content-center text-center">
                    <h1 class="text-white h1"> DIGIT GIRLS </h1>
                </div>
            </div>
	    </div>
   </section>

<div class="container-fluid">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6" style="margin:auto">
                <img src="{{asset('image/profil.jpg')}}" style="width:100%; border-radius:20px" alt="image de a propos" srcset="">
            </div>
            <div class="col-md-6">
                <div class="text-justify mt-5">
                    
                    <p><span> <b>  DIGIT GIRL (d-GIRLS) </b>est une start-up de jeunes femmes leaders dynamiques béninoises qui apportent des solutions liées aux problèmes sexuels des jeunes béninoises
                a travers sa plateforme DOTOMI.</span></p>
                    <p><span style="color:orange"><strong>☺</strong></span> Elle  compte quatre (04) membres formant son staff qui travaille avec des experts en Santé Sexuelle et Reproductive, des médecins gynécologue obstétriciens, des andrologues, des urologues, des paires éducateurs.</p>
                    <p><span style="color:orange"><strong>☺</strong></span> En effet, la start-up a pour vision de favoriser l'education sexuelles des jeunes béninois  ainsi que de leur permettre d'avoir une vie sexuelle saine et épanouie en toute confidentialité et en sécurité  </p>

                    <p><span style="color:orange"><strong>☺</strong></span></strong>Dans ce but, la GOP pilote des projets qui contribueront à atteindre les Objectifs de Développement Durable notamment les numéros 3 (Bonne santé et bien-être) et 5 (Egalité entre les sexes) pour aider la jeunesse homme comme femme à prendre sa vie sexuelle en main afin de jouir d’une bonne santé. Aussi, la GOP se veut d’organiser des séances de sensibilisation sur divers thématiques liés à la Santé Sexuelle et Reproductive, des séances de formation des paires éducateurs et des jeunes désireux d’apprendre davantage sur la sexualité. .</p>                             
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="text-center mb-3 text-intimate">
             d-GIRLS
        </h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow border-0" style="border-radius:20px; margin-bottom:50px">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="">
                            <img src="image/nadia.jpg" style="width:100%;border-radius:20px;" alt="">
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Nadia</h5>
                        <h5 class="card-title">ASSOGBADJO</h5>
                        <h5 class="card-title">Designer</h5>
                        <h5 class="card-title">Graphiste en formation</h5>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0" style="border-radius:20px; margin-bottom:50px">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="">
                            <img src="image/cynthia.jpg" alt="" style="width:100%;border-radius:20px;">
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Cynthia</h5>
                        <h5 class="card-title">AYETOLOU</h5>
                        <h5 class="card-title">Manager</h5>
                        <h5 class="card-title">Community Manager</h5>
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0" style="border-radius:20px; margin-bottom:50px">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="" >
                            <img src="image/borine.jpg" style="width:100%;border-radius:20px; " alt="">
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Borine</h5>
                        <h5 class="card-title">AITON</h5>
                        <br>
                        <h5 class="card-title">Digital Marketteur</h5>
                        <h5 class="card-title">Administratice</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow border-0" style="border-radius:20px; margin-bottom:50px">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="">
                            <img src="image/judith.jpg" style="width:100%;border-radius:20px;" alt="">
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Judith</h5>
                        <h5 class="card-title">HOUINSOU</h5>
                        <h5 class="card-title">Developpeur Web</h5>
                        <h5 class="card-title">RSI en formation</h5>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 shadow card"  style="border: solid #8D3894 3px"  >
        <h1 class="text-center mb-3 text-intimate mt-3">
            Contacter nous
        </h1>
        <div class="row">
            <form  id="formphone" action="" method ="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-6 mb-3">
                        <label for="inputEmail3">Nom</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Nom" required>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="inputEmail3">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="inputEmail3">Téléphone</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputEmail3" name="phone" placeholder="Téléphone" required>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="inputEmail3">Sujet</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="inputEmail3" name="subject" placeholder="Sujet" required>
                        </div>
                    </div>
                    
                    <div class="col-12 mb-3">
                        <label for="inputEmail3">Contenu</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" id="inputEmail3" name="content" placeholder="Mettre du contenu"  rows="6" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center align-items-center">
                    <button class="btn bg-intimate text-white btn-lg" type="submit" id="btninscription" >Envoyer</button>
                </div><br>
            </form>
        </div>
    </div>

</div>

@endsection