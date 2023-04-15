
<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
											
    <li class="nav-item active">
        <a class="nav-link text-active-primary me-6 " href="{{route('accounting_overview')}}"> Overview </a>
    </li>

    
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item">
        <!-- <a class="nav-link text-active-primary me-6 " href="{{route('manage_accounting')}}">Accounts </a> -->
        <a href="#" class="nav-link text-active-primary me-6" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Accounts </a>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="{{route('manage_account')}}" class="menu-link px-3">Manage Accounts</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="{{url('account-balance-sheets')}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Balance Sheet</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="{{url('account-statement')}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Account Statement</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
    </li>

     <li class="nav-item">
        <!-- <a class="nav-link text-active-primary me-6 " href="{{route('manage_accounting')}}">Accounts </a> -->
        <a href="#" class="nav-link text-active-primary me-6" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Transaction </a>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="{{route('transaction')}}" class="menu-link px-3">View Transaction</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="{{url('make_transaction')}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">New Transaction</a>
                                                        </div>
                                                         <div class="menu-item px-3">
                                                            <a href="{{url('account-transfer')}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">New Transfer</a>
                                                        </div>
                                                          <div class="menu-item px-3">
                                                            <a href="{{url('account-income')}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Income</a>
                                                        </div>
                                                         <div class="menu-item px-3">
                                                            <a href="{{url('account-expense')}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Expense</a>
                                                        </div> <div class="menu-item px-3">
                                                            <a href="{{url('account-transactions')}}" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Client Transaction</a>
                                                        </div>
                                                        
                                                        <!--end::Menu item-->
                                                    </div>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link text-active-primary me-6" href="{{route('account_income')}}">Income </a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-active-primary me-6" href="{{route('account_expense')}}">Expense </a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link text-active-primary me-6" href="{{route('account_transactions')}}">Customers </a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-active-primary me-6" href="{{ route('accounting_invoice') }}">Invoices </a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-active-primary me-6" href="{{ route('view_sales') }}">Store Sales </a>
    </li>
  
   <li class="nav-item">
        <a class="nav-link text-active-primary me-6" href="{{ route('view_online_sales') }}">Online Sales </a>
    </li>

     <!--{{-- <li class="nav-item">
        <a class="nav-link text-active-primary me-6" href="{{route('account_balance_sheet')}}">Balance Sheet </a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link text-active-primary me-6" href="{{route('account_statement')}}">Account Statement </a>
    </li>----->

    <li class="nav-item">
        <a class="nav-link text-active-primary me-6" href="{{route('account_transfer')}}">Account Transfer </a>
    </li>
</ul>
<br>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
