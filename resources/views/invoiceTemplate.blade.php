<?php
function convertStandardTime($input){
    $time = strtotime($input);
    return date('d/m/Y H:i:s',$time);
}

?>
<div style="width: 100%;">
    <table style="padding-left: -12px">
        <tr>
            <td>
                <div style="display: inline-block; margin-top: 40px">
                    <img src="{{empty($invoiceData->preset1)? public_path('/assets/images/logo.jpg') :public_path("/uploads/invoice/{$invoiceData->preset1}") }}" height="100">
                    <img src="{{empty($invoiceData->preset2)? public_path('/assets/images/logo2.jpg') :public_path("/uploads/invoice/{$invoiceData->preset2}") }}" height="100">
                </div>
            </td>
            <td style="text-align: right">
                <div style="text-align: right; display: inline-block; float: right;line-height: 10px">
                    <h5>Invoice</h5>
                    <h5>Invoice Date: {{convertStandardTime($invoiceData->invoice_date)}}</h5>
                    <h5>Invoice No: {{$invoiceData->invoice_no}}</h5>
                </div>
            </td>
        </tr>
    </table>
    <div >
        <div style="text-align: left;line-height: 10px;">
            <h4>{{$invoiceData->from_address}}</h4>
            <h4>{{$invoiceData->to}}</h4>
            <h4>{{$invoiceData->excluding_vat}}</h4>
            <br>
            <h4>Mail : {{$invoiceData->email}}</h4>
            <h4>Mobile : {{$invoiceData->mobile_num}}</h4>
            <h4>To : <br>{{$invoiceData->to}}</h4>
        </div>
        <table style="width: 100%;">
            <tr>
                <th style="text-align:center;"><b>QTY</b></th>
                <th style="text-align:center;"><b>DESCRIPTION</b></th>
                <th style="text-align:center;"><b>PRICE</b></th>
                <th style="text-align:center;"><b>TOTAL</b></th>
            </tr>
            @foreach(json_decode($invoiceData->items) as $item)
                <tr>
                    <td style="text-align:center;">{{ $item->quantity }}</td>
                    <td style="text-align:center;">{{ $item->description }}</td>
                    <td style="text-align:center;">{{ $item->price }}</td>
                    <td style="text-align:center;">{{ $item->quantity * $item->price  }}</td>
                </tr>
            @endforeach
        </table>
        <table style="margin-right: 150px">
            <tr>
                <td>
                    <div style="display: inline-block">
                        <h4>Comments:<br>{{$invoiceData->comment}}</h4>
                    </div>
                </td>
                <td style="text-align: right">
                    <div style="text-align: right;line-height: 20px">
                        <table width="400">
                            <tr>
                                <td style="font-weight: bolder">VAT Amount : </td>
                                <td style="text-align: left;font-weight: bolder"> {{$invoiceData->vat_amount}}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bolder">Invoice Total : </td>
                                <td style="text-align: left;font-weight: bolder"> {{$invoiceData->invoice_total}}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bolder">Paid Amount : </td>
                                <td style="text-align: left;font-weight: bolder"> {{$invoiceData->payed_amount}}</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bolder">Due Total : </td>
                                <td style="text-align: left;font-weight: bolder"> {{$invoiceData->due_total}}</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
        <h5 style="text-align: center">Thank you</h5>
    </div>

</div>
