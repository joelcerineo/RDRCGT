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

  <!-- ===== Main Content ===== -->
  <main id="mainContent" class="relative z-10 flex-grow px-10 py-10 overflow-y-auto">
    <div class="bg-[#E6EBF3] px-6 py-4 rounded-xl shadow-md text-[#001f74] font-semibold text-lg">
      <p>Select any section from the sidebar menu to view its document form.</p>
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
