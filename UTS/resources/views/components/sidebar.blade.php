@props(['author' => false])
<aside id="default-sidebar" class="transform -translate-x-full transition-transform duration-300 ease-in-out" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto text-white">
        <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="#" class="flex items-center p-2 text-white rounded-lg hover:bg-white hover:bg-opacity-10 group">
                    <svg class="w-5 h-5 text-white transition duration-75 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/blog" class="flex items-center p-2 text-white rounded-lg hover:bg-white hover:bg-opacity-10 group">
                    <svg class="w-6 h-6 text-whithe-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5h4.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0-7H6m2 7h6.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0 0H6"/>
                      </svg>                      
                    <span class="ms-3">Blog</span>
                </a>
            </li>
            @if($author)
            <li>
                <a href="/author/blog" class="flex items-center p-2 text-white rounded-lg hover:bg-white hover:bg-opacity-10 group">
                    <svg class="h-6 w-6 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                    <span class="ms-3">Tambah Blog</span>
                </a>
            </li>
            <li>
                <a href="/author/listuser" class="flex items-center p-2 text-white rounded-lg hover:bg-white hover:bg-opacity-10 group">
                    <svg class="h-6 w-6 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                    <span class="ms-3">List User</span>
                </a>
            </li>
            @endif
            <!-- Tambahkan elemen sidebar lainnya -->
            <li>
                <a href="{{ route('homePage') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-white hover:bg-opacity-10 group">
                    <svg class="h-6 w-6 text-white"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                    <span class="ms-3">Vue</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
