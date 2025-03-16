@props(['article'])

<div class="card h-100">
    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text text-muted">
            <small>
                <i class="fas fa-user me-2"></i>{{ $article->author->name }}
                <i class="fas fa-calendar ms-3 me-2"></i>{{ $article->created_at->format('M d, Y') }}
            </small>
        </p>
        <p class="card-text">{{ Str::limit($article->excerpt, 150) }}</p>
        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Read More</a>
    </div>
</div> 