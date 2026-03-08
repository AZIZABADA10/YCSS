<x-guest-layout>

{{-- Google Fonts --}}
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Exo+2:wght@300;400;500;600&display=swap" rel="stylesheet">

<!-- ─── BACKGROUND LAYERS ─── -->
<div class="fixed inset-0 overflow-hidden pointer-events-none">

    {{-- Photo --}}
    <div class="bg-scene absolute inset-0"
         style="background:url('{{ asset('background_ycss.jpg') }}') center/cover no-repeat;
                filter:brightness(0.35) saturate(1.2);">
    </div>

    {{-- Blue gradient overlay --}}
    <div class="absolute inset-0"
         style="background:linear-gradient(135deg,rgba(0,20,80,0.6) 0%,rgba(0,0,0,0.3) 50%,rgba(0,60,120,0.5) 100%);">
    </div>

    {{-- Animated grid --}}
    <div class="grid-lines absolute inset-0"></div>

    {{-- Glow orb --}}
    <div class="glow-orb absolute"
         style="width:500px;height:500px;border-radius:50%;
                background:radial-gradient(circle,rgba(0,80,255,0.15) 0%,transparent 70%);
                top:50%;left:50%;transform:translate(-50%,-50%);">
    </div>
</div>

<!-- ─── CENTERED CARD ─── -->
<div class="relative z-10 flex min-h-screen items-center justify-center px-4 py-10 sm:px-6">
    <div class="card-reveal w-full max-w-sm sm:max-w-md">

        {{-- Card --}}
        <div class="relative rounded-2xl px-6 py-10 sm:px-10 sm:py-12
                    border border-blue-500/20"
             style="background:rgba(5,10,30,0.78);
                    backdrop-filter:blur(24px) saturate(1.5);
                    -webkit-backdrop-filter:blur(24px) saturate(1.5);
                    box-shadow:0 0 0 1px rgba(0,100,255,.1),
                               0 30px 80px rgba(0,0,0,.6),
                               inset 0 1px 0 rgba(255,255,255,.06),
                               0 0 60px rgba(0,80,255,.12);">

            {{-- Top accent bar --}}
            <div class="bar-glow card-top-bar"></div>

            {{-- Logo --}}
            <div class="fade-1 flex justify-center mb-6">
                <img src="{{ asset('ycss_logo.png') }}"
                     alt="YCSS"
                     class="logo-anim h-14 sm:h-20 w-auto object-contain">
            </div>

            {{-- Title --}}
            <h2 class="fade-2 font-rajdhani text-center text-xl sm:text-2xl font-bold
                        tracking-widest uppercase text-blue-100 mb-7">
                Login to
                <span class="bg-gradient-to-r from-blue-400 to-cyan-400
                             bg-clip-text text-transparent">YCSS</span>
            </h2>

            {{-- Validation errors --}}
            <x-validation-errors
                class="mb-4 rounded-xl border border-red-500/30 bg-red-500/10
                       px-4 py-3 text-sm text-red-400" />

            {{-- Session status --}}
            @session('status')
                <div class="mb-4 rounded-xl border border-green-500/30 bg-green-500/10
                            px-4 py-3 text-sm text-green-400">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="fade-3 mb-5">
                    <label for="email"
                           class="font-rajdhani mb-2 block text-xs font-semibold
                                  tracking-widest uppercase text-blue-300/80">
                        Email
                    </label>
                    <input id="email"
                           class="ycss-input"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="you@example.com"
                           required autofocus />
                </div>

                {{-- Password --}}
                <div class="fade-4 mb-4">
                    <label for="password"
                           class="font-rajdhani mb-2 block text-xs font-semibold
                                  tracking-widest uppercase text-blue-300/80">
                        Password
                    </label>
                    <input id="password"
                           class="ycss-input"
                           type="password"
                           name="password"
                           placeholder="••••••••"
                           required />
                </div>

                {{-- Remember me --}}
                <div class="fade-4 flex items-center gap-2 mt-1">
                    <x-checkbox name="remember" />
                    <span class="text-sm text-blue-200/70">Remember me</span>
                </div>

                {{-- Forgot + Button --}}
                <div class="fade-5 mt-7 flex flex-col items-stretch gap-3
                            sm:flex-row sm:items-center sm:justify-between">

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-center text-sm text-blue-400/80 transition
                                  hover:text-blue-300
                                  hover:drop-shadow-[0_0_8px_rgba(0,160,255,0.6)]
                                  sm:text-left">
                            Forgot password?
                        </a>
                    @endif

                    <button type="submit"
                            class="btn-login font-rajdhani rounded-xl px-8 py-3
                                   text-base font-bold tracking-widest uppercase
                                   text-white border-0 cursor-pointer
                                   w-full sm:w-auto">
                        Login
                    </button>
                </div>

                {{-- Divider --}}
                <div class="fade-6 my-6 border-t border-blue-500/15"></div>

                {{-- Register --}}
                <p class="fade-6 text-center text-sm text-blue-200/60">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                       class="ml-1 font-semibold text-blue-400 transition
                              hover:text-cyan-300
                              hover:drop-shadow-[0_0_8px_rgba(0,200,255,0.6)]">
                        Register
                    </a>
                </p>

            </form>
        </div>
    </div>
</div>

</x-guest-layout>