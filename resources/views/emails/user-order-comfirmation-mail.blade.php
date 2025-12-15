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
            width: 100%;
            margin: 0;
            padding: 0;
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
        <h3>Thank You for Your Enquiry!</h3>

        <p>Dear {{ $order->user->name }},</p>

        <p>Thank you for submitting your enquiry. We have received your Product details and our team will get back to
            you
            as soon as possible.</p>

        <p>Here are the details of the products you have enquired about:</p>

        <div style="overflow-x:auto;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Packs</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->productVariant->product->name }}</td>
                            <td>{{ $item->productVariant->pack }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₹{{ $item->productVariant->inr_price }}/${{ $item->productVariant->usd_price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p>If you have any additional questions, feel free to contact us.</p>

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
