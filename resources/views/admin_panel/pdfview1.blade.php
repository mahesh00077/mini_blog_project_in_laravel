<style type="text/css">
table td,
table th {
    border: 1px solid black;
}
</style>
<div class="container">


    <br />


    <table>
        <tr>
            <th>No</th>
            <th>name</th>
            <th>city</th>
        </tr>
        @foreach ($items as $key => $item)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->city }}</td>
        </tr>
        @endforeach
    </table>
</div>