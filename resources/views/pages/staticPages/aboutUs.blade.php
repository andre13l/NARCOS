@extends('layouts.app')

@section('title', "- About Us")

@section('content')

    <div class="container text-center my-5 p-5 bg-secondary">
        <h1>About us</h1>
        <div class="horizontalDivider mb-5"></div>

        <p>
            We are in an era of technology growth, but with it, the amount of wrong information on the internet and
            media algo grows. It becomes increasingly complicated to filter the information that is correct, and knowledge proof
            is often required for our disclosures to be legitimate, proofs that aren't always easy to get.
        </p>

        <p>
            On this application, users are the experts which will evaluate the news being published, by giving 
            their feedbacks and suggestions. Newtify brings a new reality where one's practical knowledge takes the place of
            theoretical knowledge and where your opinion is used to evaluate the authors' reliability! Newtify is a way to decrease the 
            amount of biased news we have nowadays.
        </p>

        <p>
            Help us create a new and honest world where information is legit and we can learn with each other by 
            joining us!
        </p>

        <p>
            If you need help or found a problem, please contact one of the following team element and we'll reply as soon as possible!
        </p>
        
        <div class="row py-3" id="contactsSection">
            
            <div class="col mb-3 d-flex justify-content-center">
                <div class="card">
                    <img class="card-img-top" src="storage/up201806860.jpg" alt="André Leonor">
                    <div class="card-body">
                        <h4>André Leonor</h4>
                        <a href="">up201806860@up.pt</a>
                    </div>
                </div>
            </div>

            <div class="col mb-3 d-flex justify-content-center">
                <div class="card">
                    <img class="card-img-top" src="storage/up201705562.jpg" alt="Bruno Pascoal">
                    <div class="card-body">
                        <h4>Bruno Pascoal</h4>
                        <a href="">up201705562@up.pt</a>
                    </div>
                </div>
            </div>

            <div class="col mb-3 d-flex justify-content-center">
                <div class="card">
                    <img class="card-img-top" src="storage/up201910223.jpg" alt="Fernando Barros">
                    <div class="card-body">
                        <h4>Fernando Barros</h4>
                        <a href="">up201910223@up.pt</a>
                    </div>
                </div>
            </div>

            <div class="col mb-3 d-flex justify-content-center">
                <div class="card">
                    <img class="card-img-top" src="storage/up201105191.jpg" alt="Miguel Curval">
                    <div class="card-body">
                        <h4>Miguel Curval</h4>
                        <a href="">up201105191@up.pt</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
