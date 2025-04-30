 @props(['active' => false])

 <a class="{{ $active ? 'bg-gray-700' : 'hover:bg-gray-700' }} flex items-center gap-2 px-6 py-3 rounded-md  transition"
     {{ $attributes }}>
     {{ $slot }}
 </a>
