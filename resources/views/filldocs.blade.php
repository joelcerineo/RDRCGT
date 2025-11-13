{{-- resources/views/filldocs.blade.php --}}
@include('partial.head')

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<body class="font-sans antialiased relative overflow-x-hidden min-h-screen w-full bg-white flex flex-col"
      x-data="{ sidebarOpen: false }">

  <!-- ===== Top Header ===== -->
  <header class="relative bg-[#001f74] text-white flex items-center justify-center gap-4 py-4 px-6 shadow-xl transition-all duration-500"
          :class="sidebarOpen ? 'bg-[#002a9b] shadow-[0_0_20px_#ffd95080]' : ''">

    <!-- COA Logo -->
    <div class="flex items-center gap-3">
      <img src="{{ asset('image/coa.png') }}" alt="COA Logo"
           class="w-14 h-14 md:w-16 md:h-16 rounded-full border-2 border-[#ffd950] shadow-md animate-logo-flip">
    </div>

    <!-- Animated Title -->
    <h1 class="text-center text-lg md:text-2xl lg:text-3xl font-extrabold tracking-wide leading-snug max-w-3xl mx-auto 
               animate-[flipInX_1s_ease-in-out]">
      Documentary Requirements for Common Government Transactions
    </h1>

    <!-- 🔹 Burger Menu -->
    <div class="absolute top-6 right-6 w-12 h-12 cursor-pointer z-50 flex items-center justify-center 
                bg-gradient-to-br from-[#001f74] to-[#0038a1] border border-[#ffd950]/40 rounded-xl 
                shadow-lg hover:shadow-[#ffd950]/50 hover:scale-105 transition-all duration-300"
         @click="sidebarOpen = !sidebarOpen"
         :class="sidebarOpen ? 'bg-gradient-to-br from-[#ffd950] to-[#ffb400] border-[#ffffff80] rotate-90' : ''">

      <div class="relative w-6 h-5 flex flex-col justify-between items-center transition-all duration-300">
        <span :class="sidebarOpen 
            ? 'absolute top-1/2 w-6 h-[2px] bg-[#001f74] rotate-45 transition-all duration-300' 
            : 'block w-6 h-[2px] bg-white transition-all duration-300'"></span>
        <span :class="sidebarOpen 
            ? 'opacity-0 transition-opacity duration-300' 
            : 'block w-6 h-[2px] bg-white transition-all duration-300'"></span>
        <span :class="sidebarOpen 
            ? 'absolute top-1/2 w-6 h-[2px] bg-[#001f74] -rotate-45 transition-all duration-300' 
            : 'block w-6 h-[2px] bg-white transition-all duration-300'"></span>
      </div>
    </div>
  </header>

  <style>
    @keyframes flipInX {
      from { transform: perspective(400px) rotateX(90deg); opacity: 0; }
      to { transform: perspective(400px) rotateX(0); opacity: 1; }
    }

    @keyframes logoFlip {
      0% { transform: rotateY(0deg); }
      50% { transform: rotateY(180deg); }
      100% { transform: rotateY(360deg); }
    }

    .animate-logo-flip {
      animation: logoFlip 10s linear infinite;
      transform-style: preserve-3d;
    }
  </style>

  <!-- ===== Overlay ===== -->
  <div class="fixed inset-0 bg-black/40 backdrop-blur-sm z-30 transition-opacity duration-500"
       x-show="sidebarOpen"
       @click="sidebarOpen = false"
       x-transition.opacity></div>

  <!-- ===== Sidebar ===== -->
  <aside class="fixed top-0 right-0 h-full w-72 max-w-[90vw] transform transition-all duration-500 ease-in-out 
                z-40 overflow-y-auto border-l border-white/20 text-white shadow-2xl
                bg-gradient-to-b from-[#001f74] via-[#2b1a05]/95 to-[#c59e2a]/80 backdrop-blur-lg"
         :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'">

    <div class="p-6 text-center border-b border-white/20">
      <img src="{{ asset('image/coa.png') }}" alt="User Logo"
           class="w-20 h-20 mx-auto rounded-full border-2 border-[#ffd950] shadow-md mb-3">
      <h2 class="font-bold text-lg tracking-wide">{{ session('username', 'Zack') }}</h2>
      <p class="text-[#ffd950] text-sm">COA Employee</p>
    </div>

    <!-- Sidebar Menu -->
    <ul class="mt-6 space-y-3 px-4" x-data="{ openDocs: false }">
      <!-- Home -->
      <li>
        <a href="{{ route('filldocs') }}"
           class="flex items-center gap-4 px-6 py-3 rounded-xl 
                  bg-white/10 backdrop-blur-md border border-white/20
                  shadow-inner hover:shadow-lg hover:shadow-[#ffd950]/40
                  hover:bg-gradient-to-r hover:from-[#ffd950]/90 hover:to-[#ffb400]/80
                  hover:text-[#4a2b05] text-white transition-all duration-500">
          <span class="text-2xl">🏠</span>
          <span class="text-base font-semibold tracking-wide flex-1 text-left">Home</span>
        </a>
      </li>

      <!-- Document Forms Dropdown -->
      <li>
        <button @click="openDocs = !openDocs"
                class="flex items-center w-full gap-4 px-6 py-3 rounded-xl 
                       bg-white/10 backdrop-blur-md border border-white/20
                       shadow-inner hover:shadow-lg hover:shadow-[#ffd950]/40
                       hover:bg-gradient-to-r hover:from-[#ffd950]/90 hover:to-[#ffb400]/80
                       hover:text-[#4a2b05] text-white transition-all duration-500">
          <span class="text-2xl">📁</span>
          <span class="text-base font-semibold tracking-wide flex-1 text-left">Document Forms</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform transition-transform duration-500"
               :class="openDocs ? 'rotate-90' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>

        <!-- Dropdown -->
        <ul x-show="openDocs" x-transition class="mt-2 ml-10 space-y-1">
          <li><a href="{{ ('docs.cashadvance#') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">1.0 Cash Advance</a></li>
          <li><a href="{{ ('docs.fundtransfernongov') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">2.0 Fund Transfer to (NGOs/POs)</a></li>
          <li><a href="{{ ('docs.fundtransfer') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">3.0 Fund Transfers</a></li>
          <li><a href="{{ ('docs.salary') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">4.0 Salary</a></li>
          <li><a href="{{ ('docs.allowances') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">5.0 Allowances & Honoraria and Other form of Compensation</a></li>
          <li><a href="{{ ('docs.otherexpenditures') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">6.0 Other Expenditures</a></li>
          <li><a href="{{ ('docs.extraordinary') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">7.0 Extraordinary and Miscellaneous Expenses</a></li>
          <li><a href="{{ ('docs.prisoners') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">8.0 Prisoners’ Subsistence Allowance</a></li>
          <li><a href="{{ ('docs.procurement') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">9.0 Procurement</a></li>
          <li><a href="{{ ('docs.cultural') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">10.0 Cultural & Athletic Activities</a></li>
          <li><a href="{{ ('docs.humanresource') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">11.0 Human Resource Development and Training Program</a></li>
          <li><a href="{{ ('docs.financial') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">12.0 Financial Expenses</a></li>
          <li><a href="{{ ('docs.roadrights') }}" class="block px-4 py-2 rounded-lg hover:bg-[#ffd950]/30">13.0 Road Rights of Way(ROw)/Real Property</a></li>
        </ul>
      </li>

      <!-- Records -->
      <li>
        <a href="#"
           class="flex items-center gap-4 px-6 py-3 rounded-xl 
                  bg-white/10 backdrop-blur-md border border-white/20
                  shadow-inner hover:shadow-lg hover:shadow-[#ffd950]/40
                  hover:bg-gradient-to-r hover:from-[#ffd950]/90 hover:to-[#ffb400]/80
                  hover:text-[#4a2b05] text-white transition-all duration-500">
          <span class="text-2xl">📋</span>
          <span class="text-base font-semibold tracking-wide flex-1 text-left">Records</span>
        </a>
      </li>

      <!-- Logout -->
      <li>
        <a href="#"
           class="flex items-center gap-4 px-6 py-3 rounded-xl 
                  bg-white/10 backdrop-blur-md border border-white/20
                  hover:bg-gradient-to-r hover:from-[#b60000] hover:to-[#660000]
                  hover:text-white shadow-inner text-white transition-all duration-500">
          <span class="text-2xl">🚪</span>
          <span class="text-base font-semibold tracking-wide flex-1 text-left">Logout</span>
        </a>
      </li>
    </ul>
  </aside>
























  

<body class="font-sans antialiased bg-gray-50 p-6">

<div class="max-w-5xl mx-auto bg-white shadow-lg rounded-xl p-6 sm:p-8">

  <!-- Header -->
  <header>
    <h1 class="text-2xl md:text-3xl font-bold text-blue-900 mb-6">1.0 Cash Advances</h1>
    <div class="flex flex-wrap gap-3 mb-8 border-b pb-6 border-gray-200">
      <button id="btn-1-1" class="px-4 py-2 rounded-lg bg-blue-700 text-white shadow-md text-sm sm:text-base">1.1 Granting of Cash Advances</button>
      <button id="btn-1-2" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-800 hover:bg-gray-300 text-sm sm:text-base">1.2 Liquidation of Cash Advances</button>
    </div>
  </header>

  <!-- Main Content -->
  <main id="main-content">
    <!-- Granting Section -->
    <div id="section-1-1">
      <div class="text-gray-800 leading-relaxed space-y-6">
        <h2 class="text-xl font-semibold text-blue-900">1.1 Granting of Cash Advances</h2>
    
     
    
          <!-- Documentary Requirements common to all cash advances except for travels -->
    <div class="space-y-4">
      <h3 class="text-lg font-semibold text-blue-900">Documentary Requirements common to all cash advances except for travels</h3>
      <ul class="ml-4 space-y-2 list-none">
        <li><input type="checkbox" class="mr-2">Authority of the accountable officer issued by the Head of the Agency or his duly authorized representative indicating the maximum accountability and purpose of cash advance (for initial cash advance)</li>
        <li><input type="checkbox" class="mr-2">Certification from the Accountant that previous cash advances have been liquidated and accounted for in the books</li>
        <li><input type="checkbox" class="mr-2">Approved application for bond and/or Fidelity Bond for the year for cash accountability of ₱2,000 or more</li>
    </div>
        

        <!-- Payroll Checklist -->
      
    <div class="space-y-4">
      <h3 class="text-lg font-semibold text-blue-900">1.1.1 Payroll Fund for Salaries, Wages, Allowances, Honoraria and Other Similar Expenses</h3>
        <p>The cash advance for payroll fund shall be equal to the net amount of the payroll for the pay period.</h3>
        <h4 class="font-semibold">Additional Documentary Requirements:</h4>
        <ul class="ml-4 space-y-2 list-none">
        <li><input type="checkbox" class="mr-2">Approved contracts (for initial payment)</li>
        <li><input type="checkbox" class="mr-2">Approved Payroll or list of payees indicating their net payments</li>
        <li><input type="checkbox" class="mr-2">Approval/authority (presidential directive or legislative enactment) or legal basis to pay any allowance/salaries/wages/fringe benefits</li>
        <li><input type="checkbox" class="mr-2">Daily time record (DTR) approved by the supervisor</li>
      </ul>
    </div>

        <!-- PCF Checklist -->
       
    <div class="space-y-4">
      <h3 class="text-lg font-semibold text-blue-900">1.1.2 Petty Cash Fund (PCF)</h3>
      <p>The PCF to be set up shall be sufficient for the recurring petty operating expenses of the agency for one month. Payments out of PCF, which shall be made through a Petty Cash Voucher, shall be allowed only for amounts not exceeding ₱15,000 for each transaction.</p>
      <ul class="ml-4 space-y-2 list-none">
        <li><input type="checkbox" class="mr-2">Approved estimates of petty expenses for one month</li>
        <li><input type="checkbox" class="mr-2">Copy of policy for maintaining PCF under the imprest system for GOCCs</li>
        
      </ul>
    </div>



        <!-- COE Checklist -->
   
    <div class="space-y-4">
      <h3 class="text-lg font-semibold text-blue-900">1.1.3 Field/Activity Current Operating Expenses (COE)</h3>
      <p>The PCF to be set up shall be sufficient for the recurring petty operating expenses of the agency for one month. Payments out of PCF, which shall be made through a Petty Cash Voucher, shall be allowed only for amounts not exceeding ₱15,000 for each transaction.</p>
      <ul class="ml-4 space-y-2 list-none">
        <li><input type="checkbox" class="mr-2">Approved Budget for COE of the agency field office or agency activity in the field</li>
      </ul>
    </div>




        <!-- Traveling Checklist -->
        <div class="space-y-4">
          <h3 class="text-lg font-semibold text-blue-900">1.1.4 Traveling Allowances</h3>
          <h4 class="font-semibold">General Guidelines</h4>
          <ul class="list-disc list-inside space-y-2 pl-4">
            <li>Under Section 2, Executive Order (EO) No. 248 dated May 29, 1995...</li>
            <li>No government fund shall be utilized to defray foreign travel expenses...</li>
          </ul>



          <!-- Local Travel -->
   <div class="space-y-4">
      <h3 class="text-lg font-semibold text-blue-900">1.1.4.1 Local Travel</h3>
        <p class="font-semibold text-gray-700">Documentary Requirements:</p>
      <ul class="ml-4 space-y-2 list-none">
        <li><input type="checkbox" class="mr-2">Office Order/Travel Order approved in accordance with Section 3 of EO No. 298</li>
        <li><input type="checkbox" class="mr-2">Duly approved itinerary of travel</li>
        <li><input type="checkbox" class="mr-2">Certification from the accountant that the previous cash advance has been liquidated and accounted for in the books</li>
       
      </ul>
    </div>


   <!-- Foreign Travel -->
<div class="space-y-4">
  <h3 class="text-lg font-semibold text-blue-900">1.1.4.2 Foreign Travel</h3>
  <p class="font-semibold text-gray-700">Documentary Requirements:</p>
  <ul class="ml-4 space-y-2 list-none">
    <li><input type="checkbox" class="mr-2">Office Order/Travel Order approved in accordance with the provisions of Sections 1 and 2 of EO No. 459 dated September 1, 2005
      <ul class="ml-6 space-y-2 list-none">
       <li>
  <input type="checkbox" class="mr-2">As approved by the Office of the President in case of the following officials:
  <ul class="ml-6 list-disc list-inside text-gray-700">
    <li>Members of the cabinet and officials of equivalent rank</li>
    <li>Heads of GOCCs and GFIs under or attached to the Office of the President</li>
    <li>Heads of agencies under or attached to the Office of the President (OP)</li>
    <li>The Chief Justice and Associate Justices of the Supreme Court were exempted under Memorandum Order No. 26 dated July 31, 1986. Under EO No. 477 dated August 21, 1991, the Chairman and Commissioners of the Constitutional Commissions, Chairman and Members of the Commission on Human Rights, Ombudsman and Deputy Ombudsmen were also exempted from securing prior approval from the Office of the President in connection with travels abroad.</li>
  </ul>
</li>

<li>
  <input type="checkbox" class="mr-2">As approved by the respective heads of agencies in the case of other government officials and employees regardless of the length of travel:
  <ul class="ml-6 list-disc list-inside text-gray-700">
    <li>National agencies – Department Secretaries or their equivalents</li>
    <li>GOCCs and GFIs attached to the OP – Heads of the GOCCs or GFIs</li>
    <li>GOCCs and GFIs not attached to the OP – Department Heads to which they are attached</li>
    <li>Provincial Governors and Mayors of highly urbanized cities or independent component cities</li>
    <li>Secretary of the Department of the Interior and Local Government</li>
    <li>State Universities and Colleges (SUCs) – Chairman of CHED for heads of SUCs and respective heads for other officials/employees</li>
    <li>Technical and Vocational Schools – Chairman of TESDA for heads of schools and respective heads for other officials/employees</li>
  </ul>
</li>


    <li><input type="checkbox" class="mr-2">Duly approved itinerary of travel</li>
    <li><input type="checkbox" class="mr-2">Letter of invitation of host/sponsoring country/agency/organization</li>
    <li><input type="checkbox" class="mr-2">For plane fare, quotations of three travel agencies or its equivalent</li>
    <li><input type="checkbox" class="mr-2">Flight itinerary issued by the airline/ticketing office/travel agency</li>
    <li><input type="checkbox" class="mr-2">Copy of the UNDP rate for the daily subsistence allowance (DSA) for the country of destination</li>
    <li><input type="checkbox" class="mr-2">Document to show the dollar to peso exchange rate at the date of grant</li>
    <li><input type="checkbox" class="mr-2">Where applicable, authority from the Office of the President to claim representation expenses</li>
    <li><input type="checkbox" class="mr-2">In case of seminars/trainings
      <ul class="ml-6 space-y-2 list-none text-gray-700">
        <li><input type="checkbox" class="mr-2">Invitation addressed to the agency inviting participants (issued by the foreign country)</li>
        <li><input type="checkbox" class="mr-2">Acceptance of the nominees as participants (issued by the foreign country)</li>
        <li><input type="checkbox" class="mr-2">Programme Agenda and Logistics Information</li>
      </ul>
    </li>
    <li><input type="checkbox" class="mr-2">Certification from the accountant that the previous cash advance has been liquidated and accounted for in the books</li>
  </ul>
</div>



        </div>
      </div>
    </div>































<!-- Liquidation Section -->
<div id="section-1-2" class="hidden">
  <div class="text-gray-800 leading-relaxed space-y-6">
    <h2 class="text-xl font-semibold text-blue-900">1.2 Liquidation of Cash Advances</h2>

    <!-- General Guidelines -->
    <div class="space-y-4">
      <h3 class="font-bold text-gray-800">General Guidelines</h3>
      <ul class="list-disc list-inside space-y-2 pl-4">
        <li><strong>Salaries, Wages, Allowances, Honoraria and Other Similar Payments</strong> – within five calendar days after the end of the pay period</li>
        <li><strong>Field Operating Expenses</strong> – within 30 calendar days after the end of the year...</li>
        <li><strong>Petty Cash Fund (PCF)</strong> – as soon as the disbursements reach 75 percent...</li>
        <li><strong>Traveling Expenses</strong> – within 30 days after the return of the official/employee...</li>
        <li><strong>Special purpose</strong> – as soon as the purpose of the cash advance has been served.</li>
      </ul>
    </div>

    <p>Documentary requirements are similar to Granting but for liquidation, including receipts, vouchers, and supporting documents.</p>

    <!-- 1.2.1 Payroll Fund -->
    <div class="space-y-4">
      <h3 class="text-lg font-semibold text-blue-900">1.2.1 Payroll Fund for Salaries, Wages, Allowances, Honoraria and Other Similar Expenses</h3>
      <ul class="ml-4 space-y-2 list-none">
        <li><input type="checkbox" class="mr-2">Report of Disbursements certified correct by the accountable officer</li>
        <li><input type="checkbox" class="mr-2">Approved payrolls/vouchers duly acknowledged/signed by the payee/s</li>
        <li><input type="checkbox" class="mr-2">Approved daily time records (DTRs) or Certificate of Service</li>
        <li><input type="checkbox" class="mr-2">Approved application for leave</li>
        <li><input type="checkbox" class="mr-2">In case of payment of personnel under the "job order" status, duly verified/accepted accomplishment report</li>
        <li><input type="checkbox" class="mr-2">Official Receipt (OR) in case of refund for unclaimed salaries</li>
        <li><input type="checkbox" class="mr-2">Authority from the claimant and identification documents, if claimed by person other than the payee</li>
        <li><input type="checkbox" class="mr-2">Such other pertinent supporting documents as are required by the nature of expense</li>
      </ul>
    </div>

    <!-- 1.2.2 Petty Cash Fund -->
    <div class="space-y-4">
      <h3 class="text-lg font-semibold text-blue-900">1.2.2 Petty Cash Fund</h3>
      <ul class="ml-4 space-y-2 list-none">
        <li><input type="checkbox" class="mr-2">Summary of Petty Cash Vouchers</li>
        <li><input type="checkbox" class="mr-2">Report of Disbursements</li>
        <li><input type="checkbox" class="mr-2">Petty Cash Replenishment Report</li>
        <li><input type="checkbox" class="mr-2">Approved purchase request with certificate of Emergency Purchase, if necessary</li>
        <li><input type="checkbox" class="mr-2">Bills, receipts, sales invoices</li>
        <li><input type="checkbox" class="mr-2">Certificate of inspection and acceptance</li>
        <li><input type="checkbox" class="mr-2">Report of Waste Materials in case of replacement/repair</li>
        <li><input type="checkbox" class="mr-2">Approved trip ticket, for gasoline expenses</li>
        <li><input type="checkbox" class="mr-2">Canvass from at least three suppliers for purchases involving ₱1,000 and above, except for purchases made while on official travel</li>
        <li><input type="checkbox" class="mr-2">Summary/Abstract of Canvass</li>
        <li><input type="checkbox" class="mr-2">Petty Cash Vouchers duly accomplished and signed</li>
        <li><input type="checkbox" class="mr-2">OR in case of refund</li>

        <!-- Reimbursement of Toll Receipts with children checkboxes -->
        <li>
          <input type="checkbox" class="mr-2">For reimbursement of toll receipts
          <ul class="ml-6 space-y-2 list-none">
            <li><input type="checkbox" class="mr-2">Toll Receipts</li>
            <li><input type="checkbox" class="mr-2">Trip tickets</li>
          </ul>
        </li>

        <li><input type="checkbox" class="mr-2">Such other supporting documents that may be required and/or required under the company policy depending on the nature of expenses</li>
      </ul>
    </div>

    <!-- 1.2.3 Field/Activity Current Operating Expenses -->
    <div class="space-y-4">
      <h3 class="text-lg font-semibold text-blue-900">1.2.3 Field/Activity Current Operating Expenses</h3>
      <p>Same requirements as those for salaries, petty operating expenses, other personal services, and maintenance and other operating expenses depending on the nature of expenses incurred</p>
    </div>

    <!-- 1.2.4 Traveling Expenses -->
    <div class="space-y-4">
      <h3 class="text-lg font-semibold text-blue-900">1.2.4 Traveling Expenses</h3>

      <!-- Local Travel -->
      <div class="pl-4 space-y-2">
        <h4 class="font-semibold">1.2.4.1 Local Travel</h4>
        <ul class="ml-4 space-y-2 list-none">
          <li><input type="checkbox" class="mr-2">Paper/electronic plane, boat or bus tickets, boarding pass, terminal fee</li>
          <li><input type="checkbox" class="mr-2">Certificate of appearance/attendance</li>
          <li><input type="checkbox" class="mr-2">Copy of previously approved Itinerary of Travel</li>
          <li><input type="checkbox" class="mr-2">Revised or supplemental Office Order or any proof supporting the change of schedule</li>
          <li><input type="checkbox" class="mr-2">Revised Itinerary of Travel, if the previous approved itinerary was not followed</li>
          <li><input type="checkbox" class="mr-2">Certification by the Head of Agency as to the absolute necessity of the expenses together with the corresponding bills or receipts, if the expenses incurred for official travel exceeded the prescribed rate per day (certification or affidavit of loss shall not be considered as an appropriate replacement for the required hotel/lodging bills and receipts)</li>
          <li><input type="checkbox" class="mr-2">Liquidation Report</li>
          <li><input type="checkbox" class="mr-2">Reimbursement Expense Receipt (RER)</li>
          <li><input type="checkbox" class="mr-2">OR in case of refund of excess cash advance</li>
          <li><input type="checkbox" class="mr-2">Certificate of Travel Completed</li>
          <li><input type="checkbox" class="mr-2">Hotel room/lodging bills with official receipts in the case of official travel to places within 50-kilometer radius from the last city or municipality covered by the Metro Manila Area, or the city or municipality where their permanent official station is located in the case of those outside the Metro Manila Area, if the travel allowances being claimed include the hotel room/lodging rate</li>
        </ul>
      </div>

      <!-- Foreign Travel -->
      <div class="pl-4 space-y-2">
        <h4 class="font-semibold">1.2.4.2 Foreign Travel</h4>
        <ul class="ml-4 space-y-2 list-none">
          <li><input type="checkbox" class="mr-2">Paper/electronic plane tickets, boarding pass, boat or bus ticket</li>
          <li><input type="checkbox" class="mr-2">Certificate of appearance/attendance for training/seminar/participation</li>
          <li><input type="checkbox" class="mr-2">Bills/receipts for non-commutable representation expenses approved by the President under Section 13 of EO No. 248</li>

          <!-- Reimbursement for actual travel expenses with children checkboxes -->
          <li>
            <input type="checkbox" class="mr-2">For reimbursement of actual travel expenses in excess of the prescribed rate (EO No. 298)
            <ul class="ml-6 space-y-2 list-none">
              <li><input type="checkbox" class="mr-2">Approval by the President</li>
              <li><input type="checkbox" class="mr-2">Certification from the Head of Agency that it is absolutely necessary</li>
              <li><input type="checkbox" class="mr-2">Hotel room bills with official receipts (certification or affidavit of loss shall not be considered as an appropriate replacement for the required hotel/lodging bills and receipts)</li>
            </ul>
          </li>

          <li><input type="checkbox" class="mr-2">Revised Itinerary of Travel, if applicable</li>
          <li><input type="checkbox" class="mr-2">Narrative report on trip undertaken/Report on Participation</li>
          <li><input type="checkbox" class="mr-2">OR in case of refund of excess cash advance</li>
          <li><input type="checkbox" class="mr-2">Certificate of Travel Completed</li>
          <li><input type="checkbox" class="mr-2">Liquidation Report</li>
        </ul>
      </div>
    </div>

  </div>
</div>


  </main>

  <!-- Footer -->
  <footer class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
    <button id="back-btn" class="hidden bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold px-6 py-2 rounded-lg shadow-md transition-all duration-200 ease-in-out">Back</button>
    <button id="next-btn" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-2 rounded-lg shadow-md transition-all duration-200 ease-in-out">Next</button>
  </footer>

</div>

<script>
  const section1 = document.getElementById('section-1-1');
  const section2 = document.getElementById('section-1-2');
  const btnNext = document.getElementById('next-btn');
  const btnBack = document.getElementById('back-btn');
  const btnTop1 = document.getElementById('btn-1-1');
  const btnTop2 = document.getElementById('btn-1-2');

  function showSection(section) {
    if(section === '1.1') {
      section1.classList.remove('hidden');
      section2.classList.add('hidden');
      btnNext.textContent = 'Next';
      btnBack.classList.add('hidden');
      btnTop1.classList.add('bg-blue-700','text-white');
      btnTop1.classList.remove('bg-gray-200','text-gray-800');
      btnTop2.classList.remove('bg-blue-700','text-white');
      btnTop2.classList.add('bg-gray-200','text-gray-800');
    } else {
      section1.classList.add('hidden');
      section2.classList.remove('hidden');
      btnNext.textContent = 'Submit';
      btnBack.classList.remove('hidden');
      btnTop2.classList.add('bg-blue-700','text-white');
      btnTop2.classList.remove('bg-gray-200','text-gray-800');
      btnTop1.classList.remove('bg-blue-700','text-white');
      btnTop1.classList.add('bg-gray-200','text-gray-800');
    }
  }

  btnNext.addEventListener('click', () => {
    if(!section1.classList.contains('hidden')) {
      showSection('1.2'); // Go to 1.2
    } else {
      // Submit action: check all checkboxes in 1.2
      const checkboxes = section2.querySelectorAll('input[type="checkbox"]');
      checkboxes.forEach(cb => cb.checked = true);
      alert('All items in Section 1.2 have been marked as complete!');
    }
  });

  btnBack.addEventListener('click', () => showSection('1.1'));

  btnTop1.addEventListener('click', () => showSection('1.1'));
  btnTop2.addEventListener('click', () => showSection('1.2'));
</script>

</body>
</html>

    </div>
  </main>

  <!-- ===== Footer ===== -->
  <footer class="relative z-10 bg-[#860101ff] text-white text-center py-3 w-full">
    <div class="max-w-3xl mx-auto px-4">
      <p class="text-lg md:text-xl font-semibold tracking-wide drop-shadow-md">COMMISSION ON AUDIT</p>
      <p class="text-sm opacity-90">Commonwealth Avenue, Quezon City, Philippines</p>
      <p class="text-xs mt-2 text-[#ffd950] font-medium">© {{ date('Y') }} All Rights Reserved</p>
    </div>
  </footer>
</body>
</html>
