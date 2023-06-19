<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Winkelmandje</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .header img {
            max-width: 200px;
        }
        
        h1 {
            text-align: center;
            color: #333333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 10px;
            border-bottom: 1px solid #dddddd;
        }
        
        h3 {
            color: #333333;
            margin-bottom: 5px;
        }
        
        p {
            color: #666666;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('path/to/logo.png') }}" alt="Logo">
            <h1>Winkelmandje</h1>
        </div>
        
        <p>Bedankt voor het opvragen van de offerte!<br/>Het feestje kan bijna beginnen!</p>
        
        <table>
            <tr>
                <th>Item</th>
                <th>Afbeelding</th>
            </tr>
            @foreach ($favorieten as $item)
            <tr>
                <td>
                    <h3>{{ $item->titel }}</h3>
                    <p>{{ $item->beschrijving }}</p>
                </td>
                <td>
                    <img src="{{ asset('path/to/image1.png') }}" alt="Afbeelding">
                </td>
            </tr>    
            @endforeach
        </table>
    </div>
</body>
</html>
