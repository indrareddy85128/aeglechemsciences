<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aegle Chemsciences</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

        body {
            font-family: "Nunito", sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            overflow: hidden;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 320px;
            overflow: hidden;
        }

        h3 {
            color: #333;
            font-family: "Nunito", sans-serif;
            margin: 20px 0;
        }

        p {
            font-size: 14px;
            margin: 8px 0;
        }



        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #f8f8f8;
            font-weight: 600;
        }




        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .container {
                width: 100%;
                padding: 10px;
            }

            .logo {
                max-width: 150px;
            }

            table {
                font-size: 12px;
            }

            th,
            td {
                padding: 8px;
            }

            .button {
                padding: 10px 16px;
            }
        }

        @media (max-width: 768px) {
            table {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .footer a {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h3>Customer Details</h3>
        <p><strong>Name:</strong> {{ $order->user->name }}</p>
        <p><strong>Email:</strong> {{ $order->user->email }}</p>
        <p><strong>Phone:</strong> {{ $order->user->phone_number }}</p>
        <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>

        <h3>Enquiries Products</h3>
        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->product->quantity }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₹{{ $item->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p><strong>Contact Us:</strong></p>
            <p>Email: <a href="mailto:support@company.com">support@company.com</a>
            </p>
            <p>Phone Number: <a href="tel:+911234567890">+91 123 456 7890</a></p>
            <p>&copy; {{ date('Y') }} Aegle Chemsciences. All rights reserved.</p>
        </div>

    </div>

</body>

</html>
