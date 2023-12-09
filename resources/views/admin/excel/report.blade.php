<!DOCTYPE html>
<html>

<head>
    <title> Live Report </title>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

        header {
            position: fixed;
            top: -35px;
            left: 0px;
            right: 0px;
            height: 50px;
        }

        #footer {
            bottom: 0;
            border-top: 0.1pt solid #aaa;
        }
    </style>
</head>

<body>

    <header>
        <table width="100%" class="header_table" style="border-bottom: 3px solid blue;">
            <thead>
                <tr width="100%">
                    <th width="50%" class="text-left"> Header Left</th>
                    <th width="50%" class="text-right">Header Right</th>
                </tr>
            </thead>
        </table>
    </header>

    <center>
        <h5>Report No. {{ $id }} </h4>
    </center>

    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/XXXTentacion_signature.svg/2412px-XXXTentacion_signature.svg.png"
        alt="img" style="width:200px;">

    <table>
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Expiry Date</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($products as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->qty }} </td>
                    <td>{{ $item->expiry_date }} </td>
                </tr>
            @endforeach --}}
            @for ($i = 0; $i < 200; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td> a </td>
                    <td> b </td>
                    <td> c </td>
                </tr>
            @endfor
        </tbody>
    </table>


    <div id="footer">
        <div class="page-number"></div>
    </div>

    <script type="text/php">
        if (isset($pdf)) {
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
            $x = $pdf->get_width() - 80;
            $y = $pdf->get_height() - 35;
            $pdf->page_text($x, $y, $text, null, 8, array(0,0,0), 0.0, 0.0, 0.0);
        }
    </script>
</body>

</html>
