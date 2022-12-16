<!-- 
    Para modificar los atributos de un template creamos nuestros atributos con 
    kebac-case y nuestra
    Todo lo que este dentro x-layout llegara a layout como slot

    attribute of slot specific 
-->
<x-layout
    name="description"
    meta-description="Blog meta description" 
    
>

    <!-- 
        Para imprimir estructuras HTML
        Podemos agregar slot con su nombre
        los slot llegaran a layout como propiedades según el nombre
        for load logic we can put colon before the attribute
    -->
    <x-slot
        name="title" 
        :suma="2 + 2"
        > Blog 
    </x-slot> 

    <!-- slot-layout content -->
    <h1>Blog</h1>

</x-layout>