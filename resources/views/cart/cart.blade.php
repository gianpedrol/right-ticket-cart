<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
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
                    <div class="col-md-6 pt-5 d-flex justify-content-center align-items center ">
                        <div class="image-event text-center">
                            <img src="https://ingresso-a.akamaihd.net/prd/img/movie/thor-amor-e-trovao/514a36c8-1e3f-4a26-a30a-04e58b9eb9a5.jpg"
                                alt="">
                        </div>
                    </div>
                    <div class="col-md-6  d-flex justify-content-start align-items-start pt-5">
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
                                            <tr>
                                                <td>
                                                    <h5>Ticket Type</h5>
                                                </td>
                                                <td>
                                                    <h5>Quantity</h5>
                                                </td>
                
                                                <td>
                                                    <h5>Price</h5>
                                                </td>
                                                <td>
                                                    <h5>Tax</h5>
                                                </td>
                                                <td>
                                                    <h5>Subtotal</h5>
                                                </td>
                                            </tr>
                                        </thead>
                                        @foreach ($item['ticketType'] as $key => $value)
                                            <tbody>
                                                <tr id="row">
                                                    <td>
                                                        <p>{{$value->TicketName}}</p>
                                                    </td>
                                                    <td>
                                                        <input id="qty_{{$key}}" type="number" onchange="Multiplica({{$key}})" min="0">
                                                    </td>
                                                    <td>
                                                       <span>$</span> <span id="price_{{$key}}">{{$value->Price}}</span>
                                                    </td>
                                                    <td>
                                                        <span>$</span>  <span id="tax_{{$key}}">{{$value->TaxAmount}} </span><span>each</span>
                                                    </td>
                                                    
                                                    <td>
                                                        <span name="total" id="subtotal_{{$key}}">0.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="total"><h5>Total :</h5></td>
                                                <td class="total">
                                                    <span id="totalTicket">0.00</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <table>

                                    </table>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="container pt-3">
        <div class="row">
            <div class="col-md-6 pb-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5>Customer Info</h5>
                    </div>
                    <div class="card-body">
                        <form action="">
                                <label for="" class="company-name">
                                    <h6>
                                        Company Name
                                    </h6>
                                    <input class="form-control" type="text" name="" id="">
                                </label>

                                <label for="" class="pt-2">
                                    <h6>
                                        First Name:
                                    </h6>
                                    <input class="form-control" type="text" name="" id="">
                                </label>
                                <label for="" class="pt-2">
                                <h6>
                                    Last Name:
                                </h6>
                                <input class="form-control" type="text" name="" id="">
                            </label>
                            <label for="" class="pt-2">
                                <h6>
                                    Email:
                                </h6>
                                <input  class="form-control" type="email" name="" id="">
                            </label>
                            <label for="" class="pt-2">
                                <h6>
                                    Telephone:
                                </h6>
                                <input class="form-control" type="phone" name="" id="">
                            </label>
                            <label for="" class="pt-2">
                                <h6>
                                    ZipCode:*
                                </h6>
                                <input class="form-control" type="text" name="" id="">
                            </label>
                            <div class="custom-control custom-switch ml-5 pt-2">
                                <h6>Opt-in to email/sms communications:</h6>
                                <input type="checkbox" class="custom-control-input" id="chkOptin" name="chkOptin">
                                <label class="custom-control-label" for="chkOptin">Yes</label>
                                </div>
                                <div class="custom-control custom-switch ml-5 pt-2" >
                                    <h6>Agrees to Terms & Conditions:</h6>
                                    <input type="checkbox" class="custom-control-input" id="chkOptin" name="chkOptin">
                                    <label class="custom-control-label" for="chkOptin">Yes</label>
                                    </div>
                        </form>
                    </div>
    
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Credit Card</strong>
                        <small>enter your card details</small>
                    </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" id="name" type="text" placeholder="Enter your name">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ccnumber">Credit Card Number</label>
                            
                            
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="email">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i style=" font-size: 1.75rem"class="fa-solid fa-credit-card"></i>
                                    </span>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="ccmonth">Month</label>
                        <select class="form-control" id="ccmonth">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        </select>
                    </div>
                <div class="form-group col-sm-4">
                    <label for="ccyear">Year</label>
                        <select class="form-control" id="ccyear">
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cvv">CVV/CVC</label>
                        <input class="form-control" id="cvv" type="text" placeholder="123">
                    </div>                
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-success float-right" type="submit">
                    <i class="mdi mdi-gamepad-circle"></i> Continue</button>
                    <button class="btn btn-sm btn-danger" type="reset">
                    <i class="mdi mdi-lock-reset"></i> Reset</button>
                    </div>
                </div>
        </div>
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

            var valor = $("#price_"+id).text();
            var quantity = $("#qty_" +id).val();
            var tax = $("#tax_" +id).text();
            let subtotal = quantity * (valor * tax);

            $("#subtotal_"+id).html('$ ' + subtotal.toFixed(2));
                var total = 0;
            $('table tbody tr td:last-child').each(function(){
            total +=  parseFloat($(this).text().replace('$','')); 
               
            });

            $("#totalTicket").html('$ ' + total.toFixed(2));
        }
    </script>

    <script src="{{ asset('/js/app.js') }}">
        < /body>


        <
        /html>
