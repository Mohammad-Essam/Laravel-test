<x-main-layout title="Dashboard">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <script defer src="/excel.js"></script>
    <h2>Dashboard</h2>
    <div>
        <span>import Excel File</span>
        <input type="file" id="fileInput">
        <div style="display:none" id="mappingTable">
            <h3>Map your data</h3>
            <table>
                <tr>
                    <td>Product Name</td>
                    <td>
                        <select name="productName" id="productName">
                            <option selected value="0">first column</option>
                            <option value="1">second column</option>
                            <option value="2">third column</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Product Type</td>
                    <td>
                        <select name="productType" id="productType">
                            <option value="0">first column</option>
                            <option selected value="1">second column</option>
                            <option value="2">third column</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Product Quantity</td>
                    <td>
                        <select name="productQuantity" id="productQuantity">
                            <option value="0">first column</option>
                            <option value="1">second column</option>
                            <option selected value="2">third column</option>
                        </select>
                    </td>
                </tr>

            </table>
        <button style="" id="uploadButton">Upload Excel values</button>
        </div>
    </div>
    <div>
        <h2>All Products</h2>

        <table>
            <tr>
                <th>Products</th>
                <th>type</th>
                <th>quantity</th>
            </tr>
            @foreach ($products as $product )
            <tr>
                <td> {{ $product->name }} </td>
                <td >{{ $product->type }}</td>
                <td >{{ $product->qty }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</x-main-layout>
