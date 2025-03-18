<form action="/QR_generater" method="post">
    @csrf
    <input type="text" name="item" placeholder="Enter Item Name">
    <input type="text" name="design_no" placeholder="Enter Design Number">
    <input type="text" name="hsn" placeholder="Enter HSN">
    <input type="text" name="mrp" placeholder="Enter MRP Price">
    <input type="submit" value="Submit">
</form>