  <button
      {{ $attributes->merge(['class' => 'bg-blue-600 text-white px-6 py-2 rounded-full shadow hover:bg-blue-700 transition']) }}>
      {{ $slot }}
  </button>
