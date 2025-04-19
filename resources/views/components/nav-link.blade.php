 @props(['active' => false]);

 <a class="{{ $active ? 'bg-gray-600' : 'text-white hover:bg-gray-600' }} rounded-lg px-4 py-2 text-white"
     aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
     {{ $slot }}
 </a>
