<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->user->name }}</td>
            <td>{{ $alumno->user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>