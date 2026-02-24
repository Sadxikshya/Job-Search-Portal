<x-layout>
    <div class="max-w-4xl mx-auto px-4 py-10">

        {{-- ── Page Header ── --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="font-['DM_Serif_Display'] text-3xl text-[#1a2b33] tracking-tight">Notifications</h1>
                <p class="text-[#4a6270] mt-1 text-sm">
                    {{ $notifications->total() }} notification{{ $notifications->total() !== 1 ? 's' : '' }} total
                </p>
            </div>

            @if(auth()->user()->unreadNotifications()->count() > 0)
                <form method="POST" action="{{ route('notifications.readAll') }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center gap-2 text-sm font-semibold px-4 py-2 rounded-lg
                               bg-[#7bbfd4] text-white hover:bg-[#3a7d96] transition-colors shadow-sm">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 13l4 4L19 7"/>
                        </svg>
                        Mark all read
                    </button>
                </form>
            @endif
        </div>

        {{-- ── Flash message ── --}}
        @if(session('success'))
            <div class="mb-6 px-4 py-3 rounded-lg bg-[#eef6f9] border border-[#c8e4ed] text-[#3a7d96] text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        {{-- ── Notifications list ── --}}
        @if($notifications->isEmpty())
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-[#daeef5] mb-4">
                    <svg width="28" height="28" fill="none" stroke="#7bbfd4" viewBox="0 0 24 24" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 17H20L18.595 15.595A1.8 1.8 0 0118 14.382V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.382a1.8 1.8 0 01-.595 1.023L4 17h5m6 0a3 3 0 01-6 0m6 0H9"/>
                    </svg>
                </div>
                <p class="text-[#4a6270] text-lg font-medium">No notifications yet</p>
                <p class="text-[#8fadb8] text-sm mt-1">We'll let you know when something happens.</p>
            </div>
        @else
            <div class="rounded-2xl border border-[#d4e8f0] overflow-hidden shadow-sm">
                @foreach($notifications as $notification)
                    @php
                        $isUnread = is_null($notification->read_at);
                        $data     = $notification->data;
                    @endphp

                    <div class="flex items-start gap-4 px-6 py-5 border-b border-[#d4e8f0] last:border-0
                                {{ $isUnread ? 'bg-[#f4fafd]' : 'bg-white' }} transition-colors">

                        {{-- Icon --}}
                        <div class="flex-shrink-0 mt-0.5">
                            @if(str_contains($notification->type, 'JobApplied'))
                                <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $isUnread ? 'bg-[#7bbfd4]' : 'bg-[#d4e8f0]' }}">
                                    <svg width="17" height="17" fill="none" stroke="{{ $isUnread ? '#fff' : '#8fadb8' }}" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @else
                                <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $isUnread ? 'bg-[#7bbfd4]' : 'bg-[#d4e8f0]' }}">
                                    <svg width="17" height="17" fill="none" stroke="{{ $isUnread ? '#fff' : '#8fadb8' }}" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="flex-1 min-w-0">
                            <p class="text-[#1a2b33] text-sm leading-relaxed {{ $isUnread ? 'font-medium' : 'font-normal' }}">
                                {!! $data['message'] ?? 'No message.' !!}
                            </p>
                            <p class="text-[#8fadb8] text-xs mt-1">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </div>

                        {{-- Read status + action --}}
                        <div class="flex items-center gap-3 flex-shrink-0">
                            @if($isUnread)
                                <span class="w-2 h-2 rounded-full bg-[#7bbfd4]"></span>
                                <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                                    @csrf
                                    <button type="submit" class="text-xs font-medium text-[#7bbfd4] hover:text-[#3a7d96] transition-colors whitespace-nowrap">
                                        Mark read
                                    </button>
                                </form>
                            @else
                                <span class="text-xs text-[#8fadb8]">Read</span>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($notifications->hasPages())
                <div class="mt-6">
                    {{ $notifications->links() }}
                </div>
            @endif
        @endif

    </div>
</x-layout>