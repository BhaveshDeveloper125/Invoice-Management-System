<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trashed Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Verdana;
    }

    body {
        font-family: Verdana;
    }

    .button-container {
        height: 8vh;
        width: 100vw;
        /* background-color: black; */
    }

    .button-container a button {
        height: 100%;
        width: 10%;
        color: white;
        border-radius: 10px;
        background-color: #2aa81a;
        border: none;
        transition-duration: 0.5s;

        &:hover {
            cursor: pointer;
            background-color: transparent;
            color: green;
            border: 0.5px solid green;
        }
    }

    .content-container {
        height: 88vh;
        width: 100vw;
        /* background-color: red; */
        display: flex;
    }

    .dashboard-menus {
        height: 100%;
        width: 20%;
        background-color: #4c54a3;
        margin: 0;
        padding: 0;
    }

    .datacontainer {
        /* background-color: green; */
        flex: 1;
        overflow-y: auto;
    }

    li {
        height: 8%;
        width: 100%;
        background-color: #A9B5DF;
        border-radius: 15px;
        font-family: Verdana;
        margin-top: 4px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        transition-duration: 0.2s;


        &:hover {
            cursor: pointer;
            background-color: #7886C7;
        }
    }

    .datacontainer {
        flex: 1;
        /* background-color: red; */
    }

    .datacontainer table {
        /* height: 100%; */
        width: 100%;
        /* background-color: purple; */
    }

    .datacontainer table tbody tr {
        height: 20%;
        /* background-color: pink; */
        text-align: center;
    }

    .datacontainer table tr {
        border: 1px solid black;
        /* border-left: 0.5px solid black; */
        /* border-right: 0.5px solid black; */
    }

    /* Basic Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    /* Header Styling */
    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #f2f2f2;
        color: white;
    }

    tr {
        background-color: #FFF2F2;
    }

    tr:hover {
        cursor: pointer;
        background-color: #7886c782;
    }

    /* Special Row Styling */
    td[colspan="2"] {
        text-align: center;
    }

    th {
        background-color: #7886C7;
        text-align: center;
    }

    a {
        text-decoration: none;
        color: inherit;
    }
</style>

<body>
    <br>

    <div class="content-container">
        <div class="datacontainer">
            <table>
                <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Transaction Date</th>
                        <th>Birth Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Restore/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trashedInvoices as $i)
                    <tr>
                        <td>{{ $i->Invoice_ID }}</td>
                        <td>{{ $i->Name }}</td>
                        <td>{{ $i->Email }}</td>
                        <td>{{ $i->Transaction_Date }}</td>
                        <td>{{ $i->Birth_date }}</td>
                        <td>{{ $i->Amount }}</td>
                        <td>{{ $i->Status }}</td>
                        <td>
                            <a href=" {{ "/trash_restore/{$i->id}" }} "> <button class="btn btn-primary"> <i class="fas fa-redo-alt"></i></button> </a>
                            <a href=" {{ "/trash_remove/{$i->id}" }} "> <button class="btn btn-danger"> <i class="fas fa-trash-alt"></i> </button> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>