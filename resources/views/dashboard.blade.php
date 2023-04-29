<x-main-layout title="Dashboard">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <script defer src="/excel.js"></script>
    <h2>Dashboard</h2>
    <div>
        <span>import Excel File</span>
        <input type="file" id="fileInput">
        <input value="012" id="map" type="number" placeholder="012 for normal mapping, 210 for reverse order and so on">
        <button onclick="uploadData()">Upload Excel values</button>
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
