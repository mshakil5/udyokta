<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Documents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;800&family=Ysabeau+Infant:wght@300;400;600;700;800&family=Ysabeau+SC:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            /* font-family: 'Raleway', sans-serif; */
            /* font-family: 'Ysabeau SC', sans-serif; */
            font-family: 'Ysabeau Infant', sans-serif;
            padding: 0;
            margin: 0;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        .page {
            width: 29.7cm;
            height: 21cm;
        }

        @media print {
            @page {
                size: landscape;
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container p-0 m-0">
        <div class="page">
            <div class="d-flex justify-content-between">
                <div class="flex-grow-1">
                    <div class="card border-0 p-0 m-0 position-relative" style="width: 14.85cm;height:21cm;">
                        <div class="card-body">
                            <div>
                                <div class="d-flex justify-content-between ">
                                        <h1 class="m-0 p-2">INVOICE</h1>
                                        <p class="m-0 p-2 text-end"><small>OFFICE COPY</small></p>
                                </div>
                                <div class="d-flex justify-content-between mt-5">
                                    <div class="flex-grow-1 p-1"><b>Memo No:</b>&nbsp;&nbsp;{{$data->id}}1</div>
                                    <div class="flex-grow-1 p-1"><b>Date:</b>&nbsp;&nbsp;{{$data->date}}</div>
                                </div>
                            </div>
                            <div class="pt-3">
                                <table class="table table-sm table-bordered border-1 border-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-center bg-light">SL</th>
                                            <th class="bg-light">Title</th>
                                            <th class="text-center bg-light">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $totalRow = 10;
                                            $extraNeed = 10 - $data->count();
                                            $sl = 0;
                                            $total = 0;
                                            
                                        ?>
                                        @foreach ($data->invoicedetail as $item_)
                                        <?php
                                            $sl ++;
                                            $total += $item_->amount ?? 0;
                                        ?>
                                        <tr>
                                            <td class="text-center">{{$sl}}</td>
                                            <td>{{$item_->comment}}</td>
                                            <td class="text-center">{{number_format($item_->amount, 2)}}</td>
                                        </tr>
                                        @endforeach
                                        @for ($i = 0; $i < $extraNeed; $i++)
                                        <tr>
                                            <td class="text-center">&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td class="text-center"></td>                                            
                                        </tr>
                                        @endfor
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-0">
                                            <th colspan="2" class="text-end border-0">Total:</th>
                                            <td class="text-center border-0">{{ number_format($total) }}</td>
                                        </tr>
                                        {{-- <tr class="border-0">
                                            <th colspan="2" class="text-end border-0">Payable Amount:</th>
                                            <td class="text-center border-0">-</td>
                                        </tr>
                                        <tr class="border-0">
                                            <th colspan="2" class="text-end border-0">Due Amount:</th>
                                            <td class="text-center border-0">-</td>
                                        </tr> --}}

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{-- authorized signature box --}}
                        <div class="position-absolute" style="bottom:0px;right:65px;">
                            <p class="p-0 m-0"><b>Signature</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
