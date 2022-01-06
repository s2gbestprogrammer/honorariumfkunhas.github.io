<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

</head>
<body>

    <ul>
        <li><a href="/dashboard/admin/users">Users</a></li>
        <li> <a href="/dashboard/admin/profile">Profilku</a> </li>
        <li> <a href="/dashboard/admin/divisions">divisions</a></li>
        <li> <a href="/dashboard/admin/categories">categories</a></li>
        <li> <a href="/dashboard/admin/honor">Honor</a></li>
    </ul>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Log out</button>
    </form>

</body>
</html>
