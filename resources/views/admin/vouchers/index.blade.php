<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Credit Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;800&family=Ysabeau+Infant:wght@300;400;600;700;800&family=Ysabeau+SC:wght@400;600;700;800&display=swap"
        rel="stylesheet">

        <style>
            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                }
                a {
                text-decoration: none;
                }

                body {
                font-family: "Roboto-Regular";
                }

                .footer {
                background: #FF9A38 !important;
                }

                .invoice header {
                background-color: #ffffff;
                }
                .invoice .title {
                font-size: 2.4rem;
                font-weight: bold;
                }
                .invoice .infos {
                font-size: 1rem;
                }

                .box-round {
                border-radius: 10px;
                }

                .table-custom {
                border: 1px solid grey;
                }
                .table-custom thead {
                vertical-align: middle;
                }
                .table-custom thead tr th {
                padding: 0 15px;
                }

                .overflow {
                max-width: 100%;
                overflow-x: auto;
                }/*# sourceMappingURL=app.css.map */
        </style>
</head>

<body>
    <section class="invoice">
        <div class="container-fluid p-0">
            <header class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 d-flex align-items-center">
                        </div>
                        <div class="col-lg-6 text-center">
                            <div>
                                <div class="title ">
                                    Soft Host Ltd
                                </div>
                                <div class="infos">
                                    Credit Voucher
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-center justify-content-center  ">
                            <div><br><br>
                                <div class="infos text-end">
                                    Cash/Cheque
                                </div>
                                <div class="infos text-end">
                                    Voucher no. {{$data->id}}
                                </div>
                                <div class="infos text-end">
                                    Date: {{$data->date}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 fw-bold">

                        <div class="col-lg-6">
                            <span class="me-4"> Head of Account: </span> 
                        </div>

                        <div class="col-lg-6">
                            <span class="me-4"> Project Name: </span> 
                        </div>


                        <div class="col-lg-12">
                            <span class="me-4"> Paid to: </span> 
                        </div>
                    </div>
                </div>
            </header>
            <div class="invoice-body py-5">
                <div class="container">
                    <div class="row overflow">
                        <table class="table table-respomsive table-striped table-custom">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="border-start">Description</th>
                                    <th class="border-start">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->invoicedetail as $key => $item)
                                    
                                @endforeach
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->comment}}</td>
                                    <td>{{$item->amount}}</td>
                                </tr>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        
                                    </td>
                                    <td colspan="2" class="border-start">
                                        <table class="w-100">
                                            <tr>
                                                <td class="">
                                                    <span class="float-start"><b>Total w/o vat:</b></span>
                                                    <span class="float-end"> {{$data->total_amount}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <span class="float-start"><b>VAT:</b></span>
                                                    <span class="float-end"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="">
                                                    <span class="float-start"> <b>Total with vat:</b> </span>
                                                    <span class="float-end">{{$data->net_amount}}</span>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row my-5">
                        <div class="col-lg-5">
                            <i>Received by : Signature</i>
                        </div>
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2 text-end">
                            Salesman Signature 
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


</body>

</html>