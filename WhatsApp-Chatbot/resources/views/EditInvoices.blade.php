<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <style>
        body,
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .Container {
            height: 100vh;
            width: 100vw;
            display: flex;
        }

        .menu {
            height: 100%;
            width: 20%;
            background-color: #4c54a3;
            list-style-type: none;
            padding: 1em;
        }

        .menu li a {
            background-color: #A9B5DF;
            margin-top: 8px;
            text-decoration: none;
            color: #ecf0f1;
            display: block;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .menu li a:hover {
            background-color: #7886C7;
        }

        .Invoice-form {
            flex: 1;
            background-color: #f5f5f5;
            padding: 2em;
        }

        .Invoice-form input[type="text"],
        .Invoice-form input[type="email"],
        .Invoice-form input[type="date"] {
            width: calc(100% - 24px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
        }

        .Invoice-form input[type="submit"],
        .cancel {
            background-color: #4c54a3;
            color: #ecf0f1;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .Invoice-form input[type="submit"]:hover,
        .cancel:hover {
            background-color: #7886C7;
        }
    </style>
</head>

<body>
    <div class="Container">
        <ul class="menu">
            <li> <a href="add_invoice">Add Invoice</a> </li>
            <li> <a href="display_invoices">Invoice</a> </li>
        </ul>

        <div class="Invoice-form">
            <form action="/final_edit/{{$user->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="put">
                <input type="text" value="{{ $user->Name }}" name="name" id="name" placeholder="Enter Name">
                <br><br>
                <input type="email" value="{{ $user->Email }}" name="email" id="email" placeholder="Enter the Email">
                <br><br>
                <input type="text" value="{{ $user->Amount }}" name="amount" id="amount" placeholder="Enter Amount">
                <br><br>
                <input type="text" value="{{ $user->Status }}" name="status" id="status" placeholder="Enter the Status">
                <br><br>
                Birth Date: <input value="{{ $user->Birth_date }}" type="date" name="date" id="date" placeholder="Enter the Date">
                <br><br>
                Transaction Date: <input value="{{ $user->Transaction_Date }}" type="date" name="Tdate" id="Tdate" placeholder="Enter the Date">
                <br><br>
                <input type="submit" value="Update">
                <a href="/display_invoices">
                    <button type="button" class="cancel">Cancel</button>
                </a>
            </form>
        </div>
    </div>
</body>

</html>