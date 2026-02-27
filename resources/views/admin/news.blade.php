<h1>{{ $pageName }}</h1>
<table border="1" style="border-collapse: collapse;">
    <thead style="background:#4e73df; color:white;">
        <tr>
            <th style="padding:10px;">ID</th>
            <th style="padding:10px;">Title</th>
            <th style="padding:10px;">Summary</th>
            <th style="padding:10px;">Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $row)
        <tr>
            <td style="padding:10px;">{{$row->id}}</td>
            <td style="padding:10px;"><a href="/admin/news/{{$row->id}}">{{$row->title}}</a></td>
            <td style="padding:10px;">{{$row->summary}}</td>
            <td style="padding:10px;">
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