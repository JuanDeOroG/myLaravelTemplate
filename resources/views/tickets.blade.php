<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tickets</title>
<style>
    body, html{
        margin: 10px;
    }
  .contenedor {
    position: fixed;
    top: 0;
    left: 5%;
  }
  .ticket1 {
    position: absolute;
    top: 0;
    left: 0;
  }
  .ticket2 {
    position: absolute;
    top: 0;
    left: 100%;
    margin-left: 20px; 

  }
  .logo, .barcode, .codigo {
    text-align: center;
  }
  .logo{
    width: 4cm;
  }
  .barcode{
    margin: auto;
  }

</style>
</head>
<body>
  <div class="contenedor">
    <div class="ticket1">
      <img class="logo" src="logoalc.jpg">
      <div class="barcode">{!! DNS1D::getBarcodeHTML($code0, 'C128',1,20) !!}</div>
      <div class="codigo">{{$code0}}</div>
    </img>
    <div class="ticket2">
      <img class="logo" src="logoalc.jpg">
      <div class="barcode">{!! DNS1D::getBarcodeHTML($code1, 'C128',1,20) !!}</div>
      <div class="codigo">{{$code1}}</div>
    </div>
  </div>
  <div class="page-break"></div>
  </body>
  </html>
  