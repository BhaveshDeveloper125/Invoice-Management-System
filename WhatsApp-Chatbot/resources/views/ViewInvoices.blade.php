<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <!-- <div class="button-container">
        <a href="/invoice-form">
            <button style="float: right;">
                +create Invoice
            </button>
        </a>
    </div> -->

    <br>

    <div class="content-container">
        <!-- <ul class="dashboard-menus">
            <li class="dashboard">Dashboard</li>
            <a href="/add_invoice" style="text-decoration: none;color: inherit;">
                <li class="invoice">Add Invoice</li>
            </a>
        </ul> -->

        <div class="datacontainer">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Invoice ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Transaction Date</th>
                        <th>Birth Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->Invoice_ID }}</td>
                        <td>{{ $data->Name }}</td>
                        <td>{{ $data->Email }}</td>
                        <td>{{ $data->Transaction_Date }}</td>
                        <td>{{ $data->Birth_date }}</td>
                        <td>{{ $data->Amount }}</td>
                        <td>{{ $data->Status }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>


    <pre>
    </pre>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>