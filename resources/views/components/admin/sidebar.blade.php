<aside
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 w-64 h-full pt-16 font-normal duration-75 transition-width"
    x-cloak
    x-show="sidebarIsOpen"
    @click.outside="sidebarIsOpen = !(window.innerWidth < 768)"
>
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="flex flex-col flex-1 overflow-y-auto">
            <div class="flex-1 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="divide-y">
                    <x-admin.menu-section label="Application">
                        <x-admin.menu-item
                            :href="route('admin.dashboard')"
                            active-route-pattern="admin.dashboard"
                            label="Tableau de bord"
                            icon="home"
                        />
                        <x-admin.menu-item
                            :href="route('log-viewer.index')"
                            label="Logs"
                            icon="document-text"
                        />
                    </x-admin.menu-section>
                    <x-admin.menu-section label="Gestion">
                        <x-admin.menu-item
                            :href="route('admin.users.index')"
                            active-route-pattern="admin.users*"
                            label="Utilisateurs"
                            icon="users"
                        />
                    </x-admin.menu-section>
                    <x-admin.menu-section label="Paramètres">
                        <x-admin.menu-item
                            href="{{ config('translation-manager.route.prefix') }}/view/app"
                            label="Traduction"
                            icon="document-text"
                        />
                    </x-admin.menu-section>
                </ul>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 justify-center hidden w-full p-4 space-x-4 bg-white lg:flex dark:bg-gray-800">

        </div>
    </div>
</aside>