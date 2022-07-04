@extends('guider.layouts.main')
@section('content')



    <style>
        #load {
            /* position: fixed; */

            left: 0;

            top: 0;

            z-index: 9999999;

            width: 100%;

            /* height: 100%; */

            /* overflow: visible; */

            /* background: rgb(255 255 255 / 65%) url("


        {{asset('images/loader.gif')}}   ") no-repeat center center; */

            color: #000;


        }
    </style>
    @push('css')

        <style>
            #load {
                position: fixed;

                left: 0;

                top: 0;

                z-index: 9999999;

                width: 100%;

                height: 100%;

                overflow: visible;

                background: rgb(255 255 255 / 65%) url("{{asset('images/loader.gif')}}") no-repeat center center;

                color: #000;


            }

            /*packages page css start */

            .packagesbox:hover {
                transition: all .5s ease;
                background: #101954;
            }

            .packagesbox {
                box-shadow: rgb(0 0 0 / 46%) 1px 1px 10px;
                background: #fff;
                padding: 30px;
                border-radius: 15px;
                transition: all 0.5s ease-in-out;
            }

            .packagesbox small {
                color: #32004a;
                display: block;
                text-align: center;
                font-size: 24px;
                font-weight: 600;
            }

            .packagesbox:hover small {
                color: #fff;
            }

            .packagesbox:hover h5 {
                color: #fff;
            }

            .packagesbox span {
                color: #f8c22c;
                display: block;
                text-align: center;
                font-size: 35px;
                font-weight: 600;
            }

            .packagesbox:hover ul li {
                color: #fff;
            }

            .packagesbox ul li {
                color: #32004a;
                font-size: 14px;
                font-weight: 500;
                margin: 0 0 10px;
            }

            .btn-primary:hover {
                color: #fff;
                background: #3d0657;
                border-color: #3d0657;
            }

            .scrollbar {
                float: left;
                height: 290px;
                overflow-y: scroll;
                width: 100%;
                overflow-x: hidden;
                background: 0 0;
                margin: 10px 0 40px;
            }

            .packagesbox a {
                display: table;
                margin: 0 auto;
            }

            .btn-primary {
                color: #fff;
                border-color: #c653ff;
                padding: 13px 30px;
                background-image: linear-gradient(to right, #32004a, #c653ff);
                background-color: #c653ff;
            }

            .btn-primary:hover {
                color: #fff;
                background: #f8c22c;
                border-color: #f8c22c;
            }

            .packagesbox:hover h5 {
                color: #fff;
            }

            .packagesbox:hover .btn-primary {
                border-color: #f8c22c;
                background-color: #f8c22c;

            }

            .packagesbox h5 {
                text-align: center;
                margin: 10px 0 10px 0;
            }

            #style-3::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
                background: #3d0657
            }

            #style-3::-webkit-scrollbar {
                width: 4px;
                background: #0a021d
            }

            #style-3::-webkit-scrollbar-thumb {
                background: #f8c22c;
            }

            .btn-primary {
                color: #fff;
                border-color: #0a021d;
                padding: 13px 30px;
                background: #0a021d;
            }

            .price_main {
                padding: 2% 0;
            }

            .footerCopyRight {
                position: fixed;
            }
        </style>
    @endpush

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <div class="price_main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="review bil_head">
                        <h2><strong>
                                Payment Information (Credit, Debit and Gift Card)
                            </strong></h2>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="review bil_head">
                        <h2><strong>
                                Pay With Crypto Currency - MetaMask
                            </strong></h2>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form role="form" action="{{route('stripe_post')}}" method="post" class="require-validation"
                          data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                          id="payment-form">
                        @csrf
                        <input type="text" name="plan_id" hidden value="{{$plan_id}}">
                        <div class='form-row row'>
                            <input type="text" id="finaltotal" name="finaltotal" value="0" hidden/>
                            <div class='col-md-12 col-sm-12 col-xs-12 form-group required'>
                                <div class="my_re">
                                    <label class='control-label'>Name on Card</label>
                                    <input class='form-control' size='4' type='text' id="name">
                                </div>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 col-sm-12 col-xs-12 form-group '>
                                <div class="my_re">
                                    <label class='control-label'>Card Number</label>
                                    <input autocomplete='off' class='form-control card-number' maxlength="16" size='20'
                                           type='text' id="cart_no">
                                </div>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                                class='form-control card-cvc'
                                                                                placeholder='ex. 311' maxlength="3"
                                                                                type='password' id="cvc">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' maxlength="2" placeholder='MM' size='2'
                                    type='text' id="e_month">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' maxlength="4" placeholder='YYYY' size='4'
                                    type='text' id="e_year">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-md-12 error form-group d-none'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                           id="agreedcheck">
                                    <label class="form-check-label" for="agreedcheck">
                                        I Agreed to the Terms.
                                    </label>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">

                                <button id="paynow" class="btn btn-primary btn-lg btn-block" type="submit"
                                        onClick="myFunction()">Pay
                                    Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <img src="{{asset('images/metamask.gif')}}" alt="" height="65%">
                    <div class="row">
                        <div class="col-xs-12">
                            <button id="payEthBtn" class="btn btn-primary btn-lg btn-block" type="submit"
                            >Pay With Meta
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"
            type="application/javascript"></script>
    <script>

        $(document).ready(function () {

            let eth_url = 'https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=ETH,USD';
            let eth_data = "";
            let eth_res = AjaxRequest_get(eth_url, eth_data);

            var plan_price = 0;
            let url = '{{route('guider_eth_conversion',$plan_id)}}';
            let data = {'eth_res_usd': eth_res.USD, '_token': '{{csrf_token()}}'};
            let res = AjaxRequest(url, data);
            if (res.status == 1) {
                // var plan_price =  res.plan_eth; //For Live
                var plan_price = 0.00001; //For Testing
            } else {
                var plan_price = 0;
                toastr["error"]("Ethereum conversion error");
            }

            const payEthBtn = document.querySelector("#payEthBtn");

            const startPayment = async ({ether, addr}) => {
                try {
                    if (!window.ethereum) throw new Error("No crypto wallet found. Please install it.");

                    await window.ethereum.send("eth_requestAccounts");
                    toastr["success"]("MetaMask is installed!");
                    const provider = new ethers.providers.Web3Provider(window.ethereum);
                    const signer = provider.getSigner();
                    ethers.utils.getAddress(addr);

                    const transaction = await signer.sendTransaction({
                        to: addr,
                        value: ethers.utils.parseEther(ether)
                    });
                    const {hash, from} = transaction;

                    let val_meta_url = 'https://blockexplorer.rinkeby.boba.network/api?module=transaction&action=gettxreceiptstatus&txhash=' + hash;
                    let val_meta_data = "";
                    let val_meta_res = AjaxRequest_get(val_meta_url, val_meta_data);

                    if (val_meta_res.status == 1) {
                        var url = '{{route('Guider_meta_form',$plan_id)}}';
                        var data = {'hash': hash, 'from': from, '_token': '{{csrf_token()}}'};
                        var res = AjaxRequest(url, data);
                        setTimeout(() => { toastr["success"](res.message);}, 5000);
                        //redirect user
                        window.location = '{{route('Guider_packages')}}';
                    } else {
                        toastr["error"](val_meta_res.message);
                    }

                } catch (err) {
                    toastr["error"](err.message);
                }
            }

            payEthBtn.addEventListener("click", () => {

                if (plan_price != 0) {
                    startPayment({ether: plan_price.toString(), addr: "0x85daC253A7F3E43bAa693127Ace50688416aD792"})
                } else {
                    toastr["error"]("Price Not Found");
                }
            })
        });
    </script>
    <!--  Meta End -->
    <!--  Stripe -->
    <script type="text/javascript">
        $(function () {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function (e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]',
                        'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(
                        inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data(
                        'stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month')
                            .val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });
            $('#paynow').prop('disabled', true);
            $('#agreedcheck').click(function () {
                let checkvalues = false;
                if ($('#name').val() == '' ||
                    $('#cart_no').val() == '' ||
                    $('#cvc').val() == '' ||
                    $('#e_month').val() == '' ||
                    $('#e_year').val() == ''
                ) {
                    checkvalues = false;
                    $('#agreedcheck').prop('checked', false);
                } else {
                    checkvalues = true;
                }
                if (checkvalues == true) {
                    if ($(this).is(':checked')) {
                        $('#paynow').prop('disabled', false);
                    } else {
                        $('#paynow').prop('disabled', true);
                    }
                } else {
                    alert('Fill all input fields');
                }
            });


            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error').removeClass('d-none').find('.alert').text(response.error.message);
                    $('.preloader').removeClass('block').addClass('d-none');
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append(
                        "<input type='hidden' name='stripeToken' value='" +
                        token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endpush
<!-- <div class="preloader d-none" id="load" ></div>
    @push('js')
    <script>
        function myFunction() {
            $('.preloader').removeClass('d-none').addClass('d-block');
        }
    </script>
@endpush -->
