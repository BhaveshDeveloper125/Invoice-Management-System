<style>
    table {
        height: fit-content;
        width: 100%;
        border-collapse: collapse;
    }

    table tr {
        border: 1px solid black;
    }

    th {
        background-color: #dcdcdc;
    }

    td,
    th {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
</style>

<fieldset style="border: none;">
    <table>
        <tr>
            <td colspan="5" style="text-align: left;">
                <b>Name : {{ $data[1] }}</b>
                <br>
                <br>
                <b>Mobile : </b> {{ $data[7] }}
            </td>
            <td colspan="3" style="text-align: left;">
                <b>Bill No</b> : 123456789
                <br>
                <br>
                <b>Bill Date</b> : {{ $data[6] }}
            </td>
        </tr>
        <tr>
            <th>No</th>
            <th>Item Name</th>
            <th>Design No</th>
            <th>Sales Man</th>
            <th>HSN</th>
            <th>QTY</th>
            <th>Rate</th>
            <th>Discount</th>
            <th>Amount</th>
            <th>Total</th>
        </tr>

        @foreach ($data[0] as $key=>$value)
        <tr>
            <td>{{ $key+1 }} </td>
            <td>{{ $value['item_name'] }} </td>
            <td>{{ $value['design_no'] }} </td>
            <td>{{ $value['sales_man'] }} </td>
            <td>{{ $value['hsn'] }} </td>
            <td>{{ $value['qty'] }} </td>
            <td>{{ $value['rate'] }} </td>
            <td></td>
            <td>{{ $value['amount'] }} </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5">Total</td>
            <td>
                {{ array_sum(array_column($data[0], 'qty')) }}
            </td>
            <td></td>
            <td> 5%</td>
            <td>
                {{ array_sum(array_column($data[0], 'amount'))}}
            </td>
            <td>
                {{ array_sum(array_column($data[0], 'amount')) - array_sum(array_column($data[0], 'amount')) * 5 /100}}
            </td>
        </tr>
    </table>
</fieldset>
<!-- <pre>
    {{ 
    print_r($data)
     }}
</pre> -->