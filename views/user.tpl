<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Users</title>
    </head>
    <body>
        <table>
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Gender</td>
            </tr>
            {foreach $users as $user}
                <tr>
                    <td>{$user->name}</td>
                    <td>{$user->email}</td>
                    <td>{$user->gender}</td>
                </tr>
            {/foreach}
        </table>
        <form action="/user" method="post">
            <table>
                <tr>
                    <td>
                        <input type="text" placeholder="name" name="name">
                    </td>
                    <td>
                        <input type="text" placeholder="email" name="email">
                    </td>
                    <td>
                        <input type="text" placeholder="gender" name="gender">
                    </td>
                </tr>
            </table>
            <input type="submit" value="verzenden">
        </form>
    </body>
</html>