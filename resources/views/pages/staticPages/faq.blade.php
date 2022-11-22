@extends('layouts.app')

@section('title', "- FAQ")

@section('content')

    <div class="container text-center my-5 p-5 bg-secondary" id="faqContainer">
        <h1>FAQ</h1>
        <p>
            Here, you can find answers to questions that you may have:
        </p>

        <div class="accordion text-center" id="faqAccordion">
            <div class="accordion-item my-5">
                <h4 class="accordion-header " id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        How do I create an article?
                    </button>
                </h4>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        On the top right corner of website, there is a button which will redirect you to a page where you 
                        can create your article, by filling a form with all the information you want on it
                    </div>
                </div>
            </div>

            <div class="accordion-item my-5">
                <h4 class="accordion-header " id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Why is my feedback important?
                    </button>
                </h4>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        People's feeds are filtered by the relevance of the articles, which is determined by the feedback it receives.
                        Thus, your feedback is essential for the article to reach others!
                    </div>
                </div>
            </div>

            <div class="accordion-item my-5">
                <h4 class="accordion-header " id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        What are Favorite Tags for?
                    </button>
                </h4>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Favorite Tags are used to filter your feed and show you articles in which you may have more interest,
                        by choosing the <i>Recommended</i> filter.
                    </div>
                </div>
            </div>

            <div class="accordion-item my-5">
                <h4 class="accordion-header " id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        What happens if I break the rules?
                    </button>
                </h4>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        We expect people to follow rules in order to have a friendly environment. This way, if you break them, administrators
                        can suspend you and will not have access to your account for some time
                    </div>
                </div>
            </div>

            <div class="accordion-item my-5">
                <h4 class="accordion-header " id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        What are the areas of expertise?
                    </button>
                </h4>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        One's areas of expertise describe the proficiency that person has on a specific Tag. This way, the more 
                        articles you make about a tag and the more feedback you receive on those, the greater your skill is on that
                        matter, and the users will be able to see that easily.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
