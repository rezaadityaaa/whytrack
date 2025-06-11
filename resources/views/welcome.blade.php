<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Why Track - Company Profile</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen ">
    <!-- Navbar -->
    <header class="w-full bg-[#E1017E] shadow px-6 py-4 flex items-center justify-between text-white fixed z-50">
      <div class="flex items-center gap-20">
        <span class="font-bold text-xl">Why Track</span>
        <!-- Desktop Nav -->
        <nav class="hidden md:flex gap-6 text-sm">
          <a href="#home" class="hover:text-gray-200">Home</a>
          <a href="#menu" class="hover:text-gray-200">Menu</a>
          <a href="#contact" class="hover:text-gray-200">Contact</a>
        </nav>
      </div>
      @if (Route::has('login'))
        <div class="hidden md:block">
          @auth
            <a href="{{ url('/dashboard') }}" class="px-5 py-1.5 border border-[#E1017E] text-[#E1017E] rounded-sm hover:bg-[#E1017E] hover:text-white transition">Dashboard</a>
          @else
            <a href="{{ route('login') }}" class="px-5 py-1.5 border border-white text-white rounded-md hover:bg-white hover:text-[#E1017E] transition">Log in</a>
          @endauth
        </div>
      @endif
      <!-- Hamburger -->
      <button id="navbar-toggle" class="md:hidden flex items-center focus:outline-none" aria-label="Toggle navigation">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </header>
    <!-- Mobile Nav -->
    <div id="mobile-nav" class="fixed top-0 left-0 w-full h-full bg-[#E1017E] bg-opacity-95 z-40 flex flex-col items-center justify-center space-y-8 text-white text-xl font-semibold transition-all duration-300 transform -translate-y-full md:hidden">
      <a href="#home" class="hover:text-gray-200" onclick="toggleNav()">Home</a>
      <a href="#menu" class="hover:text-gray-200" onclick="toggleNav()">Menu</a>
      <a href="#contact" class="hover:text-gray-200" onclick="toggleNav()">Contact</a>
      @if (Route::has('login'))
        @auth
          <a href="{{ url('/dashboard') }}" class="px-5 py-1.5 border border-[#E1017E] text-[#E1017E] rounded-sm bg-white hover:bg-[#E1017E] hover:text-white transition" onclick="toggleNav()">Dashboard</a>
        @else
          <a href="{{ route('login') }}" class="px-5 py-1.5 border border-white text-white rounded-md hover:bg-white hover:text-[#E1017E] transition" onclick="toggleNav()">Log in</a>
        @endauth
      @endif
      <button onclick="toggleNav()" class="absolute top-6 right-6 text-white text-3xl">&times;</button>
    </div>
    <script>
      const toggleNav = () => {
        const nav = document.getElementById('mobile-nav');
        if (nav.classList.contains('-translate-y-full')) {
          nav.classList.remove('-translate-y-full');
          nav.classList.add('translate-y-0');
        } else {
          nav.classList.add('-translate-y-full');
          nav.classList.remove('translate-y-0');
        }
      };
      document.getElementById('navbar-toggle').addEventListener('click', toggleNav);
    </script>

    <!-- Home Section -->
    <section id="home" class="min-h-screen w-full mt-10 bg-[#E1017E] pt-20 text-white px-4 flex items-center">
      <div class="flex flex-col-reverse md:flex-row mx-auto md:mx-20 justify-around border-1 border-white rounded-3xl shadow-2xl w-full max-w-7xl">
        <div class="boxImage w-full md:w-2/5 flex justify-center items-center">
          <img src="../../../images/hero.png" alt="Company Logo" class="w-4/5 md:w-full mb-6 mx-auto">
        </div>
        <div class="grid py-auto content-center w-full md:w-1/2 px-2 md:px-0 mb-8 md:mb-0">
          <h1 class="text-3xl md:text-4xl font-bold mb-4 text-center md:text-left">Welcome to Why Track</h1>
          <p class="text-base md:text-lg text-center md:text-left">Rasakan sensasi ngopi berbeda bersama Why Coffee! Kami hadir langsung ke tempatmu, menyajikan kopi spesial dengan cita rasa istimewa dan pengalaman seru di setiap kunjungan. Temukan kehangatan dan cerita baru di setiap cangkirnya!</p>
          <p class="max-w-xl text-base md:text-lg mb-6 text-center md:text-left">#kopiuntukbumi</p>
        </div>
      </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="min-h-screen py-20 px-4">
      <div class="w-full md:w-3/5 mx-auto">
        <h2 class="text-2xl font-semibold text-[#E1017E] mb-6 text-center">Menu Why Coffee</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
          <div class="bg-[#FDFDFC] rounded-lg shadow p-6">
            <img src="../../../images/1.jpg" class="rounded" alt="">
            <h3 class="font-bold text-lg mb-2">Kopi Susu</h3>
            <span class="block font-semibold text-[#E1017E] mb-2">Rp18.000</span>
            <p>Kopi susu klasik dengan rasa creamy dan manis yang seimbang.</p>
          </div>
          <div class="bg-[#FDFDFC] rounded-lg shadow p-6">
            <img src="../../../images/2.jpg" class="rounded" alt="">
            <h3 class="font-bold text-lg mb-2">Americano</h3>
            <span class="block font-semibold text-[#E1017E] mb-2">Rp15.000</span>
            <p>Kopi hitam tanpa gula, menghadirkan rasa kopi yang kuat dan murni.</p>
          </div>
          <div class="bg-[#FDFDFC] rounded-lg shadow p-6">
            <img src="../../../images/3.jpg" class="rounded" alt="">
            <h3 class="font-bold text-lg mb-2">Caramel</h3>
            <span class="block font-semibold text-[#E1017E] mb-2">Rp20.000</span>
            <p>Kopi susu dengan sentuhan caramel manis, memberikan rasa lembut dan aroma khas yang menggoda.</p>
          </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
          <div class="bg-[#FDFDFC] rounded-lg shadow p-6">
            <img src="../../../images/4.jpg" class="rounded" alt="">
            <h3 class="font-bold text-lg mb-2">Butterscotch</h3>
            <span class="block font-semibold text-[#E1017E] mb-2">Rp22.000</span>
            <p>Kopi susu dengan rasa butterscotch yang khas, manis dan gurih, cocok untuk kamu yang ingin mencoba rasa baru.</p>
          </div>
          <div class="bg-[#FDFDFC] rounded-lg shadow p-6">
            <img src="../../../images/5.jpg" class="rounded" alt="">
            <h3 class="font-bold text-lg mb-2">Vanilla</h3>
            <span class="block font-semibold text-[#E1017E] mb-2">Rp20.000</span>
            <p>Kopi susu dengan aroma vanilla yang harum dan lembut, pas untuk menemani waktu santai.</p>
          </div>
          <div class="bg-[#FDFDFC] rounded-lg shadow p-6">
            <img src="../../../images/6.jpg" class="rounded" alt="">
            <h3 class="font-bold text-lg mb-2">Chocolate</h3>
            <span class="block font-semibold text-[#E1017E] mb-2">Rp20.000</span>
            <p>Kopi susu dengan tambahan coklat, menghasilkan perpaduan rasa kopi dan coklat yang nikmat dan memanjakan lidah.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <div id="contact" class=" bg-gray-100 px-6 sm:py-20 lg:px-8">
  <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
    <div class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-288.75" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
  </div>
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-4xl font-semibold tracking-tight text-balance text-[#E1017E] sm:text-5xl">Contact Why</h2>
    <p class="mt-2 text-lg/8 text-gray-600">Tertarik untuk bergabung atau ingin tahu lebih lanjut? Hubungi kami dan mari ciptakan pengalaman kopi yang tak terlupakan bersama Why Track!</p>
  </div>
  <form action="#" method="POST" class="mx-auto mt-10 max-w-xl sm:mt-10">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div>
        <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">First name</label>
        <div class="mt-2.5">
          <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        </div>
      </div>
      <div>
        <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Last name</label>
        <div class="mt-2.5">
          <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
        <div class="mt-2.5">
          <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="message" class="block text-sm/6 font-semibold text-gray-900">Message</label>
        <div class="mt-2.5">
          <textarea name="message" id="message" rows="4" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"></textarea>
        </div>
      </div>
      <div class="flex gap-x-4 sm:col-span-2">
        <div class="flex h-6 items-center">
          <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
          <button type="button" class="flex w-8 flex-none cursor-pointer rounded-full bg-gray-200 p-px ring-1 ring-gray-900/5 transition-colors duration-200 ease-in-out ring-inset focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" role="switch" aria-checked="false" aria-labelledby="switch-1-label">
            <span class="sr-only">Agree to policies</span>
            <!-- Enabled: "translate-x-3.5", Not Enabled: "translate-x-0" -->
            <span aria-hidden="true" class="size-4 translate-x-0 transform rounded-full bg-white shadow-xs ring-1 ring-gray-900/5 transition duration-200 ease-in-out"></span>
          </button>
        </div>
        <label class="text-sm/6 text-gray-600" id="switch-1-label">
          By selecting this, you agree to our
          <a href="#" class="font-semibold text-[#E1017E]">privacy&nbsp;policy</a>.
        </label>
      </div>
    </div>
    <div class="mt-10 mb-20">
      <button type="submit" class="block w-full rounded-md bg-[#E1017E] px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-[#e1017cc3] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Let's talk</button>
    </div>
  </form>
</div>


    <!-- Footer -->
    <footer class="bg-white lg:grid lg:grid-cols-5">
  <div class="relative block h-32 lg:col-span-2 lg:h-full">
    <img
      src="../../../images/bgwhy.jpg"
      alt=""
      class="absolute inset-0 h-full w-full object-cover"
    />
  </div>

  <div class="px-4 py-16 sm:px-6 lg:col-span-3 lg:px-8">
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
      <div>
        <p>
          <span class="text-xs tracking-wide text-gray-500 uppercase"> Call us </span>

          <a href="#" class="block text-2xl font-medium text-gray-900 hover:opacity-75 sm:text-3xl">
             0857-2630-6910
          </a>
        </p>

        <ul class="mt-8 space-y-1 text-sm text-gray-700">
          <li>⏰ Udinus 09.00 - 17.00 WIB</li>
          <li>⏰ Pahlawan (Depan mandiri) 20.00 - 01.00 WIB</li>
        </ul>

        <ul class="mt-8 flex gap-6">
        <li>
            <a
                href="https://www.tiktok.com/@kopiwhy.smg"
                rel="noreferrer"
                target="_blank"
                class="text-gray-700 transition hover:opacity-75"
            >
                <span class="sr-only">TikTok</span>
                <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12.5 2c.414 0 .75.336.75.75v10.5a2.25 2.25 0 11-2.25-2.25c.414 0 .75.336.75.75s-.336.75-.75.75a.75.75 0 100 1.5 3.75 3.75 0 003.75-3.75V4.25a.75.75 0 01.75-.75h1.5a4.25 4.25 0 004.25 4.25.75.75 0 01.75.75v1.5a.75.75 0 01-.75.75A6.25 6.25 0 0115 5.25v7.25a5.25 5.25 0 11-5.25-5.25c.414 0 .75.336.75.75s-.336.75-.75.75A3.75 3.75 0 1012.5 2z"/>
                </svg>
            </a>
        </li>

          <li>
            <a
              href="https://www.instagram.com/kopiwhy.smg/"
              rel="noreferrer"
              target="_blank"
              class="text-gray-700 transition hover:opacity-75"
            >
              <span class="sr-only">Instagram</span>

              <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path
                  fill-rule="evenodd"
                  d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                  clip-rule="evenodd"
                />
              </svg>
            </a>
          </li>

          <li>
            <a
              href="#"
              rel="noreferrer"
              target="_blank"
              class="text-gray-700 transition hover:opacity-75"
            >
              <span class="sr-only">Twitter</span>

              <svg class="size-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path
                  d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                />
              </svg>
            </a>
          </li>


        </ul>
      </div>

      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <p class="font-medium text-gray-900">Services</p>

          <ul class="mt-6 space-y-4 text-sm">
            <li>
              <a href="#" class="text-gray-700 transition hover:opacity-75"> 1on1 Coaching </a>
            </li>

            <li>
              <a href="#" class="text-gray-700 transition hover:opacity-75"> Company Review </a>
            </li>

            <li>
              <a href="#" class="text-gray-700 transition hover:opacity-75"> Accounts Review </a>
            </li>

            <li>
              <a href="#" class="text-gray-700 transition hover:opacity-75"> HR Consulting </a>
            </li>

            <li>
              <a href="#" class="text-gray-700 transition hover:opacity-75"> SEO Optimisation </a>
            </li>
          </ul>
        </div>

        <div>
          <p class="font-medium text-gray-900">Company</p>

          <ul class="mt-6 space-y-4 text-sm">
            <li>
              <a href="#" class="text-gray-700 transition hover:opacity-75"> About </a>
            </li>

            <li>
              <a href="#" class="text-gray-700 transition hover:opacity-75"> Meet the Team </a>
            </li>

            <li>
              <a href="#" class="text-gray-700 transition hover:opacity-75"> Accounts Review </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mt-12 border-t border-gray-100 pt-12">
      <div class="sm:flex sm:items-center sm:justify-between">
        <ul class="flex flex-wrap gap-4 text-xs">
          <li>
            <a href="#" class="text-gray-500 transition hover:opacity-75"> Terms & Conditions </a>
          </li>

          <li>
            <a href="#" class="text-gray-500 transition hover:opacity-75"> Privacy Policy </a>
          </li>

          <li>
            <a href="#" class="text-gray-500 transition hover:opacity-75"> Cookies </a>
          </li>
        </ul>

        <p class="mt-8 text-xs text-gray-500 sm:mt-0">
          &copy; 2025. Why Coffee. All rights reserved.
        </p>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
