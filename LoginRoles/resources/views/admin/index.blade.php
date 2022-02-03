<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>ADMINISTRATOR</h1>

    <form action="{{ route('admin.store') }}" method="POST">
        @csrf

        <label for="date">Date</label><br>
        <input type="date" name="date" id=""><br><br>

        <label for="designation">Designation de pharmacie</label><br>
        <input type="text" name="designation" id=""><br><br>

        <label for="description">Description</label><br>
        <input type="text" name="description" id=""><br><br>

        <button type="submit">Valider</button>
    </form><br><br>

    <a href="{{ route('pharmacies.index') }}">
        <button>Voir</button><br>
    </a><br>

    <table border="2">
        <thead>
            <tr>
                <th>Date</th>
                <th>Désignation Pharmacie</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($pharmacies as $pharmacie)
            <tr>
                <td> {{ $pharmacie->date->format('Y-m-d'); }} </td>
                <td> {{ $pharmacie->designation }} </td>
                <td> {{ $pharmacie->description }} </td>
                <td>
                    <form action="{{ route('pharmacies.destroy', ['pharmacy' => $pharmacie->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
    
</body>
</html>