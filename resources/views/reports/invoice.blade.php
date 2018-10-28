@extends('layouts.app')
@section('title','Invoice')

@section('content')
    <div class="wrapper">
        @include('components.navigation')
        @include('components.sidebar')


        <div class="content-wrapper">
            <section class="content">

                {{-- block 1 start--}}
                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-md-12">
                            <table>
                                <tr>
                                    <td width="50%" style="border: solid 1px black; padding-left: 10px">
                                        <div>
                                            <b>GLOBAL BUSINESS SUPPORT MANAGMENTS S.R.L.S</b><br>
                                            Address: Via delle Ninfee 32, City-Rome <br>
                                            Postcode-00172, Italy Phone: 664018528 <br>
                                            EMAIL: <b style="color: blue">gbsm20018@gmail.com </b><br>
                                            Agent Code -
                                            <b>GC-{{\App\Order::where('orderId',$id)->value('userId')}} </b><br>
                                        </div>
                                    </td>
                                    <td width="50%">
                                        <div style="padding: 0px;margin-top: -5px;margin-left: 5px">
                                            <img style="width: 100%" src="{{url('/images/invoice_logo.png')}}">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    {{--<div class="col-xs-12">--}}
                    {{--<h2 class="page-header">--}}
                    {{--<i class="fa fa-globe"></i> GBSM Cargo--}}
                    {{--<small class="pull-right">Date: {{\Carbon\Carbon::today()->format('d-m-Y')}}</small>--}}
                    {{--</h2>--}}
                    {{--<div class="col-md-6" >--}}
                    {{--<div style="border: solid 1px black;" >--}}
                    {{--<b>GLOBAL BUSINESS SUPPORT MANAGMENTS S.R.L.S</b><br>--}}
                    {{--Address: Via delle Ninfee 32, City-Rome <br>--}}
                    {{--Postcode-00172, Italy Phone: 664018528 <br>--}}
                    {{--EMAIL: <b style="color: blue">gbsm20018@gmail.com </b><br>--}}
                    {{--Agent Code - <b>GC-{{\App\Order::where('orderId',$id)->value('userId')}} </b><br>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-6" >--}}
                    {{--<div style="padding: 0px;margin-top: -5px" >--}}
                    {{--<img style="width: 100%" src="{{url('/images/invoice_logo.png')}}">--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    <!-- /.col -->
                    </div>
                    <hr style="border:solid 3px #A50050">
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Sender Information
                            <hr>
                            <address>

                                First Name (Nome) :
                                <strong>{{\App\Order::where('orderId',$id)->value('customer_name')}}</strong><br>
                                Last Name (Cognome):
                                <strong>{{\App\Order::where('orderId',$id)->value('customer_surname')}}</strong><br>
                                Address : {{\App\Order::where('orderId',$id)->value('customer_address')}}<br>
                                City : {{\App\Order::where('orderId',$id)->value('customer_city')}}<br>
                                Country : {{\App\Order::where('orderId',$id)->value('customer_country')}}<br>
                                Phone : {{\App\Order::where('orderId',$id)->value('customer_phone')}}<br>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Receiver Information
                            <hr>
                            <address>
                                First Name :
                                <strong>{{\App\Order::where('orderId',$id)->value('receiver_name')}}</strong><br>
                                Last Name :
                                <strong>{{\App\Order::where('orderId',$id)->value('receiver_surname')}}</strong><br>
                                Address : {{\App\Order::where('orderId',$id)->value('receiver_address')}}<br>
                                City : {{\App\Order::where('orderId',$id)->value('receiver_city')}}<br>
                                Country : {{\App\Order::where('orderId',$id)->value('receiver_country')}}<br>
                                Phone : {{\App\Order::where('orderId',$id)->value('phone')}}<br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Order Information
                            <br>
                            <hr>
                            <b>Order Number:</b># {{$id}}<br>
                            <b>Document Number:</b> {{\App\Order::where('orderId',$id)->value('document_number')}}<br>
                            <b>Expected Date to
                                receive:</b> {{\App\Order::where('orderId',$id)->value('expected_date_to_receive')}}<br>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <table style="border: 1px solid black;" width="100%">
                                <thead>
                                <tr style="border: 1px solid black;">
                                    <th style="padding-left: 5px ">Item No.</th>
                                    <th>Product Description</th>
                                    <th>Weight</th>
                                    <th>Cus. Charge</th>
                                    <th>PerKg</th>
                                    <th>Charge</th>
                                    <th>Sub Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" value="{{$i = 1}}">
                                @foreach(\App\OrderDetails::where('orderId',$id)->get() as $order)
                                    <tr style="border: 1px solid black;">
                                        <td style="padding-left: 5px "> {{$i++}}</td>
                                        <td>{{$order->product_description}}</td>
                                        <td>{{$order->weight}}</td>
                                        <td>{{$order->cus_charge}}</td>
                                        <td>{{$order->per_kg}}</td>
                                        <td>{{$order->charge}}</td>
                                        <td>{{$order->total}}</td>

                                    </tr>

                                @endforeach


                                <tr>
                                    <td></td>
                                    <td></td>

                                    <td>
                                        <b class="pull-left">Total KG: <b>{{\App\OrderDetails::where('orderId',$id)->sum('weight')}} kg</b></b>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td>
                                        <b class="pull-left">Total : <b>{{\App\OrderDetails::where('orderId',$id)->sum('total')}} €</b></b>
                                    </td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="font-size: 10px; text-align: justify">Gas infiammabile (ad es. Butano); 2. Gas non
                                infiammabili e non tossici che potrebbero
                                causare asfissia (ad esempio azoto, elio, anidride carbonica) o ossidanti (es.
                                ossigeno);3.
                                Gas tossici (ad es. Cloro, fosgene);4. Liquidi infiammabili (es. Liquido per accendini,
                                benzina);5.Solidi infiammabili, sostanze auto-reattive e esplosivi solidi
                                desensibilizzati;6. Sostanze soggette a combustione spontanea;7.Sostanze che, a contatto
                                con
                                l'acqua, emettono gas infiammabili;8. Sostanze ossidanti; 9. Batterie al litio;10.
                                Ghiaccio
                                secco;ü Tutti i beni sono stati personalmente imballati da me e sono stati in mio
                                costante
                                possesso dal momento del confezionamento. ü Ho dichiarato tutti gli articoli sulla lista
                                di
                                imballaggio e non ritengo responsabile East End Logistics per qualsiasi oggetto non
                                dichiarato.ü La mia spedizione non contiene merci pericolose o pericolose, né esplosivi,
                                corrosivi o armi da fuoco di qualsiasi tipo. ü Tutte le consegne sono soggette alle
                                condizioni meteorologiche, agli orari dei voli / ai ritardi e alle vacanze di
                                destinazione.üLimiti alla responsabilità in termini di perdita, danno o ritardo nel
                                carico
                                per essere il massimo delle passività €90.92, a meno che il caricatore non dichiari in
                                anticipo un valore superiore e, se necessario, paghi un supplemento. Se una merce
                                pericolosa
                                o non dichiarata trovata a buon fine sarà di €171.85 e le compagnie aeree possono
                                distruggere le tue merci senza alcun preavviso. Io / Noi confermiamo di aver letto e
                                accettato i Termini e Condizioni in merito alla spedizione dei miei / nostri effetti.Con
                                la
                                presente Vi autorizziamo, dopo la ricezione della merce qui descritta, ad emettere e
                                firmare
                                per nostro conto, la Air Waybill ed ogni altro documento necessario alla esportazione,
                                ed a
                                spedire la partita di merce qui descritta in accordo con le Vostre condizioni di
                                contratto. la attesto che il contenuto della merce è propriamente identificato dalla
                                descrizione fatta. la spedizione non contiene alcun articolo ristretto. e ciascun collo
                                è
                                nelle condizioni richieste per il trasporto, in accordo con il Regolamento degli
                                Articoli
                                Ristretti della IATA. **Demurrage will be given if only the product is lost or
                                damaged.We
                                will return 100% percent of the product price in 15 days if the goods are insured. If
                                the
                                goods are not insured then we will return only 40 percent of the goods price in 30
                                days. Claim must be done within 24 hours of receiving of the goods.</p>
                        </div>

                    </div>

                    <div class="row">
                        <br>
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <td style="width: 50%">Agent Sign __________________</td>
                                    <td style="width: 50%">Client Sign __________________</td>
                                </tr>


                            </table>
                        </div>


                    </div>

                    <div class="row">
                        <br>
                        <div class="col-md-12">
                            <fieldset style="width: 100%">
                                <legend>PROHIBITED GOODS</legend>
                                <img style="width: 100%" src="{{url('/images/prohibited_goods.png')}}">
                            </fieldset>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <br>
                        <div class="col-md-12">
                            <img width="100%" src="{{url('/images/invoice_footer.png')}}">
                        </div>


                    </div>

                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <a href="{{url('/invoice/print')}}/{{$id}}" target="_blank" class="btn btn-default"><i
                                        class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                </section>
                {{-- block 1 end--}}

            </section>{{--End content--}}
        </div>{{--End content-wrapper--}}
        @include('components.footer')
    </div>{{--End wrapper--}}
@endsection


