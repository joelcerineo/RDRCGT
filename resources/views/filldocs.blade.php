{{-- resources/views/filldocs.blade.php --}}
@include('partial.head')

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<body class="font-sans antialiased relative overflow-x-hidden min-h-screen w-full bg-white flex flex-col"
      x-data="{ sidebarOpen: false, sidebarTheme: 'blue', docMenu: false }">

  <!-- ===== Top Header ===== -->
  <header class="relative bg-[#001f74] text-white text-center py-8 md:py-1 px-4 shadow-xl w-full flex-shrink-5 transition-all duration-500"
          :class="sidebarOpen ? 'bg-[#002a9b] shadow-[0_0_20px_#ffd95080]' : ''">
    <h1 class="text-xl md:text-2xl lg:text-3xl font-extrabold leading-snug tracking-wide max-w-5xl mx-auto">
      Revised Documentary<br>
      Requirements for Common<br>
      Government Transactions
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

    <ul class="mt-6 space-y-3 px-4">
      @php
        $links = [
          ['🏠', 'Home', ''],
          ['📄', 'All Pages', '/filldocs'],
          ['📜', 'Circulars', '/circular'],
          ['📋', 'Records', '/records'],
          ['🚪', 'Logout', '/logout', 'logout']
        ];
      @endphp

      @foreach ($links as $link)
        <li>
          <a href="{{ url($link[2]) }}"
             class="flex items-center gap-4 px-6 py-3 rounded-xl 
                    bg-white/10 backdrop-blur-md border border-white/20
                    shadow-inner hover:shadow-lg hover:shadow-[#ffd950]/40
                    hover:text-[#4a2b05] text-white relative group
                    overflow-hidden transition-all duration-500 ease-in-out
                    {{ isset($link[3]) && $link[3] === 'logout' 
                        ? 'hover:bg-gradient-to-r hover:from-[#b60000] hover:to-[#660000] hover:text-white border-none' 
                        : 'hover:bg-gradient-to-r hover:from-[#ffd950]/90 hover:to-[#ffb400]/80' }}">
            <span class="absolute left-0 top-0 h-full w-[4px] bg-[#ffd950] scale-y-0 group-hover:scale-y-100 origin-top transition-transform duration-500"></span>
            <span class="text-2xl transform transition-transform duration-500 group-hover:scale-125 group-hover:rotate-6">{{ $link[0] }}</span>
            <span class="text-base font-semibold tracking-wide flex-1 text-left">{{ $link[1] }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 text-[#4a2b05]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </li>
      @endforeach
    </ul>
  </aside>

  <!-- ===== Yellow Panels ===== -->
  <div class="absolute top-0 left-0 h-full w-[20%] bg-[#e7bd00ff] clip-left z-0"></div>
  <div class="absolute top-0 right-0 h-full w-[25%] bg-[#e7bd00ff] clip-right z-0"></div>

  <!-- ===== Main Content ===== -->
  <main id="mainContent" class="relative z-10 flex-grow px-10 py-10 overflow-y-auto">
    <div class="space-y-6">

      <!-- ===== Document Buttons Header ===== -->
      <div class="bg-[#E6EBF3] px-6 py-4 rounded-t-xl shadow-sm flex flex-wrap justify-start items-center gap-4 relative">

        <!-- 1.0 -->
        <a class="doc-btn">1.0 Cash Advance</a>

        <!-- 2.0 -->
        <a class="doc-btn">2.0 Fund Transfer to Non-Government</a>

        <!-- Dropdown Menu Trigger -->
        <div class="relative" x-data="{ open: false }">
          <button @click="open = !open"
                  class="doc-btn flex items-center gap-2">
            More Sections ▾
          </button>

          <div x-show="open" @click.away="open = false"
               x-transition
               class="absolute mt-2 w-64 bg-white border border-[#001f74]/40 rounded-xl shadow-xl p-3 z-50">
            @foreach ([
              '3.0 Fund Transfer',
              '4.0 Salary',
              '5.0 Allowances & Honoraria',
              '6.0 Other Expenditures',
              '7.0 Extraordinary Expenses',
              '8.0 Prisoners’ Subsistence',
              '9.0 Procurement',
              '10.0 Cultural & Athletic',
              '11.0 Human Resource Dev.',
              '12.0 Financial Expenses',
              '13.0 Road Rights of Way'
            ] as $item)
              <a class="block px-3 py-2 rounded-lg text-[#001f74] font-medium hover:bg-[#001f74] hover:text-[#ffd950] transition">{{ $item }}</a>
            @endforeach
          </div>
        </div>
      </div>

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

  <style>
    .clip-left { clip-path: polygon(0 0, 40% 0, 90% 100%, 0% 100%); }
    .clip-right { clip-path: polygon(70% 0, 100% 0, 100% 100%, 30% 100%); }
    .doc-btn {
      display: inline-block;
      padding: 12px 24px;
      font-weight: 600;
      color: #001f74;
      background: white;
      border: 2px solid #001f74;
      border-radius: 8px;
      text-align: center;
      transition: all 0.3s ease-in-out;
      cursor: pointer;
    }
    .doc-btn:hover {
      background: #001f74;
      color: #ffd950;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .doc-btn.active {
      background: #001f74;
      color: #ffd950;
      border-color: #ffd950;
      box-shadow: 0 0 10px rgba(255,217,80,0.6);
    }
  </style>
  hahahahaha
</body>
</html>
