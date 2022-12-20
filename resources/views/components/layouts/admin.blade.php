<!DOCTYPE html>
<html dir="{{ language()->direction() }}" lang="{{ app()->getLocale() }}">
    <x-layouts.admin.head>
        @if (! empty($metaTitle))
        <x-slot name="metaTitle">
            {!! !empty($metaTitle->attributes->has('title')) ? $metaTitle->attributes->get('title') : $metaTitle !!}
        </x-slot>
        @endif

        <x-slot name="title">
            {!! !empty($title->attributes->has('title')) ? $title->attributes->get('title') : $title !!}
        </x-slot>
    </x-layouts.admin.head>

    @mobile
    <body class="bg-body">
    @elsemobile
    <body class="bg-body overflow-y-overlay">
    @endmobile

        @stack('body_start')

        <x-layouts.admin.menu />

        <!-- loading component will add this line -->
        
        <div class="main-content xl:ltr:ml-64  xl:rtl:mr-64 transition-all ease-in-out" id="panel">
            <div id="main-body">
                <div class="container">
                    <x-layouts.admin.header>
                        <x-slot name="title">
                            {!! ! empty($title->attributes->has('title')) ? $title->attributes->get('title') : $title !!}
                        </x-slot>

                        @if (! empty($status))
                            <x-slot name="status">
                                {!! $status !!}
                            </x-slot>
                        @endif

                        @if (! empty($info))
                            <x-slot name="info">
                                {!! $info !!}
                            </x-slot>
                        @endif

                        @if (! empty($favorite) || (! empty($favorite) && $favorite->attributes->has('title')))
                            @if (! $favorite->attributes->has('title'))
                                <x-slot name="favorite">
                                    {!! $favorite !!}
                                </x-slot>
                            @else
                                @php
                                    $favorite = [
                                        'title' => $favorite->attributes->get('title'),
                                        'icon' => $favorite->attributes->get('icon'),
                                        'route' => !empty($favorite->attributes->has('route')) ? $favorite->attributes->get('route') : '',
                                        'url' => !empty($favorite->attributes->has('url')) ? $favorite->attributes->get('url') : '',
                                    ];
                                @endphp

                                <x-slot name="favorite">
                                    <x-menu.favorite
                                        :title="$favorite['title']"
                                        :icon="$favorite['icon']"
                                        :route="$favorite['route']"
                                        :url="$favorite['url']"
                                    />
                                </x-slot>
                            @endif
                        @endif

                        <x-slot name="buttons">
                            {!! $buttons ?? '' !!}
                        </x-slot>

                        <x-slot name="moreButtons">
                            {!! $moreButtons ?? '' !!}
                        </x-slot>
                    </x-layouts.admin.header>

                    <x-layouts.admin.content>
                        <x-layouts.admin.notifications />

                        {!! $content !!}

                    <div x-data="{ session_modal: false }">
                        <div
                            x-on:toggle-modal.window="session_modal = !session_modal"
                            x-bind:class="{ 'flex': session_modal, 'hidden': ! session_modal }"
                            data-login-modal
                            class="modal w-full h-full fixed top-0 left-0 right-0 z-50 overflow-y-auto overflow-hidden modal-add-new fade justify-center items-start show flex-wrap modal-background"
                        >
                            <div class="w-full my-10 m-auto flex flex-col max-w-2xl">
                                <div class="modal-content">
                                    <div class="p-5 bg-body rounded-tl-lg rounded-tr-lg">
                                        <div class="flex items-center justify-between border-b pb-5">
                                            Your session time has passed
                                        </div>
                                    </div>
                                    <div class="py-1 px-5 bg-body">
                                        <x-form id="auth" route="login">
                                            <div class="grid sm:grid-cols-6 gap-x-8 gap-y-6 my-3.5">
                                                <x-form.group.email
                                                    name="email"
                                                    label="{{ trans('general.email') }}"
                                                    placeholder="{{ trans('general.email') }}"
                                                    form-group-class="sm:col-span-3"
                                                />

                                                <x-form.group.password
                                                    name="password"
                                                    label="{{ trans('auth.password.pass') }}"
                                                    placeholder="{{ trans('auth.password.pass') }}"
                                                    form-group-class="sm:col-span-3"
                                                />
                                            </div>

                                            <div class="p-5 bg-body rounded-bl-lg rounded-br-lg border-gray-300">
                                                <div class="flex items-center justify-end">
                                                    <button
                                                        type="button"
                                                        @click="sessionSubmit"
                                                        class="relative flex items-center justify-center bg-green hover:bg-green-700 text-white px-6 py-1.5 text-base rounded-lg disabled:bg-green-100 sm:col-span-6"
                                                        override="class"
                                                    >
                                                        <span>
                                                            {{ trans('auth.login') }}
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </x-form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </x-layouts.admin.content>

                    <x-layouts.admin.footer />
                </div>
            </div>
        </div>

        @stack('body_end')

        <x-layouts.admin.scripts />
    </body>
</html>
