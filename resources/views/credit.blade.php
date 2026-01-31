
@extends('layouts.main_layout')


@section('content')
    <div class="credit-body">
		<div class="alert-window">
			@if(session('success'))
				<div class="alert alert-success">
                    <h1>Payment Successful!</h1>
                    <p>{{ session('success') }}</p>
                </div>
			@endif
			@if(session('error'))
				<div class="alert alert-danger">
                    <h1>{{ session('error') }}</h1>
                    <p>Failed! Please Try Again!</p>
                </div>
			@endif
		</div>
    </div>

    <div class="payment-methods">
        <button></button>
        <button></button>
    </div>

	<div class="credit-card-window">
		<form method="POST" action="/payment/credit">
			@csrf
			<h2>Credit Card Payment</h2>
			<div>
				<label for="amount">Amount</label>
				<input type="number" id="amount" name="amount" required min="1" step="0.01" placeholder="Enter amount">
			</div>
			<div>
				<label for="cardholder_name">Cardholder Name</label>
				<input type="text" id="cardholder_name" name="cardholder_name" required>
			</div>
			<div>
				<label for="card_number">Card Number</label>
				<input type="text" id="card_number" name="card_number" required maxlength="19" placeholder="1234 5678 9012 3456">
			</div>
			<div>
				<label for="exp_month">Expiry Month</label>
				<input type="text" id="exp_month" name="exp_month" required maxlength="2" placeholder="MM">
			</div>
			<div>
				<label for="exp_year">Expiry Year</label>
				<input type="text" id="exp_year" name="exp_year" required maxlength="4" placeholder="YYYY">
			</div>
			<div>
				<label for="cvc">CVC</label>
				<input type="text" id="cvc" name="cvc" required maxlength="4" placeholder="CVC">
			</div>
			<div>
				<label for="email">Email</label>
				<input type="email" id="email" name="email" required placeholder="Email">
			</div>
			<button type="submit">Proceed Payment</button>
		</form>
	</div>
	<div class="gcash-card-window">
		<form method="POST" action="/payment/gcash">
			@csrf
			<h2>GCash Payment</h2>
			<div>
				<label for="gcash_amount">Amount</label>
				<input type="number" id="gcash_amount" name="amount" required min="1" step="0.01" placeholder="Enter amount">
			</div>
			<div>
				<label for="gcash_name">Name</label>
				<input type="text" id="gcash_name" name="name" required placeholder="Full Name">
			</div>
			<div>
				<label for="gcash_email">Email</label>
				<input type="email" id="gcash_email" name="email" required placeholder="Email">
			</div>
			<button type="submit">Pay with GCash</button>
		</form>
	</div>
@endsection
