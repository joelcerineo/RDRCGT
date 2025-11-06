{{-- resources/views/index.blade.php --}}
@include('partial.head')

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<body class="font-sans antialiased relative overflow-x-hidden min-h-screen w-full bg-white flex flex-col"
      x-data="{ sidebarOpen: false, sidebarTheme: 'blue' }">

  <!-- ===== Top Header ===== -->
  <header class="relative bg-[#001f74] text-white text-center py-8 md:py-1 px-4 shadow-xl w-full flex-shrink-5
                 transition-all duration-500"
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

  <!-- Sidebar Header -->
  <div class="p-6 text-center border-b border-white/20">
    <img src="{{ asset('image/coa.png') }}" alt="User Logo"
         class="w-20 h-20 mx-auto rounded-full border-2 border-[#ffd950] shadow-md mb-3">
    <h2 class="font-bold text-lg tracking-wide">{{ session('username', 'Zack') }}</h2>
    <p class="text-[#ffd950] text-sm">COA Employee</p>
  </div>

 




  <!-- 🔸 Sidebar Navigation Buttons -->
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
          
          <!-- Left Accent Bar -->
          <span class="absolute left-0 top-0 h-full w-[4px] bg-[#ffd950] 
                       scale-y-0 group-hover:scale-y-100 origin-top 
                       transition-transform duration-500"></span>

          <!-- Icon -->
          <span class="text-2xl transform transition-transform duration-500 group-hover:scale-125 
                       group-hover:rotate-6">{{ $link[0] }}</span>

          <!-- Label -->
          <span class="text-base font-semibold tracking-wide flex-1 text-left">
            {{ $link[1] }}
          </span>

          <!-- Arrow indicator -->
          <svg xmlns="http://www.w3.org/2000/svg" 
               class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500 text-[#4a2b05]"
               fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5l7 7-7 7" />
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
  <main class="relative z-10 flex-grow flex items-center justify-center px-6 py-6">
    <div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-md transition-transform transform hover:scale-[1.02] duration-500 fade-in">

      <img src="{{ asset('image/coa.png') }}" alt="COA Logo"
           class="w-44 sm:w-52 mx-auto mb-6 drop-shadow-lg animated-flip">

      <center>
        <p class="text-lg font-bold text-gray-800">Welcome, {{ session('username', 'zack') }}!</p>
        <p class="text-gray-900 mt-2"><strong>Prescribed Under COA</strong></p>
        <p class="text-lg font-semibold text-[#001f74]">Circular No. 2012-001</p>
        <p class="text-gray-700">Dated June 14, 2012</p>

        <button class="mt-8 px-8 py-3 border border-white/30 text-white bg-[#004aad] 
                       hover:bg-[#00357d] hover:shadow-lg hover:-translate-y-1 
                       font-semibold rounded-lg transition-all duration-300"
                onclick="window.location.href='{{ url('/circular') }}'">
          Review The Documentary Requirements
        </button>
      </center>
    </div>
  </main>

  <!-- ===== Footer ===== -->
  <footer class="relative z-10 bg-[#860101ff] text-white text-center py-0s w-full">
    <div class="max-w-3xl mx-auto px-4">
      <p class="text-lg md:text-xl font-semibold tracking-wide drop-shadow-md">
        COMMISSION ON AUDIT
      </p>
      <p class="text-sm opacity-90">
        Commonwealth Avenue, Quezon City, Philippines
      </p>
      <p class="text-xs mt-2 text-[#ffd950] font-medium">
        © {{ date('Y') }} All Rights Reserved
      </p>
    </div>
  </footer>



  <!-- ===== Custom Styles ===== -->
  <style>
    .clip-left {
      clip-path: polygon(0 0, 40% 0, 90% 100%, 0% 100%);
    }
    .clip-right {
      clip-path: polygon(70% 0, 100% 0, 100% 100%, 30% 100%);
    }
    .fade-in {
      animation: fadeInUp 0.8s ease both;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animated-flip {
      animation: flipLogo 10s infinite linear;
    }
    @keyframes flipLogo {
      0% { transform: scaleX(1); }
      50% { transform: scaleX(-1); }
      100% { transform: scaleX(1); }
    }
  </style>
</body>
</html>
