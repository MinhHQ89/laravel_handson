<h1>{{ $pageName }}</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Summary</th>
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td><a href="/admin/news/{{$row->id}}">{{$row->title}}</a></td>
            <td>{{$row->summary}}</td>
            <td>
                <a href="/admin/news/edit/{{$row->id}}">Edit</a> |
                <form style="display:inline;" method="POST" action="/admin/news/delete/{{$row->id}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>