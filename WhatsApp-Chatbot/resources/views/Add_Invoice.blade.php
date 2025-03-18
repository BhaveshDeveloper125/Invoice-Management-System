<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>DashBoard</title>
    <style>
        body,
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            overflow-x: hidden;
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
        #outsider {
            background-color: #4c54a3;
            color: #ecf0f1;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .Invoice-form input[type="submit"]:hover {
            background-color: #7886C7;
        }

        .content-container {
            height: 88vh;
            width: 100vw;
            /* background-color: red; */
            display: flex;
        }

        .datacontainer {
            /* height: 25%; */
            /*width: 100%;*/
            /* background-color: #f5f5f5; */
            /* box-shadow: 8px 8px 800px 40px black; */
            /* flex: 1; */
            overflow-y: auto;
            /* position: absolute; */
            /* top: 0; */
            /* z-index: 999; */
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

        td input {
            height: 100%;
            width: 100%
        }

        a {
            text-decoration: none;
            color: inherit;
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
            <form action="/add_invoice_data" method="post" id="form-datas">
                @csrf
                <input type="text" name="name" id="name" placeholder="Enter Name" required>
                <br><br>
                <input type="email" name="email" id="email" placeholder="Enter the Email" required>
                <br><br>
                <input type="text" name="amount" id="amount" placeholder="Enter Amount" required>
                <br><br>
                <input type="text" name="status" id="status" placeholder="Enter the Status" required>
                <br><br>
                <input type="text" name="phone" id="phone" placeholder="Enter the WhatsApp Number" required>
                <br><br>
                Birth Date: <input type="date" name="date" id="date" placeholder="Enter the Date" required>
                <br><br>
                Transaction Date: <input type="date" name="Tdate" id="Tdate" placeholder="Enter the Date" required>
                <br><br>
                <input type="text" name="GiftCardNumber" id="GiftCardNumber" placeholder="Gift Card Number">
                <br><br>
                <button type="button" id="display_box" class="btn btn-success"> + Add items </button>
                <!-- <input type="submit" value="Submit"> -->
            </form>
            <br><br>
            <div class="datacontainer" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Design No</th>
                            <th>Sales Man</th>
                            <th>HSN</th>
                            <th>QTY</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                    </tbody>
                    <tr style="background-color: transparent;">
                        <td colspan="8">
                            <br>
                            <button type="button" class="btn btn-success" id="Additem" style="float: right;">+</button>
                            <button type="submit" form="form-datas" id="outsider">Submit</button>
                        </td>
                    </tr>
                </table>
            </div>
            <br><br>
        </div>
    </div>


    <script>
        document.getElementById('externalSubmit').addEventListener('click', function() {
            document.getElementById('form-datas').submit();
        });
    </script>


    <script>
        document.querySelector('#display_box').addEventListener('click', () => {
            let datacontainer = document.querySelector('.datacontainer');
            datacontainer.style.display = 'block';
        })
    </script>

    <script>
        document.querySelector('#Additem').addEventListener('click', () => {
            let table_body = document.querySelector('.table-body');
            let new_row = document.createElement('tr');
            new_row.innerHTML = `
                <td> <input type="text" placeholder="Item Name" name="item_name" id="" class="data-inp" required> </td>
                <td> <input type="text" placeholder="Design Number" name="design_no" id="" class="data-inp" required> </td>
                <td> <input type="text" placeholder="Sales Man" name="sales_man" id="" class="data-inp" required> </td>
                <td> <input type="text" placeholder="HSN No" name="hsn" id="" class="data-inp" required> </td>
                <td> <input type="text" placeholder="QTY" name="qty" id="qtyid" class="data-inp qty-input" required> </td>
                <td> <input type="text" placeholder="Rate" name="rate" id="rateid" class="data-inp rate-input" required> </td>
                <td> <input type="text" placeholder="Amount" name="amount" id="amountid" class="data-inp amount-input" readonly required> </td>
                <td> <button class="btn btn-danger cancel-row">Cancel</button> </td>
            `;

            // Get the input elements *after* they are added to the DOM
            const qtyInput = new_row.querySelector('#qtyid');
            const rateInput = new_row.querySelector('#rateid');
            const amountInput = new_row.querySelector('#amountid');

            function calculateAmount() {
                const qty = parseFloat(qtyInput.value);
                const rate = parseFloat(rateInput.value);

                if (!isNaN(qty) && !isNaN(rate)) {
                    amountInput.value = (qty * rate).toFixed(2);
                } else {
                    amountInput.value = '';
                }
            }

            // Add event listeners
            qtyInput.addEventListener('input', calculateAmount);
            rateInput.addEventListener('input', calculateAmount);

            table_body.appendChild(new_row);

            new_row.querySelector('.cancel-row').addEventListener('click', () => {
                table_body.removeChild(new_row);
            })
        });

        document.querySelector('#form-datas').addEventListener('submit', (e) => {
            let table_body = document.querySelector('.table-body');
            let tr_row = table_body.querySelectorAll('tr');
            let items = [];
            let hasEmptyField = false;

            tr_row.forEach(i => {
                let data_obj = {};
                let inputs = i.querySelectorAll('.data-inp');

                inputs.forEach(i => {
                    if (i.value.trim() === '') {
                        hasEmptyField = true;
                    }
                    data_obj[i.name] = i.value;
                });
                items.push(data_obj);
            });

            if (hasEmptyField) {
                e.preventDefault();
                alert("Please Enter All Values To Submit The Form");
                return
            }

            console.log(items);
            if (items.length > 0) {
                let item_data = document.createElement('input');
                item_data.type = 'hidden';
                item_data.name = 'items';
                item_data.value = JSON.stringify(items);
                document.querySelector('#form-datas').appendChild(item_data);
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>