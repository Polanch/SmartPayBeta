
@extends('layouts.main_layout')

@section('content')
    <div class="transaction-body">
        <div class="myWallet">
            <img src="/images/wallet.png" id="myWallet-icn">
            <h2>GIVEN SURNAME</h2>
            <P>Available Balance</P>
            <h1>&#8369; 00.00</h1>
        </div>
        <div class="recent-transaction">
            <h1>Recent Transaction</h1>
            <span><p>Date:</p><p>June 24, 2024</p></span>
            <table class="transaction-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Actions</th>
                        <th>Credit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-06-24</td>
                        <td>Sample Action</td>
                        <td class="credit">&#8369; 100.00</td>
                    </tr>
                    <tr>
                        <td>2024-06-24</td>
                        <td>Sample Action</td>
                        <td class="credit">&#8369; 100.00</td>
                    </tr>
                    <tr>
                        <td>2024-06-24</td>
                        <td>Sample Action</td>
                        <td class="credit">&#8369; 100.00</td>
                    </tr>
                    <tr>
                        <td>2024-06-24</td>
                        <td>Sample Action</td>
                        <td class="credit">&#8369; 100.00</td>
                    </tr>
                    <tr>
                        <td>2024-06-24</td>
                        <td>Sample Action</td>
                        <td class="credit">&#8369; 100.00</td>
                    </tr>
                </tbody>
            </table>
            <div class="transaction-footer">
                <a href="">View Statement <img src="/images/arrow-right.png"></a>
            </div>
        </div>
        <div class="transaction-history">
            <div class="transaction-menu">
                <input type="text" class="search-input" placeholder="Search history">
                <select name="" id="" class="sortby">
                    <option value="">Sort By</option>
                </select>
                <select name="" id="" class="filter">
                    <option value="">Filter</option>
                </select>
            </div>
            <table class="super-invoice-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Actions</th>
                        <th>Credit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2026-01-29</td>
                        <td>Streaming Subscription</td>
                        <td class="debit">-&#8369; 150.00</td>
                    </tr>
                    <tr>
                        <td>2026-01-28</td>
                        <td>Refilled Wallet</td>
                        <td class="credit">+&#8369; 500.00</td>
                    </tr>
                    <tr>
                        <td>2026-01-27</td>
                        <td>Groceries</td>
                        <td class="debit">-&#8369; 250.00</td>
                    </tr>
                    <tr>
                        <td>2026-01-26</td>
                        <td>Referral Bonus</td>
                        <td class="credit">+&#8369; 200.00</td>
                    </tr>
                    <tr>
                        <td>2026-01-25</td>
                        <td>Sandwich</td>
                        <td class="debit">-&#8369; 50.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
