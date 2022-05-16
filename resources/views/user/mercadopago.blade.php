<script src="https://sdk.mercadopago.com/js/v2"></script>

@php
    require('../vendor/autoload.php');
    MercadoPago\SDK::setAccessToken('TEST-1421700133297744-101717-d3fb60e18a18166cc7119133777038be-452151561');
    $preference = new MercadoPago\Preference();
    $item = new MercadoPago\Item();
    $item->id = '0001';
    $item->title = 'Donacion';
    $item->quantity = 1;
    $item->unit_price = 99.00;
    $item->currency_id = 'MXN';

    $preference->items = array($item);

    $preference->back_urls = array(
        "sucess" => "http://proyectofinal_readbooks.test/libros"
    );

    $preference->auto_return = "approved";
    $preference->binary_mode = true;
    $preference->save();

@endphp

<div class="checkout-btn">
    {{-- <button type="button" class=""></button> --}}
</div>

<script>
    const mp = new MercadoPago('TEST-69f3723f-1a01-449e-a739-6922530b28c5',{
        locale: 'es-MX',
    });
    mp.checkout({
        preference:{
            id: "<?php echo $preference->id; ?>",//1421700133297744'
        },
        render:{
            container: '.checkout-btn',
            label: 'Donar',
        }
    });
</script>



