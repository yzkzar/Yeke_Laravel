<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Manager</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Jost', sans-serif; }
        h1, h2, h3, .serif { font-family: 'Cormorant Garamond', serif; }
        input[type="text"], input[type="number"], input[type="email"], textarea {
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input[type="radio"], input[type="checkbox"] {
            accent-color: #be185d;
        }
        .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .card-hover:hover { transform: translateY(-3px); box-shadow: 0 12px 40px rgba(190,24,93,0.10); }
        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #f9a8d4;
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 1rem;
            letter-spacing: 0.1em;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, #fbcfe8, transparent);
        }
    </style>
</head>

<body class="min-h-screen" style="background: linear-gradient(135deg, #fff0f6 0%, #fdf2f8 40%, #fce7f3 100%);">

    <!-- Header -->
    <header class="w-full pt-12 pb-6 text-center">
        <p class="text-pink-300 text-xs tracking-[0.35em] uppercase font-light mb-2">Student Portal</p>
        <h1 class="text-5xl font-semibold text-rose-800 leading-tight">Profile Manager</h1>
        <div class="flex justify-center mt-4">
            <div class="h-px w-16 bg-pink-300"></div>
            <div class="h-px w-4 bg-pink-400 mx-2"></div>
            <div class="h-px w-16 bg-pink-300"></div>
        </div>
    </header>

    <div class="max-w-4xl mx-auto px-6 pb-20">

        <!-- Form Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl border border-pink-100 shadow-[0_4px_40px_rgba(244,114,182,0.12)] p-10 mb-14">

            <div class="mb-8">
                <h2 class="text-3xl font-medium text-rose-800 mb-1">Create a Profile</h2>
                <p class="text-pink-400 text-sm tracking-wide font-light">Fill in your details below</p>
            </div>

            <form action="/profile" method="post" class="space-y-7">
                @csrf
                @method('POST')

                <!-- Row 1 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label for="name" class="block text-xs font-medium text-rose-700 tracking-widest uppercase mb-2">Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full bg-pink-50/60 border border-pink-200 rounded-2xl px-4 py-3 text-sm text-rose-900 placeholder-pink-300 focus:outline-none focus:border-rose-400 focus:bg-white focus:ring-2 focus:ring-rose-100"
                            placeholder="Your full name">
                    </div>
                    <div>
                        <label for="age" class="block text-xs font-medium text-rose-700 tracking-widest uppercase mb-2">Age</label>
                        <input type="number" name="age" id="age"
                            class="w-full bg-pink-50/60 border border-pink-200 rounded-2xl px-4 py-3 text-sm text-rose-900 placeholder-pink-300 focus:outline-none focus:border-rose-400 focus:bg-white focus:ring-2 focus:ring-rose-100"
                            placeholder="18">
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="program" class="block text-xs font-medium text-rose-700 tracking-widest uppercase mb-2">Program</label>
                        <input type="text" name="program" id="program"
                            class="w-full bg-pink-50/60 border border-pink-200 rounded-2xl px-4 py-3 text-sm text-rose-900 placeholder-pink-300 focus:outline-none focus:border-rose-400 focus:bg-white focus:ring-2 focus:ring-rose-100"
                            placeholder="e.g. Computer Science">
                    </div>
                    <div>
                        <label for="email" class="block text-xs font-medium text-rose-700 tracking-widest uppercase mb-2">Email</label>
                        <input type="email" name="email" id="email"
                            class="w-full bg-pink-50/60 border border-pink-200 rounded-2xl px-4 py-3 text-sm text-rose-900 placeholder-pink-300 focus:outline-none focus:border-rose-400 focus:bg-white focus:ring-2 focus:ring-rose-100"
                            placeholder="you@email.com">
                    </div>
                </div>

                <!-- Row 3: Gender + Hobbies -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs font-medium text-rose-700 tracking-widest uppercase mb-3">Gender</p>
                        <div class="flex gap-6">
                            <label class="inline-flex items-center gap-2 cursor-pointer group">
                                <input type="radio" name="gender" value="male" class="w-4 h-4">
                                <span class="text-sm text-rose-800 font-light group-hover:text-rose-600 transition-colors">Male</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer group">
                                <input type="radio" name="gender" value="female" class="w-4 h-4">
                                <span class="text-sm text-rose-800 font-light group-hover:text-rose-600 transition-colors">Female</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-medium text-rose-700 tracking-widest uppercase mb-3">Hobbies</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['Reading', 'Gaming', 'Coding', 'Sports', 'Music'] as $hobby)
                                <label class="inline-flex items-center gap-1.5 cursor-pointer bg-pink-50 border border-pink-200 rounded-full px-3 py-1 hover:bg-rose-50 hover:border-rose-300 transition-colors">
                                    <input type="checkbox" name="hobbies[]" value="{{ strtolower($hobby) }}" class="w-3.5 h-3.5">
                                    <span class="text-xs text-rose-800 font-light">{{ $hobby }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-xs font-medium text-rose-700 tracking-widest uppercase mb-2">Short Biography</label>
                    <textarea name="bio" id="bio" rows="3"
                        class="w-full bg-pink-50/60 border border-pink-200 rounded-2xl px-4 py-3 text-sm text-rose-900 placeholder-pink-300 focus:outline-none focus:border-rose-400 focus:bg-white focus:ring-2 focus:ring-rose-100 resize-none"
                        placeholder="Tell us a little about yourself..."></textarea>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="px-10 py-3 bg-rose-600 hover:bg-rose-700 active:scale-95 text-white text-sm tracking-widest uppercase font-medium rounded-full shadow-[0_4px_20px_rgba(190,24,93,0.30)] transition-all duration-200">
                        Submit Profile
                    </button>
                </div>
            </form>
        </div>

        <!-- Divider -->
        <div class="divider mb-10">Registered Profiles</div>

        <!-- Delete Button -->
        @if (session()->has('profile'))
            <div class="flex justify-end mb-6">
                <form action="/delete-profile" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-xs tracking-widest uppercase text-pink-400 hover:text-rose-600 border border-pink-200 hover:border-rose-300 rounded-full px-5 py-2 transition-colors font-medium">
                        Clear All Profiles
                    </button>
                </form>
            </div>
        @endif

        <!-- Profile Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @if (session()->has('profile'))
                @foreach (session('profile') as $user)
                    <div class="card-hover bg-white/80 backdrop-blur-sm rounded-3xl border border-pink-100 shadow-[0_2px_20px_rgba(244,114,182,0.08)] p-7">

                        <!-- Card Header -->
                        <div class="flex items-start justify-between mb-5">
                            <div>
                                <h3 class="serif text-2xl font-medium text-rose-800">{{ $user['name'] ?? 'Anonymous' }}</h3>
                                <p class="text-xs tracking-widest uppercase text-pink-400 font-light mt-0.5">{{ $user['program'] ?? 'No Program' }}</p>
                            </div>
                            <span class="text-[10px] tracking-widest uppercase font-medium px-3 py-1 bg-pink-50 text-rose-600 border border-pink-200 rounded-full">
                                {{ $user['gender'] ?? 'N/A' }}
                            </span>
                        </div>

                        <!-- Thin divider -->
                        <div class="h-px bg-gradient-to-r from-pink-100 via-pink-200 to-pink-100 mb-5"></div>

                        <!-- Card Details -->
                        <div class="space-y-2.5 text-sm">
                            <div class="flex items-center gap-3">
                                <span class="text-[10px] tracking-widest uppercase text-pink-300 font-medium w-14 shrink-0">Age</span>
                                <span class="text-rose-800 font-light">{{ $user['age'] ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-[10px] tracking-widest uppercase text-pink-300 font-medium w-14 shrink-0">Email</span>
                                <span class="text-rose-800 font-light truncate">{{ $user['email'] ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="text-[10px] tracking-widest uppercase text-pink-300 font-medium w-14 shrink-0 pt-0.5">Hobbies</span>
                                <span class="text-rose-800 font-light capitalize">{{ isset($user['hobbies']) ? implode(', ', $user['hobbies']) : 'None' }}</span>
                            </div>
                        </div>

                        <!-- Bio -->
                        @if (!empty($user['bio']))
                            <div class="mt-5 bg-pink-50/60 border-l-2 border-pink-300 rounded-r-xl pl-4 pr-3 py-3">
                                <p class="serif italic text-rose-700 text-sm leading-relaxed">"{{ $user['bio'] }}"</p>
                            </div>
                        @endif

                    </div>
                @endforeach
            @else
                <div class="col-span-full text-center py-16 border-2 border-dashed border-pink-200 rounded-3xl bg-white/40">
                    <p class="serif italic text-2xl text-pink-300 mb-2">No profiles yet</p>
                    <p class="text-xs tracking-widest uppercase text-pink-200 font-light">Fill out the form above to get started</p>
                </div>
            @endif
        </div>

    </div>

</body>

</html>