<html>
    <head>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 5cm;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 1cm;
            }

            #table{
                margin-top: 4cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 4cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 3cm;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <img src="images/demahead.png" width="100%" height="100%"/>
        </header>

        <footer>
            <img src="images/demafooter.png" width="100%" height="100%"/>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <h5 align="center">RECEIPT</h5>
            <div class="row">
                <div style="float:left">
                <h5>Tenant info</h5>
                Name : {{$tenant->full_names}}&nbsp;{{$tenant->full_names}} <br>
                Email: {{$tenant->email}} <br>
                Phone: {{$tenant->phone_number}} <br>
            </div>
            <div  style="float:right">
                <h5>Apartment info</h5>
                @foreach($tunits as $tunits)
                Apartment : {{$tunits->name}}
                @endforeach  <br>
                Date      : {{\Carbon\Carbon::parse($date)->format('M jS Y')}} <br>
            </div>
            </div>
            <div>
            <table id="table" class="table table-bordered">
                     <tr>
                        <th>Receipt no</th>
                        <th>Amount(Ksh)</th>
                        <th>Mode</th>
                        <th>Reference</th>
                        <th>Date</th>
                     </tr>
                     @foreach($pdata as $pdata)
                     <tr>
                        <td>#{{$pdata->id}}</td>
                        <td>{{number_format($pdata->amount,2)}}</td>
                        <td>{{$pdata->mode}}</td>
                        <td>{{$pdata->ref_no}}</td>
                        <td>{{\Carbon\Carbon::parse($pdata->created_at)->format('M jS Y, H:i')}}</td>
                     </tr>
                     @endforeach
            </table>
            </div>
        </main>
    </body>
</html>
