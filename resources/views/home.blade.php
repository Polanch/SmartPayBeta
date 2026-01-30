@extends('layouts.main_layout')

@section('content')
    <div class="home-body">
        <div class="home-box">
            <div class="wallet-container">
                <div class="wallet-header">
                    <h1>Wallet</h1>
                    <button id="wallet-option-btn"><img src="/images/dots.png" alt=""></button>
                </div>
                <div class="wallet-info">
                    <h4>Total Balance</h4>
                    <span id="balance-info"><h1>&#x20B1;</h1><h1 id="balance-amount">100.00</h1></span>
                    <p>&#9733;&#9733;&#9733;&#9733;&#9733;</p>
                    <span id="wallet-more-info"><p id="rfid-holder">124-578-9089</p><p>January 2024</p></span>
                    <span class="peso-icon">&#x20B1;</span>
                </div>
                <div class="card-container">
                    <div class="card-details">
                        <h4>Card Details</h4>
                        <div class="card-header">
                        <div class="card-header-info">
                            <span class="card-name">Princess R. Benigno</span>
                            <span class="card-number">123-456-7890</span>
                        </div>
                        <img src="/images/chip.png" class="chip-icon" alt="chip">
                        </div>
                        <div id="card-more-info" class="lock-card-row">
                            <div class="lock-card-left">
                                <img src="/images/lock.png" class="lock-icon" alt="Lock">
                                <div class="lock-card-text">
                                    <h4>Lock Card</h4>
                                    <p>Block transactions made with this card</p>
                                </div>
                            </div>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-box">
            <h2>WELCOME,</h2>
            <h1>GIVEN SURNAME M.I.</h1>
            <span><img src="/images/lrn.png" id="lrn_icon"><p>102450090026</p></span>
        </div>
        <div class="home-box">
            <div class="spending-container">
                <h2>My Invoice &nbsp;<img src="/images/invoice.png" id="invoice-icn"></h2>
                <div class="invoice-container">
                    <p>Today's Spending</p>
                    <h1>&#x20B1; 100.00</h1>
                    <h3>Recent Purchases</h3>
                    <table class="invoice-table">
                        <thead>
                                <tr>
                                    <th colspan="2">Item Name</th>
                                    <th>Price</th>
                                    <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="/images/sample.png" alt="item" style="width:32px;height:32px;"></td>
                                <td>Sample Item</td>
                                <td>₱50.00</td>
                                <td>2026-01-29</td>
                            </tr>
                            <tr>
                                <td><img src="/images/sample.png" alt="item" style="width:32px;height:32px;"></td>
                                <td>Sample Item</td>
                                <td>₱50.00</td>
                                <td>2026-01-29</td>
                            </tr>
                            <tr>
                                <td><img src="/images/sample.png" alt="item" style="width:32px;height:32px;"></td>
                                <td>Sample Item</td>
                                <td>₱50.00</td>
                                <td>2026-01-29</td>
                            </tr>
                            <tr>
                                <td><img src="/images/sample.png" alt="item" style="width:32px;height:32px;"></td>
                                <td>Sample Item</td>
                                <td>₱50.00</td>
                                <td>2026-01-29</td>
                            </tr>
                            <tr>
                                <td><img src="/images/sample.png" alt="item" style="width:32px;height:32px;"></td>
                                <td>Sample Item</td>
                                <td>₱50.00</td>
                                <td>2026-01-29</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
@endsection
