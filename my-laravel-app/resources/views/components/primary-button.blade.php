<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#0C3C60] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#0071BD] focus:bg-[#0071BD]  active:bg-[#0071BD]  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
