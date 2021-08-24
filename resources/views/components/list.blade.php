<section class="d-flex justify-content-around flex-wrap">
    @foreach($exams as $exam)
    <div class="card mt-3" style="width: 18rem;">

        <div class="card-body text-center">
            <p class="card-title">{{ $exam->label }}</p>
            <a href="#" class="btn btn-primary">En savoir plus </a>
        </div>
    </div>

    @endforeach
</section>
