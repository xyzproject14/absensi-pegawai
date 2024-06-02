<!DOCTYPE html>
<html>


<head>
    <title>Variasi baris ganjil genap</title>

    <style type="text/css">
        table {
            border: 1px solid #000;
        }

        thead {
            background-color: #c0bc03;
        }

        tbody tr:nth-child(even) {
            background-color: red;
        }

        .scroll {
            background-color: red;
            height: 100px;
            overflow: scroll;
        }

        table tbody {
            height: 100px;
            overflow: scroll;
            display: block;
        }

        table tbody tr {
            display: table;
        }

        table thead {
            display: table;
        }
    </style>

</head>

<body>

    <h1>ini halaman testing</h1>

    <div class="scroll">
        <p>hello world</p>
        <p>hello world</p>
        <p>hello world</p>
        <p>hello world</p>
        <p>hello world</p>
        <p>hello world</p>
    </div>

    <div class="table">
        <table>
            <thead>

                <th>judul</th>
                <th>judul</th>
                <th>judul</th>
            </thead>
            <tbody>
                <tr>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                </tr>
                <tr>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                </tr>
                <tr>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                </tr>
                <tr>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                </tr>
                <tr>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                </tr>
                <tr>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                </tr>
                <tr>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                    <td>isi</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>