<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css"
        integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css"
        integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/regular.min.css"
        integrity="sha512-YoxvmIzlVlt4nYJ6QwBqDzFc+2aXL7yQwkAuscf2ZAg7daNQxlgQHV+LLRHnRXFWPHRvXhJuBBjQqHAqRFkcVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/solid.min.css"
        integrity="sha512-qzgHTQ60z8RJitD5a28/c47in6WlHGuyRvMusdnuWWBB6fZ0DWG/KyfchGSBlLVeqAz+1LzNq+gGZkCSHnSd3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <script></script>


    <title>Buy Right Ticket</title>
</head>

<body>


    <header>
        <div class="container">
            <div class="row">
                <div class="col-md 6 logo d-flex justify-content-start">
                    <img src="images/right-ticket.png" alt="">
                </div>
                <div class=" col-md 6 cart d-flex justify-content-end">
                    <a href="http://localhost/right-ticket/public/events/cart/checkout"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>

        </div>
    </header>


    <div class="container">
        <div class="row">
            @if ($event != null)
                @foreach ($event as $item)
                    <div class="col-md-6">
                        <div class="image-event">
                            <img src="https://ingresso-a.akamaihd.net/prd/img/movie/thor-amor-e-trovao/514a36c8-1e3f-4a26-a30a-04e58b9eb9a5.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="event-info">

                            <h2>{{ $item['EventName'] }}</h2>
                            <div class="event-description">
                                <p>{{ $item['Description'] }}</p>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">

                                    <div class="card-title">
                                        <h3>Choose Tickets</h3>
                                    </div>
                                </div>
                                <div class="card-body choose-ticket">
                                    <table>
                                        <thead>
                                            <td>Type</td>
                                            <td>Qty</td>
                                            <td>Price</td>
                                            <td>Subtotal</td>
                                        </thead>
                                        @foreach ($item['ticketType'] as $key => $value)
                                            <tbody>
                                                <tr id="row">
                                                    <td>{{ $value->TicketName }}</td>
                                                    <td><input type="number" id="qty_"
                                                            onchange="Multiplica({{ $item['EventID'] }})"
                                                            min="0">0</td>
                                                    <td id="price_col">
                                                        <div class="input-group-prepend ">
                                                            <span class="input-group-text w-50">$<span
                                                                    id="price_">{{ $value->Price }}</span></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group-prepend ">
                                                            <span class="input-group-text w-50">$ <span
                                                                    id="subtotal_{{ $item['EventID'] }}"></span></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous"></script>


    @yield('scripts')
    <script>
        function Multiplica(id) {

            //var valor = $('#price_' + id).text();
            var quantidades = 0;
            //procura todos os elementos em que o id começa com preco_ e que está dentro de uma td
            $("#price-col").each(function(id) {
                //conteudo da tag td que tem id começando com #preco_
                var valor = $("#price_").text();
                var quantity = $("#qty_").val();
                console.log(quantity);

                //encontra a tag tr pai da tag td, depois encontra a tag quantity-col 
                //e retorna o valor do input
                var quantidade = $(this).parent().find('.quantity-col').find('input').val();

                if (quantidade != '') {
                    quantidades = parseInt(quantidade) + quantidades;
                }
                totals += (valor * quantidade);

            });
            //  $("#totalSoma").text(number_format(totals, '2', ',', '.'));
            // $("#totalQuantidade").html(quantidades);
        }
    </script>

    <script src="{{ asset('/js/app.js') }}">
        < /body>


        <
        /html>
