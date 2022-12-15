<!-- 1. Basic form -->
{{-- 
    @component('components.layout')
        <h1>Component</h1>
    @endcomponent
--}}

<!-- 2. Form using flag component of blade -->
<x-layout>
    <!-- attribute of slot specific -->
    <x-slot name="title"> Component </x-slot>

    <!-- slot-layout content -->
    <h1>Component</h1>
    <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor maxime ad molestias. Assumenda quae modi ut voluptatum inventore, 
        a delectus sunt placeat itaque porro totam. Enim blanditiis est nostrum! Suscipit.</p>
</x-layout>