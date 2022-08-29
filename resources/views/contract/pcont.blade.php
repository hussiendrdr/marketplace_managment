<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Purchase Contract</title>
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
        font-family: 'examplefont', sans-serif;
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
        $sup = App\Models\Supplier::find($prc->supplier_id);
        $proo = App\Models\Process::where('project_id','=' , $data->id)->where('supplier_id','=', $prc->supplier_id)->get();
        $totalbefore = 0;
        $am = 0;
        $pai = 0;
    @endphp    
    <div>
      <div class="details-contract">
        <p class="line">
          <span>
            <label>التاريخ |</label> <span id="">{{ $data->created_at }}</span>
            <label>: Date</label>
          </span>
          <span>
            <label>الحالة |</label> <span id="">{{$prc->supplier_contract_status}}</span>
            <label>: Status</label>
          </span>
        </p>
        <p class="line">
          <span>
            <label>  المرجع |</label>
            
          </span>
          <span> <span id="">SC{{ $data->id }}</span> <label>: Ref</label> </span>
        </p>
      </div>
    </div>
    <div class="customer-details">
      <div class="line">
        <span class="title">اسم الشركة / Org Name</span> <br />
        <span class="data" id=""> {{ $sup->supplier_organization_name }} </span>
      </div>
      <div class="line">
        <span class="title">اسم المورد / Supplier Name</span> <br />
        <span class="data" id="">{{ $sup->supplier_contact_name }}</span>
      </div>
      <div class="line">
        <span class="title">رقم الاتصال / Contact Number</span> <br />
        <span class="data" id="">{{ $sup->supplier_contact_number }}</span>
      </div>
      <div class="line">
        <span class="title">العنوان / Address</span> <br />
        <span class="data" id="">{{ $sup->country }} - {{ $sup->city }} - {{ $sup->street }}</span>
      </div>
      <div class="line">
        <span class="title">الرقم الضريبي / Vat Number</span> <br />
        <span class="data" id="">{{ $sup->vat_number }}</span>
      </div>
    </div>
    <table class="products-table" style="margin-bottom: 10px;">
      <tr class="titlee">
        <td class="product" style="color: #fff">
          المنتج <br />
          Product 
        </td>
        <td class="desc" style="color: #fff">
          الوصف <br />
          Describtion
        </td>
        <td class="qty" style="color: #fff">
          الكمية <br />
          Quantity
        </td>
        <td class="price" style="color: #fff">
          سعر الوحدة <br />
          Unit Price
        </td>
        <td class="vat" style="color: #fff">
          الضريبة <br />
          VAT
        </td>
        <td class="total" style="color: #fff">
          الاجمالي <br />
          Total
        </td>
      </tr>
      
        @foreach ($proo as $preo)
        @php
            $ittem = App\Models\Product::find($preo->product_id);
            $sum = $preo->pp * $preo->qty;
            $totalbefore = $totalbefore + $sum;
            $am = $sum*$preo->tolerance/100 + $am;
            $pai = $pai + $preo->paid_amount ;
        @endphp
            <tr class="row">
              <td>{{ $ittem->product_name }}</td>
              <td>{{ $preo->description }}</td>
              <td>{{ $preo->qty }}</td>
              <td>{{ $preo->pp }}</td>
              <td>{{ $preo->tolerance }}%</td>
              <td>{{ $sum }}</td>
            </tr>
        @endforeach
        
    </table>
    <div class="footer">
      <div class="term-summary">
        <div class="term" style="padding: 10px">
          <div class="con">
            <p>الشروط والأحكام Term & Conditions</p>
            
            {{ $prc->validity_c }}<br />
            {{ $prc->leadtime_c }}<br />
            Delivery Handling : {{ $prc->delivery_handling_c }}<br />
            {{ $prc->advance_payment_c }}<br />
            {{ $prc->tolerance_c }}<br />
            {{ $prc->printing_cost_c }}<br /> <br>
          </div>
          <div class="cus">
            <p>هوية العميل Customer Identity</p>
            <span id=""> {{ $cus->customer_product_designs }} </span>
          </div>
          <div class="pro">
            <p>العرض الفني للمنتجات Products Design & Specs</p>
            <span id=""> {{ $prc->product_design }}</span>
          </div>
        </div>
        <div class="summary">
          <div class="line">
            <span class="title"
              >الاجمالي قبل الضريبة <br />
              Total(VAT Exl)</span
            >
            <span class="data" id="">{{ $totalbefore }}</span>
          </div>
          <div class="line">
            <span class="title"> قيمة الضريبة <br />VAT Amount</span>
            <span class="data" id="">{{ $am }}</span>
          </div>
          <div class="line">
            <span class="title"
              >الاجمالي شامل الضريبة <br />GranTotal(VAT Lnc)</span
            >
            <span class="data" id="">{{ $totall = $am + $totalbefore }}</span>
          </div>
          <div class="line">
            <span class="title">
              المبلغ المدفوع <br />
              Paid Amount</span
            >
            <span class="data" id="">{{ $pai }}</span>
          </div>
          <div class="line">
            <span class="title">
              المبلغ المتبقي <br />
              Remaining Amount</span
            >
            <span class="data" id="">{{ $totall - $pai }}</span>
          </div>
          <div class="customer-signature">
            توقيع العميل <br />
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