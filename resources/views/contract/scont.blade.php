<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sales Contract</title>
    <style>
      @font-face {
        font-family: title;
        src: URL("assets/Fonts/Sukar-Black.ttf");
      }

      @font-face {
        font-family: main;
        src: url("assets/Fonts/Sukar-Regular.ttf");
      }
      @font-face {
        font-family: span;
        src: url("assets/Fonts/Sukar-Bold.ttf");
      }

      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

      body {
        padding: 203px 210px 15px 50px;
        direction: rtl;
        font-family: main;
      }

      div.header .header {
        height: 49px;
        margin-bottom: 0px;
      }

      div.header .header > * {
        float: right;
      }

      div.header .header h1 {
        background-color: #3e3550;
        width: 69%;
        text-align: center;
        color: #fff;
        font-family: main;
        font-weight: 100;
        font-size: 25px;
        float: right;
      }

      div.header .header .logo {
        width: 31%;
        height: 49px;
        float: left;
      }

      div.header .header .logo img {
        height: 100%;
        margin-right: 0px;
      }

      /* contract details */

      div.header .details-contract {
        margin-bottom: 0px;
      }

      div.header .details-contract > label {
        font-family: title;
      }

      div.header .details-contract > p {
        margin: 0px 20px 8px;
        font-weight: bolder;
        margin-bottom: 5px;
        font-size: 14px;
      }

      div.header .details-contract .line span span {
        font-family: span;
        font-weight: 100;
        margin-right: 25px;
        letter-spacing: 1px;
      }

      div.header .details-contract > p > label {
        font-family: title;
      }

      div.header .details-contract > p span {
        margin-left: 50px;
      }

      /* customer table  */
      .customer-details {
        display: block;
        margin-bottom: 8px;
      }

      .customer-details .line {
        width: 69%;
        background-color: #eee;
        margin-bottom: 1px;
        font-size: 13px;
      }
      .customer-details .line .title {
        background-color: #3e3550;
        display: inline-block;
        color: #fff;
        text-align: center;
        padding: 0px 2px;
        width: 100px;
        margin: 0px;
      }

      .customer-details .line .data {
        margin: 0px;
        display: inline-block;
      }

      /* products template */
      .products-table {
        display: block;
        text-align: center;
        width: 100%;
      }

      .products-table .titlee {
        background-color: #3e3550;
        color: #eee;
        font-size: 15px;
        height: 50px;
      }

      .products-table .row {
        background-color: #eee;
      }

      .products-table .titlee .product {
        height: 50px;
        width: 125px;
      }
      .products-table .titlee .desc {
        width: 500px;
      }
      .products-table .titlee .qty {
        width: 125px;
      }
      .products-table .titlee .price {
        width: 125px;
      }
      .products-table .titlee .vat {
        width: 125px;
      }
      .products-table .titlee .total {
        width: 125px;
      }

      /* terms & footer */

      .term-summary .term {
        background-color: #eee;
        height: fit-content;
        font-size: 13px;
        font-weight: bolder;
        float: right;
        width: 65%;
      }

      .term-summary .term .cus,
      .term-summary .term .pro {
        border-bottom: 2px solid #3e3550;
      }

      .term-summary .term > .con {
        height: 238px;
        border-top: 2px solid #3e3550;
        border-bottom: 2px solid #3e3550;
      }

      .term-summary .summary {
        width: 31%;
        float: left;
        color: #fff;
        font-size: 13px;
        height: fit-content;
      }
      .term-summary .summary .line {
        padding: 7px;
        background-color: #3e3550;
        margin-bottom: 2px;
        position: relative;
      }

      .term-summary .summary .line .title {
        display: inline-block;
        text-align: right;
        width: 50%;
      }

      .term-summary .summary .line .data {
        display: inline-block;
        text-align: center;
        width: 49%;
        position: absolute;
        top: 25%;
      }

      .customer-signature {
        font-size: 13px;
        color: #aaa;
        text-align: center;
        margin-top: 40px;
        position: relative;
      }

      .customer-signature .after {
        position: absolute;
        background-color: #3e3550;
        top: 2px;
        left: 35%;
        width: 30%;
        height: 2px;
      }

      .clear {
        clear: both;
      }

      .img {
        margin-bottom: 50px;
        margin-top: -15px;
        width: 100%;
      }

      .img img {
        width: 100%;
      }
    </style>
  </head>
  <body>
    @php
        $cus = App\Models\Customers::find($data->customer_id);
        $proo = App\Models\Process::where('project_id','=' , $data->id)->get();
        $cont = App\Models\Process::where('project_id','=' , $data->id)->first();
        $totalbefore = 0;
        $am = 0;
        $pai = 0;
    @endphp
      <div class="details-contract">
        <p class="line">
          <span>
            <label>?????????????? |</label> <span id="">{{ $data->created_at }}</span>
            <label>: Date</label>
          </span>
          <span>
            <label>???????????? |</label> <span id="">{{$cont->status}}</span>
            <label>: Status</label>
          </span>
        </p>
        <p class="line">
          <span>
            <label>  ???????????? |</label> <span id="">{{ $data->id }}</span>
            <label>: SC Reference</label>
          </span>
          <span> <span id="">SC{{ $data->id }}</span> <label>: Ref</label> </span>
        </p>
        <p class="line">
          <span>
            <label> ?????? ???????? | #</label> <span id="">{{ $data->approved_customer_quotation }}</span>
            <label>: PO</label>
          </span>
        </p>
      </div>
    </div>
    <div class="customer-details">
      <div class="line">
        <span class="title">?????? ?????????????? / Org Name</span> <br />
        <span class="data" id=""> {{ $cus->customer_organization_name }} </span>
      </div>
      <div class="line">
        <span class="title">?????? ???????????? / Customer Name</span> <br />
        <span class="data" id="">{{ $cus->customer_contact_name }}</span>
      </div>
      <div class="line">
        <span class="title">?????? ?????????????? / Contact Number</span> <br />
        <span class="data" id="">{{ $cus->customer_contact_number }}</span>
      </div>
      <div class="line">
        <span class="title">?????????????? / Address</span> <br />
        <span class="data" id="">{{ $cus->country }} - {{ $cus->city }} - {{ $cus->street }}</span>
      </div>
      <div class="line">
        <span class="title">?????????? ?????????????? / Vat Number</span> <br />
        <span class="data" id="">{{ $cus->vat_number }}</span>
      </div>
    </div>
    <table class="products-table" style="margin-bottom: 10px;">
      <tr class="titlee">
        <td class="product" style="color: #fff">
          ???????????? <br />
          Product 
        </td>
        <td class="desc" style="color: #fff">
          ?????????? <br />
          Describtion
        </td>
        <td class="qty" style="color: #fff">
          ???????????? <br />
          Quantity
        </td>
        <td class="price" style="color: #fff">
          ?????? ???????????? <br />
          Unit Price
        </td>
        <td class="vat" style="color: #fff">
          ?????????????? <br />
          VAT
        </td>
        <td class="total" style="color: #fff">
          ???????????????? <br />
          Total
        </td>
      </tr>
      
        @foreach ($proo as $pr)
          <tr class="row">
          @php
              $pro = App\Models\Product::find($pr->product_id);
              $sum = $pr->sp * $pr->qty;
              $totalbefore = $totalbefore + $sum;
              $am = $sum*$pr->tolerance/100 + $am;
              $pai = $pai + $pr->paid_amount ;
          @endphp
              <td>{{ $pro->product_name }}</td>
              <td>{{ $pr->description }}</td>
              <td>{{ $pr->qty }}</td>
              <td>{{$pr->sp}}</td>
              <td>{{ $pr->tolerance }}%</td>
              <td>{{ $sum }}</td>
          </tr>
        @endforeach
      
    </table>
    <div class="footer">
      <div class="term-summary">
        <div class="term" style="padding: 10px">
          <div class="con">
            <p>???????????? ???????????????? Term & Conditions</p>
            
            {{ $cont->validity_s }}<br />
            {{ $cont->leadtime_s }}<br />
            {{ $cont->delivery_handling_s }}<br />
            {{ $cont->advance_payment_s }}<br />
            {{ $cont->tolerance_s }}<br />
            {{ $cont->printing_cost_s }}<br />
          </div>
          <div class="cus">
            <p>???????? ???????????? Customer Identity</p>
            <span id=""> {{ $cus->customer_product_designs }} </span>
          </div>
          <div class="pro">
            <p>?????????? ?????????? ???????????????? Products Design & Specs</p>
            <span id=""> {{ $cont->product_design }}</span>
          </div>
        </div>
        <div class="summary">
          <div class="line">
            <span class="title"
              >???????????????? ?????? ?????????????? <br />
              Total(VAT Exl)</span
            >
            <span class="data" id="">{{ $totalbefore }}</span>
          </div>
          <div class="line">
            <span class="title"> ???????? ?????????????? <br />VAT Amount</span>
            <span class="data" id="">{{ $am }}</span>
          </div>
          <div class="line">
            <span class="title"
              >???????????????? ???????? ?????????????? <br />GranTotal(VAT Lnc)</span
            >
            <span class="data" id="">{{ $totall = $am + $totalbefore }}</span>
          </div>
          <div class="line">
            <span class="title">
              ???????????? ?????????????? <br />
              Paid Amount</span
            >
            <span class="data" id="">{{ $pai }}</span>
          </div>
          <div class="line">
            <span class="title">
              ???????????? ?????????????? <br />
              Remaining Amount</span
            >
            <span class="data" id="">{{ $totall - $pai }}</span>
          </div>
          <div class="customer-signature">
            ?????????? ???????????? <br />
            Customer <br />
            Signature
            <span class="after"></span>
          </div>
        </div>
        <div class="clear"></div>
      </div> <br>
      
    </div>
  </body>
</html>