<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="chavez.jc137@gmail.com">

    <!-- Specify a Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="Pago Libros">
    <input type="hidden" name="amount" value="">
    <input type="hidden" name="currency_code" value="MXN">
    <input type="hidden" name="shipping" value="1">
    <!-- Display the payment button. -->
    <input type="image" name="submit" border="0"
           src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif"
           alt="Buy Now">
    <img alt="" border="0" width="1" height="1"
         src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" >

</form>

</body>
</html>