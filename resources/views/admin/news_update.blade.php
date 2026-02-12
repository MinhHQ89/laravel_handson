<h1>{{ $pageName }}</h1>
<form method="post" action="/admin/news/update/{{ $news->id }}">
    @method('PATCH')
    @csrf
    <input type="hidden" name="id" value="{{ $news->id }}">
    <p>
        <label for="title">Title</label><br>
        <input type="text" name="title" value="{{ $news->title }}">
    </p>
    <p>
        <label for="summary">Summary</label><br>
        <input type="text" name="summary" value="{{ $news->summary }}">
    </p>
    <p>
        <label for="description">Description</label><br>
        <textarea cols="50" rows="5" name="description">{{ $news->description }}</textarea>
    </p>
    <p>
        <button type="submit">Submit</button>
    </p>
</form>